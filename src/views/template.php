<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <title>Work</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <button class="navbar-toggler sideMenuToggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand font-weight-bold" href="#">Woza</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <button class="navbar-toggler sideMenuToggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kampani
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper d-flex">
        <div class="sideMenu bg-mattBlackRed rounded-right">
            <div class="sidebar">
                <img src="" alt="" class="rounded-circle">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="material-icons icon py-3">
                                dashboard
                            </i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="material-icons icon py-3">
                                person
                            </i>
                            <span class="text">User Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="material-icons icon py-3">
                                insert_chart
                            </i>
                            <span class="text">Charts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="material-icons icon py-3">
                                settings
                            </i>
                            <span class="text">Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="material-icons icon py-3">
                                computer
                            </i>
                            <span class="text">Demo</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link sideMenuToggler">
                            <i class="material-icons icon py-3">
                                view_list
                            </i>
                            <span class="text">Resize</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content">
            <main>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 my-3">
                            <div class="">
                                <h4 class="mb-2">
                                <?php $this->loadInTemplate($viewName, $viewDados); ?>
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
                        <div class="col-md-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum consequuntur quod, nisi eveniet iste rem saepe quaerat dicta ipsa harum.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, corrupti porro. Quos corporis provident vitae necessitatibus aperiam fugit alias amet aut velit facere? Fugit aperiam aut reiciendis blanditiis possimus ipsum! Expedita consequuntur, dolor est magnam ullam beatae laborum quasi id, officiis odit rerum voluptate asperiores iusto debitis vero dignissimos nostrum, reiciendis ad? Perspiciatis vel aliquam laborum ut incidunt aspernatur, inventore accusantium nam, optio libero porro quibusdam maiores consequatur magnam atque nemo quod similique veniam harum sequi, reiciendis tempore deserunt. Tenetur, velit, suscipit voluptatem minima iste blanditiis cumque nihil veniam, quam officia quaerat repellat qui voluptatum laudantium voluptatibus quibusdam? Atque blanditiis error quo esse dicta, sint cum, facere repudiandae doloremque autem numquam nostrum explicabo optio vitae ex. Quisquam dolores, consectetur ab, repudiandae, nulla ut aut nemo atque perspiciatis sunt dolor praesentium aliquam eum harum odit repellat et assumenda? Itaque, magni obcaecati nesciunt sed error distinctio officia? Porro obcaecati deserunt odit, placeat natus voluptatibus debitis nam quidem commodi adipisci magnam voluptate labore libero magni asperiores veritatis iure similique ea animi officiis doloribus voluptatem minus. Adipisci vel tenetur beatae architecto quis explicabo cupiditate magnam at. Totam voluptatibus exercitationem nisi voluptate possimus voluptatum architecto dolorem aperiam asperiores harum sed nam voluptas delectus tenetur numquam, consequatur esse sint nostrum fuga quod. Cupiditate sapiente delectus hic nisi earum, excepturi mollitia necessitatibus perferendis exercitationem repellat voluptatem quam officia rem. Ea neque vitae praesentium quaerat? Necessitatibus provident dicta quod architecto et? Iste sunt consequatur eius? Porro veniam eos totam consectetur repudiandae at tenetur nobis. Voluptatum quis at ipsa debitis sit nihil cum unde excepturi ea minima error sapiente quaerat magni iusto sunt quisquam explicabo ab, repudiandae quasi placeat ratione eius quidem doloremque. Exercitationem impedit fuga iste possimus! Provident rerum voluptatem totam labore possimus reiciendis eum, et commodi deserunt perspiciatis recusandae, corrupti tempora dolorum alias. Quam modi sequi voluptas temporibus error ullam voluptatibus quisquam at reiciendis tempora, aliquid ducimus, provident vitae blanditiis, ipsam dicta culpa! Facere, delectus quod dolor perferendis voluptate cupiditate explicabo suscipit accusamus ipsum temporibus vero, eaque tempore dolorem tempora quis magnam hic dolore eius velit quidem! Consequuntur quo id consequatur omnis illo soluta, suscipit adipisci tempore quisquam quam dolore? Perspiciatis magnam sunt ullam nesciunt illum commodi sapiente non nihil mollitia dolorem temporibus dolor unde, a amet neque quisquam! Harum, ab ea corporis porro ad doloremque hic tempora placeat error molestiae molestias doloribus amet eum rem assumenda voluptate deleniti id magnam eius! Saepe nobis voluptas corrupti voluptates perspiciatis nostrum repellat, ipsa inventore fugit expedita commodi sunt reprehenderit consequatur, deserunt et, dolor laboriosam possimus laudantium rem provident voluptate ad repellendus! Iure temporibus totam repellat ea quibusdam fugiat iusto esse magnam saepe odio. Qui totam consequatur dolores omnis aut doloribus neque minima accusantium? Aliquid alias quasi tempora nulla aliquam ducimus sint amet minus expedita ratione, repudiandae perferendis voluptatibus, unde beatae quas impedit! Ducimus mollitia perferendis quibusdam nisi accusantium similique, eveniet quo commodi saepe facilis harum ullam amet atque voluptas dolor soluta sed sit debitis. Non laborum impedit ea. Nihil nam esse eligendi dolorum. Accusamus impedit sapiente soluta? Voluptatibus, ut.
                        </div>
                        <div class="col-md-6">Magnam praesentium id, velit consequatur ducimus dolores, sapiente quibusdam veritatis autem ut voluptates? Ullam cumque nihil distinctio at accusantium autem.</div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    

    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.4.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
</body>
</html>