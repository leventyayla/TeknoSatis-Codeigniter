
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Mesaj Detayı</h2>
            </div>
            <div class="card">
                <div class="body table-responsive">
                    <b>Ad Soyad : </b><?=$detay[0]->adsoy ?><hr>
                    <b>E-Posta : </b><?=$detay[0]->email ?><hr>
                    <b>Telefon : </b><?=$detay[0]->tel ?><hr>
                    <b>Tarih : </b><?=$detay[0]->tarih ?><hr>
                    <b>IP Adresi : </b><?=$detay[0]->ip ?><hr>
                    <b>Mesaj : </b><?=$detay[0]->mesaj ?><hr>
                    <form method="post" action="<?=base_url()?>admin/messages/update/<?=$detay[0]->Id ?>">
                    <b>Admin Notu :</b><br><br>
                    <textarea name="not" rows="5" style="width:100%;"><?=$detay[0]->not ?></textarea>
                    <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Güncelle">
                    </form>
                </div>
            </div>
        </div>
    </section>
