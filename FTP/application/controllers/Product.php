<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('SiteAyarModel');
        $this->load->model('KategoriModel');
        $this->load->model('OnYuzModel');
        $this->load->model('UrunModel');
    }

    public function index()
	{
        redirect(base_url());
    }

	public function detail($id)
	{
		$kat['kategoriler'] = $this->KategoriModel->kategoriler_anasayfa_getir();
		$kat['random_urunler'] = $this->OnYuzModel->sidebar_random_urunler_getir();
		$kat['stok_urunler'] = $this->OnYuzModel->sidebar_stok_urunler_getir();
		
		$urun['urun'] = $this->UrunModel->urun_getir($id);
		$urun['yorumlar'] = $this->OnYuzModel->urun_yorumlar_getir($id);
		if ($urun["urun"][0]->durum=="Pasif") {
			redirect(base_url()); exit();
		}
		$urun['kat_urunler'] = $this->OnYuzModel->ilgili_kategori_urunleri_getir($urun["urun"][0]->kategori);
		$urun['galeri'] = $this->UrunModel->galeri_getir($id);

		$data['veri'] = $this->SiteAyarModel->ayarlar_getir();
		$data['aktif_sayfa'] = "";
		$data['anahtar_kelimeler'] = $urun["urun"][0]->anahtar_kelime;
		$data['tanim'] = $urun["urun"][0]->tanim;
		$data['sayfa_baslik'] = $urun["urun"][0]->adi." - ".$data['veri'][0]->adi;

		$this->load->view('_header',$data);
		$this->load->view('_sidebar',$kat);
		$this->load->view('urun_detay',$urun);
		$this->load->view('_footer',$data);
	}

	public function sepete_ekle($id)
	{
		if (!$this->session->userdata("uye_oturum")) {
			redirect(base_url()."login_register"); exit();
		}
		$data = array('uye_id' => $this->session->uye_oturum['id'],
					'urun_id' => $id,
					'miktar' => $this->input->post('miktar'));

		$this->OnYuzModel->sepet_urun_ekle($data);
		$this->session->set_userdata('sepet', ($this->session->sepet+1));
		redirect(base_url().'product/detail/'.$id);
	}

	public function add_comment($urun_id)
	{
		if (!$this->session->userdata("uye_oturum")) {
			redirect(base_url()."login_register"); exit();
		}
		$data = array('uye_id' => $this->session->uye_oturum['id'],
					'urun_id' => $urun_id,
					'yorum' => $this->input->post('yorum'),
					'puan' => $this->input->post('puan'));

		$this->OnYuzModel->yorum_ekle($data);
		redirect(base_url().'product/detail/'.$urun_id);
	}

	public function update_comment($urun_id,$yorum_id)
	{
		if (!$this->session->userdata("uye_oturum")) {
			redirect(base_url()."login_register"); exit();
		}
		$data = array('yorum' => $this->input->post('yorum'),
					'puan' => $this->input->post('puan'));

		$this->OnYuzModel->yorum_guncelle($data,$yorum_id);
		redirect(base_url().'product/detail/'.$urun_id);
	}

}
