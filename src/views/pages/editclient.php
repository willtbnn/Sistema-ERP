<?=$render('header', 
[
    'loggedUser'=>$loggedUser,
    'client'=> $client,
]);


;?>

<form  class="container mt-5" method="POST" action="<?=$base;?>/viewclient/<?=$client->id;?>/editclient" enctype="multipart/form-data">
    <div class="text-center">
        <h1 class="h1">Utualizando dados do Cliente</h1>
        <!-- recebendo o flash e verificando se ele tem alguma msg para exibir -->
    <?php if(!empty($flash)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $flash;?>
        </div>
    <?php endif;?>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4 text-center">
            <label for="service">Tipo de serviço prestado</label>
            <select id="service" class="form-control" name="service">
                <option selected><?=$client->service;?></option>
                <option>cessão</option>
                <option>investimento</option>
                <option>Empréstimo Consignado</option>
                <option>Cartão de Crédito</option>
                <option>Financiamentos</option>
                <option>Portabilidade</option>
                <option>Crédito Pessoal</option>
                <option>Cartão Saque</option>
                <option>Crédito SIAPE | INSS</option>
           </select>
        </div>
    </div>
    <div class="d-none">
    <input type="text" name="name" class="" id="name" value="<?=$client->id;?>">
    </div>
    
    <div class="form-row">
        <div class="form-group col-4">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" id="name" value="<?=$client->name;?>">
        </div>
        <div class="form-group col-4">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?=$client->email;?>">
        </div>
        <div class="form-group col-4">
            <label for="phone">Telefone do cliente</label>
            <input type="text" name="phone" class="form-control" id="phone" value="<?=$client->phone;?>">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4 text-center">
            <label for="rg">Foto do RG</label><br>
            <div class="card">
                <div class="card-body">
                    <img src="<?=$base;?>/assets/images/media/anexos/rg/<?=$client->rg;?>" alt="" width="200" heigth="250">
                    <?php if(empty($client->rg)):?>
                        <div class="alert alert-warning" role="alert">
                        Não enviada
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <input type="file" name="rg" id="rg" class="form-control-file btn mt-2 btn-dark">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="cpf">Foto do CPF </label><i class="text-muted">(caso o cliente não tenha no RG) </i><br>
            <div class="card">
                <div class="card-body">
                    <img src="<?=$base;?>/assets/images/media/anexos/cpf/<?=$client->cpf;?>" alt="" width="200" heigth="250">
                    <?php if(empty($client->cpf)):?>
                        <div class="alert alert-warning" role="alert">
                        Não enviada
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <input type="file" name="cpf" id="cpf" class="form-control-file btn mt-2 btn-dark">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="photo_client">Foto do Cliente</label><br>
            <div class="card">
                <div class="card-body">
                    <img src="<?=$base;?>/assets/images/media/anexos/self/<?=$client->photo_client;?>" alt="" width="200" heigth="250">
                    <?php if(empty($client->photo_client)):?>
                        <div class="alert alert-warning" role="alert">
                        Não enviada
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <input type="file" name="photo_client" id="photo_client" class="form-control-file btn mt-2 btn-dark">
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4 text-center">
            <label for="extract">Extrato</label><br>
            <div class="card">
                <div class="card-body">
                    <img src="<?=$base;?>/assets/images/media/anexos/extrato/<?=$client->extract;?>" alt="" width="200" heigth="250">
                    <?php if(empty($client->extract)):?>
                        <div class="alert alert-warning" role="alert">
                        Não enviada
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <input type="file" name="extract" id="extract" class="form-control-file btn mt-2 btn-dark">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="residence">Comprovante de residencia</label><br>
            <div class="card">
                <div class="card-body">
                    <img src="<?=$base;?>/assets/images/media/anexos/comprovante/<?=$client->residence;?>" alt="" width="200" heigth="250">
                    <?php if(empty($client->residence)):?>
                        <div class="alert alert-warning" role="alert">
                        Não enviada
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <input type="file" name="residence" id="residence" class="form-control-file btn mt-2 btn-dark">
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="mirror">Espelho</label><br>
            <div class="card">
                <div class="card-body">
                    <img src="<?=$base;?>/assets/images/media/anexos/espelho/<?=$client->mirror;?>" alt="" width="200" heigth="250">
                    <?php if(empty($client->mirror)):?>
                        <div class="alert alert-warning" role="alert">
                        Não enviada
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <input type="file" name="mirror" id="mirror" class="form-control-file btn mt-2 btn-dark">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-4">
            <label for="comment">Comentarios</label>
            <textarea name="comment" class="form-control" id="comment" rows="3"><?php echo $client->comment;?></textarea>
        </div>
        <div class="form-group col-md-4 text-center">
            <label for="printzap">Conversa Whatsapp.txt</label><br><i class="text-muted">(caso haja)</i>
            <!-- Button trigger modal -->
            <?php if(!empty($client->printzap)): ;?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Abrir mensangem
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Conversa Whatsapp</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <?php if(!empty($client->printzap)){
                                        $texto = file_get_contents('C:/xampp/htdocs/goldbanks/works/public/assets/images/media/anexos/zap/'.$client->printzap);
                                        $vendo = explode(" - ", $texto);
                                        $ver = implode("<hr>", $vendo);
                                        echo $ver;}else{
                                            echo "Não foi enviado nenhuma conversa";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <input type="file" name="printzap" id="printzap" class="form-control-file btn mt-2 btn-dark">
        </div>
    </div>
    <div class="text-center my-5">
        <input type="submit" value="enviar" class="btn btn-success">
        <a href="<?=$base;?>/viewclient" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery-3.4.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/script.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script>
        IMask(document.getElementById('phone'),{mask:'(00) 0-0000-0000'});
    </script>
</body>
</html>
