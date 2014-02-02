<html>
    <head>
        <link type="text/css" media="all" href="css/print.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    
    <body> <center>

<?php
    @session_start() ;
    include_once("connexion.php") ;
    include_once("fonctions.php") ;
?>
<div id="zonetexte">
    <center><h2>D&eacute;tails du courrier</h2></center> <br>
    <p>
    <?php
        $connect = new Connexion ;
        $bd = $connect->seConnecter() ;
        
        $idCourrier = $_SESSION['idc'] ;
        $requete = $bd->prepare("SELECT * FROM courrier WHERE idcourrier = :idc ") ;
        $requete->bindValue("idc",$idCourrier ,PDO::PARAM_STR) ;
        $requete->execute() ;
        $donnees = $requete->fetch() ;
        $codeTransfert = $donnees['transfert'] ;
        $idUserCourrier = $donnees['iduser'] ;
    ?>
    
    <table>
        <tr>
            <td style="width: 140px;">Code du courrier</td> <td><?php echo $donnees['idcourrier']; ?></td>
        </tr>
        <tr>
            <td>Date de r&eacute;ception</td> <td><?php echo reverseDate($donnees['datearrive'],'-','-'); ?></td>
        </tr>
        <tr>
            <td>Exp&eacute;diteur</td> <td><?php echo $donnees['expediteur']; ?></td>
        </tr>
        <tr>
            <td>Objet</td> <td><?php echo $donnees['objet']; ?></td>
        </tr>
        <tr>
            <td><b>&Agrave; retourner avant le</b></td> <td>
            <?php
                if( reverseDate($donnees['dateretourfixer'],'-','-') == "00-00-0000" ){
                    echo "Aucune date" ;
                }
                else{
                    echo reverseDate( $donnees['dateretourfixer'],'-','-'); echo "<br/>";
                }
            ?>
            </td>
        </tr>
        <tr>
            <td>Suite donn&eacute;e</td> <td><?php echo $donnees['suite']; ?></td>
        </tr>
    </table>
    
    <?php
        $requete->closeCursor() ;
    ?>
    </p>
    
    <p class="erreur3" style="color: white;font-size: 0.80em ;"></p>
    
    <br />
    <center><h3>Suivi du courrier</h3></center> <br />
    <p>
        <table id="tablo" class="listecourrier" >
            <tr>
                <th>Informations de transfert</th>
                <th>Suite donn&eacute;e au courrier</th>
            </tr>
            <?php
                $connect = new Connexion ;
                $bd = $connect->seConnecter() ;
                
                $requete = $bd->prepare("SELECT * FROM transfert WHERE idcourrier = :idc") ;
                $requete->bindValue("idc",$idCourrier ,PDO::PARAM_INT) ;
                $requete->execute() ;
                
                $rowsColor = 0 ;
                while( $donnees = $requete->fetch() ){
                    ?>
                        <tr <?php if($rowsColor%2==0) echo 'class="lignepaire"'; else echo 'class="ligneimpaire"' ?> >
                            <td style="width: 210px;">
                                <?php
                                    echo "<b>Transferer le   : </b>".reverseDate($donnees['datetransfert'],'-','-'); echo "<br/>";
                                    echo "<b>&Agrave; : </b>".htmlspecialchars( $donnees['receveur'] ) ; echo "<br/>";
                                    echo "<b>Objet  : </b>".htmlspecialchars( $donnees['objet'] ); echo "<br/>";
                                    if( reverseDate($donnees['dateretourfixer'],'-','-') == "00-00-0000" ){
                                        echo "<b>&Agrave; retourner avant le : </b> Aucun"; echo "<br/>";
                                    }
                                    else{
                                        echo "<b>&Agrave; retourner avant le : </b>".reverseDate( $donnees['dateretourfixer'],'-','-'); echo "<br/>";
                                    }
                                    if( reverseDate($donnees['dateretour'],'-','-') == "00-00-0000" ){
                                        echo "<b>Retourner le : </b> Non retourn&eacute;"; echo "<br/>";
                                    }
                                    else{
                                        echo "<b>Retourner le : </b>".reverseDate($donnees['dateretour'],'-','-'); echo "<br/>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    if( $donnees['suitedonnee'] == "" )
                                        echo '<b>Aucune / Pas de suite pour le moment</b>';
                                    elseif( $donnees['suitedonnee'] == "Aucune / Pas de suite pour le moment" )
                                        echo '<b>Aucune / Pas de suite pour le moment</b>';
                                    else
                                        echo htmlspecialchars( $donnees['suitedonnee'] ) ;
                                ?>
                            </td>
                        </tr>
                    <?php
                    $rowsColor++ ;
                }
                $requete->closeCursor() ;
            ?>
        </table>
    </p>
</div>
</center>
</body>
</html>