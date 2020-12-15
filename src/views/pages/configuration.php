<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<main class="pl-5 container-fluid justify-content-center">
    <div class="text-center mt-5">
        <h1>Atualizar configurações</h1>
    </div>
    <div class="row">
        <div class="col-md-10 col-sm-12 px-md-5 m-md-5 align-self-center">
            <div class="container px-md-5 my-md-5">
                <form method="POST" action="<?=$base;?>/configuration/<?=$loggedUser->id;?>" enctype="multipart/form-data">
                <!-- recebendo o flash e verificando se ele tem alguma msg para exibir $router->get('/employee/{id}', 'FunController@deleteFun');-->
                <?php if(!empty($flash)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$flash;?>
                    </div>
                <?php endif;?>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-6 text-center">
                        <label for="cover">foto do Usuário</label><br>
                        <img src="<?=$base;?>/assets/images/media/avatars/<?=$loggedUser->avatar;?>" alt="" width="200" heigth="250">
                        <input type="file" name="avatar" id="avatar" class="form-control-file btn mt-2 btn-dark" value="<?=$loggedUser->avatar;?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?=$loggedUser->name;?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $loggedUser->email;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="birthdate">Data de nascimento</label>
                        <input type="text" class="form-control" name="birthdate" id="birthdate" placeholder="Data de nascimento" value="<?php echo date('d/m/Y', strtotime($loggedUser->birthdate));?>">
                    </div>
                </div>
                <div class="form-row">              
                    <div class="form-group col-md-6">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="senha" value="<?=$loggedUser->password;?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password-conf">Confirmar Senha</label>
                        <input type="password" class="form-control" name="password-conf" id="password-conf" placeholder="senha" value="<?=$loggedUser->password;?>">
                    </div>
                </div>
                <div class="text-center mt-4">
                    <input type="submit" class="btn btn-success" value="Atualizar"/>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>
    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery-3.4.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/script.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script>
        IMask(
            document.getElementById('birthdate'),
            {
                mask:'00/00/0000'
            }
        );
    </script>
</body>
</html>