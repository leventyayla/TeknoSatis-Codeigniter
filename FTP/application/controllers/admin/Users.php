<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('KisiModel');
		if (!$this->session->userdata("admin_oturum")) {
			redirect(base_url()."admin/login");
		}
    }

	public function index()
	{
		$data['veriler'] = $this->KisiModel->uyeler_getir();

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'uyeler'));
		$this->load->view('admin/uyeler_liste',$data);
		$this->load->view('admin/_footer');
	}

	public function add()
	{
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'uyeler'));
		$this->load->view('admin/uyeler_ekle');
		$this->load->view('admin/_footer');
	}

	public function add_commit()
	{
		$validation = NULL;
		if($this->input->post('durum')=="Pasif"){
			$validation = md5($this->input->post('eposta')).rand(100, 999);
		}

		$data = array('ad' => $this->input->post('ad'),
					  'soyad' => $this->input->post('soyad'),
					  'eposta' => $this->input->post('eposta'),
					  'sifre' => $this->input->post('sifre'),
					  'cinsiyet' => $this->input->post('cinsiyet'),
					  'telefon' => $this->input->post('telefon'),
					  'adres' => $this->input->post('adres'),
					  'sehir' => $this->input->post('sehir'),
					  'durum' => $this->input->post('durum'),
					  'validation' => $validation
					 );

		$this->KisiModel->uye_ekle($data);
		redirect(base_url().'admin/users');
	}

	public function delete($id)
	{
		$data['veriler'] = $this->KisiModel->uye_sil($id);
		redirect(base_url().'admin/users');
	}

	public function edit($id)
	{
		$result = $this->KisiModel->uye_getir($id);
		$data['rs'] = array('id' => $result[0]->Id,
					  'ad' => $result[0]->ad,
					  'soyad' => $result[0]->soyad,
					  'eposta' => $result[0]->eposta,
					  'sifre' => $result[0]->sifre,
					  'cinsiyet' => $result[0]->cinsiyet,
					  'telefon' => $result[0]->telefon,
					  'adres' => $result[0]->adres,
					  'sehir' => $result[0]->sehir,
					  'durum' => $result[0]->durum
					 );

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'uyeler'));
		$this->load->view('admin/uyeler_duzenle',$data);
		$this->load->view('admin/_footer');
	}

	public function edit_commit($id)
	{
		$validation = NULL;
		if($this->input->post('durum')=="Pasif"){
			$validation = md5($this->input->post('eposta')).rand(100, 999);
		}

		$data = array('ad' => $this->input->post('ad'),
					  'soyad' => $this->input->post('soyad'),
					  'eposta' => $this->input->post('eposta'),
					  'sifre' => $this->input->post('sifre'),
					  'cinsiyet' => $this->input->post('cinsiyet'),
					  'telefon' => $this->input->post('telefon'),
					  'adres' => $this->input->post('adres'),
					  'sehir' => $this->input->post('sehir'),
					  'durum' => $this->input->post('durum'),
					  'validation' => $validation
					 );

		$this->KisiModel->uye_guncelle($data,$id);
		redirect(base_url().'admin/users');
	}
}
