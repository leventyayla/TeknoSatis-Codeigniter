
<div class="col-md-9">
	<div class="terms-conditions-page">
		<div class="row">
			<div class="col-md-12">
				<h2 class="heading-title">Bize Yazın</h2>
				<span class="title-tag inner-top-ss">
					<?php if ($this->session->flashdata("mesaj")) {
						echo "<b style='color: #0c7600;'>".$this->session->flashdata("mesaj")."</b>";
					}else {
						echo "Lütfen aşağıdaki form aracılığı ile bize mesajınızı iletiniz.";
					} ?>
				</span>
				<form class="register-form outer-top-xs" role="form" method="post" action="<?=base_url()?>home/mesaj_kaydet">
					<div class="form-group">
						<label class="info-title" for="name">Ad Soyad</label>
						<input type="text" class="form-control unicase-form-control text-input" id="name" name="name" required>
					</div>
					<div class="form-group">
						<label class="info-title" for="email">E-Posta</label>
						<input type="email" class="form-control unicase-form-control text-input" id="email" name="email" required>
					</div>
					<div class="form-group">
						<label class="info-title" for="tel">Telefon</label>
						<input type="text" class="form-control unicase-form-control text-input" id="tel" name="tel" >
					</div>
					<div class="form-group">
						<label class="info-title" for="mesaj">Mesaj</label>
						<textarea name="mesaj" class="form-control unicase-form-control text-input" rows="10" required></textarea>
					</div>
					<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Gönder</button>
				</form>	
			</div>    
		</div>
	</div>
</div>