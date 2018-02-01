
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Ürün Galeri Resmi Ekle</h2>
            </div>
            <div class="card">
                        <div class="header">
                            <h2>Resim Seçiniz</h2>
                        </div>
                        <div class="body">

                            <form action="<?=base_url().'admin/products/add_gallery_commit/'.$id ?>" method="post" enctype="multipart/form-data">
                                Yüklenecek resim <b>gif, jpg, png</b> formatlarında, genişlik veya yüksekliği <b>max 1024 px</b> ve dosya boyutu <b>max 2 MB</b> olmalıdır!<br><br>
                                <input type="file" name="resim" required><br>
                                <input type="submit" class="btn bg-teal waves-effect" value="Resmi Yükle">
                            </form>

                            <hr>

                            Mevcut Galeri Resimleri:<br><br>
                            <div id="aniimated-thumbnials" class="list-unstyled clearfix">

                            <?php 
                                if (isset($veriler) && !empty($veriler)) { 
                                    foreach ($veriler as $rs){ ?>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 thumbnail">
                                    <a href="<?=base_url()?>uploads/gallery/<?=$rs->resim ?>">
                                        <img class="img-responsive" src="<?=base_url()?>uploads/gallery/<?=$rs->resim ?>"><br>
                                    </a>
                                    <input class="btn bg-teal waves-effect" style="width: 100%;margin-top: -20px;" type="button" value="Sil" onclick="if (confirm('Resmi silmek istediğinize emin misiniz?')) { window.location.href='<?=base_url().'admin/products/delete_gallery/'.$rs->Id.'/'.$rs->urun_id?>';}" />
                                </div>
                            
                            <?php 
                                    }
                                } else { 
                                    echo "Ürüne ait yüklenmiş resim yok!";
                            } ?>
                            </div>
                        </div>
                    </div>
        </div>
    </section>
