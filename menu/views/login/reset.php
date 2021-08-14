<!doctype html>
<html lang="xyz">

<!-- Mirrored from baston.laborasyon.com/demos/default/recovery-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2020 03:47:24 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nova Senha</title>

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

    
    <h5>Crie a Nova Senha</h5>

    <!-- form -->
    <form action="<?=BASE_URL?>login/newPassAction" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="password" id="r-pass" placeholder="Digite a nova senha" required autofocus>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" onkeyup="verifyPass(this.value)" placeholder="Confirme a senha" required autofocus>
        </div>
        <p id="feedback-reset"></p>
        <input class="sr-only" type="text" name="id_user" value="<?=$_SESSION['id_user_reset'];?>">
        <button class="btn btn-success btn-block" id="btn-sub">Corfirmar Nova Senha</button>

    </form>
    <!-- ./ form -->


</div>

<!-- Plugin scripts -->
<script src="<?=BASE_URL?>assets/vendors/bundle.js"></script>

<!-- App scripts -->
<script src="<?=BASE_URL?>assets/js/app.min.js"></script>

<script>
    function verifyPass(pass) {
        
       let confirm = document.querySelector('#r-pass').value;
       let feedback = document.querySelector('#feedback-reset');
       let btn = document.querySelector('#btn-sub');
       console.log(confirm)
       if (pass === confirm) {
           //feedback.classList.add('text-success', 'alert-success');
           feedback.style.display = 'none';
           btn.removeAttribute('disabled');
       } else {
           feedback.style.display = 'block';
           feedback.innerHTML = 'As Senhas não Conferem.';
           feedback.classList.add('text-danger', 'alert-danger');
           btn.setAttribute('disabled', true);
       }

    }
    if (localStorage.getItem('theme-mode')) {
    let themeMode = localStorage.getItem('theme-mode');
    document.querySelector('body').classList.add(themeMode);
    }
</script>
</script>

<style>
    .alert-danger {
        margin-top: 10px;
        border: 1px solid #a94442;
        border-radius: 10px;
        background: #ff000030;
        padding: 5px;
    }

    .alert-success {
        margin-top: 10px;
        border: 1px solid #3c763d !important;
        border-radius: 10px;
        background: #3c763d !important;
        padding: 5px;
    }
</style>
</body>

<!-- Mirrored from baston.laborasyon.com/demos/default/recovery-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2020 03:47:24 GMT -->
</html>
