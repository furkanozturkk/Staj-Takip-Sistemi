<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ogrenci extends MY_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->_check_session();
		$this->load->view('header');
		$this->load->model('Ogrenci_Model');
	}
	
	private function _check_session(){
		if($this->session->loginType!='Ogrenci'){
			$this->session->sess_destroy();
			redirect();
		}
	}
	
	
	public function raporyukleme(){
		$result=$this->Ogrenci_Model->ogr_noya_gore_stajbilgileri_getir();
		$data['data']=$result;
		$this->load->view('ogrenci/raporyukle',$data);
		$this->load->view('footer');	
	}
	
	public function raporu_yukle_stajdefteri($no){
		$a=$this->Ogrenci_Model->ogr_noya_gore_stajbilgileri_getir();
		foreach($a as $row){
			$bitis_tarihi=$row->bitis_tarihi;
			$staj_durum=$row->staj_durum;
		}
		$bugun=date('Y-m-d');
		if($staj_durum==1){ 		// staj baslamıssa
		if(strtotime($bugun)>strtotime($bitis_tarihi)){	// bitis tarihi gelmisse
			$hedefdosya="";
			if(isset($_FILES['rapor_dosya'])){
				$hata = $_FILES['rapor_dosya']['error'];
				if($hata == 0) {
					$hedefdizin="./uploads/";
					$hedefdosya=$hedefdizin.$_FILES['rapor_dosya']['name'];		// veritabanına dosya yolu kaydedilir.
					$tmp_name=$_FILES['rapor_dosya']['tmp_name'];
					$dosyaadi=$_FILES['rapor_dosya']['name'];
					$uzanti=explode(".", $dosyaadi);
					$uzanti=$uzanti[count($uzanti)-1];
					if($uzanti == "pdf" || $uzanti == "doc" || $uzanti == "docx"){
						move_uploaded_file($tmp_name, $hedefdosya);
					}
					else{
						$this->session->set_flashdata('tiphatasi','Dosya pdf veya docx şeklinde yüklenebilir..');
						redirect("Ogrenci/raporyukleme");			
					}
				}
	//**
				$hedefdosya=explode("/", $hedefdosya);     
				$hedefdosya=$hedefdosya[count($hedefdosya)-1];
			}

				$data= array('staj_defteri'  => $hedefdosya );
				$this->Ogrenci_Model->rapor_dosyalari_update($no,$data);
				redirect("Ogrenci/raporyukleme");
			}
			else{
				$this->session->set_flashdata('tarihyanlis','Staj bitiş tarihinden sonra rapor yüklenmektedir..');
				redirect("Ogrenci/raporyukleme");
			}
		}
		else{
			$this->session->set_flashdata('stajyok','Şuan yapmakta olduğunuz bir staj bulunmamaktadır.');
			redirect("Ogrenci/raporyukleme");
		}
		


	}
	
		public function anketdosyaindir(){
			if($this->input->get('id'))
			{
				$id=$this->input->get('id');
				$yol="./uploads/";
				$dosyalar=$this->Ogrenci_Model->idye_göre_dosya_Getir($id);
				foreach ($dosyalar as $row) {
					$dosyaadi=$row->anketform;
				}
				$dosyatamyol=$yol.$dosyaadi;
				if (file_exists($dosyatamyol)){
					header("Content-length: ".filesize($dosyatamyol)); 
					header('Content-Type: application/octet-stream'); 
					header('Content-Disposition: attachment; filename="' . $dosyaadi . '"'); 
					readfile("$dosyatamyol"); 
				}

			}
		}
		
		public function stajdefteridosyaindir(){
			if($this->input->get('id'))
			{
				$id=$this->input->get('id');
				$yol="./uploads/";
				$dosyalar=$this->Ogrenci_Model->idye_göre_dosya_Getir($id);
				foreach ($dosyalar as $row) {
					$dosyaadi=$row->staj_defteri;
				}
				$dosyatamyol=$yol.$dosyaadi;
				if (file_exists($dosyatamyol)){
					header("Content-length: ".filesize($dosyatamyol)); 
					header('Content-Type: application/octet-stream'); 
					header('Content-Disposition: attachment; filename="' . $dosyaadi . '"'); 
					readfile("$dosyatamyol"); 
				}

			}
		}
	
	
	
	public function raporu_yukle_anket($no){
		$a=$this->Ogrenci_Model->ogr_noya_gore_stajbilgileri_getir();
		foreach($a as $row){
			$bitis_tarihi=$row->bitis_tarihi;
			$staj_durum=$row->staj_durum;
		}
		$bugun=date('Y-m-d');
		if($staj_durum==1){ 		// staj baslamıssa
		if(strtotime($bugun)>strtotime($bitis_tarihi)){	// bitis tarihi gelmisse
			$hedefdosya="";
			if(isset($_FILES['rapor_dosya2'])){
				$hata = $_FILES['rapor_dosya2']['error'];
				if($hata == 0) {
					$hedefdizin="./uploads/";
					$hedefdosya=$hedefdizin.$_FILES['rapor_dosya2']['name'];		// veritabanına dosya yolu kaydedilir.
					$tmp_name=$_FILES['rapor_dosya2']['tmp_name'];
					$dosyaadi=$_FILES['rapor_dosya2']['name'];
					$uzanti=explode(".", $dosyaadi);
					$uzanti=$uzanti[count($uzanti)-1];
					if($uzanti == "pdf" || $uzanti == "doc" || $uzanti == "docx"){
						move_uploaded_file($tmp_name, $hedefdosya);
					}
					else{
						$this->session->set_flashdata('tiphatasi','Dosya pdf veya docx şeklinde yüklenebilir..');
						redirect("Ogrenci/raporyukleme");			
					}
				}
	//**
				$hedefdosya=explode("/", $hedefdosya);     
				$hedefdosya=$hedefdosya[count($hedefdosya)-1];
			}

				$data= array('anketform'  => $hedefdosya );
				$this->Ogrenci_Model->rapor_dosyalari_update($no,$data);
				redirect("Ogrenci/raporyukleme");
			}
			else{
				$this->session->set_flashdata('tarihyanlis','Staj bitiş tarihinden sonra rapor yüklenmektedir..');
				redirect("Ogrenci/raporyukleme");
			}
		}
		else{
			$this->session->set_flashdata('stajyok','Şuan yapmakta olduğunuz bir staj bulunmamaktadır.');
			redirect("Ogrenci/raporyukleme");
		}
		


	}
	
	
}
?>