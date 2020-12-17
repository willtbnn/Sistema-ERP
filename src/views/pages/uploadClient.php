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
                <option>Refim</option>
                <option>Sessão</option>
                <option>Investimento</option>
                <option>Novo</option>

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
            <img src="<?=$base;?>/assets/images/media/anexos/rg/<?=$client->rg;?>" alt="" width="200" heigth="250">
            <input type="file" name="rg" id="rg" class="form-control-file btn mt-2 btn-dark" value="<?=$client->rg;?>">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="cpf">Foto do CPF</label><br>
            <img src="<?=$base;?>/assets/images/media/anexos/cpf/<?=$client->cpf;?>" alt="" width="200" heigth="250">
            <input type="file" name="cpf" id="cpf" class="form-control-file btn mt-2 btn-dark" value="<?=$client->cpf;?>">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="photo_client">Foto do Cliente</label><br>
            <img src="<?=$base;?>/assets/images/media/anexos/self/<?=$client->photo_client;?>" alt="" width="200" heigth="250">
            <input type="file" name="photo_client" id="photo_client" class="form-control-file btn mt-2 btn-dark" value="<?=$client->photo_client;?>">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4 text-center">
            <label for="extract">Extrato</label><br>
            <img src="<?=$base;?>/assets/images/media/anexos/extrato/<?=$client->extract;?>" alt="" width="200" heigth="250">
            <input type="file" name="extract" id="extract" class="form-control-file btn mt-2 btn-dark" value="<?=$client->extract;?>">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="residence">Comprovante de residencia</label><br>
            <img src="<?=$base;?>/assets/images/media/anexos/comprovante/<?=$client->residence;?>" alt="" width="200" heigth="250">
            <input type="file" name="residence" id="residence" class="form-control-file btn mt-2 btn-dark" value="<?=$client->residence;?>">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="mirror">Espelho</label><br>
            <img src="<?=$base;?>/assets/images/media/anexos/espelho/<?=$client->mirror;?>" alt="" width="200" heigth="250">
            <input type="file" name="mirror" id="mirror" class="form-control-file btn mt-2 btn-dark" value="<?=$client->mirror;?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-4">
            <label for="commint">Comentarios</label>
            <textarea name="commint" class="form-control" id="commint" rows="3"></textarea>
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="printzap">Espelho</label><br>
            <img src="<?=$base;?>/assets/images/media/anexos/zap/<?=$client->printzap;?>" alt="" width="200" heigth="250">
            <input type="file" name="printzap" id="printzap" class="form-control-file btn mt-2 btn-dark" value="<?=$client->printzap;?>">
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
