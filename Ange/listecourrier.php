
<?php
    include_once("connexion.php") ;
    include_once("fonctions.php") ;
?>
<div id="here">
    Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> > <a href="">Liste des courriers</a>
</div>

<div id="zonetexte">
    <h2>Liste des courriers enregistr&eacute;s</h2>
    <p>
        <table cellpadding="0" cellspacing="0" border="0" id="tablo" >
            <thead>
                <tr>
                    <th>N&deg;</th>
                    <th>N&deg; Courrier</th>
                    <th>Re&ccedil;u le</th>
                    <th>Exp&eacute;diteur</th>
                    <th>Objet</th>
                    <th>&Agrave; retourner le</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $connect = new Connexion ;
                $bd = $connect->seConnecter() ;
                
                $requete = $bd->query("SELECT * FROM courrier WHERE supprimer = 0 ORDER BY idcourrier DESC") ;
                
                $rowsColor = 0 ;
                while( $donnees = $requete->fetch() ){
                    ?>
                        <tr <?php if($rowsColor%2==0) echo 'class="lignepaire"'; else echo 'class="ligneimpaire"' ?> >
                            <td> <?php echo $rowsColor+1; ?> </td>
                            <td><?php echo '<a href="principale.php?page=detailscourrier&amp;idc='.$donnees['idcourrier'].'">'.$donnees['idcourrier'].'</a>'; ?></td>
                            <td><?php echo reverseDate($donnees['datearrive'],'-','-'); ?></td>
                            <td><?php echo raccourcirChaine( $donnees['expediteur'],25) ; ?></td>
                            <td><?php echo raccourcirChaine( $donnees['objet'],25); ?></td>
                            <td>
								<?php
									$dateRetour = reverseDate($donnees['dateretourfixer'],'-','-') ;
									if( $dateRetour == "00-00-0000")
										echo "Aucune"; 
									else
										echo $dateRetour ;
								?>
							</td>
                        </tr>
                    <?php
                    $rowsColor++ ;
                }
                $requete->closeCursor() ;
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>N&deg;</th>
                    <th>N&deg; Courrier</th>
                    <th>Re&ccedil;u le</th>
                    <th>Exp&eacute;diteur</th>
                    <th>Objet</th>
                    <th>&Agrave; retourner le</th>
                </tr>
            </tfoot>
        </table>
        <?php
            /*echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
                for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
                {
                    //On va faire notre condition
                    if($i==$pageActuelle) //Si il s'agit de la page actuelle...
                    {
                        echo ' [ '.$i.' ] '; 
                    }	
                    else //Sinon...
                    {
                        echo ' <a href="principale.php?page=listecourrier&amp;numpage='.$i.'">'.$i.'</a> ';
                    }
                }
            echo '</p>';*/
        ?>
    </p>
</div>