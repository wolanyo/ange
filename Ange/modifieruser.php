<?php
    include_once("user.php") ;
    $idUser = $_GET["idu"] ;
    $user = new User ;
    $user->setIdUser( $_GET["idu"] ) ;
    $user->chargerUser() ;
    //echo $user->getDroitNotification() ;
?>

<div id="here">
     Vous &ecirc;tes ici :  <a href="principale.php?page=accueil">Accueil</a> > <a href="principale.php?page=listeuser">Liste utilisateur</a> >
     <a href="">Modifier utilisateur</a>
</div>

<div id="zonetexte">
    <form method="post" action="" name="inscription">
    <table class="tableformulaire">
		<tr>
			<td> <input type="hidden" name="iduser" <?php echo 'value="'.$idUser.'"' ?> > </td>
		</tr>
        <tr>
            <td><input type="hidden" name="pseudo2" <?php echo 'value="'.$user->getPseudo().'"' ?> > </td> <td> <p class="erreur" style="color: white;"></p></td>
        </tr>
        <tr>
            <td>Nom</td> <td> <input type="text" name="nom" <?php echo 'value="'.$user->getNom().'"' ?> required > </td>
        </tr>
        <tr>
            <td>Pr&eacute;nom</td> <td> <input type="text" name="prenom" <?php echo 'value="'.$user->getPrenom().'"' ?> required > </td>
        </tr>
        <tr>
            <td>Sexe</td>
            <td>
                <select id="combo" name="sexe">
                    <option value="Homme" <?php if($user->getSexe() == "Homme") echo 'selected'; ?>>Homme</option>
                    <option value="Femme" <?php if($user->getSexe() == "Femme") echo 'selected'; ?>>Femme</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Pseudo</td> <td> <input type="text" name="pseudo" <?php echo 'value="'.$user->getPseudo().'"' ?> required > </td>
        </tr>
        <tr>
            <td>Droit</td>
            <td>
                <select id="combo" name="droit">
                    <option value="admin" <?php if($user->getDroit() == "Admin") echo 'selected'; ?>>Aministrateur</option>
                    <option value="rw" <?php if($user->getDroit() == "rw") echo 'selected'; ?>>Lecture et &eacute;criture</option>
                    <option value="r" <?php if($user->getDroit() == "r") echo 'selected'; ?>>Lecture</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Accès aux notifications</td>
            <td>
                <select id="combo" name="droitnotification">
                    <option value="toutes" <?php if($user->getDroitNotification() == "toutes") echo 'selected'; ?>>Voir toutes</option>
                    <option value="courrier" <?php if($user->getDroitNotification() == 'courrier') echo 'selected'; ?>>Courrier uniquement</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button class="btn btn-success" type="reset" style="width: 100px;" >Effacer</button>
                <button id="btmodifierutilisateur" class="btn btn-success" type="submit" style="width: 100px;">
                    <i class="icon-white icon-ok-sign"></i>Valider</button>
            </td>
        </tr>
    </table>
    
</form>
</div>