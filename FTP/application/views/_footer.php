    </div>
    <!-- /.row --> 
     
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 
<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">İletişim</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p><?=$veri[0]->adres?></p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p><?=$veri[0]->tel?></p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-building fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body"> <span style="margin-left:0px;"><?=$veri[0]->sehir?></span> </div>
              </li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Müşteri Alanı</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="<?=base_url()?>user/info" title="Bilgilerim">Bilgilerim</a></li>
              <li><a href="<?=base_url()?>user/basket" title="Sepetim">Sepetim</a></li>
              <li class="last"><a href="<?=base_url()?>user/orders" title="Siparişlerim">Siparişlerim</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Şirketimiz</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a title="Hakkımızda" href="<?=base_url()?>home/hakkimizda">Hakkımızda</a></li>
              <li><a title="İletişim" href="<?=base_url()?>home/iletisim">İletişim</a></li>
              <li class="last"><a title="Bize Yazın" href="<?=base_url()?>home/bize_yazin">Bize Yazın</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Site</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first last"><a href="<?=base_url()?>admin" target="_blank" title="Yönetici Paneli">Panel</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-6 no-padding social">
        <ul class="link">
          <li class="fb pull-left"><a target="_blank" rel="nofollow" href="http://facebook.com/<?=$veri[0]->facebook?>" title="Facebook"></a></li>
          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="http://twitter.com/<?=$veri[0]->twitter?>" title="Twitter"></a></li>
          <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="http://youtube.com/user/<?=$veri[0]->youtube?>" title="YouTube"></a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-6 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="<?=base_url()?>assets/images/payments/1.png" alt=""></li>
            <li><img src="<?=base_url()?>assets/images/payments/3.png" alt=""></li>
            <li><img src="<?=base_url()?>assets/images/payments/4.png" alt=""></li>
          </ul>
        </div>
        <!-- /.payment-methods --> 
      </div>
    </div>
  </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap-hover-dropdown.min.js"></script> 
<script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script> 
<script src="<?=base_url()?>assets/js/echo.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.easing-1.3.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap-slider.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.rateit.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/js/lightbox.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap-select.min.js"></script> 
<script src="<?=base_url()?>assets/js/wow.min.js"></script> 
<script src="<?=base_url()?>assets/js/scripts.js"></script>
</body>

</html>