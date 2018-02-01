<div class="col-md-9">

  <?php if ($arananlar){ ?>
              
  <div class="clearfix filters-container">
    <div class="row">
      <div class="col col-sm-6 col-md-2">
        <div class="filter-tabs">
          <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
            <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Izgara</a> </li>
            <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>Liste</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="search-result-container ">
    <div id="myTabContent" class="tab-content category-list">

      <div class="tab-pane active " id="grid-container">
        <div class="category-product">
          <div class="row">

            <?php 
            foreach ($arananlar as $rs){
              ?>

              <div class="col-sm-6 col-md-4">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="<?=base_url()?>product/detail/<?=$rs->Id ?>"><img src="<?=base_url()?>uploads/products/<?=$rs->resim ?>" alt="<?=$rs->adi ?>"></a> </div>
                    </div>

                    <div class="product-info text-left">
                      <h3 class="name"><a href="<?=base_url()?>product/detail/<?=$rs->Id ?>"><?=$rs->adi ?></a></h3>
                      <div class="product-price"> <span class="price"> <?=$rs->sfiyat ?> ₺ </span> </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php } ?>  

            </div>
          </div>
        </div>

        <div class="tab-pane "  id="list-container">
          <div class="category-product">

            <?php 
            foreach ($arananlar as $rs){
              ?>

              <div class="category-product-inner">
                <div class="products">
                  <div class="product-list product">
                    <div class="row product-list-row">
                      <div class="col col-sm-4 col-lg-4">
                        <div class="product-image">
                          <div class="image"><a href="<?=base_url()?>product/detail/<?=$rs->Id ?>"><img src="<?=base_url()?>uploads/products/<?=$rs->resim ?>" alt="<?=$rs->adi ?>"> </div>
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name"><a href="<?=base_url()?>product/detail/<?=$rs->Id ?>"><?=$rs->adi ?></a></h3>
                            <div class="product-price"> <span class="price"><?=$rs->sfiyat ?> ₺ </span></div>
                            <!-- /.product-price -->
                            <div class="description m-t-10"><?=$rs->tanim ?></div>
                          </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <?php } ?>

              </div>
              <!-- /.category-product --> 
            </div>
            <!-- /.tab-pane #list-container --> 
          </div>
          <!-- /.tab-content --> 
        </div>
        <?php }else{ ?>
            <div class="clearfix filters-container">
              <div class="row">
                <span style="font-size: 20px; display: table; margin: auto; height: 250px; line-height: 250px; color: #575757;">
                  Aramanızla eşleşen ürün yok!
                </span><br><br>
              </div>
            </div>
        <?php } ?>
      </div>