<div class="shopping-cart">
	<div class="shopping-cart-table ">
		<div class="table-responsive">
			<?php 
					$toplam = 0;
					if ($urunler){ ?>
			<table class="table">
				<thead>
					<tr>
						<th class="cart-romove item">Sepetten Çıkar</th>
						<th class="cart-description item">Resim</th>
						<th class="cart-product-name item">Ürün Adı</th>
						<th class="cart-qty item">Miktar</th>
						<th class="cart-total last-item">Fiyat</th>
					</tr>
				</thead><!-- /thead -->
				<tbody>

					<?php 
							foreach ($urunler as $rs){
							$fiyat = $rs->sfiyat*$rs->miktar;
							$toplam += $fiyat;
					?>

					<tr>
						<td class="romove-item"><a href="<?=base_url()?>user/sepetten_cikar/<?=$rs->Id ?>" title="Çıkar" class="icon"><i class="fa fa-trash-o"></i></a></td>
						<td class="cart-image">
							<a class="entry-thumbnail" href="<?=base_url()?>product/detail/<?=$rs->urun_id ?>">
								<img src="<?=base_url()?>uploads/products/<?=$rs->resim ?>" alt="<?=$rs->adi ?>">
							</a>
						</td>
						<td class="cart-product-name-info">
							<h4 class='cart-product-description'><a href="<?=base_url()?>product/detail/<?=$rs->urun_id ?>"><?=$rs->adi ?></a></h4>
						</td>
						<td class="cart-product-quantity"><?=$rs->miktar ?></td>
						<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?=$fiyat ?> ₺</span></td>
					</tr>
					<?php } ?>
					
				</tbody><!-- /tbody -->
				<tfoot>
					<tr>
						<td colspan="7">
							<div class="shopping-cart-btn">
								<span class="">
									<a href="<?=base_url()?>user/sepet_tamamla" class="btn btn-upper btn-primary outer-left-xs">Alışverişi Tamamla</a>
									<span class="pull-right outer-right-xs" style="font-weight: bold;font-size: 16px;color: #0c7600">Toplam : <?=$toplam ?> ₺</span>
								</span>
							</div><!-- /.shopping-cart-btn -->
						</td>
					</tr>
				</tfoot>
			</table><!-- /table -->
			<?php }else { ?>
			<span style="font-size: 20px; display: table; margin: auto; height: 250px; line-height: 250px; color: #575757;">
				Sepetinizde ürün yok!
			</span>
			<?php } ?>
		</div>
	</div><!-- /.shopping-cart-table -->				
			
</div><!-- /.shopping-cart -->