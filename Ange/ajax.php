<?php
    @session_start();
    include_once("fonctions.php");
    include_once("connexion.php") ;
    
?>

<?php
    //code de connexion
    if( isset($_POST['code']) && $_POST['code'] == 'cn'){
        
        if( isset($_POST['pseudo']) && isset($_POST['passwd']) ){
            $pseudo = $_POST['pseudo'] ;
            $passwd = $_POST['passwd'] ;
            $connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare(" SELECT * FROM user WHERE pseudo=:pseudo AND passwd=:passwd AND etat = 1") ;
            $requete->bindValue("pseudo",$pseudo ,PDO::PARAM_STR) ;
            $requete->bindValue("passwd",$passwd ,PDO::PARAM_STR) ;
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
                echo '1' ;
            }
            else{
                echo '0' ;
            }
            $requete->closeCursor() ;
        }
    }
?>

<?php
    //inserer un utilisateur
    if(isset($_POST['code'])){
        if( $_POST['code'] == "au" ){
            include_once("user.php") ;
            $user = new User ;
            $user->setNom( $_POST['nom'] ) ;
            $user->setPrenom( $_POST['prenom'] ) ;
            $user->setSexe( $_POST['sexe'] ) ;
            $user->setPseudo( $_POST['pseudo'] ) ;
            $user->setPassword( $_POST['passwd'] ) ;
            $user->setDroit( $_POST['droit'] ) ;
            $user->setDroitNotification( $_POST['droitnotification'] ) ;
            
            
            if( $_POST['passwd'] != $_POST['passwd2'] ){
                echo "3" ;
            }
            elseif( $user->verifierPseudo() ){
                echo "0" ;
            }
            else{
                $user->save() ;
                echo "1" ;
            }
        }
    }
    else{
        echo "2" ;
    }
?>

<?php
    //modifier un utilisateur
    if(isset($_POST['code'])){
        if( $_POST['code'] == "mu" ){
            include_once("user.php") ;
            $user = new User ;
            $user->setIdUser( $_POST['iduser'] ) ;
            $user->setNom( $_POST['nom'] ) ;
            $user->setPrenom( $_POST['prenom'] ) ;
            $user->setSexe( $_POST['sexe'] ) ;
            $user->setPseudo( $_POST['pseudo'] ) ;
            $user->setDroit( $_POST['droit'] ) ;
            $user->setDroitNotification( $_POST['droitnotification'] ) ;
            
            if( $_POST['pseudo'] == $_POST['pseudo2']){
                $user->update() ;
                echo "1" ;
            }
            else{
                if( $user->verifierPseudo() ){
                    echo "0" ;
                }
                else{
                    $user->update() ;
                    echo "1" ;
                }
            }
        }
    }
    else{
        echo "2" ;
    }
?>

<?php
    //modofier photo
    if(isset($_POST['code'])){
        if( $_POST['code'] == "mph" ){
            include_once("user.php") ;
            $user = new User ;

            $user->setIdUser( $_SESSION['iduser'] ) ;
            
            $ext = substr(strrchr($_FILES['photo']['name'],'.'),1);
            $chemin = 'images/photos/'.$_SESSION['iduser'].'.'.$ext  ;
            $user->setPhoto( $chemin ) ;

            if( $user->updatePhoto() ){
                //$result = upload('photo', $chemin, 100000, array('png','gif','jpg','jpeg') );
                move_uploaded_file( $_FILES['photo']['tmp_name'], $chemin );
                /*if( $result == FALSE)
					echo 'probleme' ;
				else
					echo 'yes' ;*/
				rechargerSession( $_SESSION['iduser'] ) ;
				header('Location: principale.php?page=photo');
            }
        }
    }
?>

<?php
    //désactiver un utilisateur
    if(isset($_POST['code'])){
        if( $_POST['code'] == "su" ){
            include_once("user.php") ;
            $user = new User ;
            $user->setIdUser( $_POST['iduser'] ) ;
            $user->desactiver() ;
            echo "1";
        }
    }
    else{
        echo "2" ;
    }
