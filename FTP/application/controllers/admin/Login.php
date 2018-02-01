<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('KisiModel');

    }

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function oturum_ac()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		//Zararlı kod temizle
		$email = $this->security->xss_clean($email);
		$password = $this->security->xss_clean($password);

		$result = $this->KisiModel->login("yonetici",$email,$password);

		if ($result) {
			if ($result[0]->durum == "Aktif") {
				//Kullanıcı varsa bilgilerini session dizide tut
				$session_array = array(
					'id' => $result[0]->Id,
					'yetki' => $result[0]->yetki,
					'eposta' => $result[0]->eposta,
					'adsoy' => $result[0]->ad.' '.$result[0]->soyad,
					'resim' => $result[0]->resim);
				//Verileri session'da tutma
				$this->session->set_userdata("admin_oturum",$session_array);
				redirect(base_url().'admin');
			}else{
				$this->session->set_flashdata("mesaj","Hesabınız pasif durumdadır!");
			redirect(base_url().'admin/login');
			}

		}else {
			$this->session->set_flashdata("mesaj","Hatalı kullanıcı adı veya şifre!");
			redirect(base_url().'admin/login');
		}
	}

	public function oturum_kapat()
	{
		$this->session->unset_userdata("admin_oturum");
		redirect(base_url().'admin/login');
	}
}
