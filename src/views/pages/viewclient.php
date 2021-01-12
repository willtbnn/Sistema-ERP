<?=$render('header',['loggedUser'=>$loggedUser,'client'=> $client]);?>
<section class="container">
    <div class="text-center mt-5">
        <h1>Clientes cadastrados</h1>
        <div class="container p-5" style="margin:0;right:0;bottom:0;position:absolute;width:auto;heigth:auto;">
            <?php if(!empty($flash)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $flash;?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>
        </div>
    </div>
    <a class="btn bg-mattBlackRed rounded add" href="<?=$base;?>/uploadclient">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="icon bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>  
    </a>
    
    <table class="table table-sm rounded-lg table-light mt-5 border">
        <thead>
            <tr>
                <th scope="col">Self</th>
                <th scope="col">Nome</th>
                <th scope="col">Serviço</th>
                <th scope="col">Consultor</th>
                <th scope="col px-5"> Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($client as $clientIten): ?>
        
        <!-- se o usuario loggado tiver adicionado aparece ou contem permissão MASTER-->
        <?php if($loggedUser->id == $clientIten->id_user || $loggedUser->funcao == 'Desenvolvedor' || $loggedUser->funcao == 'Coordenador' || $loggedUser->funcao == 'Gerente'):?>

            <tr>
                <th scope="row" class="text-center tira rounded-circle">
                    <img src="<?=$base;?>/assets/images/media/anexos/self/<?=$clientIten->photo_client;?>" alt="" class="rounded-circle bg-light border border-white img-fluid" style="max-width: 1.5rem;">
                    <!-- Vendo Informações que falta e dando retorno -->
                    <?php $array = [];
                    if(empty($clientIten->mirror)){
                        array_push($array, $clientIten->mirror);
                    }
                    if(empty($clientIten->residence)){
                        array_push($array, $clientIten->residence);
                    }
                    if(empty($clientIten->photo_client)){
                        array_push($array, $clientIten->photo_client);
                    }
                    if(empty($clientIten->printzap)){
                        array_push($array, $clientIten->printzap);
                    }
                    if(empty($clientIten->extract)){
                        array_push($array, $clientIten->extract);
                    }
                    if(empty($clientIten->rg)){
                        array_push($array, $clientIten->rg);
                    }; $result = count($array);?>
                    <!-- Adicionando badge com condição de existencia -->
                    <span title="Informações que faltam" class="badge badge-danger 
                    <?php echo ($result > 0)?'':'d-none';?>" style="position:fixed;"><?=$result;?></span>
                </th>
                <td><?=$clientIten->name;?></td>
                <td><?=$clientIten->service;?></td>
                <td><?=$clientIten->name_user;?></td>
                <td class="row">
                    <a href="<?=$base;?>/viewclient/<?=$clientIten->id;?>/editclient" class="mx-md-5" title="Editar Cliente">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    </a>
                    <a href="<?=$base;?>/viewclient/<?=$clientIten->id;?>/delclient" class="text-danger pl-3" onclick="return confirm('Tem certeza que deseja excluir <?=$clientIten->name;?> ?')" title="Excluir Cliente">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-x-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        <?php endif;?>
        <?php endforeach;?>
        </tbody>
    </table>
</section>

<?=$render('footer');?>
