<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komisyon extends MY_Controller{
	
		public function __construct(){
		parent::__construct();
		$this->_check_session();
		$this->load->view('header');
		$this->load->model('Komisyon_Model');
		$this->load->model('Ogrenci_Model'); 
		$this->load->model('Denetmen_Model');

	}
	
	private function _check_session(){
		if($this->session->loginType!='Komisyonuye'){
			$this->session->sess_destroy();
			redirect();
		}
	}
	
	/*public function Denetmenler()
	{
		$result=$this->Komisyon_Model->denetmen_Getir();
		$data['denetmenler']=$result;
		$this->load->view('komisyon/denetmenler',$data);
		$this->load->view('footer');	
	}*/
	
	public function DersSorumlulari()
	{
		$result2=$this->Komisyon_Model->tbl_akademisyen_getir($this->session->no); 
		$data['akademisyen']=$result2;
		$result=$this->Komisyon_Model->derssorumlusu_Getir();
		$data['derssorumlulari']=$result;
		$this->load->view('komisyon/DersSorumlulari',$data);
		$this->load->view('footer');	
	}
	public function Komisyonuyeleri()
	{
		if (isset($this->session->login)) {			
		$result=$this->Komisyon_Model->komisyonuyeleri_Getir($this->session->bolum_id);
		$result2=$this->Komisyon_Model->tbl_akademisyen_getir($this->session->no); 
		$data['komisyonuyeleri']=$result;
		$data['akademisyen']=$result2;
		$this->load->view('komisyon/Komisyonuyeleri',$data);
		$this->load->view('footer');	
		}
		else redirect();
	}

		
	public function Ogrenciler($id)
	{
		$result3=$this->Komisyon_Model->tbl_akademisyen_getir($this->session->no); 
		$data['akademisyen']=$result3;
		$result=$this->Komisyon_Model->ogrencileri_Getir($id);
		$result2=$this->Komisyon_Model->derssorumlusu_Getir();
		$data['ogrenciler']=$result;
		$data['derssorumlulari']=$result2;
		$data['tum']=$id;
		$this->load->view('komisyon/komisyon',$data);
		$this->load->view('footer');	
	}
	
	public function DersSorumlusu_ekle(){
		
		$result = $this->Komisyon_Model->unvan_getir();
		$data['unvanlar']= $result;
		$this->load->view("komisyon/DersSorumlusuEkle",$data);
	}
	public function Komisyonuye_ekle(){
		
		$result = $this->Komisyon_Model->unvan_getir();
		$data['unvanlar']= $result;
		$this->load->view("komisyon/KomisyonuyeEkle",$data);
	}
	public function derssorumlusu_olustur(){
		if(isset($_POST['btn_kayit'])){
			
			$this->form_validation->set_rules('derssorumlusu_adi','derssorumlusu_adi',"required");
			$this->form_validation->set_rules('akademisyen_no','akademisyen_no',"required");
			$this->form_validation->set_rules('email','email',"required");
			$this->form_validation->set_rules('sifre','sifre',"required");
			$this->form_validation->set_rules('unvan','unvan',"required");

			if($this->form_validation->run()==TRUE){
				$derssorumlusu_adi	= $this->input->post('derssorumlusu_adi');
				$akademisyen_no 	= $this->input->post('akademisyen_no');
				$email 				= $this->input->post('email');
				$sifre 				= $this->input->post('sifre');
				$unvan 				= $this->input->post('unvan');
				$loginType	= 'Denetmen';
				
				$no=$this->session->no;
				$sorgu=$this->Komisyon_Model->noya_gore_bolumid_getir($no);
				foreach($sorgu as $row){
					$bolum_id=$row->bolum_id;
				}
				$data= array(
							 'no' 				=> $akademisyen_no ,
							 'ad_soyad'			=> $derssorumlusu_adi,
							 'bolum'			=> $bolum_id
							);
				$data2= array(
							 'no' 			=> $akademisyen_no ,
							 'email' 		=> $email ,
							 'sifre'		=> $sifre ,
							 'unvan' 		=> $unvan ,
							 'loginType'	=> $loginType,
							 );
				$data3= array(
							 'akademisyen_no' 	=> $akademisyen_no ,
							 'bolum_id'			=> $bolum_id ,
							 'ad_soyad'			=> $derssorumlusu_adi,
							 'baskan'			=> 0 ,
							 'durum'			=> 1 ,
							 'yetki'			=> 0 ,
							 'ders_sorumlusu'	=> 1 ,
							 );	
				$this->Komisyon_Model->derssorumlusu_tblsine_ekle($data);
				$this->Komisyon_Model->kullanicilar_tblsine_ekle($data2);
				$this->Komisyon_Model->akademisyen_tblsine_ekle($data3);
				redirect("Komisyon/DersSorumlulari");
			}
			else{
				$this->session->set_flashdata("eksikgiris","Lütfen tüm alanları doldurunuz..");
				redirect('Komisyon/DersSorumlusu_ekle');
			}	
		}
	}
	
	public function sorumlu_olarak_ata($no){
		$query=$this->Komisyon_Model->sorumlu_tablosuna_eklemek_icin_bilgi_getir($no);
		foreach($query as $row){
			$ad_soyad=$row->ad_soyad;
			$bolum=$row->bolum_id;
		}
		$data=array("no"		=>$no,
					"ad_soyad" 	=>$ad_soyad,
					"bolum"		=>$bolum
		);
		$data2=1;
		$this->Komisyon_Model->ders_sorumlusu_update($no,$data2);
		$this->Komisyon_Model->ders_sorumlusu_tablosuna_ekle($data);
		redirect("Komisyon/DersSorumlulari");
		
	}
	
	public function sorumlu_tablosundan_kaldir($no){
		$data2=0;
		$this->Komisyon_Model->ders_sorumlusu_update($no,$data2);
		$this->Komisyon_Model->ders_sorumlusu_tablosundan_sil($no);
		redirect("Komisyon/DersSorumlulari");
	}
	
	
	public function komisyonUye_olustur(){
		if(isset($_POST['btn_kayit2'])){
			
			$this->form_validation->set_rules('komisyonuye_adi','komisyonuye_adi',"required");
			$this->form_validation->set_rules('akademisyen_no','akademisyen_no',"required");
			$this->form_validation->set_rules('email','email',"required");
			$this->form_validation->set_rules('sifre','sifre',"required");
			$this->form_validation->set_rules('unvan','unvan',"required");

			if($this->form_validation->run()==TRUE){
				$derssorumlusu_adi	= $this->input->post('komisyonuye_adi');
				$akademisyen_no 	= $this->input->post('akademisyen_no');
				$email 				= $this->input->post('email');
				$sifre 				= $this->input->post('sifre');
				$unvan 				= $this->input->post('unvan');
				$loginType	= 'Komisyonuye';
				
				$no=$this->session->no;
				$sorgu=$this->Komisyon_Model->noya_gore_bolumid_getir($no);
				foreach($sorgu as $row){
					$bolum_id=$row->bolum_id;
				}
				$data= array(
							 'akademisyen_no' 	=> $akademisyen_no ,
							 'ad_soyad'			=> $derssorumlusu_adi,
							 'bolum_id'			=> $bolum_id,
							 'baskan'			=> '0', 
							 'durum'			=> '1',
							 'yetki'			=> 0 ,
							 'ders_sorumlusu'	=> 0 ,
							);
				$data2= array(
							 'no' 			=> $akademisyen_no ,
							 'email' 		=> $email ,
							 'sifre'		=> $sifre ,
							 'unvan' 		=> $unvan ,
							 'loginType'	=> $loginType,
							 );			
				$this->Komisyon_Model->akademisyen_tblsine_ekle($data);
				$this->Komisyon_Model->kullanicilar_tblsine_ekle($data2);
				redirect("Komisyon/Komisyonuyeleri");
			}
			else{
				$this->session->set_flashdata("eksikgiris","Lütfen tüm alanları doldurunuz..");
				redirect('Komisyon/Komisyonuye_ekle');
			}	
		}
	}
	public function yetkilileri_gor(){
		$result=$this->Komisyon_Model->komisyonuyeleri_yetkilileri_Getir($this->session->bolum_id);
		$data['yetkililer']=$result;
		$this->load->view("/komisyon/yetkilileri_gor",$data);
	}
	public function komisyon_uyeye_yetki_ver($no){
		$query=$this->Komisyon_Model->komisyon_uyeye_yetki_ver($no);
		redirect("Komisyon/Komisyonuyeleri");
	}
	public function komisyon_uyeye_yetki_gerial($no){
		$query=$this->Komisyon_Model->komisyon_uyeye_yetki_gerial($no);
		redirect("Komisyon/yetkilileri_gor");
	}
	
	public function ogrenci_kayit(){
		$bolum_id=$this->session->bolum_id;
		$query=$this->Komisyon_Model->kayit_onaylanmamis_ogrenci($bolum_id);
		$data["ogrenciler"]=$query;
		$this->load->view("komisyon/kayit_onay",$data);
	}
	public function ogrenci_kayit_kabul($no){
		$data=array("kayit_durum" => 1);
		$query=$this->Komisyon_Model->kayit_durum_update($no);
		redirect("Komisyon/ogrenci_kayit");
	}
	public function ogrenci_kayit_red($no){
		$query=$this->Komisyon_Model->kayit_durum_sil($no);
		redirect("Komisyon/ogrenci_kayit");
	}
	
	
	//sınıfa_gore_ogrencileri_Getir
	public function denetmeni_Degistir($kid,$oid,$sinif)
	{ 
					$tarih = date('Y-m-d');
					$result2=$this->Komisyon_Model->idye_gore_denetmen_Getir($kid);
					$result4=$this->Komisyon_Model->idye_gore_denetmen_Getir($this->session->no);
					$result3=$this->Ogrenci_Model->idye_ogr_getir($oid);
					foreach($result2 as $row)
					{
						$akadi=$row->ad_soyad;
					}
					foreach($result4 as $row)
					{
						$komiad=$row->ad_soyad;
					}
					foreach($result3 as $row)
					{
						$ogadi=$row->ad_soyad;
					}
					$data2 = array('ogrenci_no' =>$oid,
				    	 'baslik' 	     =>"Yeni denetmeniniz atandı!",
						 'bolum_id'     		 =>$this->session->bolum_id,
	  					 'icerik'	     => "$komiad  yeni denetmenizi $akadi yaptı" ,
						  'gonderilme_tarih' => $tarih,
	  				     'durum'  		 =>"1");
						 $data3 = array('ogrenci_no' =>$kid,
						 'bolum_id'     		 =>$this->session->bolum_id,
				    	 'baslik' 	     =>" $komiad denetleyeceğiniz öğrencilere $ogadi atandı",
	  					 'icerik'	     => "" ,
						  'gonderilme_tarih' => $tarih,
	  				     'durum'  		 =>"1");
						 
					$this->Bildirim_Model->bildirim_ekle($data2);
					$this->Bildirim_Model->bildirim_ekle($data3);						
		$this->Komisyon_Model->denetmen_degistir_islem($kid,$oid);
		redirect('Komisyon/Ogrenciler/'.$sinif.'');
	}
	public function OgrenciAta($no)
	{
	
		$result=$this->Komisyon_Model->denetmen_olmayan_ogrenci_Getir();
		$result2=$this->Komisyon_Model->idye_gore_derssorumlusu_Getir($no);
		$data['ogrenciler']=$result;
		$data['denetmen']=$result2;
		$this->load->view('komisyon/ogrenci_atama',$data);
		$this->load->view('footer');	
	}
	public function KomisyonBaskaniYap($no) //komisyonbaskanı adında logintype eklenıcek
	{
        $this->Komisyon_Model->akademisyen_pasif_yap($this->session->no);
		$this->Komisyon_Model->akademisyen_komisyonBaskan_yap($no);
		redirect('Ana/logout');
	}
	public function komisyon_uye_sil($no){
		$this->Komisyon_Model->komisyon_uye_sil($no);
		redirect("Komisyon/Komisyonuyeleri");
	}
	public function derssorumlusuna_ogrenciEkle($ano,$dizi)
	{
		$array = explode(",",$dizi);
		$tarih = date('Y-m-d');
		$result2=$this->Komisyon_Model->idye_gore_derssorumlusu_Getir($ano);
		$result4=$this->Komisyon_Model->idye_gore_derssorumlusu_Getir($this->session->no);
		foreach($result2 as $row)
					{
						$akadi=$row->ad_soyad;
					}
					foreach($result4 as $row)
					{
						$komiad=$row->ad_soyad;
					}
				foreach($array as $row3)
				{
					$this->Komisyon_Model->denetmen_degistir_islem($ano,$row3);
					
					
					$result3=$this->Ogrenci_Model->idye_ogr_getir($row3);
					
					foreach($result3 as $row)
					{
						$ogadi=$row->ad_soyad;
					}
					$data2 = array('ogrenci_no' =>$row3,
				    	 'baslik' 	     =>"Yeni denetmeniniz atandı!",
						 'bolum_id'     		 =>$this->session->bolum_id,
	  					 'icerik'	     => "$komiad  yeni denetmenizi $akadi yaptı" ,
						  'gonderilme_tarih' => $tarih,
	  				     'durum'  		 =>"1");
						 $data3 = array('ogrenci_no' =>$ano,
						 'bolum_id'     		 =>$this->session->bolum_id,
				    	 'baslik' 	     =>" $komiad denetleyeceğiniz öğrencilere $ogadi atandı",
	  					 'icerik'	     => "" ,
						  'gonderilme_tarih' => $tarih,
	  				     'durum'  		 =>"1");
						 
					$this->Bildirim_Model->bildirim_ekle($data2);
					$this->Bildirim_Model->bildirim_ekle($data3);
				}	
		redirect('Komisyon/DersSorumlulari');
	}
	

	
	
}