<?=$render('header', ['loggedUser'=>$loggedUser]);?>

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
                </section>
                <section class="container">
                    <div class="row">
                        <div class="col-md-4 my-3">
                        Opa, <?=$loggedUser->name;?>
                            <div class="">
                                <h4 class="mb-2">
                                Aqui vem codigo PHP 
                                <p>
                                <?=$loggedUser->brithdate;?>
                                </p>
                                <?=$loggedUser->avatar;?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-4 my-3">
                            <div class="bg-success p-3 rounded">
                                <h4 class="mb-2">
                                    Cliente fechados
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-4 my-3">
                            <div class="bg-mattBlackRed p-3 rounded">
                                <h4 class="mb-2">
                                    Clientes em avaliação
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">itam repellat ea quibusdam fugiat iusto esse magnam saepe odio. Qui totam consequatur dolores omnis aut doloribus neque minima accusantium? Aliquid alias quasi tempora nulla aliquam ducimus sint amet minus expedita ratione, repudiandae perferendis voluptatibus, unde beatae quas impedit! Ducimus mollitia perferendis quibusdam nisi accusantium similique, eveniet quo commodi saepe facilis harum ullam amet atque voluptas dolor soluta sed sit debitis. Non laborum impedit ea. Nihil nam esse eligendi dolorum. Accusamus impedit sapiente soluta? Voluptatibus, ut.
                        </div>
                        <div class="col-md-6">Magnam praesentium id, velit consequatur ducimus dolores, sapiente quibusdam veritatis autem ut voluptates? Ullam cumque nihil distinctio at accusantium autem.
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
<?=$render('footer');?>
