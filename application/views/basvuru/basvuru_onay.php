 <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Staj Başvuru Onayı</h2>
            </div>
          </header>   
       
         
<div class="col-lg-12" >

    <div class="card">
		<div class="card-body">
		<a href="<?=base_url()?>Stajbasvuru/onaylanmis_basvurulari_getir"><input type='submit' class='btn btn-success' value='Onaylanmış Başvurular'/></a>
		<a href="<?=base_url()?>Stajbasvuru/reddedilmis_basvurulari_getir"><input type='submit' class='btn btn-danger' value='Reddedilmiş Başvurular'/></a>

		<br><br>
			 
			 <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>

	                    <th>No</th>
	                    <th>Ad Soyad</th>
	                    <th>Başlama Tarihi</th>
	                    <th>Bitiş Tarihi</th>
	                    <th>Gün</th>
						<th>İşyeri Bilgileri</th>
						<th>Stajyeri Onay</th>
						<th>Başvuru Onayı</th>
						
	                    
						
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
							foreach($basvurular as $row){
								$staj_durum=$row->staj_durum;
							}
							if(count($basvurular)==0){
								echo "<td style='witdh=auto;'>Onay Bekleyen Başvuru Bulunmamaktadır</td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td></td>";
							}else{
                             foreach($basvurular as $row){
								 if($row->staj_durum==0){
									echo "<td>".$row->ogrenci_no."</td>";
									echo "<td>".$row->ad_soyad."</td>";
									echo "<td>".$row->baslama_tarihi."</td>";
									echo "<td>".$row->bitis_tarihi."</td>";
									echo "<td>".$row->staj_gun."</td>";
									echo "<td>".$row->stajyeri_ad."<a href=".base_url()."stajbasvuru/sirket_onay/".$row->id."/".$row->ogrenci_no." class='col-md-3 pull-right' id='info-sirket' ><button class='btn btn-info btn-sm'/><i class='fa fa-eye' aria-hidden='true'></i></button></a> </td>";
									
									if($row->durum == 1)
										echo "<td><span class='badge badge-success'>Onaylı</span></td>";
									else if($row->durum == 0)
										echo "<td><span class='badge badge-warning' style='color:#ffffff;'>Onay Bekleniyor</span></td>";
									else
										echo "<td></td>";

									if($row->durum == 1)
										echo "<td><div class='col-md-12'> 
													<a href=".base_url()."Stajbasvuru/basvuruyu_kabulet/".$row->sbilgi_id."/".$row->id."/".$row->ogrenci_no." class='col-md-3' ><button class='btn btn-success btn-sm'/><i class='fa fa-check' aria-hidden='true'></i></button></a>
													<a href=".base_url()."Stajbasvuru/basvuruyu_reddet/".$row->sbilgi_id."/".$row->id."/".$row->ogrenci_no." class='col-md-3'><button class='btn btn-danger btn-sm' /><i class='fa fa-times' aria-hidden='true'></i></button></a>
											</div></td>";
									else 
										echo "<td>Şirket Onaylanmalı</td>"; 
								
                            ?>
					 
  
							<?php  
							}	//ifin
							echo"</tr>";
							}	//foreachin
																		}	//elsenin
							?>
		
                </tbody>
				
            </table>
        </div>

    </div>
</div>

