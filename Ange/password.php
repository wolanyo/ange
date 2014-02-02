<div id="here">
    Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> > <a href="#">changer mot de passe</a>
</div>

<div id="zonetexte">
    <form method="post" action="" name="changepasswd">
    <table class="tableformulaire">
        <tr>
            <td></td> <td> <p class="erreur" style="color: white;"></p></td>
        </tr>
        <tr>
            <td>Mot de passe actuel</td><td> <input type="password" name="actuelpasswd" required > </td>
        </tr>
        <tr>
            <td>Nouveau mot de passe</td> <td> <input type="password" name="passwd" required > </td>
        </tr>
        <tr>
            <td>Confirmer nouveau mot de passe</td> <td> <input type="password" name="passwd2" required > </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button class="btn btn-success" type="reset" style="width: 100px;" >Effacer</button>
                <button id="btchangepasswd" class="btn btn-success" type="submit" style="width: 100px;">
                    <i class="icon-white icon-ok-sign"></i>Valider</button>
            </td>
        </tr>
    </table>
    
</form>
</div>