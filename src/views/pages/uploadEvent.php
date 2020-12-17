<?=$render('header',[
    'loggedUser' => $loggedUser
]);?>

<form  class="container mt-5" method="POST" action="<?=$base;?>/UploadEvent">
    <div class="text-center">
        <h1 class="h1">Adicionando agendamento ao seu calendario</h1>
        <!-- recebendo o flash e verificando se ele tem alguma msg para exibir -->
    <?php if(!empty($flash)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $flash;?>
        </div>
    <?php endif;?>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4 text-center">
            <label for="inputState">Tipo de tratamento</label>
            <select id="inputState" class="form-control" name="title">
                <option selected>...</option>
                <option>Refim</option>
                <option>Sessão</option>
                <option>Investimento</option>
                <option>Novo</option>

            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-6">
            <label for="name">Nome do cliente</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="form-group col-6">
            <label for="start">Hora marcada</label>
            <input type="datetime" name="start" class="form-control" id="start">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-4">
            <label for="address">Endereço do cliente</label>
            <input type="text" name="address" class="form-control" id="address" >
        </div>
        <div class="form-group col-4">
            <label for="email">Email do cliente</label>
            <input type="email" name="email" class="form-control" id="email" >
        </div>
        <div class="form-group col-4">
            <label for="phone">Telefone do cliente</label>
            <input type="text" name="phone" class="form-control" id="phone">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-4 text-center">
            <label for="cost">Custo de locomoção</label>
            <input type="text" name="cost" class="form-control" placeholder="digite só números" id="cost">
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
        IMask(document.getElementById('phone'),{mask:'0-0000-0000'});
        IMask(document.getElementById('cost'),{mask:'00,00'});
    </script>
</body>
</html>
