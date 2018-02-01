
<div class="terms-conditions-page">
	<div class="row">
		<div class="col-md-12">
			<h2 class="heading-title">Üye Bilgileri</h2>
			<span class="title-tag inner-top-ss">
				<?php if ($this->session->flashdata("mesaj")) {
					echo "<b style='color: #0c7600;'>".$this->session->flashdata("mesaj")."</b>";
				}else {
					echo "Aşağıdaki form aracılığı ile üye bilgilerinizi düzenleyebilirsiniz.<br>Şifrenizi değiştirmek istemiyorsanız şifre alanlarını <b>boş</b> bırakınız!";
				} ?>
			</span>
			<form class="register-form outer-top-xs" role="form" method="post" action="<?=base_url()?>user/update_user/<?=$this->session->uye_oturum["id"]?>">
				<div class="form-group">
					<label class="info-title" for="name">Ad </label>
					<input type="text" class="form-control unicase-form-control text-input" id="name" name="name" value="<?=$rs['ad']?>" required>
				</div>
				<div class="form-group">
					<label class="info-title" for="surname">Soyad </label>
					<input type="text" class="form-control unicase-form-control text-input" id="surname" name="surname" value="<?=$rs['soyad']?>" required>
				</div>
				<div class="form-group">
					<label class="info-title" for="email">E-Posta</label>
					<input type="email" class="form-control unicase-form-control text-input" id="email" name="email" value="<?=$rs['eposta']?>" required>
				</div>
				<div class="form-group">
					<label class="info-title" for="tel">Telefon</label>
					<input type="text" class="form-control unicase-form-control text-input" id="tel" name="tel" value="<?=$rs['telefon']?>">
				</div>
				<div class="form-group">
					<label class="info-title" for="address">Adres</label>
					<input type="text" class="form-control unicase-form-control text-input" id="address" name="address" value="<?=$rs['adres']?>">
				</div>
				<div class="form-group">
					<label class="info-title" for="city">Şehir</label>
					<input type="text" class="form-control unicase-form-control text-input" id="city" name="city" value="<?=$rs['sehir']?>">
				</div>
				<div class="form-group">
					<label class="info-title" for="sex">Cinsiyet</label>
					<select class="form-control unicase-form-control text-input" name="sex" id="sex">
                        <option value="e" <?php if($rs['cinsiyet']=='e'){ echo "selected";}?>>Erkek</option>
                        <option value="k" <?php if($rs['cinsiyet']=='k'){ echo "selected";}?>>Kadın</option>
                    </select>
				</div>
				<div class="form-group">
					<label class="info-title" for="password">Şifre</label>
					<input type="password" class="form-control unicase-form-control text-input" id="password" name="password" >
				</div>
				<div class="form-group">
					<label class="info-title" for="confirm_password">Şifre Doğrulama</label>
					<input type="password" class="form-control unicase-form-control text-input" id="confirm_password" name="confirm_password" >
				</div>
				<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Güncelle</button>
			</form>	
		</div>    
	</div>
</div>

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