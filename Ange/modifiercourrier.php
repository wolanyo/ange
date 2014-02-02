<?php
    @session_start() ;
    $page = basename($_SERVER['SCRIPT_NAME']);
    include_once("courrier.php") ;
    $idCourrier = $_GET['idc'] ;
    $courrier = new Courrier ;
    $courrier->setIdCourrier($idCourrier) ;
    $courrier->chargerCourrier() ;
?>

<div id="here">
    Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> >
    <a href="principale.php?page=listecourrier">Liste des courriers</a> > <a href="principale.php?page=detailscourrier">D&eacute;tails du courrier</a>
    > <a href="">Modifier le courrier</a>
</div>

<div id="zonetexte">
    <form method="post" action="" name="modifiercourrier">
        <fieldset>
            <legend>Modifier les informations de base du courrier</legend>
        <table class="tableformulaire">
            <tr>
                <td> <input type="hidden" <?php echo 'value="'.$idCourrier.'" '; ?> name="idc" /> </td> <td> <p class="erreur" style="color: white;"></p></td>
            </tr>
            <tr>
                <td>N Courrier</td> <td> <input type="text" name="codecourrier" required <?php echo 'value="'.$idCourrier.'" '; ?> /> </td>
            </tr>
            <tr>
                <td>Date d'arriv&eacute;e</td> <td> <input type="text" name="datearriver" class="date" <?php echo 'value="'.$courrier->getDateArriver().'" '; ?> /> </td>
            </tr>
            <tr>
                <td>Exp&eacute;diteur</td> <td> <input type="text" name="expediteur" <?php echo 'value="'.$courrier->getExpediteur().'" '; ?> /> </td>
            </tr>
            <tr>
                <td>Objet</td> <td> <textarea name="objet" rows="6" cols="48" ><?php echo $courrier->getObjet() ; ?></textarea> </td>
            </tr>
            <tr>
                <td>&Agrave retourner le</td> <td><input class="date" type="text" name="dateretour" required <?php echo 'value="'.$courrier->getDateRetourFixer().'" '; ?>>  </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button class="btn btn-success" type="reset" style="width: 100px;" >Effacer</button>
                    <button id="btvalidermodifcourrier" class="btn btn-success" type="submit" style="width: 100px;">
                        <i class="icon-white icon-ok-sign"></i>Valider</button>
                </td>
            </tr>
        </table>
        </fieldset>
    </form>
    
    <br> <br>
    
    <form method="post" action="" name="dscourrier">
        <fieldset>
                <legend>Donné une suite au courrier</legend>
        <table class="tableformulaire">
            <tr>
                <td> <input type="hidden" <?php echo 'value="'.$idCourrier.'" '; ?> name="idc" /> </td>
                <td> <p class="erreur2" style="color: white;"></p></td>
            </tr>
            <tr>
                <td>Suite donnée</td> <td> <textarea name="suite" rows="6" cols="48" ><?php echo $courrier->getSuite() ; ?></textarea> </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button class="btn btn-success" type="reset" style="width: 100px;" >Effacer</button>
                    <button id="btvaliderdscourrier" class="btn btn-success" type="submit" style="width: 100px;">
                        <i class="icon-white icon-ok-sign"></i>Valider</button>
                </td>
            </tr>
        </table>
        </fieldset>
    </form>
</div>