<?=$render('header', [
    'loggedUser'=>$loggedUser
    ]);?>
<div class="container-fluid p-0">
        <div class="fundo m-auto py-5">
            <div class="row justify-content-around align-items-start p-5">
                <div class="col-lg-4 col-sm-8">
                    <p class=" ml-5 h3">Painel de Controle</p>
                </div>
                <div class="col-lg-4 col-sm-8">
                    <div class="control-jumbotron ">
                        <div class="container ">
                        Hoje é dia
                            <?php
                                $dataAtual = new DateTime();
                                echo $dataAtual->format('d/m/Y');
                            ;?>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <div class="container">
            <div class="row">
                <div class="col rounded bg-light text-center mx-5 py-5 levanta-conteudo">
                    <h1>Bem vindo !</h1>
                    <p>Vamos trabalha</p>  <?=$loggedUser->name;?>
                </div>
            </div>
        </div>
        <!--
        <div class="content container">
            <main class="container-fluid mt-5">
                <section class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                Ações recentes
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>Fulano fez aquilo</li>
                                    <li>Cigrano outra coisa</li>
                                    <li>Precisamos conversa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                Percentual metas
                            </div>
                            <div class="card-body">
                                <div class="progress my-2">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"> fulano
                                    </div>
                                </div>
                                <div class="progress my-2">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Beltrano
                                    </div>
                                </div>
                                <div class="progress my-2">
                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Cigrano
                                    </div>
                                </div>
                                <div class="progress my-2">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Lucas
                                    </div>
                                </div>
                                <div class="progress my-2">
                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Fabiana
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="container-fluid mt-3">
                                      
                    <div class="row">
                     
                        <div class="col-6">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Ganhos (mensal)</h5>
                                </div>
                                <div class="card-footer">
                                    Ver mais 
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-6">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Ganhos (Anual)</h5>
                                </div>
                                <div class="card-footer">
                                    Ver mais 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Contratos fechados</h5>
                                </div>
                                <div class="card-footer">
                                    Ver mais 
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Contratos pedentes </h5>
                                </div>
                                <div class="card-footer">
                                    Ver mais 
                                </div>
                            </div>
                        </div>
                    </div>
                </section>-->
                <section class="container">
                    <div class="text-center">
                        <h1>Usuarios sistema</h1>
                    </div>
                    <table class="table rounded-lg table-light mt-5 border  table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
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
