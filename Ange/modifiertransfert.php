<?php
    @session_start() ;
    include_once("transfert.php") ;
    $idTransfert = $_GET['idt'] ;
    $transfert = new Transfert ;
    $transfert->setIdTransfert( $idTransfert ) ;
    $transfert->chargerTransfert() ;
?>
<div id="here">
    Vous &ecirc;tes ici :  <a href="#">Accueil</a> > <a href="#">Liste des courriers</a> > <a href="#">Modifier le transfert</a>
</div>

<div id="zonetexte">
    <form name="mtransfert" method="post" action="" >
        <fieldset>
            <legend>Modifier les informations de base du transfert</legend>
            <table class="tableformulaire">
                <tr>
                    <td> 
                    	<input type="hidden" <?php echo 'value="'.$idTransfert.'"'; ?> name="idt" /> 
                    	<input type="hidden" name="idexpediteur" <?php echo 'value="'.$_SESSION['iduser'].'"'; ?>>
                    </td>
                    <td> <p class="erreur" style="color: white;"></p></td>
                </tr>
                <tr>
                    <td>Date de transfert</td>
                    <td> <input type="text" name="datetransfert" class="date" <?php echo 'value="'.$transfert->getDateTransfert().'"' ; ?>  required> </td>
                </tr>
                <tr>
		            <td>Transferer &agrave;</td> 
		            <td>
		            <?php
				        $connect = new Connexion ;
				        $bd = $connect->seConnecter() ;
				        $idCourrier = $_SESSION['idc'] ;
				        $requete = $bd->query("SELECT * FROM user WHERE iduser <>".$_SESSION['iduser']." ORDER BY nom ASC, prenom ASC") ;
				        echo '<select id="combo" name="idreceveur">' ;
				        echo '<option value="0">Autre</option>' ;
				        while($donnees = $requete->fetch() ){
				        	if($donnees['iduser'] == $transfert->getIdReceveur())
				        		echo '<option value="'.$donnees['iduser'].'" selected>'.$donnees['nom'].' '.$donnees['prenom'].'</option>' ;
				        	else
				        		echo '<option value="'.$donnees['iduser'].'">'.$donnees['nom'].' '.$donnees['prenom'].'</option>' ;
				        }
				        echo '</select>';
				    ?>
		            </td>
		        </tr>
                <tr>
                    <td>Nom du receveur</td>
                    <td> <input type="text" name="receveur" <?php echo 'value="'.$transfert->getReceveur().'"' ; ?> required> </td>
                </tr>
                <tr>
                    <td>Objet du transfert</td>
                    <td>
                        <input type="text" name="objet" <?php echo 'value="'.$transfert->getObjet().'"' ; ?> required>
                    </td>
                </tr>
                <tr>
                    <td>&Agrave retourner le</td>
                    <td><input class="date" type="text" name="dateretour" <?php echo 'value="'.$transfert->getDateRetourFixer().'"' ; ?> required />  </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-success" type="reset" style="width: 100px;" >Effacer</button>
                        <button id="btmodifiertransfert" class="btn btn-success" type="submit" style="width: 100px;">Valider</button>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    
    <br> <br>
    
    <form method="post" action="" name="dstransfert">
        <fieldset>
            <legend>Donner une suite au transfert</legend>
            <table class="tableformulaire">
                <tr>
                    <td> <input type="hidden" <?php echo 'value="'.$idTransfert.'"' ; ?> name="idt" /> </td>
                    <td> <p class="erreur2" style="color: white;"></p></td>
                </tr>
                <tr>
                        <td>Date de retour</td>
                        <td> <input type="text" name="dateretour" class="date" <?php echo 'value="'.$transfert->getDateRetour().'"' ; ?> required> </td>
                    </tr>
                <tr>
                    <td>Suite donnée</td> <td> <textarea name="suite" rows="6" cols="48" ><?php echo $transfert->getSuiteDonnee() ; ?></textarea> </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-success" type="reset" style="width: 100px;" >Effacer</button>
                        <button id="btvaliderdstransfert" class="btn btn-success" type="submit" style="width: 100px;">
                            <i class="icon-white icon-ok-sign"></i>Valider</button>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</div>