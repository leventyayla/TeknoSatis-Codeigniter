
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Yorum Detayı</h2>
            </div>
            <div class="card">
                <div class="body table-responsive">
                    <b>Ürün Adı : </b><?=$detay[0]->adi ?><hr>
                    <b>Kullanıcı : </b><?=$detay[0]->ad.' '.$detay[0]->soyad ?><hr>
                    <b>E-Posta : </b><?=$detay[0]->eposta ?><hr>
                    <b>Tarih : </b><?=$detay[0]->tarih ?><hr>
                    <b>Puan : </b><?=$detay[0]->puan ?><hr>
                    <b>Yorum : </b><?=$detay[0]->yorum ?><hr>
                    <form method="post" action="<?=base_url()?>admin/comments/update/<?=$detay[0]->Id ?>">
                    <div class="form-group"><b>Durumu :</b><br><br>
                        <select class="form-control show-tick" name="durum">
                            <option value="Aktif" <?php if($detay[0]->durum=='Aktif'){ echo "selected";}?>>Aktif</option>
                            <option value="Pasif" <?php if($detay[0]->durum=='Pasif'){ echo "selected";}?>>Pasif</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Güncelle">
                    </form>
                </div>
            </div>
        </div>
    </section>
