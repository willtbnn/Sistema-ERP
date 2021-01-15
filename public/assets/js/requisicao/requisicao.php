<?php
$ReqPOST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Json['error'] = true;

$titulo = $ReqPOST["dados"][0]["value"];
$script = $ReqPOST["dados"][1]["value"];

if(!empty($titulo) && isset($titulo)){
    require_once '../../../../vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf();
    $nomeArquivo = 'C:/xampp/htdocs/goldbanks/works/public/assets/images/media/scripts/'.$titulo.'.pdf';
    $conteudo = '<h1>'.$titulo.'</h1><p>'.$script.'</p>';

    $mpdf->WriteHTML($conteudo);
    $mpdf->Output($nomeArquivo, 'F');

    $Json['error'] = false;
}

echo json_encode($Json);
?>