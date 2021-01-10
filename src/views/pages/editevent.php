<?=$render('header', 
[
    'loggedUser'=>$loggedUser,
    'event'=> $event,
])
;?>
<form  class="container mt-5" method="POST" action="<?=$base;?>/schedule/<?=$event->id;?>/editevent">
    <div class="text-center">
        <h1 class="h1">Editar agendamento</h1>
        <!-- recebendo o flash e verificando se ele tem alguma msg para exibir -->
    <?php if(!empty($flash)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $flash;?>
        </div>
    <?php endif;?>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4 text-center">
            <label class="edit" for="inputState">Tipo de tratamento</label>
            <select id="inputState" class="form-control" name="title">
                <option selected><?=$event->title;?></option>
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
            <label class="edit" for="name">Nome do cliente</label>
            <input type="text" name="name" class="form-control" id="name" value="<?=$event->name;?>">
        </div>
        <div class="form-group col-4">
            <label class="edit" for="start">Data marcada</label>
            <input type="date" name="start" class="form-control" id="start" value="<?=$event->start;?>">
        </div>
        <div class="form-group col-4">
            <label class="edit" for="hour">Hora marcada</label>
            <input type="time" name="hour" class="form-control" id="hour" value="<?=$event->hour;?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-2">
            <label class="edit" for="address_zipcode">Cep</label>
            <input type="text" name="address_zipcode" class="form-control" required id="address_zipcode" value="<?=$event->address_zipcode;?>">
        </div>
        <div class="form-group col-3">
            <label class="edit" for="address">Rua</label>
            <input type="text" name="address" class="form-control" required id="address" value="<?=$event->address;?>">
        </div>
        <div class="form-group col-1">
            <label class="edit" for="address_number">Número</label>
            <input type="text" name="address_number" class="form-control" required id="address_number" value="<?=$event->address_number;?>">
        </div>
        <div class="form-group col-2">
            <label class="edit" for="address_neigh">Bairro</label>
            <input type="text" name="address_neigh" class="form-control" required id="address_neigh" value="<?=$event->address_neigh;?>">
        </div>
        <div class="form-group col-2">
            <label class="edit" for="address_city">Cidade</label>
            <input type="text" name="address_city" class="form-control" required id="address_city" value="<?=$event->address_city;?>">
        </div>
        <div class="form-group col-1">
            <label class="edit"  for="address_state">Estado</label>
            <input type="text" name="address_state" class="form-control" required id="address_state" value="<?=$event->address_state;?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-4">
            <label class="edit" for="address2">Complento</label>
            <input type="text" name="address2" class="form-control" required id="address2" value="<?=$event->address2;?>">
        </div>
        <div class="form-group col-4">
            <label class="edit" for="email">Email do cliente</label>
            <input type="email" name="email" class="form-control" id="email" value="<?=$event->email;?>">
        </div>
        <div class="form-group col-4">
            <label class="edit" for="phone">Telefone do cliente</label>
            <input type="text" name="phone" class="form-control" id="phone" value="<?=$event->phone;?>">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-4 text-center">
            <label class="edit" for="cost">Custo de locomoção</label>
            <input type="text" name="cost" class="form-control" placeholder="digite só números" id="cost" value="<?=$event->cost;?>">
        </div>
    </div>
    <div class="text-center mb-5">
        <input type="submit" value="editar" class="btn btn-primary">
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