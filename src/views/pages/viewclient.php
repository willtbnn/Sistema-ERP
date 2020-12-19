<?=$render('header', 
[
    'loggedUser'=>$loggedUser,
    'Client'=> $client,
])
;?>
<section class="container">
    <div class="text-center">
        <h1>Clientes cadastrados</h1>
        <?php if(!empty($flash)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $flash;?>
            </div>
        <?php endif;?>
    </div>
    <a class="btn btn-success" href="<?=$base;?>/uploadclient">Adicionar cliente</a>
    
    <table class="table table-sm rounded-lg table-light mt-5 border">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Serviço</th>
                <th scope="col">Consultor</th>
                <th scope="col px-5"> Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($client as $clientIten): ?>
        
        <!-- se o usuario loggado tiver adicionado aparece ou contem permissão MASTER-->
        <?php if($loggedUser->id == $clientIten->id_user || in_array('MASTER', $loggedUser->funcao)):?>

            <tr>
                <th scope="row" class="text-center tira rounded-circle">
                    <img src="<?=$base;?>/assets/images/media/anexos/self<?=$clientIten->photo_client;?>" alt="" class="rounded-circle bg-light border border-white img-fluid" style="max-width: 1.5rem;">
                </th>
                <td><?=$clientIten->name;?></td>
                <td><?=$clientIten->service;?></td>
                <td><?=$clientIten->name_user;?></td>
                <td class="row">
                    <a href="<?=$base;?>/schedule/<?=$clientIten->id;?>" class="mx-md-5">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    </a>
                    <a href="<?=$base;?>/schedule/<?=$clientIten->id;?>" class="text-danger pl-3" onclick="return confirm('Tem certeza que deseja excluir <?=$funItem->name;?> ?')">
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
