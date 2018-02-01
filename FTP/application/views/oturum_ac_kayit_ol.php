<div class="sign-in-page">
	<div class="row">
		<!-- Sign-in -->			
		<div class="col-md-6 col-sm-6 sign-in">
			<h4 class="">Oturum Aç</h4>
			<p>
				<?php if ($this->session->flashdata("login_mesaj")) {
					echo "<b style='color: #c60000;'>".$this->session->flashdata("login_mesaj")."</b>";
				}else {
					echo "Oturum açmak için lütfen aşağıdaki alanları doldurunuz";
				} ?>
			</p>
			<form class="register-form outer-top-xs" role="form" method="post" action="<?=base_url()?>login_register/oturum_ac">
				<div class="form-group">
					<label class="info-title" for="login_email">E-Posta <span>*</span></label>
					<input type="email" name="login_email" class="form-control unicase-form-control text-input" id="login_email" required>
				</div>
				<div class="form-group">
					<label class="info-title" for="login_password">Şifre <span>*</span></label>
					<input type="password" name="login_password" class="form-control unicase-form-control text-input" id="login_password" required>
				</div>
				<div class="radio outer-xs">
					<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Oturum Aç</button>
					<a href="<?=base_url()?>login_register/sifremi_unuttum" class="forgot-password pull-right">Şifreni mi unuttun?</a>
				</div>
				
			</form>					
		</div>
		<!-- Sign-in -->

		<!-- create a new account -->
		<div class="col-md-6 col-sm-6 create-new-account">
			<h4 class="checkout-subtitle">Hesap Oluştur</h4>
			<p>
				<?php if ($this->session->flashdata("signup_mesaj")) {
					echo "<b style='color: #0c7600;'>".$this->session->flashdata("signup_mesaj")."</b>";
				}else {
					echo "Üye olmak için lütfen aşağıdaki alanları doldurunuz";
				} ?>
			</p>
			<form class="register-form outer-top-xs" role="form" method="post" action="<?=base_url()?>login_register/kayit_ol">
				<div class="form-group">
					<label class="info-title" for="email">E-Posta <span>*</span></label>
					<input type="email" name="email" class="form-control unicase-form-control text-input" id="email" required>
				</div>
				<div class="form-group">
					<label class="info-title" for="name">Ad <span>*</span></label>
					<input type="text" name="name" class="form-control unicase-form-control text-input" id="name" required>
				</div>
				<div class="form-group">
					<label class="info-title" for="surname">Soyad <span>*</span></label>
					<input type="text" name="surname" class="form-control unicase-form-control text-input" id="surname" required>
				</div>
				<div class="form-group">
					<label class="info-title" for="password">Şifre <span>*</span></label>
					<input type="password" name="password" class="form-control unicase-form-control text-input" id="password" required>
				</div>
				<div class="form-group">
					<label class="info-title" for="confirm_password">Şifre Doğrulama <span>*</span></label>
					<input type="password" name="confirm_password" class="form-control unicase-form-control text-input" id="confirm_password" required>
				</div>
				<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Kayıt Ol</button>
			</form>
		</div>		
	</div><!-- /.row -->
</div><!-- /.sigin-in-->

<script language='javascript' type='text/javascript'>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Şifreler eşleşmiyor!");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>