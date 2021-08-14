<!doctype html>
<html lang="en">

<!-- Mirrored from baston.laborasyon.com/demos/default/recovery-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2020 03:47:24 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baston - Responsive Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=BASE_URL?>assets/img/logo/fav.jpg"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/app.min.css" type="text/css">
</head>
<body class="form-membership">

<?php if(isset($_SESSION['forgot'])): ?>
    <?php echo $_SESSION['forgot']; ?>
    <?php $_SESSION['forgot'] = ''; ?>
<?php endif; ?>
<!-- Preloader -->
<div class="preloader">
    <!-- <img class="logo" src="<?=BASE_URL?>assets/media/image/logo/logo.png" alt="logo"> -->
    <img class="logo" src="<?=BASE_URL?>assets/img/logo/fav.jpg" alt="rapha's fit" style="width:40px;height:auto;margin-right:10px;">
    <span class="logo-name">Rapha's Fit</span>
    <img class="dark-logo" src="<?=BASE_URL?>assets/img/logo/fav.jpg" alt="logo dark">
    <div class="preloader-icon"></div>
</div>
<!-- ./ Preloader -->

<div class="form-wrapper"  style="box-shadow: 3px 5px 15px 0px #999;">

    <!-- logo -->
    <div id="logo" style="display:flex;align-items:center;margin-right:10px;justify-content:center;">
        <!-- <img class="logo" src="<?=BASE_URL?>assets/media/image/logo/logo.png" alt="logo"> -->
        <img class="logo" src="<?=BASE_URL?>assets/img/logo/fav.jpg" alt="rapha's fit" style="width:40px;height:auto;margin-right:10px;">
        <span class="logo-name">Rapha's Fit</span>
    </div>
    <!-- ./ logo -->

    
    <h5>Nova Senha</h5>

    <!-- form -->
    <form action="<?=BASE_URL?>login/forgotAction" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Digite seu E-mail" required autofocus>
        </div>
        <button class="btn btn-success btn-block">Criar Nova Senha</button>
        <hr>
        <p class="">Entrar com uma conta diferente.</p>
        <a href="<?=BASE_URL?>login" class="btn btn-outline-light ml-1">Fazer Login</a>
    </form>
    <!-- ./ form -->


</div>

<!-- Plugin scripts -->
<script src="<?=BASE_URL?>assets/vendors/bundle.js"></script>

<!-- App scripts -->
<script src="<?=BASE_URL?>assets/js/app.min.js"></script>
<script>
    if (localStorage.getItem('theme-mode')) {
    let themeMode = localStorage.getItem('theme-mode');
    document.querySelector('body').classList.add(themeMode);
    }
</script>
</script>
</body>

<!-- Mirrored from baston.laborasyon.com/demos/default/recovery-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2020 03:47:24 GMT -->
</html>
