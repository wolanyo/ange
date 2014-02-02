<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>

<div id="here">
    Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> > <a href="#">Ajouter courriers</a>
</div>

<div id="zonetexte">
    <form method="post" action="savecourrier.php" name="ajoutercourrier" enctype="multipart/form-data" >
    <table class="tableformulaire">
        <tr>
            <td></td> <td> <p class="erreur" style="color: white;"></p></td>
        </tr>
        <tr>
            <td>N&deg; du courrier</td> <td> <input type="text" name="codecourrier" required /> </td>
        </tr>
        <tr>
            <td>Date d'arriv&eacute;e</td> <td> <input class="date" type="text" name="datearriver" required /> </td>
        </tr>
        <tr>
            <td>Exp&eacute;diteur</td> <td> <input type="text" name="expediteur" required /> </td>
        </tr>
        <tr>
            <td>Objet</td> <td> <textarea name="objet" rows="6" cols="48" ></textarea> </td>
        </tr>
        <tr>
            <td>&Agrave; retourner le</td> <td><input class="date" type="text" name="dateretour" value="Aucune date" required >  </td>
        </tr>
        <tr>
            <td>Pi&egrave;ce jointe</td> <td><input class="" type="file" name="fichier" value="" required >  </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button class="btn btn-success" type="reset" style="width: 100px;" >Effacer</button>
                <button id="btvalidercourrier" class="btn btn-success" type="submit" style="width: 100px;">
                    <i class="icon-white icon-ok-sign"></i>Valider</button>
            </td>
        </tr>
    </table>
	<input type="hidden" name="code" value="ac" />
</form>

</div>
