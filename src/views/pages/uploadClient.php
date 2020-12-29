<?=$render('header',[
    'loggedUser' => $loggedUser
]);?>

<form  class="container mt-5" method="POST" action="<?=$base;?>/UploadClient" enctype="multipart/form-data">
    <div class="text-center">
        <h1 class="h1">Adicionando Cliente</h1>
        <!-- recebendo o flash e verificando se ele tem alguma msg para exibir -->
    <?php if(!empty($flash)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $flash;?>
        </div>
    <?php endif;?>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4 text-center">
            <label for="service">Tipo de serviço prestado</label>
            <select id="service" class="form-control" name="service">
                <option selected>...</option>
                <option>cessão</option>
                <option>investimento</option>
                <option>Empréstimo Consignado</option>
                <option>Cartão de Crédito</option>
                <option>Financiamentos</option>
                <option>Portabilidade</option>
                <option>Crédito Pessoal</option>
                <option>Cartão Saque</option>
                <option>Crédito SIAPE | INSS</option>
           </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-4">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group col-4">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="form-group col-4">
            <label for="phone">Telefone do cliente</label>
            <input type="text" name="phone" class="form-control" id="phone">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4 text-center">
            <label for="rg">Foto do RG</label><br>
            <input type="file" name="rg" id="rg" class="form-control-file btn mt-2 btn-dark">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="cpf">Foto do CPF </label><i class="text-muted">(caso o cliente não tenha no RG) </i><br>
            <input type="file" name="cpf" id="cpf" class="form-control-file btn mt-2 btn-dark">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="photo_client">Foto do Cliente</label><br>
            <input type="file" name="photo_client" id="photo_client" class="form-control-file btn mt-2 btn-dark">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4 text-center">
            <label for="extract">Extrato</label><br>
            <input type="file" name="extract" id="extract" class="form-control-file btn mt-2 btn-dark">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="residence">Comprovante de residencia</label><br>
            <input type="file" name="residence" id="residence" class="form-control-file btn mt-2 btn-dark">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="mirror">Espelho</label><br>
            <input type="file" name="mirror" id="mirror" class="form-control-file btn mt-2 btn-dark">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-4">
            <label for="comment">Comentarios</label>
            <textarea name="comment" class="form-control" id="comment" rows="3"></textarea>
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="printzap">Conversa Whatsapp.txt</label><br><i class="text-muted">(caso haja)</i>
            <input type="file" name="printzap" id="printzap" class="form-control-file btn mt-2 btn-dark">
        </div>
    </div>
    <div class="text-center">
        <input type="submit" value="enviar" class="btn btn-success">
    </div>
</form>
    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery-3.4.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/script.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script>
        IMask(document.getElementById('phone'),{mask:'(00) 0-0000-0000'});
    </script>
</body>
</html>
