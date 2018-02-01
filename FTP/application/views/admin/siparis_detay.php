
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Sipariş Detayı</h2>
            </div>
            <div class="card">
                <div class="body table-responsive">
                    <b>Ürün Adı : </b><?=$siparis->adi ?><hr>
                    <b>Siparişi Veren Kullanıcı : </b><?=$siparis->ad.' '.$siparis->soyad ?><hr>
                    <b>Tarih : </b><?=$siparis->tarih ?><hr>
                    <b>Sipariş Miktarı : </b><?=$siparis->miktar ?><hr>
                    <b>Sipariş Tutarı : </b><?=$siparis->miktar*$siparis->sfiyat ?> ₺<hr>
                    <form method="post" action="<?=base_url()?>admin/orders/update/<?=$siparis->Id ?>">
                    <div class="form-group"><b>Sipariş Durumu :</b><br><br>
                        <select class="form-control show-tick" name="durum">
                            <?php if($siparis->durum !='Tamamlandı'){ ?>
                            <option value="Onay Bekliyor" <?php if($siparis->durum=='Onay Bekliyor'){ echo "selected";}?>>Onay Bekliyor</option>
                            <option value="Onaylandı" <?php if($siparis->durum=='Onaylandı'){ echo "selected";}?>>Onaylandı</option>
                            <option value="Kargoya Verildi" <?php if($siparis->durum=='Kargoya Verildi'){ echo "selected";}?>>Kargoya Verildi</option>
                            <?php }else{ ?>
                            <option value="Tamamlandı" selected>Tamamlandı</option>
                            <?php } ?>
                        </select>
                    </div>
                    <b>Admin Notu :</b><br><br>
                    <textarea name="not" rows="5" style="width:100%;"><?=$siparis->not ?></textarea>
                    <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Güncelle">
                    </form>
                </div>
            </div>
        </div>
    </section>
