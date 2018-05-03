<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Akademisyenler</h2>
	</div>
</header>
<div class="col-lg-12">
<?php 
						
			echo'<div style="padding:10px 0">
			<a href="'.base_url().'Komisyon/Komisyonuyeleri"><input type="button" class="btn btn-info btn-sm" value="Geri Dön" style="margin-right:5px;"></a>
		</div>';
						
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
						<th>Yetkiyi Geri Al</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php 
						$count = count($yetkililer);
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
								 echo'<td>
									
								 </td>';
								
								
						}
						else
						{
							foreach($yetkililer as $row)
							{
								echo "<td>".$row->akademisyen_no."</input></td>";
								echo "<td>".$row->ad_soyad."</td>";
								echo "<td>".$row->email."</td>";
								echo "<td>".$row->unvan."</td>";
								echo"<td><div class='col-md-12'> 
								<a href=".base_url()."Komisyon/komisyon_uyeye_yetki_gerial/".$row->akademisyen_no." class='col-md-3' ><button class='btn btn-danger btn-sm'/><i class='fa fa-sign-out' aria-hidden='true'></i></button></a>
								</div></td>";

									
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