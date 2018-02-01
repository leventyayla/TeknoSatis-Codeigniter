<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("uye_oturum")) {
			redirect(base_url()."login_register");
		}
        $this->load->model('SiteAyarModel');
        $this->load->model('KisiModel');
        $this->load->model('OnYuzModel');
        $this->load->model('UrunModel');
        $this->load->model('SiparisModel');
    }

	public function index()
	{
		redirect(base_url().'user/info');
		// $data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		// $data['aktif_sayfa'] = "ana_sayfa";
		// $data['sayfa_baslik'] = $this->session->uye_oturum["adsoy"]." - ";

		// $this->load->view('_header',$data);
		// $this->load->view('_user_sidebar');
		// $this->load->view('user_profile');
		// $this->load->view('_footer',$data);
	}

	public function info()
	{
		$result = $this->KisiModel->uye_getir($this->session->uye_oturum["id"]);
		$veri['rs'] = array('id' => $result[0]->Id,
					  'ad' => $result[0]->ad,
					  'soyad' => $result[0]->soyad,
					  'eposta' => $result[0]->eposta,
					  'sifre' => $result[0]->sifre,
					  'cinsiyet' => $result[0]->cinsiyet,
					  'telefon' => $result[0]->telefon,
					  'adres' => $result[0]->adres,
					  'sehir' => $result[0]->sehir
					 );

		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "";
		$data['sayfa_baslik'] = $this->session->uye_oturum["adsoy"]." - ".$data['veri'][0]->adi;
		$data['anahtar_kelimeler'] = $data['veri'][0]->keywords;
		$data['tanim'] = $data['veri'][0]->description;

		$this->load->view('_header',$data);
		$this->load->view('_user_sidebar');
		$this->load->view('edit_user_info',$veri);
		$this->load->view('_footer',$data);
	}

	public function update_user($id)
	{
		if ($this->input->post('password') == "") {
			$data = array('ad' => $this->input->post('name'),
					  'soyad' => $this->input->post('surname'),
					  'eposta' => $this->input->post('email'),
					  'cinsiyet' => $this->input->post('sex'),
					  'telefon' => $this->input->post('tel'),
					  'adres' => $this->input->post('address'),
					  'sehir' => $this->input->post('city')
					 );
		}else{
			$data = array('ad' => $this->input->post('name'),
					  'soyad' => $this->input->post('surname'),
					  'eposta' => $this->input->post('email'),
					  'sifre' => $this->input->post('password'),
					  'cinsiyet' => $this->input->post('sex'),
					  'telefon' => $this->input->post('tel'),
					  'adres' => $this->input->post('address'),
					  'sehir' => $this->input->post('city')
					 );
		}

		$this->KisiModel->uye_guncelle($data,$id);
		if ($this->input->post('password') == "") {
			$this->session->set_flashdata("mesaj","Üye bilgileriniz başarıyla güncellendi. <u>Şifreniz güncellenmedi!</u>");
		}else{
			$this->session->set_flashdata("mesaj","Üye bilgileriniz ve şifreniz başarıyla güncellendi!");
		}
		redirect(base_url().'user/info');
	}

	public function basket()
	{
		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "";
		$data['sayfa_baslik'] = "Sepet - ".$data['veri'][0]->adi;
		$data['anahtar_kelimeler'] = $data['veri'][0]->keywords;
		$data['tanim'] = $data['veri'][0]->description;

		$sepet['urunler'] = $this->OnYuzModel->sepet_getir($this->session->uye_oturum["id"]);

		$this->load->view('_header',$data);
		$this->load->view('sepet',$sepet);
		$this->load->view('_footer',$data);
	}

	public function sepetten_cikar($id)
	{
		$this->OnYuzModel->sepet_urun_sil($id);
		$this->session->set_userdata('sepet', ($this->session->sepet-1));
		redirect(base_url().'user/basket');
	}

	public function orders()
	{
		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "";
		$data['sayfa_baslik'] = "Siparişlerim - ".$data['veri'][0]->adi;
		$data['anahtar_kelimeler'] = $data['veri'][0]->keywords;
		$data['tanim'] = $data['veri'][0]->description;

		$uye_id = $this->session->uye_oturum["id"];
		$veri['siparisler'] = $this->SiparisModel->uye_siparisleri_getir($uye_id);

		$this->load->view('_header',$data);
		$this->load->view('_user_sidebar');
		$this->load->view('user_orders',$veri);
		$this->load->view('_footer',$data);
	}

	public function comments()
	{
		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "";
		$data['sayfa_baslik'] = "Yorumlarım - ".$data['veri'][0]->adi;
		$data['anahtar_kelimeler'] = $data['veri'][0]->keywords;
		$data['tanim'] = $data['veri'][0]->description;

		$uye_id = $this->session->uye_oturum["id"];
		$veri['yorumlar'] = $this->OnYuzModel->uye_yorumlar_getir($uye_id);

		$this->load->view('_header',$data);
		$this->load->view('_user_sidebar');
		$this->load->view('user_comments',$veri);
		$this->load->view('_footer',$data);
	}

	public function delete_comment($id)
	{
		$this->OnYuzModel->yorum_sil($id);
		$this->session->set_flashdata("yorum_sil","Yorumunuzu başarıyla sildiniz.");
		redirect(base_url().'user/comments');
	}

	public function confirm_order($id)
	{
		$data = array('durum' => 'Tamamlandı');
		$this->SiparisModel->siparis_guncelle($data,$id);
		$this->session->set_flashdata("siparis_onay",$id." numaralı siparişinizi onayladınız. Bizi tercih ettiğiniz için teşekkür ederiz.");
		redirect(base_url().'user/orders');
	}

	public function sepet_tamamla()
	{
		$uye_id = $this->session->uye_oturum["id"];
		$urunler = $this->OnYuzModel->sepet_getir($uye_id);
		foreach ($urunler as $rs) {
			$data = array('uye_id' => $uye_id,
						'urun_id' => $rs->urun_id,
						'miktar' => $rs->miktar,
						'fiyat' => $rs->sfiyat);
			$this->OnYuzModel->satin_alinan_ekle($data);
			$this->UrunModel->urun_stok_siparis($rs->urun_id,$rs->miktar);
			$this->OnYuzModel->sepet_urun_sil($rs->Id);
		}
		$this->session->set_userdata('sepet', 0);
		redirect(base_url().'user/orders');
	}
}