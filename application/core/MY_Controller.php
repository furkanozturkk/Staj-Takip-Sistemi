<?php 

class MY_Controller extends CI_Controller {

   public $site_data;

   function __construct() {
       parent::__construct();
	   	   $this->load->model('Bildirim_Model');
		   $this->load->model('Komisyon_Model');
	   if($this->session->loginType== "Ogrenci" or $this->session->loginType== "Denetmen")
	   {
	   $bildir = $this->Bildirim_Model->bildirim_Getir($this->session->no);
	   $bildirsayi = $this->Bildirim_Model->bildirim_Sayisi($this->session->no);
	   $tumbildirimler = $this->Bildirim_Model->tumbildimler($this->session->no);
	   $data['bildirim']=$bildir;
	   $data['bildirim_sayisi']=$bildirsayi;
				$no=$this->session->no;
				$query=$this->Komisyon_Model->tbl_akademisyen_getir($no);
				$global_data = array('akademisyen'=>$query);
		$global_data = array('bildirim'=>$bildir,'bildirimsayi'=>$bildirsayi,'tumbildirimler'=>$tumbildirimler,'akademisyen'=>$query);
		$this->load->vars($global_data);
		 }
		else if ($this->session->loginType == "Komisyonuye")
			{
				$bildir = $this->Bildirim_Model->komisyon_bildirim_Getir($this->session->bolum_id,$this->session->bolum_id);
				$bildirsayi = $this->Bildirim_Model->komisyon_bildirim_Sayisi($this->session->bolum_id,$this->session->bolum_id);
				$tumbildirimler = $this->Bildirim_Model->tumbildimler($this->session->bolum_id);
				$data['bildirim']=$bildir;
				$data['bildirim_sayisi']=$bildirsayi;
				$global_data = array('bildirim'=>$bildir,'bildirimsayi'=>$bildirsayi,'tumbildirimler'=>$tumbildirimler);
				$this->load->vars($global_data);
				   
				$onayli=1;
				$onaylidegil=0;
				$result=$this->Komisyon_Model->tumogrencileri_getir($onayli);
				$result2=$this->Komisyon_Model->tumogrencileri_getir($onaylidegil);
				$global_data = array('onaylilar'=>$result,'onaybekleyenler'=>$result2);
				$this->load->vars($global_data);
				$no=$this->session->no;
				$query=$this->Komisyon_Model->tbl_akademisyen_getir($no);
				$global_data = array('akademisyen'=>$query);
				$this->load->vars($global_data);
			}
	   

       
   }
   
   
   	
}


?>