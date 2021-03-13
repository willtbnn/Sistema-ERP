<h5 class="card-title">Crie roteiros para seus consultores</h5>
    <p class="card-text">Roteiros(script) são otimos para ajudar os consultores melhorem sua abordagem com os clientes e prende-los até obterem as informações necessarias para conquista o cliente.</p>
<?php if($loggedUser->funcao == 'Desenvolvedor' || $loggedUser->funcao == 'Coordenador' || $loggedUser->funcao == 'Gerente'):?>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#SendScript" data-whatever="@getbootstrap">Digitalizar </button>

<!-- INICIO - MODAL DE ENVIO DO SCRIPT -->
    <div class="modal fade" id="SendScript" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo script</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <!-- Messagens -->
                    <div class="j_seletor alert alert-success" id="j_sucesso" role="alert" >
                        <h4 class="alert-heading">Enviado com sucesso</h4>
                    </div>
                    <!--Erro-->
                    <div class="j_seletor alert alert-danger" id="j_error" role="alert">
                        Tente novamente, houve um erro!
                        Caso error persiste, ligue para nos.
                    </div>
                    <!--Enviando-->
                    <div class="d-flex justify-content-center" >
                        <div class="j_seletor spinner-border" role="status" id="j_enviando">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                <!-- Messagens -->
                    <form id="jcontrol" action="<?=$base;?>/assets/js/requisicao/requisicao.php">
                        <div class="form-group">
                            <label for="script-name" class="col-form-label">Nome do script:</label>
                            <input type="text" class="form-control" id="script-name" name="script-name">
                        </div>
                        <div class="form-group">
                            <label for="script-text" class="col-form-label">Dizeres:</label>
                            <textarea class="form-control" id="script-text" name="script-text"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" method="POST">Enviar script</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
<!-- FIM - MODAL DE ENVIO DO SCRIPT -->
<?php endif;?>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#viewModal" data-whatever="@getbootstrap">Roteiros</button>
<!-- INICIO - MODAL LER SCRIPTS  -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Roteiros disponiveis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php
                    $path = $dir."assets/images/media/scripts/";
                    $diretorio = dir($path);
                    if($diretorio->read() != '..'){
                    while($arquivo = $diretorio->read()){
                        
                        echo "<a href='".$base.'/assets/images/media/scripts/'.$arquivo."' target='_blank'>".$arquivo."</a><br />";
                    }
                }
                    $diretorio->close();
                ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- FIM - MODAL LER SCRIPTS -->
<?php if($loggedUser->funcao == 'Desenvolvedor' || $loggedUser->funcao == 'Coordenador' || $loggedUser->funcao == 'Gerente'):?>
    <!-- INICIO - MODAL ENVIAR ARQUIVO PDF -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#uploadScript" data-whatever="@getbootstrap">Enviar</button>
        <div class="modal fade" id="uploadScript" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Novo script</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <!-- Messagens -->
                        <div class="js_seletorScriptUpload alert alert-success" id="js_sucessoUpload" role="alert" >
                            <h4 class="alert-heading">Enviado com sucesso</h4>
                        </div>
                        <!--Erro-->
                        <div class="js_seletorScriptUpload alert alert-danger" id="js_errorUpload" role="alert">
                            Tente novamente, houve um erro!
                            Caso error persiste, ligue para nos.
                        </div>
                        <!--Enviando-->
                        <div class="d-flex justify-content-center" >
                            <div class="js_seletorScriptUpload spinner-border" role="status" id="js_enviandoUpload">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    <!-- Messagens -->
                        <form id="jscontrol" method="POST" action="<?=$base;?>/assets/js/requisicao/requisicaopdf.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Nome do arquivo: <i>*novo nome para o arquivo seja bem curto e especifico</i></label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="script" class="col-form-label">Selecione o roteiro: <i>*.pdf</i></label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <button type="submit" class="btn btn-success Upload" >Enviar script</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- INICIO - MODAL ENVIAR ARQUIVO PDF -->
<?php endif;?>