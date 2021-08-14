<!doctype html>
<html lang="zxx">

<!-- Mirrored from baston.laborasyon.com/demos/default/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2017], Tue, 25 Aug 2020 18:45:48 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$viewData['title'];?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=BASE_URL?>assets/img/logo/fav.jpg" />

    <!-- Main css -->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/vendors/bundle.css" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&amp;display=swap" rel="stylesheet">


    <!-- App css -->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/app.min.css" type="text/css">

    <!-- Themify icons css -->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/themify-icons.css" type="text/css">

    <!-- Fontawesome icons js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- <script src="https://use.fontawesome.com/c9d4038651.js"></script> -->
    
  
  <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">

    <!-- Css -->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/vendors/dataTable/datatables.min.css" type="text/css">
    <link rel="stylesheet" href="<?=BASE_URL?>assets/vendors/form-wizard/jquery.steps.css" type="text/css">
    <script src="<?=BASE_URL?>assets/js/modernizr-custom"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- <img class="logo" src="<?=BASE_URL?>assets/media/image/logo/logo.png" alt="logo"> -->
    <!-- Preloader -->
    <!-- <div class="preloader">
        <img class="logo" src="<?=BASE_URL?>assets/img/logo/fav.jpg" alt="rapha's fit" style="width:40px;height:auto;margin-right:10px;">
        <span class="logo-name">Rapha's Fit</span>
        <img class="dark-logo" src="<?=BASE_URL?>assets/img/logo/fav.jpg" alt="logo dark">
        <div class="preloader-icon"></div>
    </div> -->
    <!-- ./ Preloader -->

    <!-- Sidebar group -->
    <div class="sidebar-group">
        <!-- Sidebar >>> Settings -->
        <div class="sidebar" id="settings">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configurações</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item pl-0 pr-0">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switchDarkMode">
                                <label class="custom-control-label" for="switchDarkMode">Modo Escuro</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ./ Sidebar >>> Settings -->

        <!-- Sidebar >>> Chat list -->
        <div class="sidebar" id="chat-list">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <h6 class="card-title mb-0">Chats</h6>
                        <a href="chat.html" class="btn btn-primary btn-sm">New Chat</a>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                            <div class="pr-3">
                                <span class="avatar avatar-state-danger">
                                    <img src="<?=BASE_URL?>assets/media/image/user/women_avatar3.jpg"
                                        class="rounded-circle" alt="image">
                                </span>
                            </div>
                            <div class="flex-grow- 1">
                                <h6 class="mb-1">Cass Queyeiro</h6>
                                <span class="text-muted">
                                    <i class="fa fa-image mr-1"></i> Photo
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Yesterday</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                            <div class="pr-3">
                                <span class="avatar avatar-state-warning">
                                    <img src="<?=BASE_URL?>assets/media/image/user/man_avatar4.jpg"
                                        class="rounded-circle" alt="image">
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Evered Asquith</h6>
                                <span class="text-muted">
                                    <i class="fa fa-video-camera mr-1"></i> Video
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Last week</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item px-0 d-flex align-items-center">
                            <div class="pr-3">
                                <div class="avatar avatar-state-danger">
                                    <span class="avatar-title bg-success rounded-circle">F</span>
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-1">Francisco Ubsdale</h6>
                                <span class="text-muted">Hello how are you?</span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">2:32 PM</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item px-0 d-flex align-items-center">
                            <div class="pr-3">
                                <div class="avatar avatar-state-success">
                                    <img src="<?=BASE_URL?>assets/media/image/user/women_avatar1.jpg"
                                        class="rounded-circle" alt="image">
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-1">Natale Janu</h6>
                                <span class="text-muted">Hi!</span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="badge badge-primary badge-pill ml-auto mb-2">3</span>
                                <span class="small text-muted">08:27 PM</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                            <div class="pr-3">
                                <span class="avatar avatar-state-warning">
                                    <img src="<?=BASE_URL?>assets/media/image/user/women_avatar2.jpg"
                                        class="rounded-circle" alt="image">
                                </span>
                            </div>
                            <div class="flex-grow- 1">
                                <h6 class="mb-1">Orelie Rockhall</h6>
                                <span class="text-muted">
                                    <i class="fa fa-image mr-1"></i> Photo
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Yesterday</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                            <div class="pr-3">
                                <span class="avatar avatar-state-info">
                                    <img src="<?=BASE_URL?>assets/media/image/user/man_avatar1.jpg"
                                        class="rounded-circle" alt="image">
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Barbette Bolf</h6>
                                <span class="text-muted">
                                    <i class="fa fa-video-camera mr-1"></i> Video
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Last week</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                            <div class="pr-3">
                                <span class="avatar avatar-state-secondary">
                                    <span class="avatar-title bg-warning rounded-circle">D</span>
                                </span>
                            </div>
                            <div>
                                <h6 class="mb-1">Dudley Laborde</h6>
                                <span class="text-muted">Hello how are you?</span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">2:32 PM</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                            <div class="pr-3">
                                <span class="avatar avatar-state-success">
                                    <img src="<?=BASE_URL?>assets/media/image/user/man_avatar2.jpg"
                                        class="rounded-circle" alt="image">
                                </span>
                            </div>
                            <div>
                                <h6 class="mb-1">Barbaraanne Riby</h6>
                                <span class="text-muted">Hi!</span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">08:27 PM</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                            <div class="pr-3">
                                <span class="avatar avatar-state-danger">
                                    <img src="<?=BASE_URL?>assets/media/image/user/women_avatar3.jpg"
                                        class="rounded-circle" alt="image">
                                </span>
                            </div>
                            <div class="flex-grow- 1">
                                <h6 class="mb-1">Mariana Ondrousek</h6>
                                <span class="text-muted">
                                    <i class="fa fa-image mr-1"></i> Photo
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Yesterday</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                            <div class="pr-3">
                                <span class="avatar avatar-state-warning">
                                    <img src="<?=BASE_URL?>assets/media/image/user/man_avatar4.jpg"
                                        class="rounded-circle" alt="image">
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Ruprecht Lait</h6>
                                <span class="text-muted">
                                    <i class="fa fa-video-camera mr-1"></i> Video
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Last week</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                            <div class="pr-3">
                                <span class="avatar avatar-state-info">
                                    <img src="<?=BASE_URL?>assets/media/image/user/man_avatar1.jpg"
                                        class="rounded-circle" alt="image">
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Cosme Hubbold</h6>
                                <span class="text-muted">
                                    <i class="fa fa-video-camera mr-1"></i> Video
                                </span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">Last week</span>
                            </div>
                        </a>
                        <a href="chat.html" class="list-group-item d-flex px-0 align-items-center">
                            <div class="pr-3">
                                <span class="avatar avatar-state-secondary">
                                    <span class="avatar-title bg-secondary rounded-circle">M</span>
                                </span>
                            </div>
                            <div>
                                <h6 class="mb-1">Mallory Darch</h6>
                                <span class="text-muted">Hello how are you?</span>
                            </div>
                            <div class="text-right ml-auto d-flex flex-column">
                                <span class="small text-muted">2:32 PM</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Sidebar >>> Chat list -->
    </div>
    <!-- ./ Sidebar group -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper">
        <!-- Header -->
        <div class="header d-print-none">
            <div class="header-container">
                <div class="header-left">
                    <ul class="navbar-nav">
                        <li class="nav-item navigation-toggler">
                            <a href="#" class="nav-link">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                        <div style="display:flex;" id="icon-open">
                            
                                        
                        </div>
                        </li>
                    </ul>
                </div>

                <div class="header-right">
                    <ul class="navbar-nav">
                        
                        <a href="<?=BASE_URL?>pedido/pdv" target="_blank" class="btn btn-outline-success" style="border-radius:5px;"><span class="mr-1">Venda de Balcão</span> <i class="fa fa-arrow-circle-right"></i></a>

                        <li class="nav-item dropdown d-sm-inline d-none">
                            <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                                <i class="maximize" data-feather="maximize"></i>
                                <i class="minimize" data-feather="minimize"></i>
                            </a>
                        </li> 

                        <!-- <li class="nav-item dropdown">
                            <a href="#" class="nav-link" title="Notifications" data-toggle="dropdown">
                                <span class="badge badge-success nav-link-notify">1</span>
                                <i data-feather="bell"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                <div
                                    class="bg-success px-3 py-3 text-center d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Notificações</h6>
                                    <small class="opacity-7">1 notificação não lida</small>
                                </div>
                                <div class="dropdown-scroll">
                                    <ul class="list-group list-group-flush">
                                        <li>
                                            <a href="#"
                                                class="list-group-item px-3 d-flex align-items-center hide-show-toggler">
                                                <div>
                                                    <figure class="avatar mr-2">
                                                        <span
                                                            class="avatar-title bg-success-bright text-success rounded-circle">
                                                            <i class="ti-file"></i>
                                                        </span>
                                                    </figure>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                        Your report is prepared
                                                        <i title="Desmarcar como lida" data-toggle="tooltip"
                                                            class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                    </p>
                                                    <span class="text-muted small">20 min ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="list-group-item bg-primary-bright px-3 d-flex align-items-center hide-show-toggler">
                                                <div>
                                                    <figure class="avatar mr-2">
                                                        <span
                                                            class="avatar-title bg-success-bright text-success rounded-circle">
                                                            <i class="ti-user"></i>
                                                        </span>
                                                    </figure>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                        New customer registered
                                                        <i title="Marcar como lida" data-toggle="tooltip"
                                                            class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                                    </p>
                                                    <span class="text-muted small">20 min ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="list-group-item px-3 d-flex align-items-center hide-show-toggler">
                                                <div>
                                                    <figure class="avatar mr-2">
                                                        <span
                                                            class="avatar-title bg-warning-bright text-warning rounded-circle">
                                                            <i class="ti-package"></i>
                                                        </span>
                                                    </figure>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                        New Order Recieved
                                                        <i title="Mark as unread" data-toggle="tooltip"
                                                            class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                    </p>
                                                    <span class="text-muted small">45 sec ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="list-group-item px-3 d-flex align-items-center hide-show-toggler">
                                                <div>
                                                    <figure class="avatar mr-2">
                                                        <span
                                                            class="avatar-title bg-danger-bright text-danger rounded-circle">
                                                            <i class="ti-server"></i>
                                                        </span>
                                                    </figure>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                        Server Limit Reached!
                                                        <i title="Mark as unread" data-toggle="tooltip"
                                                            class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                    </p>
                                                    <span class="text-muted small">55 sec ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="list-group-item px-3 d-flex align-items-center hide-show-toggler">
                                                <div>
                                                    <figure class="avatar mr-2">
                                                        <span
                                                            class="avatar-title bg-info-bright text-info rounded-circle">
                                                            <i class="ti-layers"></i>
                                                        </span>
                                                    </figure>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                        Apps are ready for update
                                                        <i title="" data-toggle="tooltip"
                                                            class="hide-show-toggler-item fa fa-check font-size-11"
                                                            data-original-title="Mark as unread"></i>
                                                    </p>
                                                    <span class="text-muted small">Yesterday</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="px-3 py-2 text-right border-top">
                                    <ul class="list-inline small">
                                        <li class="list-inline-item mb-0">
                                            <a href="#">Mark All Read</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li> -->

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" title="Settings" data-sidebar-target="#settings">
                                <i data-feather="settings"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                                <span class="mr-2 d-sm-inline d-none">
                                    Olá! <strong><?=getUser()->nome_user?></strong>
                                </span>
                                <!-- <figure class="avatar avatar-sm">
                                    <img src="<?=BASE_URL?>assets/media/image/user/man_avatar3.jpg"
                                        class="rounded-circle" alt="avatar">
                                </figure> -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                <!-- <div class="text-center py-4"
                                    data-background-image="<?=BASE_URL?>assets/media/image/image1.jpg">
                                    <figure class="avatar avatar-lg mb-3 border-0">
                                        <img src="<?=BASE_URL?>assets/media/image/user/man_avatar3.jpg"
                                            class="rounded-circle" alt="image">
                                    </figure>
                                    <h5 class="mb-0">Bony Gidden</h5>
                                </div> -->
                                <div class="list-group list-group-flush">
                                    <a href="profile.html" class="list-group-item">Perfil</a>
                                    <a href="#" class="list-group-item" data-sidebar-target="#settings">Configurações</a>
                                    <a href="<?=BASE_URL?>login/logout" class="list-group-item text-success">Sair do Sistema</a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitchfechar">
                                <label class="custom-control-label openst" for="customSwitchfechar">--</label>
                            </div>
                        </li>

                    </ul>
                </div>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item header-toggler">
                        <a href="#" class="nav-link">
                            <i class="ti-arrow-down"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./ Header -->