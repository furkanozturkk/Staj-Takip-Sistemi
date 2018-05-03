<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Akademisyenler</h2>
	</div>
</header>
<div class="col-lg-12">
<?php foreach($akademisyen as $row)			
	{
		$baskan=$row->baskan;
		$yetki=$row->yetki;
	}
						
	if($yetki=="1")
		{
		echo'<div style="padding:10px 0">
			<a href="'.base_url().'Komisyon/Komisyonuye_ekle"><input type="button" class="btn btn-info btn-sm" value="Komisyon Üye Ekle" style="margin-right:5px;"></a>
		</div>';
		}
	
	if($baskan=="1")
		{
		echo'<div style="padding:10px 0">
			<a href="'.base_url().'Komisyon/yetkilileri_gor"><input type="button" class="btn btn-info btn-sm" value="Yetkilileri Gör" style="margin-right:5px;"></a>
		</div>';
		}
?>
	<div class="card">
		<div class="card-body">
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>No</th>
					    <th>Ad Soyad</th>
						<th>Email</th>
						<th>Ünvan</th>
						
						<?php
						if($yetki=="1")
						{
							echo'<th>Üyeyi Sil</th>';
							echo'<th>Ders Sorumlusu Ata</th>';
							if($baskan==1){
							echo'<th>Yetki Ver</th>';
							echo'<th>Komisyon Başkanı Yap</th>';
							}
						}						
						?>
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php 
						$count = count($komisyonuyeleri);
						if ($count == "0")
						{
							echo'<td>
									Komisyon Uye  Bulunmamaktadır.
								 </td>';
								 echo'<td>
								
								 </td>';
								 echo'<td>
									
								 </td>';
								 echo'<td>
									
								 </td>';
								
								
						}
						else
						{
							foreach($komisyonuyeleri as $row)
							{
								$uyebasgandurum=$row->baskan;
								echo "<td>".$row->akademisyen_no."</input></td>";
								echo "<td>".$row->ad_soyad."</td>";
								echo "<td>".$row->email."</td>";
								echo "<td>".$row->unvan."</td>";
								if($yetki=="1")
								{
									echo"<td><div class='col-md-12'> 
								  <a href=".base_url()."Komisyon/komisyon_uye_sil/".$row->akademisyen_no." class='col-md-3' ><button class='btn btn-danger btn-sm'/><i class='fa fa-sign-out' aria-hidden='true'></i></button></a>
									</div></td>";
									if($row->sorumlumukontrol!=$row->akademisyen_no)
									echo"<td><div class='col-md-12'> 
								  <a href=".base_url()."Komisyon/sorumlu_olarak_ata/".$row->akademisyen_no." class='col-md-3' ><button class='btn btn-warning btn-sm'/><i class='fa fa-sign-out' aria-hidden='true'></i></button></a>
									</div></td>";
									else echo "<td>Atandı</td>";
									if($baskan==1){
										if($uyebasgandurum!="1"){
												if($row->yetki==0){
													echo"<td><div class='col-md-12'> 
													  <a href=".base_url()."Komisyon/komisyon_uyeye_yetki_ver/".$row->akademisyen_no." class='col-md-3' ><button class='btn btn-warning btn-sm'/><i class='fa fa-sign-out' aria-hidden='true'></i></button></a>
													</div></td>";
												}else
													echo "<td>Yetkili</td>";
											
											echo"<td><div class='col-md-12'> 
											  <a href=".base_url()."Komisyon/KomisyonBaskaniYap/".$row->akademisyen_no." class='col-md-3' ><button class='btn btn-success btn-sm'/><i class='fa fa-sign-out' aria-hidden='true'></i></button></a>
											</div></td>";
										}
										else{
											echo "<td>Yetkili</td>";
											echo "<td>Başkan</td>";
										}
									}
								}
								
						 ?>
					</tr>
					<?php   
							}   
						}
					?>
					
				</tbody>
			</table>
		
		</div>
	</div>
</div>