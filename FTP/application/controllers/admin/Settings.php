<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('SiteAyarModel');
		if (!$this->session->userdata("admin_oturum")) {
			redirect(base_url()."admin/login");
		}
    }

	public function index()
	{
		$data['ayarlar'] = $this->SiteAyarModel->ayarlar_getir()[0];

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'site_ayarlari'));
		$this->load->view('admin/site_ayarlari',$data);
		$this->load->view('admin/_footer');
	}

	public function edit(){
		$data = array('adi' => $this->input->post('adi'),
					  'keywords' => $this->input->post('keywords'),
					  'description' => $this->input->post('description'),
					  'email' => $this->input->post('email'),
					  'adres' => $this->input->post('adres'),
					  'tel' => $this->input->post('tel'),
					  'fax' => $this->input->post('fax'),
					  'sehir' => $this->input->post('sehir'),
					  'smtpserver' => $this->input->post('smtpserver'),
					  'smtpport' => $this->input->post('smtpport'),
					  'smtpemail' => $this->input->post('smtpemail'),
					  'password' => $this->input->post('password'),
					  'facebook' => $this->input->post('facebook'),
					  'twitter' => $this->input->post('twitter'),
					  'youtube' => $this->input->post('youtube'),
					  'hakkimizda' => $this->input->post('hakkimizda'),
					  'iletisim' => $this->input->post('iletisim'),
					  'harita_html' => $this->input->post('harita_html')
					 );

		$this->SiteAyarModel->ayarlar_guncelle($data,1);
		redirect(base_url().'admin/settings');
	}
}
