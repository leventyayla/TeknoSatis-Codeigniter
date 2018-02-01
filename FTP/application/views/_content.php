<!-- ============================================== CONTENT ============================================== -->
      <div class="col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

          	<?php 
	          	foreach ($sliderlar as $rs){

          	?>

            <?php if(!$rs->buton_text && $rs->buton_link) { ?>
                  <a href="<?=$rs->buton_link ?>">
            <?php } ?>

          	<div class="item" style="background-image: url(<?=base_url()?>uploads/slider/<?=$rs->resim ?>);">
          		<div class="container-fluid">
          			<div class="caption bg-color vertical-center text-left">
          				<div class="slider-header"><?=$rs->baslik ?></div>
          				<div class="big-text"><?=$rs->buyuk_baslik ?></div>
          				<div class="excerpt hidden-xs"> <span><?=$rs->aciklama ?></span> </div>
                  <?php if($rs->buton_text) { ?>
          				<div class="button-holder"> <a href="<?=$rs->buton_link ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button"><?=$rs->buton_text ?></a></div>
                  <?php } ?>
          			</div>
          		</div>
          	</div>

            <?php if(!$rs->buton_text && $rs->buton_link) { ?>
                  </a>
            <?php } ?>

          	<?php } ?>
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================= START ======================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
        </div>
        <!-- ============================================== END ========================================= --> 

        <!-- ============================================== Çok Satanlar ============================================== -->
        <div class="best-deal outer-bottom-xs">
          <h3 class="section-title">Çok Satanlar</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">

              <?php 
                    for ($i = 0; $i < sizeof($cok_satanlar); $i++) {
              ?>

              <div class="item">
                <div class="products best-product">

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?=base_url()?>product/detail/<?=$cok_satanlar[$i]->Id ?>"> <img src="<?=base_url()?>uploads/products/<?=$cok_satanlar[$i]->resim ?>" alt=""> </a> </div>
                          </div>
                        </div>

                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?=base_url()?>product/detail/<?=$cok_satanlar[$i]->Id ?>"><?=$cok_satanlar[$i]->adi ?></a></h3>
                            <div class="product-price"> <span class="price"> <?=$cok_satanlar[$i]->sfiyat ?> ₺ </span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php 

                  if (isset($cok_satanlar[++$i])) {

                  ?>

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?=base_url()?>product/detail/<?=$cok_satanlar[$i]->Id ?>"> <img src="<?=base_url()?>uploads/products/<?=$cok_satanlar[$i]->resim ?>" alt=""> </a> </div>
                          </div>
                        </div>

                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?=base_url()?>product/detail/<?=$cok_satanlar[$i]->Id ?>"><?=$cok_satanlar[$i]->adi ?></a></h3>
                            <div class="product-price"> <span class="price"> <?=$cok_satanlar[$i]->sfiyat ?> ₺ </span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php } ?>

                </div>
              </div>

              <?php } ?>

            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== Çok Satanlar : END ============================================== --> 
		
        <!-- ============================================== Son Eklenenler ============================================== -->
        <section class="section featured-product">
          <h3 class="section-title">Son Eklenenler</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

          	<?php 
	          	foreach ($son_eklenenler as $rs){

          	?>

            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="<?=base_url()?>product/detail/<?=$rs->Id ?>"><img src="<?=base_url()?>uploads/products/<?=$rs->resim ?>" alt="<?=$rs->adi ?>"></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag new"><span>yeni</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="<?=base_url()?>product/detail/<?=$rs->Id ?>"><?=$rs->adi ?></a></h3>
                    <div class="product-price"> <span class="price"> <?=$rs->sfiyat ?> ₺ </span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info --> 
                </div>
                <!-- /.product --> 
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->

            <?php } ?>            
            
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== Son Eklenenler : END ============================================== -->
		
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
      