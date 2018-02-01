
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Kategoriler</h2>
            </div>
            <div class="card">
                        <div class="header">
                            <h2>
                                Kategori Listesi
                                <small>Üç nokta menüsü aracılığı ile kategori ekleme işlemini gerçekleştirebilirsiniz.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?=base_url()?>admin/categories/add/" class=" waves-effect waves-block">Kategori Ekle</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    	<th>#</th>
                                        <th>ÜST KATEGORİ</th>
                                        <th>AD</th>
                                        <th>ÜRÜN SAYISI</th>
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
                                        <td>
                                            <?php if ($rs->parent_id==0){echo "-";}else {echo $rs->ustkategori;} ?>
                                        </td>
                                        <td><?=$rs->adi ?></td>
                                        <td><?=$rs->urun_sayisi ?></td>
                                        <td><?=$rs->durum ?></td>
                                        <td><?=$rs->tarih ?></td>
                                        <td>
                                        	<a class="btn bg-teal waves-effect" href="<?=base_url().'admin/categories/edit/'.$rs->Id?>" >
                                        		Düzenle
                                        	</a>
                            			</td>
                                        <td>
                                        	<a class="btn bg-teal waves-effect" href="<?=base_url().'admin/categories/delete/'.$rs->Id?>" onclick="return confirm('Kategoriyi silerseniz, bu kategori altında yer alan tüm ilanlarda silinecektir. Kategoriyi silmek istediğinize emin misiniz?')">
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
