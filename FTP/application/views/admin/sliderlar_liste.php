
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Slider</h2>
            </div>
            <div class="card">
                        <div class="header">
                            <h2>
                                Slider Listesi
                                <small>Üç nokta menüsü aracılığı ile slider ekleme işlemini gerçekleştirebilirsiniz.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?=base_url()?>admin/slider/add/" class=" waves-effect waves-block">Slider Ekle</a></li>
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
                                        <th>BAŞLIK</th>
                                        <th>BÜYÜK BAŞLIK</th>
                                        <th>DURUM</th>
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
                                            <a href="<?=base_url().'admin/slider/add_pic/'.$rs->Id?>">
                                                <img src="<?=base_url()?>uploads/slider/<?=$rs->resim?>" height="50">
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn bg-teal waves-effect" href="<?=base_url().'admin/slider/add_pic/'.$rs->Id?>" >
                                                Resim Ekle
                                            </a>
                                        <?php } ?>
                                        </td>
                                        <td><?=strip_tags($rs->baslik) ?></td>
                                        <td><?=strip_tags($rs->buyuk_baslik) ?></td>
                                        <td><?=$rs->durum ?></td>
                                        <td>
                                        	<a class="btn bg-teal waves-effect" href="<?=base_url().'admin/slider/edit/'.$rs->Id?>" >
                                        		Düzenle
                                        	</a>
                            			</td>
                                        <td>
                                        	<a class="btn bg-teal waves-effect" href="<?=base_url().'admin/slider/delete/'.$rs->Id?>" onclick="return confirm('Kullanıcıyı silmek istediğinize emin misiniz?')">
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
