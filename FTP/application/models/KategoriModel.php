<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class KategoriModel extends CI_Model {

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

    public function kategoriler_getir()
    {
        return $this->db->query("SELECT @kat_id:=Id as Id, @ust_kat:=parent_id as parent_id, (SELECT adi FROM kategoriler where Id=@ust_kat) as ustkategori, (SELECT COUNT(adi) FROM urunler where kategori=@kat_id) as urun_sayisi, adi, aciklama, anahtar_kelime, durum, tarih FROM kategoriler")->result();
    }

    public function kategoriler_anasayfa_getir()
    {
        return $this->db->query("SELECT @alt:=Id as Id, @ust_kat:=parent_id as parent_id, (SELECT COUNT(Id) FROM kategoriler where parent_id=@alt And durum='Aktif') as altkategoriSayisi, adi, aciklama, anahtar_kelime, durum, tarih FROM kategoriler WHERE durum='Aktif'")->result();
    }

    public function kategori_getir($id)
    {
        return $this->db->query("SELECT Id, @ust_kat:=parent_id as parent_id, (SELECT adi FROM kategoriler where Id=@ust_kat) as ustkategori, adi, aciklama, anahtar_kelime, durum, tarih FROM kategoriler WHERE Id = $id")->result();
    }

    public function kategori_ekle($data)
    {
        $this->db->insert('kategoriler',$data);
    }

    public function kategori_guncelle($data,$id)
    {
        $this->db->where('Id',$id)->update('kategoriler',$data);
    }

    public function kategori_sil($id)
    {
        $this->db->where("Id",$id)->delete("kategoriler");
    }
}
?>