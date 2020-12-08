<?=$render('header', 
[
    'loggedUser'=>$loggedUser,
    'fun'=>$fun
])
;?>
<!-- Tenho que coloca o formulario com as informações do usuario a parte do id  -->

<form class="container mt-5" method="POST" action="<?=$base;?>/employee/<?=$fun->id;?>/viewfun">
    <div class="text-center">
        <h1>Editar informações - Funcionario</h1>
        <input  class="d-none" type="name" class="form-control" name="id" id="id" required value="<?php echo $fun->id;?>">
    </div>
    <div class="form-row justify-content-center">
    <div class="form-group col-md-4">
            <img src="<?=$base;?>/assets/images/media/covers/<?php echo $fun->cover;?>" alt="" width="100" heigth="150">
            <label for="cover">foto do funcionario</label>
            <input type="file" disabled value="<?=$base;?>/assets/images/covers/<?php echo $fun->cover;?>" class="form-control-file btn btn-light" id="cover" name="cover">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="full_name">Nome Completo</label>
            <input type="name" class="form-control" name="full_name" id="full_name" required value="<?php echo $fun->full_name;?>">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Nome Abrevido</label>
            <input type="name" class="form-control" name="name" id="name" required value="<?php echo $fun->name;?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6 ">
            <label for="email">E-mail</label>
            <input type="email" disabled class="form-control disabled" name="email" id="email" required value="<?php echo $fun->email;?>">
        </div>
        <div class="form-group col-md-6">
            <label for="phone">Telefone</label>
            <input type="text" class="form-control" name ="phone" id="phone" required value="<?php echo $fun->phone;?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="office">Cargo</label>
            <input type="name" class="form-control" name="office" id="office" required value="<?php echo $fun->office;?>">
        </div>
        <div class="form-group col-md-4">
            <label for="birthdate">Data de nascimento</label>
            <input type="name" class="form-control" id="birthdate" name="birthdate" required value="<?php echo date('d/m/Y', strtotime($fun->birthdate));?>">
        </div>
        <!-- Data de admissão foi retirada -->    
        <div class="form-group col-md-1">
            <label for="rg_beginning">2 primeiros digitos RG</label>
            <input type="name" class="form-control" id="rg_beginning" name="rg_beginning" required value="<?php echo $fun->rg_beginning;?>">
        </div>
        <div class="form-group col-md-1">
            <label for="rg_end">2 últimos digitos RG</label>
            <input type="name" class="form-control" id="rg_end" name="rg_end" required value="<?php echo $fun->rg_end;?>">
        </div>
        <div class="form-group col-md-1">
            <label for="cpf_beginning">2 primeiros digitos cpf</label>
            <input type="name" class="form-control" id="cpf_beginning" name="cpf_beginning" required value="<?php echo $fun->cpf_beginning;?>">
        </div>
        <div class="form-group col-md-1">
            <label for="cpf_end">2 últimos digitos cpf</label>
            <input type="name" class="form-control" id="cpf_end" name="cpf_end" required value="<?php echo $fun->cpf_end;?>">
        </div>
    </div>
    <p class="text-muted"><i>*Todos os campos são obrigatorios</i></p>
    <input type="submit" class="btn btn-primary" value="Atualizar"/>
</form>


<?=$render('footer');?>