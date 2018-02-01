<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Giriş Yap | AdminPanel</title>
    <meta name="theme-color" content="#414141">
    
    <!-- Icon-->
    <link rel="shortcut icon" href="<?=base_url()?>assets/admin/icon.png" type="image/png" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url()?>assets/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url()?>assets/admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url()?>assets/admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url()?>assets/admin/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo<?php if (!$this->session->flashdata("mesaj")) echo " animated flipInY" ?>">
            <a>Admin<b>Panel</b></a>
            <small>Tekno Satış</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="<?=base_url()?>admin/login/oturum_ac" method="POST">
                    <div class="msg">
                    	<?php
                    	if ($this->session->flashdata("mesaj")) { ?>
                    		<div class="alert bg-red animated tada">
                                <?=$this->session->flashdata("mesaj")?>
                            </div>
                        <?php
                    	}else {
                    		echo "Yönetici panelinde oturum açın";
                    	} ?>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="E-Posta" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Şifre" required>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-xs-8 p-t-5">
                            <a href="#">Şifremi Unuttum</a>
                        </div> -->
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-blue waves-effect" type="submit">GİRİŞ</button>
                        </div>
                    </div><hr>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?=base_url()?>">&larr; Siteye Dön</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?=base_url()?>assets/admin/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url()?>assets/admin/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url()?>assets/admin/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url()?>assets/admin/js/admin.js"></script>
</body>

</html>