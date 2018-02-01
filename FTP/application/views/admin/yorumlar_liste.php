
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Yorumlar</h2>
            </div>
            <div class="card">
                        <div class="header">
                            <h2>
                                Yorum Listesi
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>RESİM</th>
                                    	<th>ÜRÜN</th>
                                        <th>AD SOYAD</th>
                                        <th>E-POSTA</th>
                                        <th>PUAN</th>
                                        <th>DURUM</th>
                                        <th>TARİH</th>
                                        <th>OKU</th>
                                        <th>SİL</th>
                                    </tr>
                                </thead>
                                <tbody>

                                	<?php 
                                	$say = 0;
                                	foreach ($yorumlar as $rs){
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
                                        <td><?=$rs->eposta ?></td>
                                        <td><?=$rs->puan ?></td>
                                        <td><?=$rs->durum ?></td>
                                        <td><?=$rs->tarih ?></td>
                                        <td>
                                            <a class="btn bg-teal waves-effect" href="<?=base_url().'admin/comments/read/'.$rs->Id?>" >
                                                Oku
                                            </a>
                                        </td>
                                        <td>
                                        	<a class="btn bg-teal waves-effect" href="<?=base_url().'admin/comments/delete/'.$rs->Id?>" onclick="return confirm('Yorumu silmek istediğinize emin misiniz?')">
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
