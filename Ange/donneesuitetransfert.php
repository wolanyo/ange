<?php
    @session_start() ;
?>
<div id="here">
    Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> > <a href="principale.php?page=listecourrier">Liste des courriers</a> >
    <a href="">Modifier le transfert</a>
</div>

<div id="zonetexte">
    <form name="transfert" method="post" action="" >
    <table class="tableformulaire">
        <tr>
            <td></td> <td> <p class="erreur" style="color: white;"></p></td>
        </tr>
        <tr>
            <td>Date de retour</td> <td> <input id="date" type="text" name="dateretour" required> </td>
        </tr>
        <tr>
            <td>Suite donnée</td>
            <td>
                <textarea cols="10" rows="10">
                
                </textarea>
            </td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                <button class="btn btn-success" type="reset" style="width: 100px;" >Effacer</button>
                <button id="btadstransfert" class="btn btn-success" type="submit" style="width: 100px;">
                    <i class="icon-white icon-ok-sign"></i>Valider</button>
            </td>
        </tr>
    </table>
    
</form>
</div>