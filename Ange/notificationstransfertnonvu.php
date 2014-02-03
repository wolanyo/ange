
<?php
include_once("connexion.php");
include_once("fonctions.php");
// $codeNotif = $_GET['codenotif'] ;
?>
<div id="here">
    Vous &ecirc;tes ici :  <a href="#">Accueil</a> > <a href="#">Liste des transferts</a>
</div>

<div id="zonetexte">
    <h2>
        <span style="font-size : 0.80em;">Liste des transferts non consult&eacute;s : </span>

    </h2> <br>
    <p>
    <table cellpadding="0" cellspacing="0" border="0" id="tablo" >
        <thead>
            <tr>
                <th>N&deg;</th>
                <th>N&deg; des courriers concerné</th>
                <th>Date du transfert</th>
                <th>Receveur</th>
                <th>&Agrave; retourner le</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $connect = new Connexion;
            $bd = $connect->seConnecter();
            $requete = $bd->prepare("SELECT * FROM transfert WHERE consulter = 0 AND supprimer = 0 AND idreceveur = :idr ORDER BY datetransfert DESC");
            $requete->bindValue("idr", $_SESSION['iduser'], PDO::PARAM_INT);
            $requete->execute();


            $rowsColor = 0;
            while ($donnees = $requete->fetch()) {
                ?>
                <tr <?php if ($rowsColor % 2 == 0)
                echo 'class="lignepaire"';
            else
                echo 'class="ligneimpaire"'
                ?> >
                    <td> <?php echo $rowsColor + 1; ?> </td>
                    <td><?php echo '<a href="principale.php?page=detailscourrier&amp;idc=' . $donnees['idcourrier'] . '">' . $donnees['idcourrier'] . '</a>'; ?></td>
                    <td><?php echo reverseDate($donnees['datetransfert'], '-', '-'); ?></td>
                    <td><?php echo $donnees['receveur']; ?></td>
                    <td>
                        <?php
                        $dateRetour = reverseDate($donnees['dateretourfixer'], '-', '-');
                        if ($dateRetour == "00-00-0000")
                            echo "Aucune";
                        else
                            echo $dateRetour;
                        ?>
                    </td>
                </tr>
                <?php
                $rowsColor++;
            }
            $requete->closeCursor();
            ?>
        </tbody>

        <tfoot>
            <tr>
                <th>N&deg;</th>
                <th>N&deg; des courriers concerné</th>
                <th>Date du transfert</th>
                <th>Receveur</th>
                <th>&Agrave; retourner le</th>
            </tr>
        </tfoot>
    </table>
    <?php
    /* echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
      for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
      {
      //On va faire notre condition
      if($i==$pageActuelle) //Si il s'agit de la page actuelle...
      {
      echo ' [ '.$i.' ] ';
      }
      else //Sinon...
      {
      echo ' <a href="principale.php?page=listecourrier&amp;numpage='.$i.'">'.$i.'</a> ';
      }
      }
      echo '</p>'; */
    ?>
</p>
</div>



<!--div id="here">
    Vous &ecirc;tes ici :  > > >
</div>

<div id="zonetexte" >
<?php
/* $dom = new DomDocument;
  $dom->load("notifications.xml");
  $listePays = $dom->getElementsByTagName('notification');
  foreach($listePays as $pays)
  echo $pays->nodeName.' '.$pays->getAttribute("title").' '.$pays->getAttribute("debut"). "<br />" ;
  //$pays->setAttribute("fin", '10') ; */
?>
</div-->
