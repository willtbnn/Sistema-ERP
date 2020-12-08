<?=$render('header', 
[
    'loggedUser'=>$loggedUser,
    'fun'=>$fun
])
;?>
<!-- Tenho que coloca o formulario com as informações do usuario a parte do id  -->

<form class="container mt-5" method="POST" action="<?=$base;?>/addfun" enctype="multipart/form-data">
    <div class="text-center">
        <h1>Adicionar - Funcionario</h1>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="full_name">Nome Completo</label>
            <input type="name" class="form-control" name="full_name" id="full_name" required>
        </div>
        <div class="form-group col-md-6">
            <label for="name">Nome Abrevido</label>
            <input type="name" class="form-control" name="name" id="name" required >
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4">
            <label for="email">E-mail</label>
            <input type="email" class="form-control disabled" name="email" id="email" required>
        </div>
        <div class="form-group col-md-2">
            <label for="phone">Celular</label>
            <input type="text" class="form-control" name ="phone" id="phone" required>
        </div>
        <div class="form-group col-md-2">
            <label for="office">Cargo</label>
            <input type="name" class="form-control" name="office" id="office" required>
        </div>
        <div class="form-group col-md-2">
            <label for="birthdate">Data de nascimento</label>
            <input type="name" class="form-control" id="birthdate" name="birthdate" required>
        </div>
        
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4">
            <label for="cover">foto do funcionario</label>
            <input type="file" class="form-control-file btn btn-light" id="cover" name="cover" required>
        </div>
    </div>
    <div class="form-row justify-content-center">
        
        <!-- Data de admissão foi retirada -->    
        <div class="form-group col-md-1">
            <label for="rg_beginning">2 primeiros digitos RG</label>
            <input type="name" class="form-control" id="rg_beginning" name="rg_beginning" required>
        </div>
        <div class="form-group col-md-1">
            <label for="rg_end">2 últimos digitos RG</label>
            <input type="name" class="form-control" id="rg_end" name="rg_end" required>
        </div>
        <div class="form-group col-md-1">
            <label for="cpf_beginning">2 primeiros digitos cpf</label>
            <input type="name" class="form-control" id="cpf_beginning" name="cpf_beginning" required>
        </div>
        <div class="form-group col-md-1">
            <label for="cpf_end">2 últimos digitos cpf</label>
            <input type="name" class="form-control" id="cpf_end" name="cpf_end" required>
        </div>
        <?php if(!empty($flash)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $flash;?>
                </div>
        <?php endif;?>
        <div class="container justify-content-center">
            <div class="form-group col-md-12 text-center">
                <p class="text-muted"><i>*Todos os campos são obrigatorios</i></p>
                <input type="submit" class="btn btn-success" value="Cadastrar"/>
            </div>
        </div>
    </div>
</form>


<script type="text/javascript" src="<?=$base;?>/assets/js/jquery-3.4.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/script.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script>
        IMask(document.getElementById('birthdate'),{mask:'00/00/0000'});
        IMask(document.getElementById('phone'),{mask:'(00)0-0000-0000'});
        IMask(document.getElementById('rg_beginning'),{mask:'00'});
        IMask(document.getElementById('rg_end'),{mask:'0-0'});
        IMask(document.getElementById('cpf_beginning'),{mask:'00'});
        IMask(document.getElementById('cpf_end'),{mask:'00'});
    </script>
</body>
</html>