<?=$render('header', 
[
    'loggedUser'=>$loggedUser,
    'event'=> $event,
    'flash' => $flash
])
;?>
<section class="container">
    <div class="text-center mt-5">
        <h1>Agendamentos</h1>
        <?php if(!empty($flash)): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $flash;?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif;?>
    </div>
    <a class="btn bg-mattBlackRed adds" href="<?=$base;?>/uploadEvent">
    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="icon bi bi-plus-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
    </svg></a>
    
    <table class="table table-hover table-sm rounded-lg table-light mt-5 border">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Serviço</th>
                <th scope="col">Data</th>
                <th scope="col">horario</th>
                <th scope="col">Consultor</th>
                <th scope="col px-5">Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($event as $eventIten): ?>
        
        <!-- se o usuario loggado tiver adicionado aparece ou contem permissão MASTER-->
        <?php if($loggedUser->id == $eventIten['id_user'] || $loggedUser->funcao == 'Desenvolvedor' || $loggedUser->funcao == 'Coordenador' || $loggedUser->funcao == 'Gerente'):?>

            <tr class="table table-hover">
                <th scope="row" class="text-center tira rounded-circle">
                    <div class="rounded-circle" style="max-width: 1.5rem;height:1.5rem;background-color:<?=$eventIten['color'];?>"></div>
                   
                </th>
                <td><?=$eventIten['title'];?></td>
                <td><?php echo date('d/m/Y', strtotime($eventIten['start']));?></td>
                <td><?php echo date('H:i:s', strtotime($eventIten['hour']));?></td>
                <td><?=$eventIten['name_user'];?></td>
                <td class="row">
                    <a href="<?=$base;?>/schedule/<?=$eventIten['id'];?>/editevent" class="mx-md-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="icon bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                    </a>
                    <a href="<?=$base;?>/schedule/<?=$eventIten['id'];?>" class="text-danger pl-3" onclick="return confirm('Tem certeza que deseja excluir o agendamento com <?=$eventIten['name'];?> ?')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="icon bi bi-calendar-x" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        <path fill-rule="evenodd" d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z"/>
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
