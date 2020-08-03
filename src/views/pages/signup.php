
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="shortcut icon" href="<?=$base;?>/assets/images/woza-shout.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;1,500&display=swap" rel="stylesheet">
    <title>Cadastro - Work</title>
</head>
<body>
    <nav class="navbar woza-login justify-content-center">
        <a href="#" class="navbar-brand">
            <img src="<?=$base;?>/assets/images/woza-shout.png" width="40" height="30" alt="">
        </a>
    </nav>
    <main class="d-flex justify-content-center loginbg">
        <div class="row">
            <div class="col-md-12 py-5">
                <div class="container p-5 my-5 bg-box rounded text-light">
                    <form method="POST" action="<?=$base;?>/cadastro">
                    <!-- recebendo o flash e verificando se ele tem alguma msg para exibir -->
                    <?php if(!empty($flash)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $flash;?>
                            </div>
                    <?php endif;?>
                        <div class="form-group">
                            <label for="name">Digite o nome</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby=" " placeholder="Digite o nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby=" " placeholder="Digite o email">
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Data de Nascimento</label>
                            <input type="text" class="form-control" name="birthdate" id="birthdate" aria-describedby=" " placeholder="Digite a data de nascimento">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="password" id="senha" placeholder="senha">
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-primary" value="Fazer cadastro"/>
                        </div>
                        <a href="<?=$base;?>/"> Voltar para o home</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="pt-5 text-center loginbg">
        Todos direitos reservados ©Woza Serviços
    </footer>

    <script src="https://unpkg.com/imask"></script>
    <script>
        IMask(document.getElementById('birthdate'), { mask: '00/00/0000'});
    </script>
</body>
</html>