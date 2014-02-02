<?php
    $idCourrier = $_GET['idc'] ;
    require_once("lib/dompdf/dompdf_config.inc.php");
    $html = file_get_contents("imprimer.php") ;
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream('details_du_courrier_'.$idCourrier.'.pdf');
?>