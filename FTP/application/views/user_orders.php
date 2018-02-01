
<div class="terms-conditions-page">
	<div class="row">
		<div class="col-md-12">
			<h2 class="heading-title">Siparişlerim</h2>
			<span>
				<?php if ($this->session->flashdata("siparis_onay")) {
					echo "<b style='color: #0c7600;'>".$this->session->flashdata("siparis_onay")."</b>";
				}else if ($siparisler){
					echo "Siparişlerinizin durumunu aşağıdan görebilirsiniz";
				} ?>
			</span><br><br>

			<?php if ($siparisler){ ?>

			<table class="table">
				<thead>
					<tr>
						<th class="cart-description item">Resim</th>
						<th class="cart-romove item">Ürün Adı</th>
						<th class="cart-qty item">Miktar</th>
						<th class="cart-total last-item">Fiyat</th>
						<th class="cart-total last-item">Durumu</th>
						<th class="cart-total last-item">Onay ve Sipariş Kodu</th>
					</tr>
				</thead><!-- /thead -->
				<tbody>

					<?php 
							foreach ($siparisler as $rs){
					?>

					<tr>
						<td class="cart-image" style="padding: 10px;border-bottom: 2px solid #f5f5f5;">
							<a class="entry-thumbnail" href="<?=base_url()?>product/detail/<?=$rs->urun_id ?>">
								<img src="<?=base_url()?>uploads/products/<?=$rs->resim ?>" height="50" alt="<?=$rs->adi ?>">
							</a>
						</td>
						<td class="cart-product-name-info" style="padding: 10px;border-bottom: 2px solid #f5f5f5;">
							<h5 class='cart-product-description'><a href="<?=base_url()?>product/detail/<?=$rs->urun_id ?>"><?=$rs->adi ?></a></h5>
						</td>
						<td class="cart-product-quantity" style="padding: 10px;border-bottom: 2px solid #f5f5f5;">
							<?=$rs->miktar ?>
						</td>
						<td class="cart-product-sub-total" style="padding: 10px;border-bottom: 2px solid #f5f5f5;">
							<span class="cart-sub-total-price"><?=$rs->fiyat*$rs->miktar ?> ₺</span>
						</td>
						<td class="cart-product-quantity" style="padding: 10px;border-bottom: 2px solid #f5f5f5;">
							<?=$rs->durum ?>
						</td>
						<td class="cart-product-quantity" style="padding: 10px;border-bottom: 2px solid #f5f5f5;">
							<?php if($rs->durum=='Kargoya Verildi'){ ?>
							<a href="<?=base_url()?>user/confirm_order/<?=$rs->Id ?>">Siparişi Onayla</a><br>Sipariş No: <?=$rs->Id ?>
							<?php }else { ?>
							Sipariş No: <?=$rs->Id ?>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
					
				</tbody><!-- /tbody -->
			</table><!-- /table -->
			<?php }else { ?>
			<span style="font-size: 16px; display: table; margin: auto; height: 200px; line-height: 200px; color: #575757;">
				Geçmiş siparişiniz bulunmamaktadır!
			</span>
			<?php } ?>
		</div>    
	</div>
</div>
