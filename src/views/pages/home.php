<?=$render('header', [
    'loggedUser'=>$loggedUser
    ]);?>
<div class="container-fluid p-0">
    <div class="container mt-5 pt-5 text-light">
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
        <main class="mt-5">
            <section class="row justify-content-center">
                <div class="text-center col-12">
                    <h1>Usuarios sistema</h1>
                </div>
                <table class="col-8 align-self-center table-sm table-light mt-5 border  table-hover">
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
                        <?=$render('user-item', [
                            'data' =>$useritem
                        ]);?>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</div>
<?=$render('footer');?>
