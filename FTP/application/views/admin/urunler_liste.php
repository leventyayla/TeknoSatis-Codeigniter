
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Ürünler</h2>
            </div>
            <div class="card">
                        <div class="header">
                            <h2>
                                Ürün Listesi
                                <small>Üç nokta menüsü aracılığı ile ürün ekleme işlemini gerçekleştirebilirsiniz.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?=base_url()?>admin/products/add/" class=" waves-effect waves-block">Ürün Ekle</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>RESİM</th>
                                        <th>ADI</th>
                                        <th>KATEGORİ</th>
                                        <th>ALIŞ FİYATI</th>
                                        <th>SATIŞ FİYATI</th>
                                        <th>STOK</th>
                                        <th>SİPARİŞ MİKTARI</th>
                                        <th>GALERİ</th>
                                        <th>DURUM</th>
                                        <th>TARİH</th>
                                        <th>DÜZENLE</th>
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
                                        <td><?php if($rs->resim){ ?>
                                            <a href="<?=base_url().'admin/products/add_pic/'.$rs->Id?>">
                                                <img src="<?=base_url()?>uploads/products/<?=$rs->resim?>" height="50">
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn bg-teal waves-effect" href="<?=base_url().'admin/products/add_pic/'.$rs->Id?>" >
                                                Resim Ekle
                                            </a>
                                        <?php } ?>
                                        </td>
                                        <td><?=$rs->adi ?></td>
                                        <td><?=$rs->kategori_name ?></td>
                                        <td><?=$rs->afiyat ?></td>
                                        <td><?=$rs->sfiyat ?></td>
                                        <td><?=$rs->stok ?></td>
                                        <td><?=$rs->siparis_sayisi ?></td>
                                        <td>
                                            <a class="btn bg-teal waves-effect" href="<?=base_url().'admin/products/add_gallery/'.$rs->Id?>" >
                                                Galeri
                                            </a>
                                        </td>
                                        <td><?=$rs->durum ?></td>
                                        <td><?=$rs->tarih ?></td>
                                        <td>
                                        	<a class="btn bg-teal waves-effect" href="<?=base_url().'admin/products/edit/'.$rs->Id?>" >
                                        		Düzenle
                                        	</a>
                            			</td>
                                        <td>
                                        	<a class="btn bg-teal waves-effect" href="<?=base_url().'admin/products/delete/'.$rs->Id?>" onclick="return confirm('Kullanıcıyı silmek istediğinize emin misiniz?')">
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
