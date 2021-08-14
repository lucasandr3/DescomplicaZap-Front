<!doctype html>
<html lang="xyz">

<!-- Mirrored from baston.laborasyon.com/demos/default/login.html by HTTrack Website Copier/3.x [XR&CO'2017], Tue, 25 Aug 2020 18:42:03 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=url('assets/img/logo/fav.jpg')?>"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?=url('assets/vendors/bundle.css')?>" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="<?=url('assets/css/app.min.css')?>" type="text/css">

    <!-- Fontawesome icons js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
</head>

<body class="form-membership">

<?php if(isset($_SESSION['forgot'])): ?>
    <?php echo $_SESSION['forgot']; ?>
    <?php $_SESSION['forgot'] = ''; ?>
<?php endif; ?>

<?php if(f_error()): ?>
    <div class="alert alert-danger" role="alert" style="border-radius:0px;text-align:center;margin-top:-46px;">
        <?php echo f_error() ?>
    </div>
<?php endif; ?>

<!-- Preloader -->
<div class="preloader">
    <!-- <img class="logo" src="<?=BASE_URL?>assets/media/image/logo/logo.png" alt="logo"> -->
    <img class="logo" src="<?=url('assets/img/logo/fav.jpg')?>" alt="rapha's fit" style="width:40px;height:auto;margin-right:10px;">
    <span class="logo-name">Rapha's Fit</span>
    <img class="dark-logo" src="<?=url('assets/img/logo/fav.jpg')?>" alt="logo dark">
    <div class="preloader-icon"></div>
</div>
<!-- ./ Preloader -->

<div class="form-wrapper" style="box-shadow: 3px 5px 15px 0px #999;">

    <!-- logo -->
    <div id="logo" style="display:flex;align-items:center;margin-right:10px;justify-content:center;">
        <!-- <img class="logo" src="<?=BASE_URL?>assets/media/image/logo/logo.png" alt="logo"> -->
        <img class="logo" src="<?=url('assets/img/logo/fav.jpg')?>" alt="rapha's fit" style="width:40px;height:auto;margin-right:10px;">
        <span class="logo-name">Rapha's Fit</span>
    </div>
    <!-- ./ logo -->

    
    <h5>Gerencie sua loja de forma fácil</h5>

    <!-- form -->
    <form action="<?=url('login/signin')?>" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="email_user" placeholder="Digite seu e-mail" required autofocus>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
        </div>
        <div class="form-group d-flex justify-content-between align-items-center">
            <div class="custom-control custom-checkbox" style="padding-left: 0.5rem;">
                <i class="fa fa-lock"></i>
                <a class="small" href="<?=url('login/forgotPass')?>">Esqueci Minha Senha</a>
            </div>
        </div>
        <button class="btn btn-success btn-block" style="letter-spacing: 2px;">Entrar</button>

    </form>
    <!-- ./ form -->


</div>

<!-- Plugin scripts -->
<script src="<?=url('assets/vendors/bundle.js')?>"></script>

<!-- App scripts -->
<script src="<?=url('assets/js/app.min.js')?>"></script>
<!-- <style>
    body.form-membership:before {
     background: #e4e4e4;
    }
</style> -->
<script>
    if (localStorage.getItem('theme-mode')) {
    let themeMode = localStorage.getItem('theme-mode');
    document.querySelector('body').classList.add(themeMode);
    }
</script>
</body>

<!-- Mirrored from baston.laborasyon.com/demos/default/login.html by HTTrack Website Copier/3.x [XR&CO'2017], Tue, 25 Aug 2020 18:42:03 GMT -->
</html>
