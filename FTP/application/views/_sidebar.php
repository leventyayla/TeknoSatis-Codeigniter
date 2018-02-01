
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-md-3 sidebar"> 
        
        <!-- ================================== Kategoriler ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Kategoriler</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
            <?php 
            	foreach ($kategoriler as $rs) { 
            		if ($rs->parent_id == 0){ 
            ?>
				<li class="dropdown menu-item"> <a href="<?php if ($rs->altkategoriSayisi != 0) { echo '#'; }else { echo base_url().'home/kategoriler/'.$rs->Id; } ?>" class="dropdown-toggle" <?php if ($rs->altkategoriSayisi != 0) { echo 'data-hover="dropdown" data-toggle="dropdown"'; } ?>><?=$rs->adi?></a>
			<?php if ($rs->altkategoriSayisi != 0) { ?>
				<ul class="dropdown-menu mega-menu">
					<li class="yamm-content">
						<div class="row">
							<div class="col-sm-12 col-md-3">
								<ul class="links list-unstyled">
								<?php foreach ($kategoriler as $alt_k) {
										if ($alt_k->parent_id == $rs->Id) { ?>
											<li><a href="<?=base_url()?>home/kategoriler/<?=$alt_k->Id?>"><?=$alt_k->adi?></a></li>
								<?php 	}	
									  } ?>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			<?php } ?>

				</li>

            <?php 	} 
            	}
            ?>
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== Kategoriler : END ================================== --> 

        <!-- ============================================== INDIRIMDEKILER ============================================== -->
        <div class="sidebar-widget hot-deals outer-bottom-xs">
          <h3 class="section-title">İlginizi Çekebilir</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

            <?php 
                    foreach ($random_urunler as $rs){
            ?>

            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"><a href="<?=base_url()?>product/detail/<?=$rs->Id ?>"><img src="<?=base_url()?>uploads/products/<?=$rs->resim ?>" alt="<?=$rs->adi ?>"> </a></div>
                </div>
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="<?=base_url()?>product/detail/<?=$rs->Id ?>"><?=$rs->adi ?></a></h3>
                  <div class="product-price"> <span class="price"> <?=$rs->sfiyat ?> ₺ </span></div>
                </div>
              </div>
            </div>

            <?php } ?>

          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <!-- ============================================== INDIRIMDEKILER: END ============================================== --> 
        
        <!-- ============================================== SPECIAL OFFER ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small">
          <h3 class="section-title">Stok Ürünleri</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

              <?php 
                    for ($i = 0; $i < sizeof($stok_urunler); $i++) {
              ?>

              <div class="item">
                <div class="products special-product">

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?=base_url()?>product/detail/<?=$stok_urunler[$i]->Id ?>"> <img src="<?=base_url()?>uploads/products/<?=$stok_urunler[$i]->resim ?>" alt="<?=$stok_urunler[$i]->adi ?>"> </a> </div>
                          </div>
                        </div>

                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?=base_url()?>product/detail/<?=$stok_urunler[$i]->Id ?>"><?=$stok_urunler[$i]->adi ?></a></h3>
                            <div class="product-price"> <span class="price"> <?=$stok_urunler[$i]->sfiyat ?> ₺ </span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php 

                  if (isset($stok_urunler[++$i])) {

                  ?>

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?=base_url()?>product/detail/<?=$stok_urunler[$i]->Id ?>"> <img src="<?=base_url()?>uploads/products/<?=$stok_urunler[$i]->resim ?>" alt="<?=$stok_urunler[$i]->adi ?>"> </a> </div>
                          </div>
                        </div>

                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?=base_url()?>product/detail/<?=$stok_urunler[$i]->Id ?>"><?=$stok_urunler[$i]->adi ?></a></h3>
                            <div class="product-price"> <span class="price"> <?=$stok_urunler[$i]->sfiyat ?> ₺ </span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php } ?>

                  <?php 

                  if (isset($stok_urunler[++$i])) {

                  ?>

                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="<?=base_url()?>product/detail/<?=$stok_urunler[$i]->Id ?>"> <img src="<?=base_url()?>uploads/products/<?=$stok_urunler[$i]->resim ?>" alt="<?=$stok_urunler[$i]->adi ?>"> </a> </div>
                          </div>
                        </div>

                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="<?=base_url()?>product/detail/<?=$stok_urunler[$i]->Id ?>"><?=$stok_urunler[$i]->adi ?></a></h3>
                            <div class="product-price"> <span class="price"> <?=$stok_urunler[$i]->sfiyat ?> ₺ </span> </div>
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
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
        
        
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 