?>

<?php
    //activer un utilisateur
    if(isset($_POST['code'])){
        if( $_POST['code'] == "acu" ){
            include_once("user.php") ;
            $user = new User ;
            $user->setIdUser( $_POST['iduser'] ) ;
            $user->activer() ;
            echo "1";
        }
    }
    else{
        echo "2" ;
    }
?>

<?php
    //modifier mot de passe
    if( isset($_POST['code']) ){
        if( $_POST['code'] == "mp" ){
            include_once("user.php") ;
            $user = new User ;
            $user->setIdUser( $_SESSION['iduser'] ) ;
            $user->setPassword( $_POST['passwd'] ) ;
            
            if( $_POST['actuelpasswd'] != $_SESSION['passwd'] ){
                echo "0" ;
            }
            elseif( $_POST['passwd'] != $_POST['passwd2'] ){
                echo "1" ;
            }
            else{
                $user->updatePassword() ;
                echo "2" ;
            }
        }
    }
    else{
        echo "3" ;
    }
?>

<?php
    //enregistrer un courrier
    if(isset($_POST['code'])){
        if( $_POST['code'] == "ac" ){
            include_once("courrier.php") ;
            $dateArrivee = reverseDate( $_POST['datearr'] ) ;
            $courrier = new Courrier ;
            $courrier->setIdCourrier( $_POST['idc'] ) ;
            $courrier->setIdUser($_SESSION['iduser']) ;
            $courrier->setDateArriver( $dateArrivee ) ;
            $courrier->setExpediteur( $_POST['exp'] ) ;
            $courrier->setObjet( $_POST['objet'] ) ;
            $courrier->setSuite("Aucun") ;
            if( $_POST['dateretour'] == "Aucune date" ){ $courrier->setDateRetourFixer( "00-00-0000" ) ;}
            else { $courrier->setDateRetourFixer( reverseDate( $_POST['dateretour'] ) ) ; }
            
            if( $courrier->verifierCode() == true ){
                echo "0" ;
            }
            else{
                $courrier->save() ;
                echo "1" ;
            }
        }
    }
    else{
        echo "2" ;
    }
?>

<?php
    //modifier un courrier
    if(isset($_POST['code'])){
        if( $_POST['code'] == "mc" ){
            include_once("courrier.php") ;
            $idCourrier = $_POST['codecourrier'] ;
            $ancienIdCourrier = $_POST['anciencodecourrier'] ;
            $courrier = new Courrier ;
            $courrier->setIdCourrier( $_POST['codecourrier'] ) ;
            $courrierClone = new Courrier ;
            $courrierClone->setIdCourrier( $_POST['codecourrier'] ) ;
            
            //$courrier->setIdUser(1k) ;
            $courrier->setDateArriver( reverseDate( $_POST['datearriver'] ) ) ;
            $courrier->setExpediteur( $_POST['expediteur'] ) ;
            $courrier->setObjet( $_POST['objet'] ) ;
            if( $_POST['dateretour'] == "Aucune date" ){ $courrier->setDateRetourFixer( "00-00-0000" ) ;}
            else $courrier->setDateRetourFixer( reverseDate($_POST['dateretour']) ) ;
            
            if( $courrier->getIdCourrier() == $courrierClone->getIdCourrier() ){
				$courrier->update( $ancienIdCourrier ) ;
				echo "1" ;
            }
            else{
				if( $courrier->verifierCode() ){
					echo "0" ;
				}
				else{
					$courrier->update( $ancienIdCourrier ) ;
					echo "1" ;
				}
            }
        }
    }
    else{
        echo "2" ;
    }
?>

