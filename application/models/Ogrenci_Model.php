<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ogrenci_Model extends CI_Model{

	public function rapor_dosyalari_update($no,$data){
		$this->db->where('ogrenci_no', $no);
		$this->db->update('tbl_stajbilgileri',$data);
	}
	
	public function ogr_noya_gore_stajbilgileri_getir(){
		$result=$this->db->query('select * from tbl_stajbilgileri tbls JOIN tbl_ogrenciler tblo ON tbls.ogrenci_no=tblo.ogrenci_no');
		return $result->result();
	}
	public function idye_ogr_getir($ogr_no){
		$result=$this->db->query('SELECT * FROM `tbl_ogrenciler` WHERE ogrenci_no = '.$ogr_no.'');
		return $result->result();
	}
	public function mail_getir($no){
		$query=$this->db->query("SELECT akademisyen_no FROM `tbl_ogrenciler` WHERE ogrenci_no=".$no."")->result();
		foreach($query as $row){
			$akademisyen_no=$row->akademisyen_no;
		}
		$result=$this->db->query('SELECT email FROM `tbl_kullanicilar` WHERE no = '.$akademisyen_no.'');
		return $result->result();
	}
	public function ogrenci_mail_getir($no){
		$result=$this->db->query('SELECT email FROM `tbl_kullanicilar` WHERE no = '.$no.'');
		return $result->result();
	}
	public function idye_göre_dosya_Getir($no){
		$result=$this->db->query("SELECT * FROM tbl_stajbilgileri where ogrenci_no=".$no."");
		return $result->result();
	}
	
}
?>