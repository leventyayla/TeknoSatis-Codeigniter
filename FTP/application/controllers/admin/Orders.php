<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('SiparisModel');
		if (!$this->session->userdata("admin_oturum")) {
			redirect(base_url()."admin/login");
		}
    }

	public function index()
	{
		$data['siparisler'] = $this->SiparisModel->siparisler_getir();

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'siparisler'));
		$this->load->view('admin/siparisler_liste',$data);
		$this->load->view('admin/_footer');
	}

	public function delete($id)
	{
		$this->SiparisModel->siparis_sil($id);
		redirect(base_url().'admin/orders');
	}

	public function detail($id)
	{
		$data['siparis'] = $this->SiparisModel->siparis_getir($id)[0];

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'siparisler'));
		$this->load->view('admin/siparis_detay',$data);
		$this->load->view('admin/_footer');
	}

	public function update($id)
	{
		$data = array('durum' => $this->input->post('durum'),
					  'not' => $this->input->post('not') );
		$this->SiparisModel->siparis_guncelle($data,$id);
		redirect(base_url().'admin/orders');
	}
}
