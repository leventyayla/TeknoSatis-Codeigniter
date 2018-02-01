<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UrunModel extends CI_Model {

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

    public function urunler_getir()
    {
        //return $this->db->select("*")->from("urunler")->get()->result();
        return $this->db->query("SELECT urunler.*, kategoriler.adi as kategori_name FROM urunler LEFT JOIN kategoriler ON urunler.kategori = kategoriler.Id ORDER BY urunler.tarih DESC")->result();
    }

    public function kategoriler_getir()
    {
        return $this->db->select("*")->from("kategoriler")->get()->result();
        //return $this->db->query("SELECT urunler.*, kategoriler.adi as kategori_name FROM urunler LEFT JOIN kategoriler ON urunler.kategori = kategoriler.Id ORDER BY urunler.adi")->result();
    }

    public function urun_ekle($data)
    {
        $this->db->insert('urunler',$data);
    }

    public function urun_guncelle($data,$id)
    {
        $this->db->where('Id',$id)->update('urunler',$data);
    }

    public function urun_sil($id)
    {
        $this->db->where("Id",$id)->delete("urunler");
    }

    public function urun_getir($id)
    {
        //return $this->db->select("*")->from('urunler')->where("Id",$id)->get()->result();
        return $this->db->query("SELECT urunler.*, kategoriler.adi as kategori_name FROM urunler LEFT JOIN kategoriler ON urunler.kategori = kategoriler.Id WHERE urunler.Id = ".$id)->result();
    }

    public function galeri_getir($urun_id)
    {
        return $this->db->select("*")->from('urunler_resim')->where("urun_id",$urun_id)->get()->result();
    }

    public function galeri_resim_ekle($data)
    {
        $this->db->insert('urunler_resim',$data);
    }

    public function galeri_resim_getir($id)
    {
        return $this->db->select("*")->from('urunler_resim')->where("Id",$id)->get()->result();
    }

    public function galeri_resim_sil($id)
    {
        $this->db->where("Id",$id)->delete("urunler_resim");
    }

    public function urun_stok_siparis($id,$miktar)
    {
        $this->db->query("UPDATE urunler SET stok=stok-$miktar, siparis_sayisi=siparis_sayisi+$miktar WHERE Id=".$id);
    }
}
?>