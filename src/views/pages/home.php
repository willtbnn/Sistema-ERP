<?=$render('header', [
    'loggedUser'=>$loggedUser,
    ]);?>
<div class="container-fluid p-0">
    <div class="container mt-5 text-light">
        <div class="row">
            <div class="col rounded bg-mattBlackRed text-center mx-5 py-5 levanta-conteudo">
                <h1>Bem vindo !</h1>
                <p>Vamos trabalha <?=$loggedUser->name;?></p> 
                <p>
                Hoje é dia
                    <?php
                        $dataAtual = new DateTime();
                        echo $dataAtual->format('d/m/Y');
                    ;?>
                </p>
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
                            <th scope="col d-sm-none">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Função</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col px-5"> Ações</th>
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
