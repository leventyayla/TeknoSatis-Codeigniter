<!DOCTYPE html>
<html lang="tr">

<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="<?=$tanim?>">
<meta name="theme-color" content="#085b9a">
<meta name="keywords" content="<?=$anahtar_kelimeler?>">
<meta name="robots" content="all">
<link rel="shortcut icon" href="<?=base_url()?>assets/icon.png" type="image/png" />
<title><?=$sayfa_baslik?></title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

<!-- Customizable CSS -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
<link rel="stylesheet" href="<?=base_url()?>assets/admin/plugins/ckeditor/contents.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/blue.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/simple-line-icons.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/owl.transitions.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/animate.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/rateit.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/css/lightbox.css" >

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.css">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,500i,600,700,800,900" rel="stylesheet">
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <?php if (!$this->session->uye_oturum){ ?>
              <li><a href="<?=base_url()?>login_register">Giriş Yap / Kayıt Ol</a></li>
            <?php }else { ?>
              <li><a href="<?=base_url()?>user"><?=$this->session->uye_oturum["adsoy"] ?></a></li>
              <li><a href="<?=base_url()?>login_register/oturum_kapat">Çıkış</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      
    </div>
    
  </div>
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"><a href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo.png" style="max-height: 30px" alt="logo"></a></div>
          <!-- ============================================================= LOGO : END ============================================================= -->
		</div>
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form id="aramaFormu" method="post" action="<?=base_url()?>home/search">
              <div class="control-group">
                <input class="search-field" id="aranan_metin" type="text" name="text" placeholder="Ürün Arayın..." />
                <a class="search-button" href="javascript: Ara()" ></a> 
			       </div>
            </form>
            <script type="text/javascript">
                function Ara() {
                  var aranan_metin = document.getElementById('aranan_metin').value;
                  if (aranan_metin == "") {
                    alert("Arama alanını boş bırakmayınız!"); return false;
                  }
                  
                  document.getElementById('aramaFormu').submit();
                } 
              </script>
          </div>
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
        
          <div class="dropdown dropdown-cart"> 
            <a href="<?=base_url()?>user/basket" class="dropdown-toggle lnk-cart">
              <div class="items-cart-inner">
                <div class="basket"></div>
                <?php if($this->session->uye_oturum){ ?>
                <div class="basket-item-count"><span class="count"><?=$this->session->sepet ?></span></div>
                <?php } ?>
              </div>
            </a>
          </div>
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="<?php if($aktif_sayfa == "ana_sayfa"){echo "active ";} ?>dropdown"> <a href="<?=base_url()?>">Anasayfa</a> </li>
                <li class="<?php if($aktif_sayfa == "bize_yazin"){echo "active ";} ?>dropdown"> <a href="<?=base_url()?>home/bize_yazin">Bize Yazın</a> </li>
                <li class="<?php if($aktif_sayfa == "iletisim"){echo "active ";} ?>dropdown"> <a href="<?=base_url()?>home/iletisim">İletişim</a> </li>
                <li class="<?php if($aktif_sayfa == "hakkimizda"){echo "active ";} ?>dropdown"> <a href="<?=base_url()?>home/hakkimizda">Hakkımızda</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row single-product"> 