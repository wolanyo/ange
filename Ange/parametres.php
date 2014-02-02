<?php

?>
<div id="here">
    Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> > <a href="">Param&egrave;tres</a> 
</div>
<div id="zonetexte">
    <form method="post" action="notifications.php" name="parametre">
        <fieldset>
            <legend>Configuration des notifications</legend>
        <table class="tableformulaire">
            <tr>
                <td> </td> <td> <p class="erreur" style="color: white;"></p></td>
            </tr>
            <tr>
                <td>Zone rouge</td>
                <td> <input type="text" name="debutzr" style="width: 70px;" required placeholder="début" />
                <input type="text" name="finzr" style="width: 70px;" required placeholder="fin" /> </td>
            </tr>
            <tr>
                <td>Zone jaune</td>
                <td> <input type="text" name="debutzj" style="width: 70px;" required placeholder="début" />
                <input type="text" name="finzj" style="width: 70px;" required placeholder="fin" /> </td>
            </tr>
            <tr>
                <td>Zone vert</td>
                <td> <input type="text" name="debutzv" style="width: 70px;" required placeholder="début" />
                <input type="text" name="finzv" style="width: 70px;" required placeholder="fin" /> </td>
            </tr>
            <tr>
                <td></td> <td> <input type="reset" value="Effacer"/> <input type="submit" value="Valider" id="btvalidernotifications" /> </td>
            </tr>
        </table>
        </fieldset>
    </form>
</div>