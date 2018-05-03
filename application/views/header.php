<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Tez</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="all,follow">
      <!-- Bootstrap CSS-->

      <link rel="stylesheet" href="/tez/application_resources/vendor/bootstrap/css/bootstrap.min.css">
      <!-- Fontastic Custom icon font-->
      <link rel="stylesheet" href="/tez/application_resources/css/fontastic.css">
      <!-- Font Awesome CSS-->
      <link rel="stylesheet" href="/tez/application_resources/vendor/font-awesome/css/font-awesome.min.css">
      <!-- Google fonts - Poppins -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
      <!-- theme stylesheet-->
      <link rel="stylesheet" href="<?php echo base_url();?>application_resources/css/style.default.css" id="theme-stylesheet">
      <!-- Custom stylesheet - for your changes-->
	  
      <link rel="stylesheet" href="/tez/application_resources/css/custom.css">
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
      <link rel="stylesheet" href="/tez/application_resources/css/jquery.dataTables.min.css" />
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css"/>
      <link rel="stylesheet" href="/tez/application_resources/css/ssi-modal.css"/>



      <!-- Favicon-->
      <link rel="shortcut icon" href="<?php echo base_url();?>application_resources/favicon.png">
      <!-- Tweaks for older IEs--><!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <style>
         #profilim {
         display:none;
         }
         @media screen and (max-width: 1199px) {
         #profilim {
         display:block;
         }
         }
      </style>

	     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		 
		       <script src="<?php echo base_url();?>application_resources/js/ssi-modal.js"></script>
	  	  <script src="https://code.jquery.com/jquery-1.9.0b1.min.js"
        integrity="sha256-oySIpOV91gBjQNQ6dzegyTYDoVDfkFRPmpCzGgS3DZI=" crossorigin="anonymous"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
      <script src="/tez/application_resources/vendor/popper.js/umd/popper.min.js"> </script>
      <script src="/tez/application_resources/vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="/tez/application_resources/vendor/jquery.cookie/jquery.cookie.js"> </script>
      <script src="/tez/application_resources/vendor/jquery-validation/jquery.validate.min.js"></script>
      <script src="/tez/application_resources/js/front.js"></script>
      <script src="/tez/application_resources/js/dtpicker.js"></script>
      <script src="/tez/application_resources/js/datatables.js"></script>
      <script src="/tez/application_resources/js/jquery.dataTables.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
	  	  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	  
	  
	  <link href="/tez/application_resources/css/select2.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

 <style>
 input[type=text], input[type=password] {

	width:100%;
    padding: 5px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
 }
