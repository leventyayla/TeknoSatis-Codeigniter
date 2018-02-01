<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {
	
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
		$data['yorumlar'] = $this->OnYuzModel->yorumlar_getir();

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'yorumlar'));
		$this->load->view('admin/yorumlar_liste',$data);
		$this->load->view('admin/_footer');
	}

	public function read($id)
	{
		$data['detay'] = $this->OnYuzModel->yorum_getir($id);

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'yorumlar'));
		$this->load->view('admin/yorum_detay',$data);
		$this->load->view('admin/_footer');
	}

	public function update($id)
	{
		$data = array('durum' => $this->input->post('durum'));
		$this->OnYuzModel->yorum_guncelle($data,$id);
		redirect(base_url().'admin/comments');
	}

	public function delete($id)
	{
		$this->OnYuzModel->yorum_sil($id);
		redirect(base_url().'admin/comments');
	}
}
