<div class="contact-page">
	<div class="row">
		<div class="col-md-9 contact-form">
			<div class="col-md-12 contact-title">
				<h4>Harita</h4>
			</div>
			<?=$veri[0]->harita_html ?>
		</div>
		<div class="col-md-3 contact-info">
			<div class="contact-title">
				<h4>İletişim</h4>
			</div>
			<div class="clearfix address">
				<span class="contact-i"><i class="fa fa-map-marker"></i></span>
				<span class="contact-span"><?=$veri[0]->adres ?><br><?=$veri[0]->sehir ?></span>
			</div>
			<div class="clearfix phone-no">
				<span class="contact-i"><i class="fa fa-mobile"></i></span>
				<span class="contact-span">Tel : <?=$veri[0]->tel ?><br>Fax : <?=$veri[0]->fax ?></span>
			</div>
			<div class="clearfix email">
				<span class="contact-i"><i class="fa fa-envelope"></i></span>
				<span class="contact-span"><a href="mailto:<?=$veri[0]->email ?>"><?=$veri[0]->email ?></a></span>
			</div>
		</div>			
	</div><!-- /.contact-page -->
</div>