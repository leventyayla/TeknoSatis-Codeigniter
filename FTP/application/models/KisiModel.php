<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class KisiModel extends CI_Model {

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

	public function login($tablo,$eposta,$sifre)
    {
    	$this->db->select("*")->from($tablo)->where("eposta",$eposta)->where("sifre",$sifre)->limit(1);
    	$tmp = $this->db->get();

    	if ($tmp->num_rows() == 1) {
    		return $tmp->result();
    	} else {
    		return false;
    	}
    }

    public function uyeler_getir()
    {
        return $this->db->select("*")->from("uyeler")->order_by("ad","asc")->get()->result();
        //return $this->db->query("SELECT * FROM uyeler ORDER BY ad")->result();
    }

    public function uye_ekle($data)
    {
        $this->db->insert('uyeler',$data);
        return $this->db->insert_id();
    }

    public function uye_guncelle($data,$id)
    {
        $this->db->where('Id',$id)->update('uyeler',$data);
    }

    public function uye_sil($id)
    {
        $this->db->where("Id",$id)->delete("uyeler");
    }

    public function uye_getir($id)
    {
        return $this->db->select("*")->from('uyeler')->where("Id",$id)->get()->result();
    }

    public function uye_sifre_getir($email)
    {
        return $this->db->select("*")->from('uyeler')->where("eposta",$email)->get()->result();
    }
}
?>