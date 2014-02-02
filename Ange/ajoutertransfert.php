<?php
    @session_start() ;
    include_once("connexion.php") ;
?>

<div id="here">
    Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> >
    <a href="principale.php?page=listecourrier">Liste des courriers</a> > <a href="">Transmettre le courrier &agrave;</a>
</div>

<div id="zonetexte">
    <form name="transfert" method="post" action="" >
    <table class="tableformulaire">
        <tr>
            <td><input type="hidden" name="idexpediteur" <?php echo 'value="'.$_SESSION['iduser'].'"'; ?>></td> 
            <td> <p class="erreur" style="color: white;"></p></td>
          
        </tr>
        <tr>
            <td>Code courrier</td> <td> <center><b><?php echo $_SESSION['idc'] ?></b></center> </td>
        </tr>
        <tr>
            <td>Date de transfert</td> <td> <input class="date" type="text" name="datetransfert" required> </td>
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
		        echo '<option value="0" selected>Autre</option>' ;
		        while($donnees = $requete->fetch() ){
		        	echo '<option value="'.$donnees['iduser'].'">'.$donnees['nom'].' '.$donnees['prenom'].'</option>' ;
		        }
		        echo '</select>';
		    ?>
            </td>
        </tr>
        <tr>
            <td>Nom du receveur</td> <td> <input type="text" name="receveur" required> </td>
        </tr>
        <tr>
            <td>Objet du transfert</td>
            <td>
                <input type="text" name="objet" required>
            </td>
        </tr>
        <tr>
            <td>&Agrave retourner le</td> <td><input class="date" type="text" name="dateretour" required >  </td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                <button class="btn btn-success" type="reset" style="width: 100px;" >Effacer</button>
                <button id="btajoutertransfert" class="btn btn-success" type="submit" style="width: 100px;">
                    <i class="icon-white icon-ok-sign"></i>Valider</button>
            </td>
        </tr>
    </table>
    
</form>
</div>