<?=$render('header', 
[
    'loggedUser'=>$loggedUser,
    'Fun'=>$fun,
])
;?>
<section class="container">
    <div class="text-center">
        <h1>Funcionarios cadastrados</h1>
            <?php if(!empty($flash)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $flash;?>
                    </div>
            <?php endif;?>
    </div>
    <a class="btn btn-success" href="<?=$base;?>/employee/addfun">Adicionar Funcionario</a>
    <table class="table rounded-lg table-light mt-5 border  table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Função</th>
                <th scope="col">Matricula</th>
                <th scope="col px-5"> Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($fun as $funItem): ?>
            <tr>
                <th scope="row">
                <img src="<?=$base;?>/assets/images/<?=$funItem->avatar;?>" alt="" class="rounded-circle  bg-light border border-white img-fluid" style="max-width: 2rem;">
                </th>
                <td><?=$funItem->name;?></td>
                <td><?=$funItem->work;?></td>
                <td>36.120.<?=$funItem->id;?></td>
                <td>
                    <a href="<?=$base;?>/employee/<?=$funItem->id;?>/viewfun" class="mx-5">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    </a>
                    <a href="<?=$base;?>/employee/endfun" class="text-danger">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-x-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</section>

<?=$render('footer');?>
