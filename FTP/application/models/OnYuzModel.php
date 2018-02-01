<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class OnYuzModel extends CI_Model {

	public function __construct()
    {
           parent::__construct();
           $this->load->database();
    }

    public function mesaj_ekle($data)
    {
        $this->db->insert('mesajlar',$data);
    }

    public function mesajlar_getir()
    {
        return $this->db->query("SELECT * FROM mesajlar ORDER BY okundu ASC, tarih DESC")->result();
    }

    public function mesaj_getir($id)
    {
        return $this->db->select("*")->from('mesajlar')->where("Id",$id)->get()->result();
    }

    public function mesaj_guncelle($data,$id)
    {
        $this->db->where('Id',$id)->update('mesajlar',$data);
    }

    public function mesaj_sil($id)
    {
        $this->db->where("Id",$id)->delete("mesajlar");
    }

    public function okundu_yap($id)
    {
    	$data = array('okundu' => "1");
        $this->db->where('Id',$id)->update('mesajlar',$data);
    }

    public function sliderlar_getir()
    {
        return $this->db->select("*")->from("slider")->get()->result();
    }

    public function aktif_sliderlar()
    {
        return $this->db->select("*")->from("slider")->where("durum","Aktif")->get()->result();
    }

    public function slider_getir($id)
    {
        return $this->db->select("*")->from('slider')->where("Id",$id)->get()->result();
    }

    public function slider_sil($id)
    {
        $this->db->where("Id",$id)->delete("slider");
    }

    public function slider_ekle($data)
    {
        $this->db->insert('slider',$data);
    }

    public function slider_guncelle($data,$id)
    {
        $this->db->where('Id',$id)->update('slider',$data);
    }

    public function son_eklenen_urunler_getir()
    {
        return $this->db->query("SELECT u.* FROM urunler u LEFT JOIN kategoriler k ON u.kategori = k.Id WHERE u.durum='Aktif' AND k.durum='Aktif' ORDER BY tarih DESC LIMIT 6")->result();
    }

    public function cok_satan_urunler_getir()
    {
        return $this->db->query("SELECT u.* FROM urunler u LEFT JOIN kategoriler k ON u.kategori = k.Id WHERE u.durum='Aktif' AND k.durum='Aktif' ORDER BY siparis_sayisi DESC LIMIT 10")->result();
    }

    public function sidebar_random_urunler_getir()
    {
        return $this->db->query("SELECT u.* FROM urunler u LEFT JOIN kategoriler k ON u.kategori = k.Id WHERE u.durum='Aktif' AND k.durum='Aktif' ORDER BY RAND() LIMIT 3")->result();
    }

    public function sidebar_stok_urunler_getir()
    {
        return $this->db->query("SELECT u.* FROM urunler u LEFT JOIN kategoriler k ON u.kategori = k.Id WHERE u.durum='Aktif' AND k.durum='Aktif' ORDER BY stok LIMIT 9")->result();
    }

    public function ilgili_kategori_urunleri_getir($kat_id)
    {
        return $this->db->query("SELECT u.* FROM urunler u LEFT JOIN kategoriler k ON u.kategori = k.Id WHERE kategori=$kat_id AND u.durum='Aktif' AND k.durum='Aktif' ORDER BY RAND() LIMIT 6")->result();
    }

    public function kategori_urunleri_getir($kat_id)
    {
        return $this->db->query("SELECT * FROM urunler WHERE kategori=$kat_id AND durum='Aktif' ORDER BY tarih DESC")->result();
    }

    public function urunler_ara($metin)
    {
        return $this->db->query("SELECT * FROM urunler WHERE (adi LIKE '%$metin%' OR tanim LIKE '%$metin%' OR aciklama LIKE '%$metin%') AND durum='Aktif' ORDER BY siparis_sayisi DESC")->result();
    }

    public function sepet_getir($uye_id)
    {
        return $this->db->query("SELECT s.*, u.adi, u.sfiyat, u.stok, u.resim FROM sepet s LEFT JOIN urunler u ON s.urun_id = u.Id WHERE u.durum='Aktif' AND s.uye_id=$uye_id ORDER BY s.tarih DESC")->result();
    }

    public function sepet_urun_sayisi($uye_id)
    {
        return $this->db->query("SELECT COUNT(u.adi) AS sayi FROM sepet s LEFT JOIN urunler u ON s.urun_id = u.Id WHERE u.durum='Aktif' AND s.uye_id=$uye_id")->result()[0]->sayi;
    }

    public function sepet_urun_sil($id)
    {
        $this->db->where("Id",$id)->delete("sepet");
    }

    public function sepet_urun_ekle($data)
    {
        return $this->db->insert('sepet',$data);
    }

    public function satin_alinan_ekle($data)
    {
        $this->db->insert('satin_alinan',$data);
    }

    public function satin_alinan_getir($uye_id)
    {
        return $this->db->query("SELECT s.*, uye.ad, uye.soyad, u.adi, u.sfiyat, u.stok, u.resim FROM satin_alinan s LEFT JOIN urunler u ON s.urun_id = u.Id LEFT JOIN uyeler uye ON s.uye_id = uye.Id WHERE s.uye_id=$uye_id ORDER BY s.tarih DESC")->result();
    }

    public function yorum_ekle($data)
    {
        $this->db->insert('yorum',$data);
    }

    public function yorumlar_getir()
    {
        return $this->db->query("SELECT y.*, uye.ad, uye.soyad, uye.eposta, u.adi, u.resim FROM yorum y LEFT JOIN uyeler uye ON y.uye_id = uye.Id LEFT JOIN urunler u ON y.urun_id = u.Id ORDER BY y.tarih DESC")->result();
    }

    public function urun_yorumlar_getir($id)
    {
        return $this->db->query("SELECT y.*, uye.ad, uye.soyad, uye.eposta, u.adi, u.resim FROM yorum y LEFT JOIN uyeler uye ON y.uye_id = uye.Id LEFT JOIN urunler u ON y.urun_id = u.Id WHERE y.urun_id=$id AND y.durum='Aktif' ORDER BY y.tarih DESC")->result();
    }

    public function uye_yorumlar_getir($id)
    {
        return $this->db->query("SELECT y.*, u.adi, u.resim FROM yorum y LEFT JOIN urunler u ON y.urun_id = u.Id WHERE y.uye_id=$id ORDER BY y.tarih DESC")->result();
    }

    public function yorum_getir($id)
    {
        return $this->db->query("SELECT y.*, uye.ad, uye.soyad, uye.eposta, u.adi, u.resim FROM yorum y LEFT JOIN uyeler uye ON y.uye_id = uye.Id LEFT JOIN urunler u ON y.urun_id = u.Id WHERE y.Id=$id ORDER BY y.tarih DESC")->result();
    }

    public function yorum_sil($id)
    {
        $this->db->where("Id",$id)->delete("yorum");
    }

    public function yorum_guncelle($data,$id)
    {
        $this->db->where('Id',$id)->update('yorum',$data);
    }
}
?>