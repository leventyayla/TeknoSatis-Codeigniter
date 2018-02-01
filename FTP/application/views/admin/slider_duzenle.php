
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Sliderlar</h2>
            </div>
            <div class="card">
                        <div class="header">
                            <h2>
                                Slider Düzenle
                            </h2>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" action="<?=base_url()?>admin/slider/edit_commit/<?=$rs['id']?>" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Başlık :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="baslik" name="baslik" ><?=$rs['baslik']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Büyük Başlık :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="buyuk_baslik" name="buyuk_baslik" ><?=$rs['buyuk_baslik']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Açıklama :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="aciklama" name="aciklama" ><?=$rs['aciklama']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Buton Metni :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="buton_text" value="<?=$rs['buton_text']?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Buton veya Slider Linki :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="buton_link" value="<?=$rs['buton_link']?>" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Durum :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick" name="durum">
                                                <option value="Aktif" <?php if($rs['durum']=='Aktif'){ echo "selected";}?>>Aktif</option>
                                                <option value="Pasif" <?php if($rs['durum']=='Pasif'){ echo "selected";}?>>Pasif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Güncelle">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </section>
    <!-- Ckeditor -->
    <script src="<?=base_url()?>assets/admin/plugins/ckeditor/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'baslik' );
            CKEDITOR.config.height = 100;

            CKEDITOR.replace( 'buyuk_baslik' );
            CKEDITOR.config.height = 100;

            CKEDITOR.replace( 'aciklama' );
            CKEDITOR.config.height = 100;
    </script>
