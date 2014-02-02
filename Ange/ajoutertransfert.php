
<div id="here">
    Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> >
    <a href="principale.php?page=listecourrier">Liste des courriers</a> > <a href="">Transmettre le courrier &agrave;</a>
</div>

<div id="zonetexte">
    <form name="transfert" method="post" action="" >
    <table class="tableformulaire">
        <tr>
            <td></td> <td> <p class="erreur" style="color: white;"></p></td>
        </tr>
        <tr>
            <td>Code courrier</td> <td> <center><b><?php echo $_SESSION['idc'] ?></b></center> </td>
        </tr>
        <tr>
            <td>Date de transfert</td> <td> <input class="date" type="text" name="datetransfert" required> </td>
        </tr>
        <tr>
            <td>Transferer &agrave;</td> <td> <input type="text" name="receveur" required> </td>
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