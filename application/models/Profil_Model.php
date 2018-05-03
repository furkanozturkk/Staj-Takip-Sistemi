<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_Model extends CI_Model{
	
	
	public function profil_ekle($data){
		$this->db->insert('tbl_kimlikbilgileri',$data);
	}
	
	public function profil_varmi($no){
		$this->db->select('*');
		$this->db->from('tbl_kimlikbilgileri');
		$this->db->where('ogrenci_no',$no);
		$this->db->limit(1);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return TRUE;
		}
			else return FALSE;
	}
		public function profil_Guncelle($id,$data){
		$this->db->where('ogrenci_no', $id);
		$this->db->update('tbl_kimlikbilgileri',$data);
	}
	
	public function profil_Getir($no){
		 
		$query = $this->db->query("SELECT * FROM tbl_ogrenciler o INNER JOIN tbl_derssorumlusu ON o.akademisyen_no=tbl_derssorumlusu.no INNER JOIN tbl_kimlikbilgileri k ON o.ogrenci_no=k.ogrenci_no INNER JOIN tbl_bolum b ON o.bolum_id=b.id INNER JOIN tbl_kullanicilar ku ON o.ogrenci_no=ku.no  WHERE o.ogrenci_no=".$no);
		return $query->result();
	}
	
	
}




?>