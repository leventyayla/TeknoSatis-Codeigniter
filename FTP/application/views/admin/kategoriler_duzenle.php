
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Kategoriler</h2>
            </div>
            <div class="card">
                        <div class="header">
                            <h2>
                                Kategori Düzenle
                                <small>Lütfen tüm alanları eksiksiz doldurunuz.</small>
                            </h2>
                        </div>
                        <div class="body">

                            <form class="form-horizontal" action="<?=base_url()?>admin/categories/edit_commit/<?=$veriler[0]->Id?>" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Adı :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="adi" class="form-control" value="<?=$veriler[0]->adi?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Üst Kategori :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <select class="form-control show-tick" name="parent_id">
                                                <option value="0">Yok (Kök Kategori)</option>
                                            <?php foreach ($kategoriler as $data) { ?>
                                                <option value="<?=$data->Id?>" <?php if($veriler[0]->parent_id==$data->Id){ echo "selected";}?>><?=$data->adi?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Anahtar Kelimeler :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="anahtar_kelime" class="form-control" value="<?=$veriler[0]->anahtar_kelime?>" required>
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
                                                <option value="Aktif" <?php if($veriler[0]->durum=='Aktif'){ echo "selected";}?>>Aktif</option>
                                                <option value="Pasif" <?php if($veriler[0]->durum=='Pasif'){ echo "selected";}?>>Pasif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Açıklama :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="aciklama" class="form-control" value="<?=$veriler[0]->aciklama?>" required>
                                            </div>
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
