
<div class="terms-conditions-page">
	<div class="row">
		<div class="col-md-12">
			<h2 class="heading-title">Siparişlerim</h2>
			<span>
				<?php if ($this->session->flashdata("yorum_sil")) {
					echo "<b style='color: #0c7600;'>".$this->session->flashdata("yorum_sil")."</b>";
				}else if ($yorumlar){
					echo "Yorumlarınızı aşağıdan görebilirsiniz";
				} ?>
			</span><br><br>

			<?php if ($yorumlar){ ?>

			<table class="table">
				<thead>
					<tr>
						<th class="cart-description item">Resim</th>
						<th class="cart-romove item">Ürün Adı</th>
						<th class="cart-qty item">Puan</th>
						<th class="cart-total last-item">Yorum</th>
						<th class="cart-total last-item">Tarih</th>
						<th class="cart-total last-item">Sil</th>
					</tr>
				</thead><!-- /thead -->
				<tbody>

					<?php 
							foreach ($yorumlar as $rs){
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
							<?=$rs->puan ?>
						</td>
						<td class="cart-product-sub-total" style="padding: 10px;border-bottom: 2px solid #f5f5f5;">
							<span class="cart-sub-total-price"><?=$rs->yorum ?></span>
						</td>
						<td class="cart-product-quantity" style="padding: 10px;border-bottom: 2px solid #f5f5f5;">
							<?=$rs->tarih ?>
						</td>
						<td class="cart-product-name-info" style="padding: 10px;border-bottom: 2px solid #f5f5f5;">
							<a href="<?=base_url()?>user/delete_comment/<?=$rs->Id ?>" onclick="return confirm('Yorumunuzu silmek istediğinize emin misiniz?')">Sil</a>
						</td>
					</tr>
					<?php } ?>
					
				</tbody><!-- /tbody -->
			</table><!-- /table -->
			<?php }else { ?>
			<span style="font-size: 16px; display: table; margin: auto; height: 200px; line-height: 200px; color: #575757;">
				Herhangi bir yorumunuz bulunmamaktadır!
			</span>
			<?php } ?>
		</div>    
	</div>
</div>
