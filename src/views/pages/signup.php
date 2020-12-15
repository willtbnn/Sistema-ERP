<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<main class="container justify-content-center">
    <div class="text-center mt-5">
        <h1>Adicionar Usuario</h1>
    </div>
    <div class="row">
        <div class="col-md-10 col-sm-12 pt-5 px-md-5 m-md-5 align-self-center">
            <div class="container px-md-5 my-md-5">
                <form method="POST" action="<?=$base;?>/cadastro" enctype="multipart/form-data">
                <!-- recebendo o flash e verificando se ele tem alguma msg para exibir $router->get('/employee/{id}', 'FunController@deleteFun');-->
                <?php if(!empty($flash)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $flash;?>
                    </div>
                <?php endif;?>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="cover">foto do Usuário</label>
                        <input type="file" name="avatar" id="avatar" class="form-control-file btn btn-light">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="birthdate">Data de nascimento</label>
                        <input type="text" class="form-control" name="birthdate" id="birthdate" placeholder="Data de nascimento">
                    </div>
                </div>                
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby=" " placeholder="Digite o email">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="password" id="senha" placeholder="senha">
                    </div>
                    <div class="text-center mt-4">
                        <input type="submit" class="btn btn-primary" value="Fazer cadastro"/>
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