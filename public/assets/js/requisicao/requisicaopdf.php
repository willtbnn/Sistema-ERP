<?php 

$Json['error'] = true;
$nome = filter_input(INPUT_POST, 'name');
$permitidos = ['application/pdf'];

// application/pdf tipo de arquivo suportado
if(in_array($_FILES['script']['type'], $permitidos)){
    $novoNome = $nome.'.pdf';
    move_uploaded_file($_FILES['script']['tmp_name'], 'C:/xampp/htdocs/goldbanks/works/public/assets/images/media/scripts/'.$novoNome);
    header("Location:  http://localhost/goldbanks/works/public/");
    // $_SESSION['flash'] = 'Sucesso no envio'; não funcionar
    $Json['error'] = false;
}

?>