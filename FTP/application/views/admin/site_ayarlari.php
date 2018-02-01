
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Site Ayarları</h2>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                        	<form class="form-horizontal" action="<?=base_url()?>admin/settings/edit" method="post">
                        		<!-- Nav tabs -->
                        		<ul class="nav nav-tabs tab-nav-right" role="tablist">
                        			<li role="presentation" class="active"><a href="#genel" data-toggle="tab">Genel</a></li>
                        			<li role="presentation"><a href="#e-posta" data-toggle="tab">E-Posta</a></li>
                        			<li role="presentation"><a href="#sosyal" data-toggle="tab">Sosyal</a></li>
                        			<li role="presentation"><a href="#hakkimizda" data-toggle="tab">Hakkımızda</a></li>
                                    <li role="presentation"><a href="#iletisim" data-toggle="tab">İletişim</a></li>
                        			<li role="presentation"><a href="#harita_html" data-toggle="tab">Harita HTML</a></li>
                        		</ul>
                            	<!-- Tab panes -->
                            	<div class="tab-content">
                            		<div role="tabpanel" class="tab-pane fade in active" id="genel">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Adı:</label>
                                                    <input type="text" name="adi" value="<?=$ayarlar->adi?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Anahtar Kelimeler:</label>
                                                    <input type="text" name="keywords" value="<?=$ayarlar->keywords?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                            			
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Açıklama:</label>
                                                    <input type="text" name="description" value="<?=$ayarlar->description?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>E-Posta:</label>
                                                    <input type="email" name="email" value="<?=$ayarlar->email?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Adres:</label>
                                                    <input type="text" name="adres" value="<?=$ayarlar->adres?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Telefon:</label>
                                                    <input type="text" name="tel" value="<?=$ayarlar->tel?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Fax:</label>
                                                    <input type="text" name="fax" value="<?=$ayarlar->fax?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Şehir:</label>
                                                    <input type="text" name="sehir" value="<?=$ayarlar->sehir?>" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                            			
                            		</div>
                            		<div role="tabpanel" class="tab-pane fade" id="e-posta">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>SMTP Server:</label>
                                                    <input type="text" name="smtpserver" value="<?=$ayarlar->smtpserver?>" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                            			<div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>SMTP Port:</label>
                                                    <input type="text" name="smtpport" value="<?=$ayarlar->smtpport?>" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                            			
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>SMTP E-Posta:</label>
                                                    <input type="text" name="smtpemail" value="<?=$ayarlar->smtpemail?>" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                            			<div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Şifre:</label>
                                                    <input type="password" name="password" value="<?=$ayarlar->password?>" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                            		</div>
                            		<div role="tabpanel" class="tab-pane fade" id="sosyal">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Facebook:</label>
                                                    <input type="text" name="facebook" value="<?=$ayarlar->facebook?>" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                            			<div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>Twitter:</label>
                                                    <input type="text" name="twitter" value="<?=$ayarlar->twitter?>" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                            			
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label>YouTube:</label>
                                                    <input type="text" name="youtube" value="<?=$ayarlar->youtube?>" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                            		</div>
                            		<div role="tabpanel" class="tab-pane fade" id="hakkimizda">

                            			<textarea id="ck1" name="hakkimizda"><?=$ayarlar->hakkimizda?></textarea>

                            		</div>
                            		<div role="tabpanel" class="tab-pane fade" id="iletisim">
                            			
                            			<textarea id="ck2" name="iletisim"><?=$ayarlar->iletisim?></textarea>

                            		</div>
                                    <div role="tabpanel" class="tab-pane fade" id="harita_html">
                                        
                                        <textarea rows="7" style="width: 100%" name="harita_html"><?=$ayarlar->harita_html?></textarea>

                                    </div>
                            		<div class="row">
                            			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            				<input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Kaydet">
                            			</div>
                            		</div>
                            	</div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Example Tab -->
        </div>
    </section>

    <!-- Ckeditor -->
    <script src="<?=base_url()?>assets/admin/plugins/ckeditor/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'ck1' );
            CKEDITOR.config.height = 250;

            CKEDITOR.replace( 'ck2' );
            CKEDITOR.config.height = 250;
    </script>
