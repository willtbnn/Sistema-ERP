<?=$render('header', [
    'loggedUser'=>$loggedUser,
    ]);?>
<div class="container-fluid">
    <div class="my-5">
    
        <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12 ml-md-5 pl-md-5">
            <h1 class="ml-auyto">Bem vindo !</h1>
    </div>
    <div class="container-fluid ml-home">
        <div class="row ml-md-5 pl-md-5">
            <div class="col-md-5 col-sm-12  card alert-dark mb-3">
                <div class="card-body text-secondary">
                    <?=$render('script',['loggedUser'=>$loggedUser,]);?>  
                </div>
            </div>
        </div>
    </div>
    <div class="content container">
    <!-- recebendo o flash e verificando se ele tem alguma msg para exibir -->
    <?php if(!empty($flash)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:0;right:0;bottom:0;position:absolute;">
            <strong><?php echo $flash;?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif;?>
    <?php if($loggedUser->funcao == 'Desenvolvedor' || $loggedUser->funcao == 'Coordenador'):?>
        <main class="mt-5">
            <section class="row justify-content-center">
                <div class="text-center col-12">
                    <h1>Usuarios sistema</h1>
                </div>
                <table class="col-8 align-self-center table-sm table-light mt-5 border table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col d-sm-none">Nome</th>
                            <th scope="col">Função</th>
                            <th scope="col"> Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $useritem): ?>
                        <!-- mostrando os outros não do usuario logado -->
                        <?php if($useritem->id != $loggedUser->id ):?>
                            <?=$render('user-item', [
                                'data' =>$useritem
                            ]);?>
                        <?php endif;?>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </section>
        </main>
    <?php endif;?>
    </div>
</div>
<?=$render('footer');?>