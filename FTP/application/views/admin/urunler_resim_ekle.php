
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Ürün Resmi Ekle</h2>
            </div>
            <div class="card">
                        <div class="header">
                            <h2>Resim Seçiniz</h2>
                        </div>
                        <div class="body">

                            <form action="<?=base_url().'admin/products/add_pic_commit/'.$id ?>" method="post" enctype="multipart/form-data">
                                Yüklenecek resim <b>gif, jpg, png</b> formatlarında, genişlik veya yüksekliği <b>max 1024 px</b> ve dosya boyutu <b>max 2 MB</b> olmalıdır!<br><br>
                                <input type="file" name="resim" required><br>
                                <input type="submit" class="btn bg-teal waves-effect" value="Resmi Yükle">
                            </form>

                            <hr>

                            <?php if ($resim) { ?>
                            Mevcut Resim:<br>

                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?=base_url()?>uploads/products/<?=$resim?>">
                                        <img class="img-responsive thumbnail" src="<?=base_url()?>uploads/products/<?=$resim?>">
                                    </a>
                                </div>
                            </div>
                                
                            <?php }else { ?>
                            Ürüne ait yüklenmiş resim yok!
                            <?php } ?>
                        </div>
                    </div>
        </div>
    </section>
