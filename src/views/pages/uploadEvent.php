<?=$render('header',[
    'loggedUser' => $loggedUser,
]);?>
<form  class="container mt-5" method="POST" action="<?=$base;?>/uploadevent">
    <div class="text-center">
        <h1 class="h1">Adicionando agendamento ao sistema </h1>
        <!-- recebendo o flash e verificando se ele tem alguma msg para exibir -->
    <?php if(!empty($flash)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $flash;?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif;?>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4 text-center">
            <label for="inputState">Tipo de tratamento</label>
            <select id="inputState" class="form-control" name="title">
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
            <label for="name">Nome do cliente</label>
            <input type="text" name="name" class="form-control" required id="name">
        </div>
        <div class="form-group col-4">
            <label for="start">Data Marcada</label>
            <input type="date" name="start" class="form-control" required id="start">
        </div>
        <div class="form-group col-4">
            <label for="hour">Hora Marcada</label>
            <input type="time" name="hour" class="form-control" required id="hour">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-2">
            <label for="address_zipcode">Cep</label>
            <input type="text" name="address_zipcode" class="form-control" required id="address_zipcode">
        </div>
        <div class="form-group col-3">
            <label for="address">Rua</label>
            <input type="text" name="address" class="form-control" required id="address" >
        </div>
        <div class="form-group col-1">
            <label for="address_number">Número</label>
            <input type="text" name="address_number" class="form-control" required id="address_number" >
        </div>
        <div class="form-group col-2">
            <label for="address_neigh">Bairro</label>
            <input type="text" name="address_neigh" class="form-control" required id="address_neigh">
        </div>
        <div class="form-group col-2">
            <label for="address_city">Cidade</label>
            <input type="text" name="address_city" class="form-control" required id="address_city">
        </div>
        <div class="form-group col-1">
            <label for="address_state">Estado</label>
            <input type="text" name="address_state" class="form-control" required id="address_state">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-4">
            <label for="address2">Complento</label>
            <input type="text" name="address2" class="form-control" required id="address2">
        </div>
        <div class="form-group col-4">
            <label for="email">Email do cliente</label>
            <input type="email" name="email" class="form-control" required id="email" >
        </div>
        <div class="form-group col-4">
            <label for="phone">Telefone do cliente</label>
            <input type="text" name="phone" class="form-control" required id="phone">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-4 text-center">
            <label for="cost">Custo de locomoção</label>
            <input type="text" name="cost" class="form-control" placeholder="digite só números" required id="cost">
        </div>
    </div>
    <div class="text-center mb-5">
        <input type="submit" value="enviar" class="btn btn-success">
    </div>
</form>
    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery-3.4.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/script.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/script_events_add.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script>
        IMask(document.getElementById('phone'),{mask:'0-0000-0000'});
        IMask(document.getElementById('cost'),{mask:'00,00'});
    </script>
</body>
</html>
