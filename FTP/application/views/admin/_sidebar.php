<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?=base_url()?>uploads/user_profile/<?=$this->session->admin_oturum["resim"]?>" width="48" height="48" alt="Kullanıcı" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$this->session->admin_oturum["adsoy"]?></div>
                    <div class="email"><?=$this->session->admin_oturum["eposta"]?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profil</a></li> -->
                            <li><a href="<?=base_url()?>" target="_blank"><i class="material-icons">web</i>Siteyi Aç</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?=base_url()?>admin/login/oturum_kapat"><i class="material-icons">input</i>Çıkış Yap</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                	<li <?php if($aktif_sayfa == 'ana_sayfa'){ ?>class="active"<?php } ?>>
                        <a href="<?=base_url()?>admin">
                            <i class="material-icons">home</i>
                            <span>Ana Sayfa</span>
                        </a>
                    </li>
                    <li <?php if($aktif_sayfa == 'uyeler'){ ?>class="active"<?php } ?>>
                        <a href="<?=base_url()?>admin/users">
                            <i class="material-icons">person</i>
                            <span>Üyeler</span>
                        </a>
                    </li>
                    <li <?php if($aktif_sayfa == 'urunler'){ ?>class="active"<?php } ?>>
                        <a href="<?=base_url()?>admin/products">
                            <i class="material-icons">list</i>
                            <span>Ürünler</span>
                        </a>
                    </li>
                    <li <?php if($aktif_sayfa == 'kategoriler'){ ?>class="active"<?php } ?>>
                        <a href="<?=base_url()?>admin/categories">
                            <i class="material-icons">bookmark</i>
                            <span>Kategoriler</span>
                        </a>
                    </li>
                    <li <?php if($aktif_sayfa == 'siparisler'){ ?>class="active"<?php } ?>>
                        <a href="<?=base_url()?>admin/orders">
                            <i class="material-icons">shopping_cart</i>
                            <span>Siparişler</span>
                        </a>
                    </li>
					<li <?php if($aktif_sayfa == 'yorumlar'){ ?>class="active"<?php } ?>>
                        <a href="<?=base_url()?>admin/comments">
                            <i class="material-icons">comment</i>
                            <span>Yorumlar</span>
                        </a>
                    </li>
                    <li <?php if($aktif_sayfa == 'slider'){ ?>class="active"<?php } ?>>
                        <a href="<?=base_url()?>admin/slider">
                            <i class="material-icons">chrome_reader_mode</i>
                            <span>Slider</span>
                        </a>
                    </li>
                    <li <?php if($aktif_sayfa == 'mesajlar'){ ?>class="active"<?php } ?>>
                        <a href="<?=base_url()?>admin/messages">
                            <i class="material-icons">email</i>
                            <span>İletişim Mesajları</span>
                        </a>
                    </li>
					<li <?php if($aktif_sayfa == 'site_ayarlari'){ ?>class="active"<?php } ?>>
                        <a href="<?=base_url()?>admin/settings">
                            <i class="material-icons">settings</i>
                            <span>Site Ayarları</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="https://leventyayla.com.tr" target="_blank">Levent Yayla</a>.
                </div>
                <div class="version">
                    
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>