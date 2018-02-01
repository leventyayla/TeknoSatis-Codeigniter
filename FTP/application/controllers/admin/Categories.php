<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriModel');
		if (!$this->session->userdata("admin_oturum")) {
			redirect(base_url()."admin/login");
		}
    }

	public function index()
	{
		$data['veriler'] = $this->KategoriModel->kategoriler_getir(); 

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'kategoriler'));
		$this->load->view('admin/kategoriler_liste',$data);
		$this->load->view('admin/_footer');
	}

	public function add()
	{
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'kategoriler'));
		$this->load->view('admin/kategoriler_ekle');
		$this->load->view('admin/_footer');
	}

	public function add_commit()
	{
		$data = array('adi' => $this->input->post('adi'),
					  'parent_id' => $this->input->post('parent_id'),
					  'anahtar_kelime' => $this->input->post('anahtar_kelime'),
					  'aciklama' => $this->input->post('aciklama'),
					  'durum' => $this->input->post('durum')
					 );

		$this->KategoriModel->kategori_ekle($data);
		redirect(base_url().'admin/categories');
	}

	public function delete($id)
	{
		$this->KategoriModel->kategori_sil($id);
		redirect(base_url().'admin/categories');
	}

	public function edit($id)
	{
		$data['kategoriler'] = $this->KategoriModel->kategoriler_getir();
		$data['veriler'] = $this->KategoriModel->kategori_getir($id);

		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'kategoriler'));
		$this->load->view('admin/kategoriler_duzenle',$data);
		$this->load->view('admin/_footer');
	}

	public function edit_commit($id)
	{
		$data = array('adi' => $this->input->post('adi'),
					  'parent_id' => $this->input->post('parent_id'),
					  'anahtar_kelime' => $this->input->post('anahtar_kelime'),
					  'aciklama' => $this->input->post('aciklama'),
					  'durum' => $this->input->post('durum') );

		$this->KategoriModel->kategori_guncelle($data,$id);
		redirect(base_url().'admin/categories');
	}
}