.ozel-select{
	width: 100%;
    padding: 5px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
   .burasi{
right:14%;
}
@media screen and (max-width: 768px) {
    .burasi{
right:0%;
}
}
   .bura2{
right:10%;
}
@media screen and (max-width: 768px) {
    .bura2{
right:0%;
}
}


</style>
	  
   

   </head>
   <body>
      <div class="page home-page">
      <!-- HEADER -->      
      <header class="header">
         <nav class="navbar">
            <!-- Search Box-->
			
			

            <div class="container-fluid">
               <div class="navbar-holder d-flex align-items-center justify-content-between">
                  <!-- Navbar Header-->
                  <div class="navbar-header">
                     <!-- Navbar Brand -->
                     <a 
					 <?php if(!$this->session->kayit_durum == TRUE)
					 {
						echo 'href="/tez/Ana/anasayfa"';
					 }
					 ?>
					 class="navbar-brand">
                        <div class="brand-text brand-big"><span>Staj</span><strong>Takip</strong></div>
                        <div class="brand-text brand-small"><strong>ST</strong></div>
                     </a>
                     <!-- Toggle Button--><a id="toggle-btn" href="" class="menu-btn active"><span></span><span></span><span></span></a>
                  </div>
                  <!-- Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                     <!-- Search-->
				<li class="nav-item dropdown"> 
				<li class="nav-item dropdown"> <a id="messages"  rel="nofollow" data-target="#"  aria-haspopup="true" aria-expanded="false" class="nav-link acma"><i class="fa fa-envelope-o"></i></a>
                  <div aria-labelledby="notifications" class="dropdown-menu row burasi"  >
                    <div class="col-sm-12">
						<h2>Bildirim Gönder</h2> 	
						<select class="js-example-responsive ozel-select" style="width: 100%" name="o_ogr" id="ogr_no" >
							  <optgroup label="Onay Bekleyen Öğrenciler" >
								<?php foreach($onaybekleyenler as $row){ ?>
						<option value='<?=$row->ogrenci_no?>'> <?=$row->ad_soyad?>	</option>	
									
										
					<?php } ?>
							</optgroup>
							<optgroup label="Diğer Öğrenciler" >
								<?php foreach($onaylilar as $row){ ?>
								<option value='<?=$row->ogrenci_no?>'><?=$row->ad_soyad?></option>						
					<?php } ?>
							</optgroup>
						</select>						
						
						<textarea style="resize:none;" rows="4" maxlength="200"; class="ozel-select" placeholder="Mesajınızı Giriniz" id="mesaj" required></textarea>	
						<button name="btn_login"  class="btn btn-success" id="b_gonder" >Gönder</button> 
						
			</div>
                  </div>
                </li>
					   
                     <!-- Notifications-->
                     <?php 

                echo ' <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link  acma2"><i class="fa fa-bell-o"></i>';
				 echo '<input type="hidden" id="hdname" value="'.$this->session->no.'">';
				    if ($bildirimsayi != "0")
					{
					 echo '<span id="bsayisi" class="badge bg-red">'.$bildirimsayi.'</span></a>';
					}
				echo '</a>
                  <ul aria-labelledby="notifications" class="dropdown-menu burasi2 bura2">';
				   foreach($bildirim as $row) 
					{
						echo'<li class="tolgaiskender"><a rel="nofollow"  class="dropdown-item "> 
                        <div class="notification"> 
                          <div class="notification-content baslik"><i class="fa fa-envelope bg-green" ></i>'.$row->baslik.' </div>
                          <div class="notification-time" ><small>'.$row->icerik.'</small></div>
						  <div class="notification-time"><small>'.$row->gonderilme_tarih.'</small></div>
                        </div></a></li>';
					}
                    
					if ($tumbildirimler != "0")
					{
						if($this->session->loginType == "Ogrenci" or $this->session->loginType == "Denetmen")
						{
						echo '<a rel="nofollow" href="'.base_url().'Bildirim/tum_bildirimler/'.$this->session->no.'" class="dropdown-item all-notifications text-center"> <strong>Bütün bildirimleri gör</strong></a></li>';
					    }
						else
						{
							echo '<a rel="nofollow" href="'.base_url().'Bildirim/tum_bildirimler/'.$this->session->bolum_id.'" class="dropdown-item all-notifications text-center"> <strong>Bütün bildirimleri gör</strong></a></li>';
						}
					}
					else
					{
						echo '<a rel="nofollow"  class="dropdown-item all-notifications text-center"> <strong>Şuan Bildirim Bulunmamaktadır.</strong></a></li>';
					}
                 echo '</ul>
                </li>';
				?>
                    </li>
                     <!-- Logout    -->
                     <li class="nav-item"><a href="<?= base_url();?>Ana/logout" class="nav-link logout">Logout<i class="fa fa-sign-out" style="margin-left:5px;"></i></a></li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      <!--  HEADER -->
      <div class="page-content d-flex align-items-stretch" style="height:90%;">
      <!-- Side Navbar -->
      <nav class="side-navbar">
         <!-- Sidebar Header-->
         <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src=" <?= base_url("application_resources/img/".$this->session->resim); ?>"   alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
               <h1 class="h4"><?= $this->session->ad_soyad  ?> </h1>
               <p><?= $this->session->unvan; ?></p>
               <?php
                  if ($this->session->loginType=="Ogrenci")
                  
                    {
                  $profil=$this->session->flashdata('profil');
                  echo '<p><a href='.base_url().'profil/>Profilim</a></p>';
                  }
				  
                  ?>
			</div>
         </div>
         <ul class="list-unstyled">
            <?php
               if($this->session->loginType == "Komisyonuye"){
                 echo '<li> <a href='.base_url().'Ana/anasayfa><i class="icon-home"></i>Anasayfa</a></li>';
                 echo '<li> <a href='.base_url().'duyuru/> <i class="icon-grid"></i>Duyurular </a></li>';
                 echo '<li> <a href='.base_url().'Sirketler> <i class="icon-picture"></i>Şirketler</a></li>';
				 echo '<li> <a href='.base_url().'Komisyon/Komisyonuyeleri> <i class="icon-interface-windows"></i>Akademisyenler</a></li>';
                 echo '<li> <a href='.base_url().'Komisyon/DersSorumlulari> <i class="icon-interface-windows"></i>Ders Sorumluları</a></li>';
                 echo '<li> <a href='.base_url().'Komisyon/Ogrenciler/TumOgrenciler> <i class="icon-interface-windows"></i>Öğrenciler</a></li>';
				 echo '<li> <a href='.base_url().'Stajbasvuru/basvuru_kabul> <i class="icon-interface-windows"></i>Staj Başvuru Onayı</a></li>';

				foreach($akademisyen as $roww){
					$yetki=$roww->yetki;
					$ders_sorumlusu=$roww->ders_sorumlusu;
				}   
				if($yetki==1){
					echo '<li> <a href='.base_url().'Komisyon/ogrenci_kayit> <i class="icon-interface-windows"></i>Öğrenci Kayıt Onayı</a></li>';
			    }
				if($ders_sorumlusu==1){
					echo '<li> <a href='.base_url().'Denetmen/staj_kabul_gun> <i class="icon-interface-windows"></i>Staj Kabul Gün Girişi</a></li>';
				}
			   }
			   
               if(!$this->session->kayit_durum)
			   {
               if($this->session->loginType == "Ogrenci" ){
                 echo '<li> <a href='.base_url().'Ana/anasayfa><i class="icon-home"></i>Anasayfa</a></li>';
                 echo '<li id="profilim"> <a href='.base_url().'profil/><i class="fa fa-user" aria-hidden="true"></i> Profilim </a></li>';
                 echo '<li> <a href='.base_url().'stajbasvuru/> <i class="icon-padnote"></i>Başvuru Formu </a></li>';
                 echo '<li> <a href='.base_url().'Ogrenci/raporyukleme> <i class="icon-screen"></i>Rapor Yükle </a></li>';
                 echo '<li> <a href='.base_url().'Sirketler/> <i class="icon-picture"></i>Şirketler</a></li>';
               }
               }
               if($this->session->loginType == "Denetmen" ){	
                 echo '<li> <a href='.base_url().'Ana/anasayfa><i class="icon-home"></i>Anasayfa</a></li>';
                 echo '<li> <a href='.base_url().'duyuru/> <i class="icon-grid"></i>Duyurular </a></li>';
                 echo '<li> <a href='.base_url().'Sirketler/> <i class="icon-picture"></i>Şirketler</a></li>';
                 echo '<li> <a href='.base_url().'Denetmen/ogrenci_listele> <i class="icon-interface-windows"></i>Öğrenciler</a></li>';
               	foreach($akademisyen as $roww){
					$ders_sorumlusu=$roww->ders_sorumlusu;
				}    
				if($ders_sorumlusu==1){
					echo '<li> <a href='.base_url().'Denetmen/staj_kabul_gun> <i class="icon-interface-windows"></i>Staj Kabul Gün Girişi</a></li>';
				}
				else echo "sa";
			   }
               

                ?>
         </ul>
      </nav>
      <div class="content-inner">
	  <script> 
	  $(".acma").click(function(){
		  $(".burasi").toggle();
		  
	  });
	  $(".acma2").click(function(){
		  $(".burasi2").toggle();
	  });
	  </script>