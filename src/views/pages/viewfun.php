<?=$render('header', 
[
    'loggedUser'=>$loggedUser,
    'fun'=>$fun
])
;?>
<!-- Tenho que coloca o formulario com as informações do usuario a parte do id  -->

<form class="container mt-5">
    <div class="text-center">
        <h1>Editar informações - Funcionario</h1>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Nome Completo</label>
            <input type="name" class="form-control" id="inputEmail4" value="<?php echo $fun->full_name;?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Nome Abrevido</label>
            <input type="name" class="form-control" id="inputPassword4" value="<?php echo $fun->name;?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" value="<?php echo $fun->email;?>">
        </div>
        <div class="form-group col-md-6">
            <label for="phone">Telefone</label>
            <input type="text" class="form-control" id="phone" value="<?php echo $fun->phone;?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="office">Cargo</label>
            <input type="name" class="form-control" id="office" value="<?php echo $fun->office;?>">
        </div>
        <div class="form-group col-md-3">
            <label for="admission_date">Data de admisão</label>
            <input type="name" class="form-control" id="admission_date" value="<?php echo $fun->admission_date;?>">
        </div>
        <div class="form-group col-md-1">
            <label for="rg_beginning">2 primeiros digitos RG</label>
            <input type="name" class="form-control" id="rg_beginning" value="<?php echo $fun->rg_beginning;?>">
        </div>
        <div class="form-group col-md-1">
            <label for="rg_end">2 últimos digitos RG</label>
            <input type="name" class="form-control" id="rg_end" value="<?php echo $fun->rg_end;?>">
        </div>
        <div class="form-group col-md-1">
            <label for="cpf_beginning">2 primeiros digitos cpf</label>
            <input type="name" class="form-control" id="cpf_beginning" value="<?php echo $fun->cpf_beginning;?>">
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Atualizar"/>
</form>


<?=$render('footer');?>