<?php 
$ReqPOST = filter_input(INPUT_GET,"post", FILTER_VALIDATE_BOOLEAN);

$Json['error'] = true;
$name = filter_input(INPUT_POST,'name');
if($_FILES && !empty($_FILES['file']['name'])){
    $permitidos = ['application/pdf'];
    $novoNome = $name.'.pdf';
    $file = $_FILES["file"];
    $flash = "";
    if(in_array($file['type'], $permitidos)){
        if(move_uploaded_file($file['tmp_name'], "C:xampp/htdocs/Sistema-ERP/public/assets/images/media/scripts/{$novoNome}")){
            $Json['error'] = false;
            print "<script>alert('sucesso');</script>";
            echo json_encode($Json);
            header("Location: http://localhost/Sistema-ERP/public/");
            
        }else{
            echo '<div class="js_seletorScriptUpload alert alert-danger" id="js_errorUpload" role="alert">
            Tente novamente, houve um erro!
            Caso error persiste, ligue para nos.
        </div>';
        }
        // header("Location: http://localhost/Sistema-ERP/public/");
        // $_SESSION['flash'] = 'Sucesso no envio'; não funcionar
    }else{
        $flash ="arquivo não permitido";
    }
}
echo json_encode($Json);
?>