<?php
	if(isset($_POST['code'])){
		if( $_POST['code'] == "sc" ){
			include_once("courrier.php") ;
            $courrier = new Courrier ;
            $courrier->setIdCourrier( $_POST['idc'] ) ;
            $courrier->supprimer() ;
            echo "1" ;
		}
	}
	else{
        echo "2" ;
    }
?>

<?php
    //modifier la suite donné a un courrier
    if(isset($_POST['code'])){
        if( $_POST['code'] == "mc/ds" ){
            include_once("courrier.php") ;
            $courrier = new Courrier ;
            $courrier->setIdCourrier( $_POST['idc'] ) ;
            if( getCodeTransfert($_POST['idc']) == 1 ){
                echo '0' ;
            }
            else{
                $courrier->setSuite( $_POST['suite'] ) ;
                $courrier->updateSuite() ;
                setCodeTransfert($_POST['idc'],'0');
                echo '1' ;
            }

        }
    }
    else{
        echo "2" ;
    }
?>

<?php
    //transferer  un courrier
    if( isset($_POST['code']) ){
        if( $_POST['code'] == "tc" ){
            include_once("transfert.php") ;
            $transfert = new Transfert ;
            $transfert->setIdCourrier( $_SESSION['idc'] ) ;
            $transfert->setDateTransfert( reverseDate($_POST['datetransfert']) ) ;
            $transfert->setReceveur( $_POST['receveur'] ) ;
            $transfert->setObjet( $_POST['objet'] ) ;
            if( $_POST['dateretour'] == "Aucune date" ){ $transfert->setDateRetourFixer( "00-00-0000" ) ;}
            else $transfert->setDateRetourFixer( reverseDate($_POST['dateretour']) ) ;
            $transfert->setDateRetour( reverseDate("00-00-0000" )) ;
            $transfert->setSuiteDonnee( "Aucune / Pas de suite pour le moment" ) ;
            $transfert->save() ;
            setCodeTransfert($_SESSION['idc'],'1');
            echo 1 ;
        }
    }
    else{
        echo 2 ;
    }
?>

<?php
    //modifier  un transfert
    if( isset($_POST['code']) ){
        if( $_POST['code'] == "mt" ){
            include_once("transfert.php") ;
            $transfert = new Transfert ;
            $transfert->setIdTransfert( $_POST['idtransfert'] ) ;
            $transfert->setDateTransfert( reverseDate($_POST['datetransfert'],'-','-') ) ;
            $transfert->setReceveur( $_POST['receveur'] ) ;
            $transfert->setObjet( $_POST['objet'] ) ;
            $transfert->update() ;
            echo 1 ;
        }
    }
    else{
        echo 2 ;
    }
?>

<?php
    //donnee suite a un transfert
    if( isset($_POST['code']) ){
        if( $_POST['code'] == "mt/ds" ){
            include_once("transfert.php") ;
            $transfert = new Transfert ;
            $transfert->setIdTransfert( $_POST['idtransfert'] ) ;
            $transfert->setDateRetour( reverseDate($_POST['dateretour'],'-','-') ) ;
            $transfert->setSuiteDonnee( $_POST['suite'] ) ;
            $transfert->updateSuiteDonnee() ;
            setCodeTransfert($_SESSION['idc'],'0');
            echo 1 ;
        }
    }
    else{
        echo 2 ;
    }
?>

<?php
    //supprimer un transfert
    if( isset($_POST['code']) ){
        if( $_POST['code'] == "st" ){
            include_once("transfert.php") ;
            $transfert = new Transfert ;
            $transfert->setIdTransfert( $_POST['idt'] ) ;
            $transfert->supprimer() ;
            echo 1 ;
        }
    }
    else{
        echo 2 ;
    }
?>

<?php
    //parametre de notifications
    if( isset($_POST['code']) ){
        if( $_POST['code'] == "nt" ){
            $dom = new DomDocument();
            $dom->load('notifications.xml') ;
            $racine = $dom->documentElement;
            echo $racine->nodeName;
        }
    }
    else{
        echo 2 ;
    }
?>
