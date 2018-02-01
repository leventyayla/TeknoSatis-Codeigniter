<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SiteAyarModel extends CI_Model {

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

    public function ayarlar_getir()
    {
        return $this->db->select("*")->from("ayarlar")->get()->result();
    }

    public function ayarlar_guncelle($data,$id)
    {
        $this->db->where('Id',$id)->update('ayarlar',$data);
    }

}
?>