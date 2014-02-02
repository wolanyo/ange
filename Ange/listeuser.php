<?php
    include_once("connexion.php") ;
    include_once("fonctions.php") ;
?>
<div id="here">
    Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> > <a href="">Liste des Utilisateurs</a>
</div>

<div id="zonetexte">
    <p>
        <table id="tablo" class="listecourrier">
            <h2>Liste des utilisateurs enregistr&eacute;s</h2>
            <tr>
                <th>N&deg;</th>
                <th>Nom</th>
                <th>Pr&eacute;noms</th>
                <th>Sexe</th>
                <th>Pseudo</th>
                <th>Droit</th>
                <th>Etat</th>
                <th>Autres</th>
            </tr>
            <?php
                $connect = new Connexion ;
                $bd = $connect->seConnecter() ;
                
                //pagination
                $messagesParPage=10; //Nous allons afficher 5 messages par page.
                //Une connexion SQL doit être ouverte avant cette ligne...
                $retourTotal = $bd->query('SELECT COUNT(*) AS total FROM user');
                $donneesTotal = $retourTotal->fetch(); //On range retour sous la forme d'un tableau.
                $total = $donneesTotal['total']; //On récupère le total pour le placer dans la variable $total.
                //Nous allons maintenant compter le nombre de pages.
                $nombreDePages = ceil($total/$messagesParPage);
                
                if(isset($_GET['numpage'])) // Si la variable $_GET['page'] existe...
                {
                    $pageActuelle=intval($_GET['numpage']);
                    
                    if($pageActuelle <= 0) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
                    {
                        $pageActuelle= 1;
                    }
                     
                    if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
                    {
                        $pageActuelle=$nombreDePages;
                    }
                }
                else // Sinon
                {
                    $pageActuelle=1; // La page actuelle est la n°1    
                }
                
                $premiereEntree = ($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
                // La requête sql pour récupérer les messages de la page actuelle.
                $retourTotal->closeCursor() ;
                $requete = $bd->prepare("SELECT * FROM user LIMIT :debut, :fin") ;
                $requete->bindValue("debut",$premiereEntree ,PDO::PARAM_INT) ;
                $requete->bindValue("fin",$messagesParPage ,PDO::PARAM_INT) ;
                $requete->execute() ;
                
                $rowsColor = 0 ;
                while( $donnees = $requete->fetch() ){
                    ?>
                        <tr <?php if($rowsColor%2==0) echo 'class="lignepaire"'; else echo 'class="ligneimpaire"' ?> >
                            <td> <?php echo $rowsColor+1; ?> </td>
                            <td><?php echo $donnees['nom'] ; ?></td>
                            <td><?php echo $donnees['prenom']; ?></td>
                            <td><?php echo $donnees['sexe']; ?></td>
                            <td><?php echo $donnees['pseudo']; ?></td>
                            <td><?php echo $donnees['droit']; ?></td>
                            <td><?php echo $donnees['etat']; ?></td>
                            <td><center>
                                <a title="Modifier l'utilisateur" <?php
                                    echo 'href="principale.php?page=modifieruser&amp;idu='.$donnees['iduser'].'"'; ?> >
                                    <img src="images/icones/accessories-text-editor.png" alt="icone modifier" width="15px" height="10px"/>
                                </a> <br>
                                <a title="Désactiver l'utilisateur" <?php echo 'id="'.$donnees['iduser'].'"'; ?> 				class="suppruser" href="#">
									<img src="images/icones/list-remove.png" alt="icone modifier" width="20px" height="20px"/>
								</a> <br>
								<?php
									if($donnees['etat'] == 0){
										?>
											<a title="Activer l'utilisateur" <?php echo 'id="'.$donnees['iduser'].'"'; ?> 				class="activeruser" href="#">
											<img src="images/icones/dialog-ok.png" alt="icone modifier" width="20px" height="20px"/>
								</a> <br>
										<?php
									}
								?>
                            </center></td>
                        </tr>
                    <?php
                    $rowsColor++ ;
                }
                $requete->closeCursor() ;
            ?>
        </table>
        <?php
            echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
                for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
                {
                    //On va faire notre condition
                    if($i==$pageActuelle) //Si il s'agit de la page actuelle...
                    {
                        echo ' [ '.$i.' ] '; 
                    }	
                    else //Sinon...
                    {
                        echo ' <a href="listecourrier.php?numpage='.$i.'">'.$i.'</a> ';
                    }
                }
            echo '</p>';
        ?>
        
        <div id="dialog" title="Désactivation">
			
		</div>
    </p>
</div>