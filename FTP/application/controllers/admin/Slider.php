<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('OnYuzModel');
		if (!$this->session->userdata("admin_oturum")) {
			redirect(base_url()."admin/login");
		}
    }

	public function index()
	{
		$data['veriler'] = $this->OnYuzModel->sliderlar_getir();

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'slider'));
		$this->load->view('admin/sliderlar_liste',$data);
		$this->load->view('admin/_footer');
	}

	public function add()
	{
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'slider'));
		$this->load->view('admin/slider_ekle');
		$this->load->view('admin/_footer');
	}

	public function add_commit()
	{
		$data = array('baslik' => $this->input->post('baslik'),
					  'buyuk_baslik' => $this->input->post('buyuk_baslik'),
					  'aciklama' => $this->input->post('aciklama'),
					  'buton_text' => $this->input->post('buton_text'),
					  'buton_link' => $this->input->post('buton_link'),
					  'durum' => $this->input->post('durum')
					 );

		$this->OnYuzModel->slider_ekle($data);
		redirect(base_url().'admin/slider');
	}

	public function delete($id)
	{
		$result = $this->OnYuzModel->slider_getir($id);
		$resim = $result[0]->resim;

		unlink("./uploads/slider/".$resim);
		$this->OnYuzModel->slider_sil($id);
		redirect(base_url().'admin/slider');
	}

	public function edit($id)
	{
		$result = $this->OnYuzModel->slider_getir($id);
		$data['rs'] = array('id' => $result[0]->Id,
					  'baslik' => $result[0]->baslik,
					  'buyuk_baslik' => $result[0]->buyuk_baslik,
					  'aciklama' => $result[0]->aciklama,
					  'buton_text' => $result[0]->buton_text,
					  'buton_link' => $result[0]->buton_link,
					  'durum' => $result[0]->durum
					 );

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'slider'));
		$this->load->view('admin/slider_duzenle',$data);
		$this->load->view('admin/_footer');
	}

	public function edit_commit($id)
	{
		$data = array('baslik' => $this->input->post('baslik'),
					  'buyuk_baslik' => $this->input->post('buyuk_baslik'),
					  'aciklama' => $this->input->post('aciklama'),
					  'buton_text' => $this->input->post('buton_text'),
					  'buton_link' => $this->input->post('buton_link'),
					  'durum' => $this->input->post('durum')
					 );

		$this->OnYuzModel->slider_guncelle($data,$id);
		redirect(base_url().'admin/slider');
	}

	public function add_pic($id)
	{
		$result = $this->OnYuzModel->slider_getir($id);

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'slider'));
		$this->load->view('admin/slider_resim_ekle',array('resim'=>$result[0]->resim, 'id'=>$id));
		$this->load->view('admin/_footer');
	}

	public function add_pic_commit($id)
	{
		$result = $this->OnYuzModel->slider_getir($id);
		$eski_resim = $result[0]->resim;

		$config['upload_path']          = './uploads/slider';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2048;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;

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
			$this->OnYuzModel->slider_guncelle($data,$id);
			//Eski görseli ftp'den sil
			unlink("./uploads/slider/".$eski_resim);
			redirect(base_url().'admin/slider');
		}
	}
}
