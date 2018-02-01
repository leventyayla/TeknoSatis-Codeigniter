<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('UrunModel');
		if (!$this->session->userdata("admin_oturum")) {
			redirect(base_url()."admin/login");
		}
    }

	public function index()
	{
		$data['veriler'] = $this->UrunModel->urunler_getir();

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'urunler'));
		$this->load->view('admin/urunler_liste',$data);
		$this->load->view('admin/_footer');
	}

	public function add()
	{
		$data['veriler'] = $this->UrunModel->kategoriler_getir();

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'urunler'));
		$this->load->view('admin/urunler_ekle',$data);
		$this->load->view('admin/_footer');
	}

	public function add_commit()
	{
		$data = array('adi' => $this->input->post('adi'),
					  'kategori' => $this->input->post('kategori'),
					  'afiyat' => $this->input->post('afiyat'),
					  'sfiyat' => $this->input->post('sfiyat'),
					  'stok' => $this->input->post('stok'),
					  'tanim' => $this->input->post('tanim'),
					  'anahtar_kelime' => $this->input->post('anahtar_kelime'),
					  'aciklama' => $this->input->post('aciklama'),
					  'durum' => $this->input->post('durum')
					 );

		$this->UrunModel->urun_ekle($data);
		redirect(base_url().'admin/products');
	}

	public function delete($id)
	{
		$result = $this->UrunModel->urun_getir($id);
		$resim = $result[0]->resim;

		$this->UrunModel->urun_sil($id);
		unlink("./uploads/products/".$resim);
		redirect(base_url().'admin/products');
	}

	public function edit($id)
	{
		$result = $this->UrunModel->urun_getir($id);
		$data['veriler'] = $this->UrunModel->kategoriler_getir();
		$data['rs'] = array('id' => $result[0]->Id,
					  'adi' => $result[0]->adi,
					  'kategori' => $result[0]->kategori,
					  'kategori_name' => $result[0]->kategori_name,
					  'afiyat' => $result[0]->afiyat,
					  'sfiyat' => $result[0]->sfiyat,
					  'stok' => $result[0]->stok,
					  'siparis_sayisi' => $result[0]->siparis_sayisi,
					  'tanim' => $result[0]->tanim,
					  'anahtar_kelime' => $result[0]->anahtar_kelime,
					  'aciklama' => $result[0]->aciklama,
					  'durum' => $result[0]->durum
					 );

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'urunler'));
		$this->load->view('admin/urunler_duzenle',$data);
		$this->load->view('admin/_footer');
	}

	public function edit_commit($id)
	{
		$data = array('adi' => $this->input->post('adi'),
					  'kategori' => $this->input->post('kategori'),
					  'afiyat' => $this->input->post('afiyat'),
					  'sfiyat' => $this->input->post('sfiyat'),
					  'stok' => $this->input->post('stok'),
					  'siparis_sayisi' => $this->input->post('siparis_sayisi'),
					  'tanim' => $this->input->post('tanim'),
					  'anahtar_kelime' => $this->input->post('anahtar_kelime'),
					  'aciklama' => $this->input->post('aciklama'),
					  'durum' => $this->input->post('durum')
					 );

		$this->UrunModel->urun_guncelle($data,$id);
		redirect(base_url().'admin/products');
	}

	public function add_pic($id)
	{
		$result = $this->UrunModel->urun_getir($id);

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'urunler'));
		$this->load->view('admin/urunler_resim_ekle',array('resim'=>$result[0]->resim, 'id'=>$id));
		$this->load->view('admin/_footer');
	}

	public function add_pic_commit($id)
	{
		$result = $this->UrunModel->urun_getir($id);
		$eski_resim = $result[0]->resim;

		$config['upload_path']          = './uploads/products';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048;
		$config['max_width']            = 1024;
		$config['max_height']           = 1024;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('resim'))
		{
			$error = $this->upload->display_errors();

			echo $error;
		}
		else
		{
			$resim_data = $this->upload->data();

			$data = array('resim' => $resim_data['file_name']);
			$this->UrunModel->urun_guncelle($data,$id);
			//Eski görseli ftp'den sil
			unlink("./uploads/products/".$eski_resim);
			redirect(base_url().'admin/products');
		}
	}

	public function add_gallery($id)
	{
		$data['veriler'] = $this->UrunModel->galeri_getir($id);
		$data['id']=$id;

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'urunler'));
		$this->load->view('admin/urunler_galeri_ekle',$data);
		$this->load->view('admin/_footer');
	}

	public function add_gallery_commit($id)
	{
		$config['upload_path']          = './uploads/gallery';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048;
		$config['max_width']            = 1024;
		$config['max_height']           = 1024;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('resim'))
		{
			$error = $this->upload->display_errors();

			echo $error;
		}
		else
		{
			$resim_data = $this->upload->data();

			$data = array('urun_id' => $id,
				'resim' => $resim_data['file_name']);

			$this->UrunModel->galeri_resim_ekle($data);
			redirect(base_url().'admin/products/add_gallery/'.$id);
		}
	}

	public function delete_gallery($id,$urun_id){
		$result = $this->UrunModel->galeri_resim_getir($id);
		$resim = $result[0]->resim;
		$this->UrunModel->galeri_resim_sil($id);
		//Eski görseli ftp'den sil
		unlink("./uploads/gallery/".$resim);
		redirect(base_url().'admin/products/add_gallery/'.$urun_id);
	}
}
