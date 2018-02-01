<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {
	
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
		$data['veriler'] = $this->OnYuzModel->mesajlar_getir();

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'mesajlar'));
		$this->load->view('admin/mesajlar_liste',$data);
		$this->load->view('admin/_footer');
	}

	public function read($id)
	{
		$data['detay'] = $this->OnYuzModel->mesaj_getir($id);

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'mesajlar'));
		$this->load->view('admin/mesaj_detay',$data);
		$this->load->view('admin/_footer');

		$this->OnYuzModel->okundu_yap($id);
	}

	public function update($id)
	{
		$data = array('not' => $this->input->post('not') );
		$this->OnYuzModel->mesaj_guncelle($data,$id);
		redirect(base_url().'admin/messages');
	}

	public function delete($id)
	{
		$this->OnYuzModel->mesaj_sil($id);
		redirect(base_url().'admin/messages');
	}
}
