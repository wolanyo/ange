<?php session_start(); $_SESSION['code'] = $_GET['code'] ; $page="notification";?>

<?php
    //code de connexion
    include_once("connexion.php") ;
    if(isset($_GET['code'])){
        if( $_GET['code'] == "connexion" ){
            $pseudo = $_POST['pseudo'] ;
            $passwd = $_POST['passwd'] ;
            $connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare(" SELECT * FROM user WHERE pseudo=:pseudo AND passwd=:passwd ") ;
            $requete->bindValue("pseudo",$pseudo ,PDO::PARAM_STR) ;
            $requete->bindValue("passwd",$passwd ,PDO::PARAM_STR) ;
            $requete->execute() ;
            if( $donnees = $requete->fetch() ){
                $_SESSION['iduser'] = $donnees['iduserr'];
                $_SESSION['nom'] = $donnees['nom'];
                $_SESSION['prenom'] = $donnees['prenom'];
                $_SESSION['sexe'] = $donnees['sexe'];
                $_SESSION['pseudo'] = $donnees['pseudo'];
                $_SESSION['droit'] = $donnees['droit'];
                header('Location: principale.php?page=accueil');
            }
            $requete->closeCursor() ;
        }
    }
?>

<?php
    //code de deconnexion
    if(isset($_GET['code'])){
        if( $_GET['code'] == "deconnexion" ){
            session_destroy() ;
            header('Location: index.html?');
        }
    }
?>

<?php
    //inserer un utilisateur
    if(isset($_GET['code'])){
        if( $_GET['code'] == "au" ){
            include_once("user.php") ;
            $user = new User ;
            $user->setNom( $_POST['nom'] ) ;
            $user->setPrenom( $_POST['prenom'] ) ;
            $user->setSexe( $_POST['sexe'] ) ;
            $user->setPseudo( $_POST['pseudo'] ) ;
            $user->setPassword( $_POST['passwd'] ) ;
            $user->setDroit( $_POST['droit'] ) ;
            
            if( $user->save() ){
                header('Location: principale.php?page=notifications');
            }
            else{
                echo "Erreur enregistrement user" ;
            }
        }
    }
    else{
        echo "Transmision incorrect de code" ;
    }
?>

<?php
    //modifier un utilisateur  
?>

<?php
    //inserer un courrier
    include('fonctions.php') ;
    if(isset($_GET['code'])){
        if( $_GET['code'] == "ac" ){
            include_once("courrier.php") ;
            $dateArrivee = reverseDate($_POST['datearriver']) ;
            $courrier = new Courrier ;
            $courrier->setIdCourrier( $_POST['codecourrier'] ) ;
            $courrier->setIdUser(1) ;
            $courrier->setDateArriver( $dateArrivee ) ;
            $courrier->setExpediteur( $_POST['expediteur'] ) ;
            $courrier->setObjet( $_POST['objet'] ) ;
            
            if( $courrier->verifierCode() ){
                echo "Courrier non enregistré erreur de code" ;
            }
            else{
                $courrier->save() ;
                header('Location: principale.php?page='.$page);
            }
        }
    }
    else{
        echo "Transmision incorrect de code" ;
    }
?>

<?php
    //modifier un courrier
    if(isset($_GET['code'])){
        if( $_GET['code'] == "mc" ){
            include_once("courrier.php") ;
            $courrier = new Courrier ;
            $courrier->setIdCourrier( $_POST['codecourrier'] ) ;
            $courrier->setIdUser(1) ;
            $courrier->setDateArriver( $_POST['datearriver'] ) ;
            $courrier->setExpediteur( $_POST['expediteur'] ) ;
            $courrier->setObjet( $_POST['objet'] ) ;
            
            if( $courrier->verifierCode() ){
                header('Location: principale.php?page=notifications');
            }
            else{
                $courrier->update() ;
                echo "Courrier modifier" ;
            }
        }
    }
    else{
        echo "Transmision incorrect" ;
    }
?>

<?php
    //supprimer un courrier
?>

<?php
    //transferer  un courrier
    if(isset($_GET['code'])){
        if( $_GET['code'] == "tc" ){
            include_once("transfert.php") ;
            $transfert = new Transfert ;
            $transfert->setIdCourrier( $_SESSION['idc'] ) ;
            $transfert->setDateTransfert( $_POST['datetransfert'] ) ;
            $transfert->setReceveur( $_POST['receveur'] ) ;
            $transfert->setObjet( $_POST['objet'] ) ;
            $transfert->setDateRetour( "00/00/0000" ) ;
            $transfert->setSuiteDonnee( "Aucun" ) ;
            
            if( $transfert->save() ){
                echo "Courrier Enregistré" ;
                header('Location: principale.php?page=notifications');
            }
        }
    }
    else{
        echo "Transmision incorrect" ;
    }
?>

<?php
    //mettre a jour un transfert 
?>