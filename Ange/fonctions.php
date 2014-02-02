<?php
	@session_start();
    include_once("connexion.php") ;
    function getPage( $page ){
        $listePage = array (
            'accueil' => 'accueil.php' ,
            'listecourrier' => 'listecourrier.php' ,
            'listeuser' => 'listeuser.php' ,
            'detailscourrier' => 'detailscourrier.php' ,
            'inscription' => 'inscription.html' ,
            'details' => 'details.php' ,
            'index' => 'index.php' ,
            'ajoutercourrier' => 'ajoutercourrier.php',
            'ajoutertransfert' => 'ajoutertransfert.php',
            'modifiertransfert' => 'modifiertransfert.php',
            'donneesuitetransfert' => 'donneesuitetransfert.php',
            'modifiercourrier' => 'modifiercourrier.php',
            'modifieruser' => 'modifieruser.php',
            'notifications' => 'notifications.php',
            'notificationstransfert' => 'notificationstransfert.php',
            'photo' => 'photo.php',
            'password' => 'password.php',
            'parametres' => 'parametres.php'
        ) ;
        
        if( $page == 'accueil' ){
            return $listePage['accueil'] ;
        }
        if( $page == 'listecourrier' ){
            return $listePage['listecourrier'] ;
        }
        elseif( $page == 'listeuser' ){
            return $listePage['listeuser'] ;
        }
        elseif( $page == 'inscription' ){
            return $listePage['inscription'] ;
        }
        elseif( $page == 'ajoutercourrier' ){
            return $listePage['ajoutercourrier'] ;
        }
        elseif( $page == 'detailscourrier' ){
            return $listePage['detailscourrier'] ;
        }
        elseif( $page == 'ajoutertransfert' ){
            return $listePage['ajoutertransfert'] ;
        }
        elseif( $page == 'modifiercourrier' ){
            return $listePage['modifiercourrier'] ;
        }
        elseif( $page == 'modifieruser' ){
            return $listePage['modifieruser'] ;
        }
        elseif( $page == 'notifications' ){
            return $listePage['notifications'] ;
        }
        elseif( $page == 'notificationstransfert' ){
            return $listePage['notificationstransfert'] ;
        }
        elseif( $page == 'donneesuitetransfert' ){
            return $listePage['donneesuitetransfert'] ;
        }
        elseif( $page == 'modifiertransfert' ){
            return $listePage['modifiertransfert'] ;
        }
        elseif( $page == 'photo' ){
            return $listePage['photo'] ;
        }
        elseif( $page == 'password' ){
            return $listePage['password'] ;
        }
        elseif( $page == 'parametres' ){
            return $listePage['parametres'] ;
        }
    }
    
    function raccourcirChaine($chaine, $tailleMax)
    {
        // Variable locale
        $positionDernierEspace = 0;
         
        if( strlen($chaine) >= $tailleMax ) {
            $chaine = substr($chaine,0,$tailleMax);
            $positionDernierEspace = strrpos($chaine,' ');
            $chaine = substr($chaine,0,$positionDernierEspace).'...';
        }
        return $chaine;
    }
    
    function reverseDate($chaine, $separator='-',$newseparator='-')
    { 
        $newDate = explode($separator,$chaine);
        return $reverseDate = $newDate[2].$newseparator.$newDate[1].$newseparator.$newDate[0];
    }
    
    function setCodeTransfert($idc, $codet){
        $connect = new Connexion ;
        $bd = $connect->seConnecter() ;
        $requete = $bd->prepare("UPDATE courrier SET transfert=:codet WHERE idcourrier=:idc") ;
        $requete->bindValue(":idc",$idc ,PDO::PARAM_INT) ;
        $requete->bindValue(":codet",$codet ,PDO::PARAM_INT) ;
        $requete->execute() ;
        $requete->closeCursor() ;
    }
    
    function getCodeTransfert($idc){
        $connect = new Connexion ;
        $bd = $connect->seConnecter() ;
        $requete = $bd->prepare("SELECT transfert FROM courrier WHERE idcourrier=:idc") ;
        $requete->bindValue(":idc",$idc ,PDO::PARAM_INT) ;
        $requete->execute() ;
        $donnees = $requete->fetch() ;
        return $donnees['transfert'] ;
        $requete->closeCursor() ;
    }
    
    function getNotificationsRouge(){
        $connect = new Connexion ;
        $bd = $connect->seConnecter() ;
        $requete = $bd->prepare("SELECT COUNT(idcourrier) as nbnt FROM courrier WHERE suite = 'Aucun' AND DATEDIFF( dateretourfixer, CURDATE() ) BETWEEN :p1 AND :p2") ;
        $requete->bindValue(":p1",0 ,PDO::PARAM_INT) ;
        $requete->bindValue(":p2",2 ,PDO::PARAM_INT) ;
        $requete->execute() ;
        $donnees = $requete->fetch() ;
        return $donnees['nbnt'] ;
        $requete->closeCursor() ;
    }
    
    function getNotificationsJaune(){
        $connect = new Connexion ;
        $bd = $connect->seConnecter() ;
        $requete = $bd->prepare("SELECT COUNT(idcourrier) as nbnt FROM courrier WHERE suite = 'Aucun' AND DATEDIFF( dateretourfixer, CURDATE() ) BETWEEN :p1 AND :p2") ;
        $requete->bindValue(":p1",3 ,PDO::PARAM_INT) ;
        $requete->bindValue(":p2",5 ,PDO::PARAM_INT) ;
        $requete->execute() ;
        $donnees = $requete->fetch() ;
        return $donnees['nbnt'] ;
        $requete->closeCursor() ;
    }
    
    function getNotificationsVert(){
        $connect = new Connexion ;
        $bd = $connect->seConnecter() ;
        $requete = $bd->prepare("SELECT COUNT(idcourrier) as nbnt FROM courrier WHERE suite = 'Aucun' AND DATEDIFF( dateretourfixer, CURDATE() ) BETWEEN :p1 AND :p2") ;
        $requete->bindValue(":p1",6 ,PDO::PARAM_INT) ;
        $requete->bindValue(":p2",7 ,PDO::PARAM_INT) ;
        $requete->execute() ;
        $donnees = $requete->fetch() ;
        return $donnees['nbnt'] ;
        $requete->closeCursor() ;
    }
    
    function getNotificationsRougeTransfert(){
        $connect = new Connexion ;
        $bd = $connect->seConnecter() ;
        $requete = $bd->prepare("SELECT COUNT(idcourrier) as nbnt FROM transfert WHERE suitedonnee = 'Aucune / Pas de suite pour le moment' AND DATEDIFF( dateretourfixer, CURDATE() ) BETWEEN :p1 AND :p2") ;
        $requete->bindValue(":p1",0 ,PDO::PARAM_INT) ;
        $requete->bindValue(":p2",2 ,PDO::PARAM_INT) ;
        $requete->execute() ;
        $donnees = $requete->fetch() ;
        return $donnees['nbnt'] ;
        $requete->closeCursor() ;
    }
    
    function getNotificationsJauneTransfert(){
        $connect = new Connexion ;
        $bd = $connect->seConnecter() ;
        $requete = $bd->prepare("SELECT COUNT(idcourrier) as nbnt FROM transfert WHERE suitedonnee = 'Aucune / Pas de suite pour le moment' AND DATEDIFF( dateretourfixer, CURDATE() ) BETWEEN :p1 AND :p2") ;
        $requete->bindValue(":p1",3 ,PDO::PARAM_INT) ;
        $requete->bindValue(":p2",5 ,PDO::PARAM_INT) ;
        $requete->execute() ;
        $donnees = $requete->fetch() ;
        return $donnees['nbnt'] ;
        $requete->closeCursor() ;
    }
    
    function getNotificationsVertTransfert(){
        $connect = new Connexion ;
        $bd = $connect->seConnecter() ;
        $requete = $bd->prepare("SELECT COUNT(idcourrier) as nbnt FROM transfert WHERE suitedonnee = 'Aucune / Pas de suite pour le moment' AND DATEDIFF( dateretourfixer, CURDATE() ) BETWEEN :p1 AND :p2") ;
        $requete->bindValue(":p1",6 ,PDO::PARAM_INT) ;
        $requete->bindValue(":p2",7 ,PDO::PARAM_INT) ;
        $requete->execute() ;
        $donnees = $requete->fetch() ;
        return $donnees['nbnt'] ;
        $requete->closeCursor() ;
    }
    
    function rechargerSession($idUser){
		$connect = new Connexion ;
        $bd = $connect->seConnecter() ;
        $requete = $bd->prepare(" SELECT * FROM user WHERE iduser=:iduser") ;
        $requete->bindValue(":iduser",$idUser ,PDO::PARAM_STR) ;
        $requete->execute() ;
        if( $donnees = $requete->fetch() ){
            $_SESSION['iduser'] = $donnees['iduser'];
			$_SESSION['nom'] = $donnees['nom'];
            $_SESSION['prenom'] = $donnees['prenom'];
            $_SESSION['sexe'] = $donnees['sexe'];
            $_SESSION['pseudo'] = $donnees['pseudo'];
            $_SESSION['photo'] = $donnees['photo'];
            $_SESSION['passwd'] = $passwd ;
            $_SESSION['droit'] = $donnees['droit'];
            $_SESSION['droitnotification'] = $donnees['droitnotification'];
                //header('Location: principale.php?page=accueil');
                //$idUser = $_SESSION['iduser'] ;
            }
        $requete->closeCursor() ;
    }
    
    function upload($index, $destination, $maxsize=FALSE, $extensions=FALSE) {
		//Créer un dossier 'fichiers/1/'
		//mkdir('images/photos/', 0777, true);
		//Test1: fichier correctement uploadé
		/*if (!isset($_FILES['photo']) OR $_FILES['photo']['error'] > 0){
			echo 'pb fichier' ;
			return FALSE;
		}
		//Test2: taille limite
		if ($maxsize != FALSE AND $_FILES['photo']['size'] > $maxsize){
		echo 'pb taille' ;
			return FALSE;
		}
		//Test3: extension
		$ext = substr(strrchr($_FILES['photo']['name'],'.'),1);
		if ($extensions != FALSE AND !in_array($ext,$extensions)){
			echo 'pb extension' ;
			return FALSE;
		}*/
		//Déplacement
		move_uploaded_file( $_FILES['photo']['tmp_name'], $destination );
	}

?>