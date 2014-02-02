<?php
    @session_start() ;
    include_once("connexion.php") ;
    include_once("fonctions.php") ;
    $idUserLogged = $_SESSION['iduser'] ;
    $droit = $_SESSION['droit'] ;
?>
<div id="here">
    Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> <a href="principale.php?page=listecourrier">Liste des courriers</a> <a href="">D&eacute;tails du courrier</a>
</div>

<div id="zonetexte">
    <h2>D&eacute;tails du courrier</h2>
    <p>
    <?php
        $connect = new Connexion ;
        $bd = $connect->seConnecter() ;
        
        $idCourrier = $_GET['idc'] ;
        $_SESSION['idc'] = $idCourrier ;
        $requete = $bd->prepare("SELECT * FROM courrier WHERE idcourrier = :idc ") ;
        $requete->bindValue("idc",$idCourrier ,PDO::PARAM_STR) ;
        $requete->execute() ;
        $donnees = $requete->fetch() ;
        $codeTransfert = $donnees['transfert'] ;
        $idUserCourrier = $donnees['iduser'] ;
        $chemin = $donnees['chemin'] ;
    ?>
    
    <table>
        <tr>
            <td style="width: 140px;">Code du courrier</td> 
            <td>
				<?php 
					echo $donnees['idcourrier']; 
					echo '<input name="codecourrier" type="hidden" value="'.$donnees['idcourrier'].'" ' ;
				?> 
			</td>
        </tr>
        <tr>
            <td>Date de r&eacute;ception</td> <td><?php echo reverseDate($donnees['datearrive'],'-','-'); ?></td>
        </tr>
        <tr>
            <td>Exp&eacute;diteur</td> <td><?php echo $donnees['expediteur']; ?></td>
        </tr>
        <tr>
            <td>Objet</td> <td><?php echo $donnees['objet']; ?></td>
        </tr>
        <tr>
            <td><b>&Agrave; retourner avant le</b></td> <td>
            <?php
                if( reverseDate($donnees['dateretourfixer'],'-','-') == "00-00-0000" ){
                    echo "Aucune date" ;
                }
                else{
                    echo reverseDate( $donnees['dateretourfixer'],'-','-'); echo "<br/>";
                }
            ?>
            </td>
        </tr>
        <tr>
            <td>Suite donn&eacute;e</td> <td><?php echo $donnees['suite']; ?></td>
        </tr>
    </table>
    
    <?php
        $requete->closeCursor() ;
    ?>
    </p>
    <p class="lienbt">
        <?php
            if( $idUserLogged == $idUserCourrier || $droit == "admin" ){
                echo '<a class="btn btn-success" href="principale.php?page=modifiercourrier&amp;idc='.$idCourrier.'" >Modifier</a> ';
                echo '<a class="btn btn-success" href="#" id="lientransfert">Transferer &agrave;</a> ';
                echo '<a class="btn btn-success" href="'.$chemin.'" >T&eacute;l&eacute;charger</a> ';
                echo '<a class="btn btn-success" href="#" >Classer</a> ';
                echo '<a class="btn btn-danger" href="#" id="btsupprimer">Supprimer</a> ' ;
            }
            elseif($droit == "rw" || $droit == "admin"){
                echo '<a class="btn btn-success" href="#" id="lientransfert">Transferer &agrave;</a>';
            }
        ?>

        <!--a class="btn btn-success" <?php echo 'href="imprimer.php?idc="'.$idCourrier.'"' ; ?> ><i class="icon-print"></i>Imprimer</a-->
        <?php echo '<a class="btn btn-success" href="dompdf.php?idc='.$idCourrier.'" ><i class="icon-print"></i>Imprimer</a> '; ?>
        
        <div id="dialog" title="Suppression">
			
		</div>
		
        <input type="hidden" <?php echo 'value="'.$codeTransfert.'"'; ?> name="codetransfert">
    </p>
    <p class="erreur3" style="color: white;font-size: 0.80em ;"></p>
    
    <br />
    <h3>Suivi du courrier</h3> <br />
    <p>
        <table id="tablo" class="listecourrier" >
            <tr>
                <th>Informations de transfert</th>
                <th>Suite donn&eacute;e au courrier</th>
                <th>Autres</th>
            </tr>
            <?php
                $connect = new Connexion ;
                $bd = $connect->seConnecter() ;
                
                $requete = $bd->prepare("SELECT * FROM transfert WHERE idcourrier = :idc  AND supprimer = 0 ORDER BY datetransfert DESC") ;
                $requete->bindValue("idc",$idCourrier ,PDO::PARAM_INT) ;
                $requete->execute() ;
                
                $rowsColor = 0 ;
                while( $donnees = $requete->fetch() ){
                    ?>
                        <tr <?php if($rowsColor%2==0) echo 'class="lignepaire"'; else echo 'class="ligneimpaire"' ?> >
                            <td style="width: 210px;">
                                <?php
                                    echo "<b>Transferer le   : </b>".reverseDate($donnees['datetransfert'],'-','-'); echo "<br/>";
                                    echo "<b>&Agrave; : </b>".htmlspecialchars( $donnees['receveur'] ) ; echo "<br/>";
                                    echo "<b>Objet  : </b>".htmlspecialchars( $donnees['objet'] ); echo "<br/>";
                                    if( reverseDate($donnees['dateretourfixer'],'-','-') == "00-00-0000" ){
                                        echo "<b>&Agrave; retourner avant le : </b> Aucun"; echo "<br/>";
                                    }
                                    else{
                                        echo "<b>&Agrave; retourner avant le : </b>".reverseDate( $donnees['dateretourfixer'],'-','-'); echo "<br/>";
                                    }
                                    if( reverseDate($donnees['dateretour'],'-','-') == "00-00-0000" ){
                                        echo "<b>Retourner le : </b> Non retourn&eacute;"; echo "<br/>";
                                    }
                                    else{
                                        echo "<b>Retourner le : </b>".reverseDate($donnees['dateretour'],'-','-'); echo "<br/>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    if( $donnees['suitedonnee'] == "" )
                                        echo '<b>Aucune / Pas de suite pour le moment</b>';
                                    elseif( $donnees['suitedonnee'] == "Aucune / Pas de suite pour le moment" )
                                        echo '<b>Aucune / Pas de suite pour le moment</b>';
                                    else
                                        echo htmlspecialchars( $donnees['suitedonnee'] ) ;
                                ?>
                            </td>
                            <td> 
								<?php 
									if( $idUserLogged == $idUserCourrier || $droit == "admin" ){
									?>
										<a title="Modifier le transfert" <?php
										echo 'href="principale.php?page=modifiertransfert&amp;idt='.$donnees['idtransfert'].'"'; ?> >
										<img src="images/icones/accessories-text-editor.png" alt="icone modifier" width="20px" height="20px"/>
										</a> <br> 
										<a title="Supprimer le transfert" <?php echo 'id="'.$donnees['idtransfert'].'"'; ?> 				class="supprtrans" href="#">
											<img src="images/icones/list-remove.png" alt="icone modifier" width="20px" height="20px"/>
										</a> <br>
									<?php
									}
								?>
                            </td>
                        </tr>
                    <?php
                    $rowsColor++ ;
                }
                $requete->closeCursor() ;
            ?>
        </table>
    </p>
</div>
