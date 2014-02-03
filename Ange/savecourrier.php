<?php
    @session_start();
    include_once("fonctions.php");
    
?>

<?php
	if(isset($_POST['code'])){
		if( $_POST['code'] == "ac" ){
			include_once("courrier.php") ;
			$dateArrivee = reverseDate( $_POST['datearriver'] ) ;
			$courrier = new Courrier ;
			$courrier->setIdCourrier( $_POST['codecourrier'] ) ;
			$courrier->setIdUser($_SESSION['iduser']) ;
			$courrier->setDateArriver( $dateArrivee ) ;
			$courrier->setExpediteur( $_POST['expediteur'] ) ;
			$courrier->setObjet( $_POST['objet'] ) ;
			$courrier->setSuite("Aucun") ;
			if( $_POST['dateretour'] == "Aucune date" ){
				$courrier->setDateRetourFixer( "00-00-0000" ) ;
			}
			else { 
				$courrier->setDateRetourFixer( reverseDate( $_POST['dateretour'] ) ) ;
			}
			
			$ext = substr(strrchr($_FILES['fichier']['name'],'.'),1);
			$nomFichier = str_replace("/", "-", $_POST['codecourrier']) ;
			$date = explode("-",$dateArrivee);
			//creation d'un dossier
			mkdir('fichiers/'.$date[0].'/'.$date[1], 0777, true);
			$chemin = 'fichiers/'.$date[0].'/'.$date[1].'/'.$nomFichier.'.'.$ext  ;
			chmod('/fichier', 0777);
			chmod('fichiers/'.$date[0], 0777);
			chmod('fichiers/'.$date[0].'/'.$date[1], 0777);
			//chmod($chemin, 0777, true);
			$courrier->setChemin( $chemin ) ;
			move_uploaded_file( $_FILES['fichier']['tmp_name'], $chemin );
			$courrier->save() ;
			
			//retour sur la page de saisie
			header('Location: principale.php?page=ajoutercourrier');
		}
	}
	else{
		echo "2" ;
	}
?>