<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_register extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('SiteAyarModel');
        $this->load->model('KisiModel');
        $this->load->model('KategoriModel');
        $this->load->model('OnYuzModel');
    }

	public function index()
	{
		if ($this->session->userdata("uye_oturum")) {
			redirect(base_url()."user");
		}

		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "";
		$data['sayfa_baslik'] = "Giriş Yap / Kayıt Ol - ".$data['veri'][0]->adi;
		$data['anahtar_kelimeler'] = $data['veri'][0]->keywords;
		$data['tanim'] = $data['veri'][0]->description;

		$this->load->view('_header',$data);
		$this->load->view('oturum_ac_kayit_ol');
		$this->load->view('_footer',$data);
	}

	public function sifremi_unuttum()
	{
		if ($this->session->userdata("uye_oturum")) {
			redirect(base_url()."user");
		}

		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "";
		$data['sayfa_baslik'] = "Şifremi Unuttum - ".$data['veri'][0]->adi;
		$data['anahtar_kelimeler'] = $data['veri'][0]->keywords;
		$data['tanim'] = $data['veri'][0]->description;

		$kat['kategoriler'] = $this->KategoriModel->kategoriler_anasayfa_getir();
		$kat['random_urunler'] = $this->OnYuzModel->sidebar_random_urunler_getir();
		$kat['stok_urunler'] = $this->OnYuzModel->sidebar_stok_urunler_getir();

		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$kat);
		$this->load->view('sifremi_unuttum');
		$this->load->view('_footer',$data);
	}

	public function oturum_ac()
	{
		if ($this->session->userdata("uye_oturum")) {
			redirect(base_url()."user");
		}

		$email = $this->input->post("login_email");
		$password = $this->input->post("login_password");
		//Zararlı kod temizle
		$email = $this->security->xss_clean($email);
		$password = $this->security->xss_clean($password);

		$result = $this->KisiModel->login("uyeler",$email,$password);

		if ($result) {
			if ($result[0]->durum == "Aktif") {
				//Kullanıcı varsa bilgilerini session dizide tut
				$session_array = array(
					'id' => $result[0]->Id,
					'eposta' => $result[0]->eposta,
					'adsoy' => $result[0]->ad.' '.$result[0]->soyad,
					'resim' => $result[0]->resim);
				//Verileri session'da tutma
				$this->session->set_userdata("uye_oturum",$session_array);
				$sepet = $this->OnYuzModel->sepet_urun_sayisi($result[0]->Id);
				$this->session->set_userdata("sepet",$sepet);
				redirect(base_url());
			}else{
				$this->session->set_flashdata("login_mesaj","Hesabınız pasif durumdadır!");
				redirect(base_url().'login_register');
			}
			
		}else {
			$this->session->set_flashdata("login_mesaj","Hatalı kullanıcı adı veya şifre!");
			redirect(base_url().'login_register');
		}
	}

	public function oturum_kapat()
	{
		$this->session->unset_userdata("uye_oturum");
		redirect(base_url());
	}

	public function kayit_ol()
	{
		if ($this->session->userdata("uye_oturum")) {
			redirect(base_url()."user");
		}

		$validation = md5($this->input->post('email')).rand(100, 999);

		$data = array('ad' => $this->input->post('name'),
					  'soyad' => $this->input->post('surname'),
					  'eposta' => $this->input->post('email'),
					  'sifre' => $this->input->post('password'),
					  'validation' => $validation
					 );

		$inserted_id = $this->KisiModel->uye_ekle($data);

		$ayar = $this->SiteAyarModel->ayarlar_getir();

		$config = array('protocol' => 'smtp',
						'smtp_host' => $ayar[0]->smtpserver,
						'smtp_port' => $ayar[0]->smtpport,
						'smtp_user' => $ayar[0]->smtpemail,
						'smtp_pass' => $ayar[0]->password,
						'mailtype' => 'html',
						'charset' => 'utf-8',
						'wordwrap' => TRUE);

		$mesaj = 'Üyeliğinizi etkinleştirmek için lütfen <a href="'.base_url().'login_register/validate/'.$inserted_id.'/'.$validation.'" target="_blank">buraya tıklayınız</a>.<br>IP Adresiniz : '.$this->input->ip_address();

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from($ayar[0]->smtpemail);
		$this->email->to($this->input->post('email'));
		$this->email->subject($ayar[0]->adi.' Üyelik Aktivasyonu');
		$this->email->message($mesaj);

		if(!$this->email->send()){
			show_error($this->email->print_debugger());
		}

		$this->session->set_flashdata("signup_mesaj","Hesabınız oluşturuldu. E-posta adresinize gönderilen linke tıklayarak üyeliğinizi etkinleştirebilirsiniz.");
		redirect(base_url().'login_register');
	}

	public function validate($id,$validation)
	{
		$uye = $this->KisiModel->uye_getir($id);
		if($uye[0]->validation == $validation){
			$data = array('durum'=>'Aktif','validation'=>NULL);
			$this->KisiModel->uye_guncelle($data,$id);
			echo "Üyeliğiniz başarılı bir şekilde aktifleştirildi. Ana sayfaya gitmek için <a href='".base_url()."'>tıklayınız!</a>";
		}else{
			echo "Geçersiz etkinleştirme bağlantısı!";
		}
	}

	public function sifre_gonder()
	{
		$eposta = $this->input->post('eposta');
		$uye = $this->KisiModel->uye_sifre_getir($eposta);
		$ayar = $this->SiteAyarModel->ayarlar_getir();

		if (!$uye) {
			$this->session->set_flashdata("hata","Bu e-posta ile ilişkili hesap bulunmamaktadır!");
			redirect(base_url().'login_register/sifremi_unuttum');
			exit();
		}

		$config = array('protocol' => 'smtp',
						'smtp_host' => $ayar[0]->smtpserver,
						'smtp_port' => $ayar[0]->smtpport,
						'smtp_user' => $ayar[0]->smtpemail,
						'smtp_pass' => $ayar[0]->password,
						'mailtype' => 'html',
						'charset' => 'utf-8',
						'wordwrap' => TRUE);

		$mesaj = 'Sistemde kayıtlı şifreniz : '.$uye[0]->sifre;

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from($ayar[0]->smtpemail);
		$this->email->to($eposta);
		$this->email->subject($ayar[0]->adi.' Şifre Hatırlatma');
		$this->email->message($mesaj);

		if(!$this->email->send()){
			show_error($this->email->print_debugger());
		}
		$this->session->set_flashdata("mesaj","Şifreniz e-posta adresinize gönderilmiştir.");
		redirect(base_url().'login_register/sifremi_unuttum');

	}
}
