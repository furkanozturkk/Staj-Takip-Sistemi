<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bildirim_Model extends CI_Model{
	
	public function bildirim_Ekle($data)
	{
		$this->db->insert('tbl_bildirim',$data);
	}
	public function bildirim_Getir($ogrenci_no)
	{
		$result=$this->db->query("SELECT * FROM `tbl_bildirim` WHERE ogrenci_no=".$ogrenci_no." ORDER by ogrenci_no DESC LIMIT 5")->result();
		return $result;
	}
	public function bildirim_Sayisi($ogrenci_no)
	{
		$result=$this->db->query("SELECT * FROM `tbl_bildirim` WHERE ogrenci_no=".$ogrenci_no." and durum=1");
		
		return $result->num_rows();
	}
	public function komisyon_bildirim_Getir($ogrenci_no,$bolum_id)
	{
		$result=$this->db->query("SELECT * FROM `tbl_bildirim` WHERE ogrenci_no=".$ogrenci_no."  and bolum_id =".$bolum_id." ORDER by ogrenci_no DESC LIMIT 5")->result();
		return $result;
	}
	public function komisyon_bildirim_Sayisi($ogrenci_no,$bolum_id)
	{
		$result=$this->db->query("SELECT * FROM `tbl_bildirim` WHERE ogrenci_no=".$ogrenci_no." and bolum_id = ".$bolum_id." and durum=1 ");
		return $result->num_rows();
	}
	public function bildirim_Guncelle($id,$data){
		$this->db->where('ogrenci_no', $id);
		$this->db->update('tbl_bildirim',$data);
	}
	public function tum_bildirimler($ogrenci_no)
	{
		$result=$this->db->query("SELECT * FROM `tbl_bildirim` WHERE ogrenci_no=".$ogrenci_no." ORDER by ogrenci_no DESC")->result();
		return $result;
	}
	public function send_mail($isim,$eposta,$icerik,$baslik) { 
	require  "mailkutuphane/class.phpmailer.php";
	$mail = new PHPMailer(true);
	$mail->isSMTP();        
	$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
	$mail->SMTPAuth = true;
	$mail->Host     = 'smtp.yandex.com.tr';
	$mail->SMTPSecure = 'ssl';
	$mail->Port =465;// Gucenli baglanti icin 465 Normal baglanti icin 587
	$mail->IsHTML(true);
	$mail->SetLanguage("tr", "phpmailer/language");
	$mail->CharSet  ="utf-8";
	$mail->Username="ktustajtakip@yandex.com"; // Mail adresimizin kullanicı adi
	$mail->Password="kst123456"; // Mail adresimizin sifresi
	$mail->SetFrom("ktustajtakip@yandex.com", "KTU Staj Takip Uygulamasi Bilgilendirme");  // Mail attigimizda gorulecek ismimiz
	$mail->AddAddress($eposta); // Maili gonderecegimiz kisi yani alici
	$mail->Subject = $baslik; // Konu basligi
	$mail->Body = $icerik; // Mailin icerigi
	if(!$mail->Send()){
    echo "Mailer Error: ".$mail->ErrorInfo;
	} 
	else {
    echo "Mesaj gonderildi";
	}
	
	} 
	public function tumbildimler($ogrenci_no)
	{
		$result=$this->db->query("SELECT * FROM `tbl_bildirim` WHERE ogrenci_no=".$ogrenci_no."");
		return $result->num_rows();
	}
}

?>