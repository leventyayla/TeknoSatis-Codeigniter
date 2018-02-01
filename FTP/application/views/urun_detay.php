<div class='col-md-9'>
	<div class="detail-block">
		<div class="row">

			<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
				<div class="product-item-holder size-big single-product-gallery small-gallery">

					<div id="owl-single-product">
						<div class="single-product-gallery-item" id="slide1">
							<a data-lightbox="image-1" data-title="<?=$urun[0]->adi ?>" href="<?=base_url()?>uploads/products/<?=$urun[0]->resim ?>">
								<img class="img-responsive" alt="" src="<?=base_url()?>uploads/products/<?=$urun[0]->resim ?>" data-echo="<?=base_url()?>uploads/products/<?=$urun[0]->resim ?>" />
							</a>
						</div><!-- /.single-product-gallery-item -->

						<?php
							$say = 1;
							foreach ($galeri as $rs){
							$say++;
						?>

						<div class="single-product-gallery-item" id="slide<?=$say ?>">
							<a data-lightbox="image-1" data-title="<?=$urun[0]->adi ?>" href="<?=base_url()?>uploads/gallery/<?=$rs->resim ?>">
								<img class="img-responsive" alt="" src="<?=base_url()?>uploads/gallery/<?=$rs->resim ?>" data-echo="<?=base_url()?>uploads/gallery/<?=$rs->resim ?>" />
							</a>
						</div><!-- /.single-product-gallery-item -->

						<?php } ?>

					</div><!-- /.single-product-slider -->


					<div class="single-product-gallery-thumbs gallery-thumbs">

						<div id="owl-single-product-thumbnails">
							<div class="item">
								<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
									<img class="img-responsive" width="85" alt="" src="<?=base_url()?>uploads/products/<?=$urun[0]->resim ?>" data-echo="<?=base_url()?>uploads/products/<?=$urun[0]->resim ?>" />
								</a>
							</div>

							<?php
								$say = 1;
								foreach ($galeri as $rs){
								$say++;
							?>

							<div class="item">
								<a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?=$say ?>" href="#slide<?=$say ?>">
									<img class="img-responsive" width="85" alt="" src="<?=base_url()?>uploads/gallery/<?=$rs->resim ?>" data-echo="<?=base_url()?>uploads/gallery/<?=$rs->resim ?>"/>
								</a>
							</div>

							<?php } ?>

						</div><!-- /#owl-single-product-thumbnails -->



					</div><!-- /.gallery-thumbs -->

				</div><!-- /.single-product-gallery -->
			</div><!-- /.gallery-holder -->
			<div class='col-sm-6 col-md-7 product-info-block'>
				<div class="product-info">
					<h1 class="name"><?=$urun[0]->adi ?></h1>

					<div class="stock-container info-container m-t-10">
						<div class="row">
							<div class="col-sm-2">
								<div class="stock-box">
									<span class="label">Stok Durumu :</span>
								</div>
							</div>
							<div class="col-sm-9">
								<div class="stock-box">
									<span id="stokmiktari" name="stokmiktari" class="value"><?=$urun[0]->stok ?></span>
								</div>
							</div>
						</div><!-- /.row -->
					</div><!-- /.stock-container -->

					<div class="description-container m-t-20">
						<?=$urun[0]->tanim ?>
					</div><!-- /.description-container -->

					<div class="description-container m-t-20">
						Kategori : <a href="<?=base_url()?>home/kategoriler/<?=$urun[0]->kategori?>"><?=$urun[0]->kategori_name ?></a>
					</div><!-- /.description-container -->

					<div class="price-container info-container m-t-20">
						<div class="row">

							<div class="col-sm-6">
								<div class="price-box">
									<span class="price"><?=$urun[0]->sfiyat ?> ₺</span>
									<!-- <span class="price-strike">$900.00</span> -->
								</div>
							</div>

						</div><!-- /.row -->
					</div><!-- /.price-container -->

					<div class="quantity-container info-container">
						<div class="row">
							<form id="sepetForm" method="post" action="<?=base_url()?>product/sepete_ekle/<?=$urun[0]->Id ?>">
							<div class="col-sm-2">
								<span class="label">Miktar :</span>
							</div>

							<div class="col-sm-2">
								<div class="cart-quantity">
									<div class="quant-input">
										<input type="number" id="miktar" name="miktar" value="1" min="1" max="<?=$urun[0]->stok ?>">
									</div>
								</div>
							</div>

							<div class="col-sm-7">
								<a href="javascript: sepeteEkle()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Sepete Ekle</a>
							</div>
							</form>
							<script type="text/javascript"> 
								function sepeteEkle() {
									var stok = Number(document.getElementById('stokmiktari').innerText);
									var miktar = Number(document.getElementById('miktar').value);
									if (miktar == 0) {
										alert("Seçilen miktar 1'den küçük olamaz!"); return false;
									}
									if (miktar > stok) {
										alert("Belirlediğiniz miktar, stok miktarını aşamaz!"); return false;
									}
									
									document.getElementById('sepetForm').submit();
								} 
							</script> 
						</div><!-- /.row -->
					</div><!-- /.quantity-container -->
				</div><!-- /.product-info -->
			</div><!-- /.col-sm-7 -->
		</div><!-- /.row -->
	</div>

	<div class="product-tabs inner-bottom-xs">
		<div class="row">
			<div class="col-sm-3">
				<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
					<li class="active"><a data-toggle="tab" href="#description">Açıklama</a></li>
					<li><a data-toggle="tab" href="#review">Yorumlar</a></li>
				</ul><!-- /.nav-tabs #product-tabs -->
			</div>
			<div class="col-sm-9">

				<div class="tab-content">

					<div id="description" class="tab-pane in active">
						<div class="product-tab">
							<p class="text"><?=$urun[0]->aciklama ?></p>
						</div>
					</div><!-- /.tab-pane -->

					<div id="review" class="tab-pane">
						<div class="product-tab">

							<div class="product-reviews">
								<h4 class="title">Yorumlar</h4>

								<?php
									$yorum_yapti_mi = FALSE;
									$uye_yorum_bilgi = NULL; 
									if ($yorumlar){
										foreach ($yorumlar as $rs){
										if ($rs->uye_id == $this->session->uye_oturum['id']) {
											$yorum_yapti_mi = TRUE;
											$uye_yorum_bilgi = $rs;
										}
								?>

								<div class="reviews">
									<div class="review">
										<div class="review-title">
											<span class="summary"><?=$rs->ad.' '.$rs->soyad ?></span>
											<span class="date"><i class="fa fa-calendar"></i><span><?=$rs->tarih ?></span></span>
											<span class="date"><i class="fa fa-star"></i><span><?=$rs->puan ?></span></span>
										</div>
										<div class="text"><?=$rs->yorum ?></div>
									</div>
								</div>

								<?php }
								}else{ ?>

								<span style="font-size: 14px; display: table; margin: auto; height: 100px; line-height: 100px; color: #575757;">
									Ürüne ait yorum yok!
								</span>

								<?php } ?>

							</div>



							<div class="product-add-review">
								<h4 class="title">Yorum Yaz</h4><hr>

								<?php if($this->session->uye_oturum){ 
										if(!$yorum_yapti_mi){ ?>

								<div class="review-form">
									<div class="form-container">
										<form role="form" class="cnt-form" method="post" action="<?=base_url()?>product/add_comment/<?=$urun[0]->Id ?>">

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="yorum">Yorum <span class="astk">*</span></label>
														<textarea class="form-control txt txt-review" id="yorum" name="yorum" rows="4" placeholder="Yorumunuzu yazınız" required></textarea>
													</div><!-- /.form-group -->
													
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputName">Puan <span class="astk">*</span></label>
														<select class="form-control" name="puan">
															<option value="5">5</option>
															<option value="4">4</option>
															<option value="3">3</option>
															<option value="2">2</option>
															<option value="1">1</option>
														</select>
													</div><!-- /.form-group -->
												</div>
											</div><!-- /.row -->

											<div class="action text-right">
												<input type="submit" class="btn btn-primary btn-upper" value="Yorumu Gönder">
											</div><!-- /.action -->

										</form><!-- /.cnt-form -->
									</div><!-- /.form-container -->
								</div><!-- /.review-form -->

								<?php }else{ ?>

								<div class="review-form">
									<div class="form-container">
										<form role="form" class="cnt-form" method="post" action="<?=base_url()?>product/update_comment/<?=$urun[0]->Id ?>/<?=$uye_yorum_bilgi->Id?>">

											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="yorum">Yorum <span class="astk">*</span></label>
														<textarea class="form-control txt txt-review" id="yorum" name="yorum" rows="4" placeholder="Yorumunuzu yazınız" required><?=$uye_yorum_bilgi->yorum ?></textarea>
													</div><!-- /.form-group -->
													
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label for="exampleInputName">Puan <span class="astk">*</span></label>
														<select class="form-control" name="puan">
															<option value="5" <?php if($uye_yorum_bilgi->yorum=='5'){ echo "selected";}?>>5</option>
															<option value="4" <?php if($uye_yorum_bilgi->yorum=='4'){ echo "selected";}?>>4</option>
															<option value="3" <?php if($uye_yorum_bilgi->yorum=='3'){ echo "selected";}?>>3</option>
															<option value="2" <?php if($uye_yorum_bilgi->yorum=='2'){ echo "selected";}?>>2</option>
															<option value="1" <?php if($uye_yorum_bilgi->yorum=='1'){ echo "selected";}?>>1</option>
														</select>
													</div><!-- /.form-group -->
												</div>
											</div><!-- /.row -->

											<div class="action text-right">
												<input type="submit" class="btn btn-primary btn-upper" value="Yorumu Güncelle">
											</div><!-- /.action -->

										</form><!-- /.cnt-form -->
									</div><!-- /.form-container -->
								</div><!-- /.review-form -->

								<?php }
								}else{ ?>

								<span style="font-size: 14px; display: table; margin: auto; height: 100px; line-height: 100px; color: #575757;">
									Yorum yapabilmek için giriş yapınız!
								</span>

								<?php } ?>

							</div><!-- /.product-add-review -->

						</div><!-- /.product-tab -->
					</div><!-- /.tab-pane -->

				</div><!-- /.tab-content -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.product-tabs -->

	<!-- ============================================== KATEGORIDEKILER ============================================== -->
	<?php if (sizeof($kat_urunler)!=1){ ?>
	<section class="section featured-product">
		<h3 class="section-title"><?=$urun[0]->kategori_name ?> Kategorisindekiler</h3>
		<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

		<?php 
	        foreach ($kat_urunler as $rs){
	        	if ($urun[0]->Id != $rs->Id){
        ?>	

			<div class="item item-carousel">
				<div class="products">

					<div class="product">
						<div class="product-image">
							<div class="image">
								<a href="<?=base_url()?>product/detail/<?=$rs->Id ?>"><img  src="<?=base_url()?>uploads/products/<?=$rs->resim ?>" alt="<?=$rs->adi ?>"></a>
							</div><!-- /.image -->
						</div><!-- /.product-image -->

						<div class="product-info text-left">
							<h3 class="name"><a href="<?=base_url()?>product/detail/<?=$rs->Id ?>"><?=$rs->adi ?></a></h3>
							<div class="product-price">
								<span class="price"> <?=$rs->sfiyat ?> ₺ </span>
							</div><!-- /.product-price -->
						</div><!-- /.product-info -->
					</div><!-- /.product -->

				</div><!-- /.products -->
			</div><!-- /.item -->
			<?php }
			} ?>
		</div><!-- /.home-owl-carousel -->
	</section><!-- /.section -->
	<?php } ?>
	<!-- ============================================== KATEGORIDEKILER : END ============================================== -->

</div><!-- /.col -->