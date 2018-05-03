<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends MY_Controller{

	public function __construct(){
		parent::__construct();
		$this->_check_session();
		$this->load->view('header');
		$this->load->model('profil_Model');
	}

	
	private function _check_session(){
		if($this->session->login!=TRUE){
			$this->session->sess_destroy();
			redirect();
		}
	}

//duyuru_güncelle : dosya update yap

	public function index(){
		$profil = $this->profil_Model->profil_varmi($this->session->no);
		$data['profil']=$profil;
		if ($profil==true)
		{
			$profilbilgisi = $this->profil_Model->profil_Getir($this->session->no);
			$data['profilbilgisi']=$profilbilgisi;
			$this->load->view('profil/profil',$data);
				
			
			
		}
		else
		{
		$this->load->view('profil/profil',$data);
		}
		$this->load->view('footer');
		
	}

	public function profil_Ekle_islemi(){
		
		if(isset($_POST['btn_ekle'])){
			
			$this->form_validation->set_rules('tc_no','Tc Kimlik No',"required");
			$this->form_validation->set_rules('ncseri_no','Nufus Cüzdanı Seri No',"required");
			$this->form_validation->set_rules('baba_adi','Baba Adı',"required");
			$this->form_validation->set_rules('ana_adi','Anne Adı',"required");
			$this->form_validation->set_rules('dogum_yeri','Doğum Yeri',"required");
			$this->form_validation->set_rules('dogum_tarihi','Doğum Tarihi',"required");
			$this->form_validation->set_rules('il','İl',"required");
			$this->form_validation->set_rules('ilce','İlçe',"required");
			$this->form_validation->set_rules('mahalle','Mahalle',"required");
			$this->form_validation->set_rules('cilt_no','Cilt No',"required");
			$this->form_validation->set_rules('ailesira_no','Aile Sıra No',"required");
			$this->form_validation->set_rules('sira_no','Sıra No',"required");
			$this->form_validation->set_rules('verildigi_yer','Verildiği Yer İçerik',"required");
			$this->form_validation->set_rules('verildigi_tarih','Verildiği Tarih',"required");
			$this->form_validation->set_rules('verilis_nedeni','Veriliş Nedeni İçerik',"required");

			if($this->form_validation->run()==TRUE){
				
				$ogrenci_no =$this->session->no;
				$tc_no = $this->input->post('tc_no');
				$ncseri_no = $this->input->post('ncseri_no');
				$baba_adi = $this->input->post('baba_adi');
				$ana_adi = $this->input->post('ana_adi');
				$dogum_yeri = $this->input->post('dogum_yeri');
				$dogum_tarihi = $this->input->post('dogum_tarihi');
				$il = $this->input->post('il');
				$ilce = $this->input->post('ilce');
				$mahalle = $this->input->post('mahalle');
				$cilt_no = $this->input->post('cilt_no');
				$ailesira_no = $this->input->post('ailesira_no');
				$sira_no = $this->input->post('sira_no');
				$verildigi_yer = $this->input->post('verildigi_yer');
				$verildigi_tarih = $this->input->post('verildigi_tarih');
				$verilis_nedeni = $this->input->post('verilis_nedeni');

//dosya upload
				$data= array('ogrenci_no'       => $ogrenci_no ,
	  						 'tc_no' 		    => $tc_no ,
	  						 'nc_seriNo'        => $ncseri_no ,
	  						 'baba_ad'  	    => $baba_adi,
	  						 'ana_ad'	     	=> $ana_adi,
	  						 'dogum_yeri'	    => $dogum_yeri,
	  						 'dogum_tarihi'	    => $dogum_tarihi,
	  						 'il'	   		    => $il,
	  						 'ilce'	   		    => $ilce,
	  						 'mahalle'	   	    => $mahalle,
	  						 'cilt_no'	    	=> $cilt_no,
	  						 'ailesira_no'  	=> $ailesira_no,
	  						 'sira_no'	     	=> $sira_no,
	  						 'verildigi_yer'	=> $verildigi_yer,
	  						 'verildigi_tarih'	=> $verildigi_tarih,
	  						 'verilis_nedeni'	=> $verilis_nedeni,
								);

					$this->profil_Model->profil_ekle($data);
					redirect("profil/");


		}
			else{
				$data['eksikgiris']="Lütfen tüm alanları doldurunuz..";
				$this->load->view('profil/profil_ekle',$data);
				$this->load->view('footer');
			}	
		}
	}
		public function profil_Guncelle_islemi(){
		
		if(isset($_POST['btn_guncelleme'])){
			
			
				
				$ogrenci_no =$this->session->no;
				$tc_no = $this->input->post('tc_no');
				$ncseri_no = $this->input->post('ncseri_no');
				$baba_adi = $this->input->post('baba_adi');
				$ana_adi = $this->input->post('ana_adi');
				$dogum_yeri = $this->input->post('dogum_yeri');
				$dogum_tarihi = $this->input->post('dogum_tarihi');
				$il = $this->input->post('il');
				$ilce = $this->input->post('ilce');
				$mahalle = $this->input->post('mahalle');
				$cilt_no = $this->input->post('cilt_no');
				$ailesira_no = $this->input->post('ailesira_no');
				$sira_no = $this->input->post('sira_no');
				$verildigi_yer = $this->input->post('verildigi_yer');
				$verildigi_tarih = $this->input->post('verilis_tarihi');
				$verilis_nedeni = $this->input->post('verilis_nedeni');

//dosya upload
				$data= array(
							 'tc_no' 		    => $tc_no ,
	  						 'nc_seriNo'        => $ncseri_no ,
	  						 'baba_ad'  	    => $baba_adi,
	  						 'ana_ad'	     	=> $ana_adi,
	  						 'dogum_yeri'	    => $dogum_yeri,
	  						 'dogum_tarihi'	    => $dogum_tarihi,
	  						 'il'	   		    => $il,
	  						 'ilce'	   		    => $ilce,
	  						 'mahalle'	   	    => $mahalle,
	  						 'cilt_no'	    	=> $cilt_no,
	  						 'ailesira_no'  	=> $ailesira_no,
	  						 'sira_no'	     	=> $sira_no,
	  						 'verildigi_yer'	=> $verildigi_yer,
	  						 'verildigi_tarih'	=> $verildigi_tarih,
	  						 'verilis_nedeni'	=> $verilis_nedeni,
								);

					$this->profil_Model->profil_Guncelle($ogrenci_no,$data);
					redirect("profil/");


		}
		
		}
		
	

}
?>