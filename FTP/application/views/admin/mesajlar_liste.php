
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Mesajlar</h2>
            </div>
            <div class="card">
                        <div class="header">
                            <h2>
                                Mesaj Listesi
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    	<th>#</th>
                                        <th>AD SOYAD</th>
                                        <th>E-POSTA</th>
                                        <th>TELEFON</th>
                                        <th>TARİH</th>
                                        <th>IP ADRESİ</th>
                                        <th>DURUM</th>
                                        <th>OKU</th>
                                        <th>SİL</th>
                                    </tr>
                                </thead>
                                <tbody>

                                	<?php 
                                	$say = 0;
                                	foreach ($veriler as $rs){
                                		$say++;

                                	?>

                                    <tr>
                                        <th scope="row"><?=$say;?></th>
                                        <td><?=$rs->adsoy ?></td>
                                        <td><?=$rs->email ?></td>
                                        <td><?=$rs->tel ?></td>
                                        <td><?=$rs->tarih ?></td>
                                        <td><?=$rs->ip ?></td>
                                        <td><?php if($rs->okundu == "0"){ echo "<b>Okunmadı</b>"; }else { echo "Okundu"; } ?></td>
                                        <td>
                                            <a class="btn bg-teal waves-effect" href="<?=base_url().'admin/messages/read/'.$rs->Id?>" >
                                                Oku
                                            </a>
                                        </td>
                                        <td>
                                        	<a class="btn bg-teal waves-effect" href="<?=base_url().'admin/messages/delete/'.$rs->Id?>" onclick="return confirm('Mesajı silmek istediğinize emin misiniz?')">
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
