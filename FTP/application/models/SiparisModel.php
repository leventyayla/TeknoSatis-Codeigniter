<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SiparisModel extends CI_Model {

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

    public function siparisler_getir()
    {
        return $this->db->query("SELECT s.*, uye.ad, uye.soyad, u.adi, u.resim FROM satin_alinan s LEFT JOIN urunler u ON s.urun_id = u.Id LEFT JOIN uyeler uye ON s.uye_id = uye.Id ORDER BY s.tarih DESC")->result();
    }

    public function uye_siparisleri_getir($uye_id)
    {
        return $this->db->query("SELECT s.*, u.adi, u.resim FROM satin_alinan s LEFT JOIN urunler u ON s.urun_id = u.Id WHERE s.uye_id=$uye_id ORDER BY s.tarih DESC")->result();
    }

    public function siparis_sil($id)
    {
        $this->db->where("Id",$id)->delete("satin_alinan");
    }

    public function siparis_getir($id)
    {
        return $this->db->query("SELECT s.*, uye.ad, uye.soyad, u.adi, u.sfiyat, u.stok, u.resim FROM satin_alinan s LEFT JOIN urunler u ON s.urun_id = u.Id LEFT JOIN uyeler uye ON s.uye_id = uye.Id WHERE s.Id=$id ORDER BY s.tarih DESC")->result();
    }

    public function siparis_guncelle($data,$id)
    {
        $this->db->where('Id',$id)->update('satin_alinan',$data);
    }

}
?>