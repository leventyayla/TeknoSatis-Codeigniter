<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		if (!$this->session->userdata("admin_oturum")) {
			redirect(base_url()."admin/login");
		}
    }

	public function index()
	{
		$this->load->view('admin/_header');
		$this->load->view('admin/_sidebar',array('aktif_sayfa'=>'ana_sayfa'));
		$this->load->view('admin/_content');
		$this->load->view('admin/_footer');
	}
}
