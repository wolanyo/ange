<?php
include_once("fonctions.php");
?>

<div id="here">
    Vous &ecirc;tes ici :  <a href="#">Accueil</a> 
</div>

<div id="zonetexte">
    <!--p style="margin-left: 75px; margin-left:200px;">
        <img src="images/logo.png" alt="logo ange"  width="300px" height="280px"/>
    </p>
    <br>
    <br-->
    <center><h2>Notifications de courrier</H2></center> <br>
    <div id="notifications" style="float: left;">
        <a class="btn btn-danger" href="principale.php?page=notifications&amp;codenotif=r" class="rouge"> <?php echo '(' . getNotificationsRouge() . ') ' ?>Notifications</a> 
        <a class="btn btn-warning" href="principale.php?page=notifications&amp;codenotif=j" class="jaune"> <?php echo '(' . getNotificationsJaune() . ') ' ?>Notifications</a> 
        <a class="btn btn-success" href="principale.php?page=notifications&amp;codenotif=v" class="vert"><?php echo '(' . getNotificationsVert() . ') ' ?>Notifications</a> 
    </div>
    <br>
    <?php if ($_SESSION['droitnotification'] == "toutes") { ?>
        <center><h2>Notifications de transfert</h2></center> <br>
        <div id="notifications">
            <a class="btn btn-danger" href="principale.php?page=notificationstransfert&amp;codenotif=r" class="rouge"> <?php echo '(' . getNotificationsRougeTransfert() . ') ' ?>Notifications</a> 
            <a class="btn btn-warning" href="principale.php?page=notificationstransfert&amp;codenotif=j" class="jaune"> <?php echo '(' . getNotificationsJauneTransfert() . ') ' ?>Notifications</a> 
            <a class="btn btn-success" href="principale.php?page=notificationstransfert&amp;codenotif=v" class="vert"><?php echo '(' . getNotificationsVertTransfert() . ') ' ?>Notifications</a> 
        </div>
    <?php } ?>
    <br>
    <br>
    <center><h3>Notifications de Transferts non consult&eacute;s</H3></center> <br>
    <center>
        <div id="notifications" style="float: left;">
            <a class="btn btn-info" href="principale.php?page=notificationstransfertnonvu" class="bleu"><?php echo '(' . getNotificationsTransfertNonVu($_SESSION['iduser']) . ') ' ?>Transferts non lus</a> 
        </div>
    </center>
</div>