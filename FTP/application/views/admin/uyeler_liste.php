
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Üyeler</h2>
            </div>
            <div class="card">
                        <div class="header">
                            <h2>
                                Üye Listesi
                                <small>Üç nokta menüsü aracılığı ile üye ekleme işlemini gerçekleştirebilirsiniz.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?=base_url()?>admin/users/add/" class=" waves-effect waves-block">Üye Ekle</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    	<th>#</th>
                                        <th>AD SOYAD</th>
                                        <th>E-POSTA</th>
                                        <th>KAYIT TARİHİ</th>
                                        <th>CİNSİYET</th>
                                        <th>TELEFON</th>
                                        <th>ADRES</th>
                                        <th>ŞEHİR</th>
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
                                        <td><?=$rs->ad.' '.$rs->soyad ?></td>
                                        <td><?=$rs->eposta ?></td>
                                        <td><?=$rs->kayit_tarihi ?></td>
                                        <td><?php if ($rs->cinsiyet == 'e'){ echo 'Erkek'; }else{ echo 'Kadın'; }?></td>
                                        <td><?=$rs->telefon ?></td>
                                        <td><?=$rs->adres ?></td>
                                        <td><?=$rs->sehir ?></td>
                                        <td><?=$rs->durum ?></td>
                                        <td>
                                        	<a class="btn bg-teal waves-effect" href="<?=base_url().'admin/users/edit/'.$rs->Id?>" >
                                        		Düzenle
                                        	</a>
                            			</td>
                                        <td>
                                        	<a class="btn bg-teal waves-effect" href="<?=base_url().'admin/users/delete/'.$rs->Id?>" onclick="return confirm('Kullanıcıyı silmek istediğinize emin misiniz?')">
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
