
<div class="col-md-9">
	<div class="terms-conditions-page">
		<div class="row">
			<div class="col-md-12 terms-conditions">
				<h2 class="heading-title">Şifremi Unuttum</h2>
				<span class="title-tag inner-top-ss">
					<?php if ($this->session->flashdata("mesaj")) {
						echo "<b style='color: #0c7600;'>".$this->session->flashdata("mesaj")."</b>";
					}else if ($this->session->flashdata("hata")){
						echo "<b style='color: #c60000;'>".$this->session->flashdata("hata")."</b>";
					}else{
						echo "Hesabınızın e-posta adresini giriniz";
					} ?>
				</span>
				<form class="register-form outer-top-xs" role="form" method="post" action="<?=base_url()?>login_register/sifre_gonder">
					<div class="form-group">
						<label class="info-title" for="eposta">E-Posta Adresi</label>
						<input type="email" class="form-control unicase-form-control text-input" name="eposta" id="eposta" required>
					</div>
					<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Gönder</button>
				</form>	
			</div>     
		</div>
	</div>
</div>