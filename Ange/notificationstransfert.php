
<?php
    include_once("connexion.php") ;
    include_once("fonctions.php") ;
    $codeNotif = $_GET['codenotif'] ;
?>
<div id="here">
    Vous &ecirc;tes ici :  <a href="#">Accueil</a> > <a href="#">Liste des courriers</a>
</div>

<div id="zonetexte">
    <h2>
        <span style="font-size : 0.80em;">Liste des transferts ayant une
        priorit&eacute; : </span>
        <?php
            if($codeNotif == "r"){ echo'<a width="150px" class="btn btn-danger" href="">Elev&eacute;e</a>';}
            elseif( $codeNotif == "j"){echo'<a width="150px" class="btn btn-warning" href="">Moyenne</a>';}
            else{echo'<a width="150px" class="btn btn-success" href="">Faible</a>';}
        ?>
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
                $connect = new Connexion ;
                $bd = $connect->seConnecter() ;
                if( $codeNotif == "r"){
                    $requete = $bd->prepare("SELECT * FROM transfert WHERE suitedonnee = 'Aucune / Pas de suite pour le moment' AND DATEDIFF( dateretourfixer, CURDATE() ) BETWEEN :p1 AND :p2 AND supprimer = 0 ORDER BY idcourrier DESC") ;
                    $requete->bindValue(":p1",0 ,PDO::PARAM_INT) ;
                    $requete->bindValue(":p2",2 ,PDO::PARAM_INT) ;
                    $requete->execute() ;
                }
                elseif( $codeNotif == "j"){
                    $requete = $bd->prepare("SELECT * FROM transfert WHERE suitedonnee = 'Aucune / Pas de suite pour le moment' AND DATEDIFF( dateretourfixer, CURDATE() ) BETWEEN :p1 AND :p2 AND supprimer = 0 ORDER BY idcourrier DESC") ;
                    $requete->bindValue(":p1",3 ,PDO::PARAM_INT) ;
                    $requete->bindValue(":p2",5 ,PDO::PARAM_INT) ;
                    $requete->execute() ;
                }
                else{
                    $requete = $bd->prepare("SELECT * FROM transfert WHERE suitedonnee = 'Aucune / Pas de suite pour le moment' AND DATEDIFF( dateretourfixer, CURDATE() ) BETWEEN :p1 AND :p2 AND supprimer = 0 ORDER BY idcourrier DESC") ;
                    $requete->bindValue(":p1",6 ,PDO::PARAM_INT) ;
                    $requete->bindValue(":p2",7 ,PDO::PARAM_INT) ;
                    $requete->execute() ;
                }
                
                $rowsColor = 0 ;
                while( $donnees = $requete->fetch() ){
                    ?>
                        <tr <?php if($rowsColor%2==0) echo 'class="lignepaire"'; else echo 'class="ligneimpaire"' ?> >
                            <td> <?php echo $rowsColor+1; ?> </td>
                            <td><?php echo '<a href="principale.php?page=detailscourrier&amp;idc='.$donnees['idcourrier'].'">'.$donnees['idcourrier'].'</a>'; ?></td>
                            <td><?php echo reverseDate($donnees['datetransfert'],'-','-'); ?></td>
                            <td><?php echo $donnees['receveur'] ; ?></td>
                            <td>
								<?php
									$dateRetour = reverseDate($donnees['dateretourfixer'],'-','-') ;
									if( $dateRetour == "00-00-0000")
										echo "Aucune"; 
									else
										echo $dateRetour ;
								?>
							</td>
                        </tr>
                    <?php
                    $rowsColor++ ;
                }
                $requete->closeCursor() ;
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
            /*echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
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
            echo '</p>';*/
        ?>
    </p>
</div>



<!--div id="here">
    Vous &ecirc;tes ici :  > > >
</div>

<div id="zonetexte" >
    <?php
        /*$dom = new DomDocument;
        $dom->load("notifications.xml");
        $listePays = $dom->getElementsByTagName('notification');
        foreach($listePays as $pays)
        echo $pays->nodeName.' '.$pays->getAttribute("title").' '.$pays->getAttribute("debut"). "<br />" ;
        //$pays->setAttribute("fin", '10') ;*/
    ?>
</div-->
