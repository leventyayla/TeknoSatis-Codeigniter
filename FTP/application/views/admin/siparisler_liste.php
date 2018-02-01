
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Siparişler</h2>
            </div>
            <div class="card">
                        <div class="header">
                            <h2>
                                Sipariş Listesi
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    	<th>#</th>
                                        <th>RESİM</th>
                                        <th>ÜRÜN ADI</th>
                                        <th>ÜYE</th>
                                        <th>TARİH</th>
                                        <th>MİKTAR</th>
                                        <th>FİYAT</th>
                                        <th>DURUM</th>
                                        <th>GÖRÜNTÜLE</th>
                                        <th>SİL</th>
                                    </tr>
                                </thead>
                                <tbody>

                                	<?php 
                                	$say = 0;
                                	foreach ($siparisler as $rs){
                                		$say++;

                                	?>

                                    <tr>
                                        <th scope="row"><?=$say;?></th>
                                        <td><?php if($rs->resim){ ?>
                                            <img src="<?=base_url()?>uploads/products/<?=$rs->resim?>" height="50">
                                        <?php } else { echo "Resim Yok"; } ?>
                                        </td>
                                        <td><?=$rs->adi ?></td>
                                        <td><?=$rs->ad.' '.$rs->soyad ?></td>
                                        <td><?=$rs->tarih ?></td>
                                        <td><?=$rs->miktar ?></td>
                                        <td><?=$rs->miktar*$rs->fiyat ?> ₺</td>
                                        <td><?=$rs->durum ?></td>
                                        <td>
                                            <a class="btn bg-teal waves-effect" href="<?=base_url().'admin/orders/detail/'.$rs->Id?>" >
                                                Görüntüle
                                            </a>
                                        </td>
                                        <td>
                                        	<a class="btn bg-teal waves-effect" href="<?=base_url().'admin/orders/delete/'.$rs->Id?>" onclick="return confirm('Siparişi silmek istediğinize emin misiniz?')">
                                        		Sil
                                        	</a>
                                        </td>
                                    </tr>

                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
    </section>
