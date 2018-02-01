<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('SiteAyarModel');
        $this->load->model('KategoriModel');
        $this->load->model('OnYuzModel');
    }

	public function index()
	{
		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "ana_sayfa";
		$data['anahtar_kelimeler'] = $data['veri'][0]->keywords;
		$data['tanim'] = $data['veri'][0]->description;
		$data['sayfa_baslik'] = $data['veri'][0]->adi;

		$kat['kategoriler'] = $this->KategoriModel->kategoriler_anasayfa_getir();
		$veri['sliderlar'] = $this->OnYuzModel->aktif_sliderlar();
		$veri['son_eklenenler'] = $this->OnYuzModel->son_eklenen_urunler_getir();
		$veri['cok_satanlar'] = $this->OnYuzModel->cok_satan_urunler_getir();
		$kat['random_urunler'] = $this->OnYuzModel->sidebar_random_urunler_getir();
		$kat['stok_urunler'] = $this->OnYuzModel->sidebar_stok_urunler_getir();

		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$kat);
		$this->load->view('_content',$veri);
		$this->load->view('_footer',$data);
	}

	public function hakkimizda()
	{
		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "hakkimizda";
		$data['sayfa_baslik'] = "Hakkımızda - ".$data['veri'][0]->adi;
		$data['anahtar_kelimeler'] = $data['veri'][0]->keywords;
		$data['tanim'] = $data['veri'][0]->description;

		$kat['kategoriler'] = $this->KategoriModel->kategoriler_anasayfa_getir();
		$kat['random_urunler'] = $this->OnYuzModel->sidebar_random_urunler_getir();
		$kat['stok_urunler'] = $this->OnYuzModel->sidebar_stok_urunler_getir();

		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$kat);
		$this->load->view('hakkimizda',$data);
		$this->load->view('_footer',$data);
	}

	public function iletisim()
	{
		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "iletisim";
		$data['sayfa_baslik'] = "İletişim - ".$data['veri'][0]->adi;
		$data['anahtar_kelimeler'] = $data['veri'][0]->keywords;
		$data['tanim'] = $data['veri'][0]->description;

		$this->load->view('_header',$data);
		$this->load->view('iletisim',$data);
		$this->load->view('_footer',$data);
	}

	public function kategoriler($id)
	{
		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$kategori = $this->KategoriModel->kategori_getir($id)[0];
		$data['aktif_sayfa'] = "";
		$data['sayfa_baslik'] = $kategori->adi." Kategorisi - ".$data['veri'][0]->adi;
		$data['anahtar_kelimeler'] = $kategori->anahtar_kelime;
		$data['tanim'] = $kategori->aciklama;

		$kat['kategoriler'] = $this->KategoriModel->kategoriler_anasayfa_getir();
		$kat['random_urunler'] = $this->OnYuzModel->sidebar_random_urunler_getir();
		$kat['stok_urunler'] = $this->OnYuzModel->sidebar_stok_urunler_getir();
		$data['urunler'] = $this->OnYuzModel->kategori_urunleri_getir($id);

		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$kat);
		$this->load->view('kategoriler',$data);
		$this->load->view('_footer',$data);
	}

	public function search()
	{
		$text = $this->input->post('text');
		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "";
		$data['sayfa_baslik'] = $text." Arama Sonuçları - ".$data['veri'][0]->adi;
		$data['anahtar_kelimeler'] = $data['veri'][0]->keywords;
		$data['tanim'] = $data['veri'][0]->description;

		$kat['kategoriler'] = $this->KategoriModel->kategoriler_anasayfa_getir();
		$kat['random_urunler'] = $this->OnYuzModel->sidebar_random_urunler_getir();
		$kat['stok_urunler'] = $this->OnYuzModel->sidebar_stok_urunler_getir();
		$data['arananlar'] = $this->OnYuzModel->urunler_ara($text);

		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$kat);
		$this->load->view('arama',$data);
		$this->load->view('_footer',$data);
	}

	public function bize_yazin()
	{
		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "bize_yazin";
		$data['sayfa_baslik'] = "Bize Yazın - ".$data['veri'][0]->adi;
		$data['anahtar_kelimeler'] = $data['veri'][0]->keywords;
		$data['tanim'] = $data['veri'][0]->description;

		$kat['kategoriler'] = $this->KategoriModel->kategoriler_anasayfa_getir();
		$kat['random_urunler'] = $this->OnYuzModel->sidebar_random_urunler_getir();
		$kat['stok_urunler'] = $this->OnYuzModel->sidebar_stok_urunler_getir();
		
		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$kat);
		$this->load->view('bize_yazin');
		$this->load->view('_footer',$data);
	}

	public function mesaj_kaydet()
	{
		$data = array('adsoy' => $this->input->post('name'),
					  'email' => $this->input->post('email'),
					  'tel' => $this->input->post('tel'),
					  'mesaj' => $this->input->post('mesaj'),
					  'ip' => $this->input->ip_address()
					 );

		$this->OnYuzModel->mesaj_ekle($data);

		$ayar = $this->SiteAyarModel->ayarlar_getir();

		$config = array('protocol' => 'smtp',
						'smtp_host' => $ayar[0]->smtpserver,
						'smtp_port' => $ayar[0]->smtpport,
						'smtp_user' => $ayar[0]->smtpemail,
						'smtp_pass' => $ayar[0]->password,
						'mailtype' => 'html',
						'charset' => 'utf-8',
						'wordwrap' => TRUE);

		$mesaj = 'Mesajınız başarı ile alındı.<br>IP Adresiniz : '.$this->input->ip_address();

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from($ayar[0]->smtpemail);
		$this->email->to($this->input->post('email'));
		$this->email->subject("Mesajınız Alındı");
		$this->email->message($mesaj);

		if(!$this->email->send()){
			show_error($this->email->print_debugger());
		}

		$this->session->set_flashdata("mesaj","Mesajınız adminlerimize iletilmiştir.<br>E-Posta adresinize ilgili bilgileri içeren mail gönderilmiştir.");
		redirect(base_url().'home/bize_yazin');

	}
}
