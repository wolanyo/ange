<!DOCTYPE html>

<?php
    @session_start();
    if( isset($_GET['page']) ){
        $param = $_GET['page'] ;
    }
    else{
        $param = 'accueil' ;
    }
    $_SESSION['page'] = $param ;
    $droit = $_SESSION['droit'] ;
    if( !isset($droit) ){
        header("location: index.html") ;
    }
?>

<html>
    <head>
        <link type="text/css" href="lib/bootstrap/css/bootstrap.css" rel="stylesheet" >
        <link type="text/css" href="lib/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" >
        <link type="text/css" media="all" href="css/design.css" rel="stylesheet">
        <link type="text/css" media="all" href="css/widget.css" rel="stylesheet">
        <link type="text/css" media="all" href="js/jquery-ui/css/smoothness/jquery-ui-1.9.1.custom.css" rel="stylesheet">
        <link type="text/css" media="all" href="js/datatables194/media/css/jquery.dataTables.css" rel="stylesheet">
        
        <meta name="author" content="Komi Wolanyo KOUDO" />
        <meta name="description" content="application de gestion centralisé de courrier" />
        <meta name="keywords" content="courrier, environnement, gestion" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <link rel="icon" href="images/favicon.ico" />
        
        <title>
            <?php
                if( $param == 'accueil' ){
                    echo "Bienvenue" ;
                }
                if( $param == 'listecourrier' ){
                    echo "Liste des courriers" ;
                }
                elseif( $param == 'listeuser' ){
                    echo "Liste des utilisateurs" ;
                }
                elseif( $param == 'inscription' ){
                    echo "Créer un utilisateur" ;
                }
                elseif( $param == 'ajoutercourrier' ){
                    echo "Enregistrer un courrier" ;
                }
                elseif( $param == 'detailscourrier' ){
                    echo "Détails du courrier" ;
                }
                elseif( $param == 'ajoutertransfert' ){
                    echo "Transferer un courrier" ;
                }
                elseif( $param == 'modifiercourrier' ){
                    echo "Modifier un courrier" ;
                }
                elseif( $param == 'modifieruser' ){
                    echo "Mettre à jour un utilisateur" ;
                }
                elseif( $param == 'notifications' ){
                    echo "Liste des notifications de courrier" ;
                }
                elseif( $param == 'notificationstransfert' ){
                    echo "Liste des notifications de transfert" ;
                }
                elseif( $param == 'donneesuitetransfert' ){
                    echo "Donner une suite au transfert" ;
                }
                elseif( $param == 'modifiertransfert' ){
                    echo "Modifier le transfert" ;
                }
                elseif( $param == 'password' ){
                    echo "Changer mot de passe" ;
                }
                elseif( $param == 'parametres' ){
                    echo "Paramètre" ;
                }
            ?>
        </title>
    </head>
    
    <body>
        <div id="cadre">
            <div id="tete">
                <div id="banniere">
					<table>
						<tr> 
							<td width="77%"> <img src="images/logo.png" height="175px"/> <br /></td>
							<td >
								<table>
									<tr>
										<td rowspan="2"> 
											<?php
												if( $_SESSION['sexe'] == "Homme"){
													if( $_SESSION['photo'] != "" ){
														echo ' <img src="'.$_SESSION['photo'].'" alt="Photo login" width="70" height="70"/> ' ;
													}
													else{
														echo ' <img src="images/icones/meeting-participant.png" alt="Photo login" width="70" height="70"/> ' ;
													}
												}
												else{
													if( $_SESSION['photo'] != "" ){
														echo ' <img src="'.$_SESSION['photo'].'" alt="Photo login" width="70" height="70"/> ' ;
													}
													else{
														echo ' <img src="images/femme.png" alt="Photo login" width="70" height="70"/> ' ;
													}
												}
											?>
										</td> 
										<td id="logininfo"> 
											<?php echo date('d F Y') ; ?>
										</td>
									</tr>
									<tr>
										
										<td id="logininfo"> 
											Bonjour <?php echo $_SESSION['nom'].' '.$_SESSION['prenom'] ; ?> 
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<br>
                </div>            
            </div>
            
            <div id="corps">
                
                <div id="corpsgauche">
                    <?php
                        if( $droit == "admin"){
                            include_once("menuadmin.php");
                        }
                        elseif( $droit == "rw"){
                            include_once("menurw.php");   
                        }
                        elseif( $droit == "r"){
                            include_once("menur.php");   
                        }
                        
                    ?>
                </div>
                
                <div id="corpsmilieu">
                    <?php
                        include("fonctions.php") ;
                        $pageActuel = getPage($param) ;
                        include($pageActuel) ;
                        //echo $pageActuel ;
                    ?>
                </div>
                
            </div>
            
            <div id="pied">
                <p>
                    &copy; Wolasoft Corporation D&eacute;cembre 2012 <br>
                    Tel: 22 42 81 79 / Cel: 91 92 85 94 / E-mail: wolasoftcorporation@gmail.com / Lom&eacute;-Togo
                </p>
            </div>
        </div>
        
        <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/jquery-ui/js/jquery-ui-1.9.1.custom.js"></script>
        <script type="text/javascript" src="js/datatables194/media/js/jquery.dataTables.js"></script>
    </body>
</html>