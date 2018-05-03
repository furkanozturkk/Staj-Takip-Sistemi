<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Kabul Gün Girişi</h2>
	</div>
</header>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>Öğrenci No</th>
					    <th>Ad Soyad</th>
						<th>Staj Defteri</th>
						<th>Anket Formu</th>
						<th>Yapılan Gün</th>
						<th>Kalan Gün</th>
						<th>Ayarlar</th>

					</tr>
				</thead>
				<tbody>
					<tr>
					<?php 
						$count = count($ogrenciler);
						if ($count == "0")
						{
							echo'<td>Kabul gün girişi bekleye öğrenci bulunmamaktadır</td>';
							echo'<td></td>';
							echo'<td></td>';
							echo'<td></td>';
							echo'<td></td>';
							echo'<td></td>';
							echo'<td></td>';
							echo'<td></td>';
						}
						else
						{
							foreach($ogrenciler as $row) 
							{
								if($row->akademisyen_no==$this->session->no){
									if($row->staj_defteri!='' and $row->anketform!=''){
										echo "<td>".$row->ogrenci_no."</td>";
										echo "<td>".$row->ad_soyad."</td>";
										echo "<td><a href=".base_url()."Ogrenci/stajdefteridosyaindir?id=".$row->ogrenci_no.">".$row->staj_defteri."</a></td>";
										echo "<td><a href=".base_url()."Ogrenci/anketdosyaindir?id=".$row->ogrenci_no.">".$row->anketform."</a></td>";

										echo "<td>".$row->staj_gun."</td>";
										echo "<td>".$row->kalan_gun."</td>";
											echo "<td><form action='".base_url()."Denetmen/staj_kabul_gun_giris/".$row->ogrenci_no."' method='post' novalidate='novalidate'>
												<div class='col-md-12'> 
													<div class='row'>
													<div class='col-sm-9'><input type='number' class='form-control' name='kabul_gun' min='1' max='".$row->staj_gun."' placeholder='Kabul Gün' required='required'></div>
													<div class='col-sm-3'><button name='btn_kabulgiris' class='btn btn-success btn-sm' /><i class='fa fa-check' aria-hidden='true'></i></button></div>
												</div></div>
											</form></td>";
									
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
			<?php 
			echo "<br><br>";
							$bosgirilmez=$this->session->flashdata('bosgirilmez');
							echo $bosgirilmez;
							$gunyanlis=$this->session->flashdata('gunyanlis');
							echo $gunyanlis;
			?>
		</div>
	</div>
</div>