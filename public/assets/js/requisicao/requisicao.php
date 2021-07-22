<?php
$ReqPOST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$Json['error'] = true;

$title = $ReqPOST["dados"][0]["value"];
$script = $ReqPOST["dados"][1]["value"];

if(!empty($title) && isset($title)){
    require_once '../../../../vendor/autoload.php';
    $noSpace = str_replace("[^a-zA-Z0-9_]", "", strtr($title, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ%& ", "aaaaeeiooouucAAAAEEIOOOUUC_-_"));
    $mpdf = new \Mpdf\Mpdf();
    $lineBreak = nl2br($script);
    $nameFile = 'C:/xampp/htdocs/Sistema-ERP/public/assets/images/media/scripts/'.$noSpace.'.pdf';
    $content = '<h1>'.$title.'</h1>'.$lineBreak;

    $mpdf->WriteHTML($content);
    $mpdf->Output($nameFile, 'F');

    $Json['error'] = false;
}

echo json_encode($Json);
?>