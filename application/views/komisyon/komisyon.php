<header class="page-header">
	<div class="container-fluid">
						
		<h2 class="no-margin-bottom">Öğrenciler  
		<?php  if($tum == "TumOgrenciler")
		{
			echo '<a class="pull-right">Tüm Öğrenciler</a>';
		}
		else if($tum=="StajiBitenler")
		{
				echo '<a class="pull-right">Staji Biten Öğrenciler</a>';
		}
		else{
			echo '<a class="pull-right">'.$tum.'.Sınıflar</a>';
		}
		?></h2>
	</div>
</header>
<div class="col-lg-12">
	<div style="padding:10px 0">
		
	</div>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-5">
					<div class="row">
					<div class="col-sm-5">
						<select id="ogrenciler" class="form-control" >
						  <option  value="TumOgrenciler">Tüm Öğrenciler</option>
						  <option  value="2012">2012-2013</option>
						  <option  value="2013">2013-2014</option>
						  <option  value="2014">2014-2015</option>
						</select>
					</div>
						<div class="col-sm-6">
							<a href="<?=base_url()?>Komisyon/Ogrenciler/StajiBitenler"><input  type='button' class='btn btn-success' value='Stajı Biten Öğrenciler'/></a>
						</div>
						
					</div>
				</div>
			
		<div class="col-sm-7">
			<?php $count = count($ogrenciler);
						if ($count != "0")
						{
								echo '<input id="denetmenyok" type="button" class="btn btn-info pull-right" value="Denetmeni Olmayan Öğrenciler"/>';
		
						}
						?>
		</div>
		</div>
			<br>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>Ögrenci No</th>
					    <th>Ögrenci Adı</th>
						<th>Telefon</th>
						<th>Sınıf</th>
						<th>Email</th>
						<th>Kalan Staj Gün</th>
						<th>Denetmeni</th>
						<?php
						foreach($akademisyen as $row){
							$yetki=$row->yetki;
						}
							 if($yetki==1){
								echo "<th>Denetmenler</th>";
								echo ";<th>Ayarlar</th>";
							 }
						?>
					</tr>
				</thead>
				<tbody>
					<tr>
					<?php 
						$count = count($ogrenciler);
						if ($count == "0")
						{
							echo'<td>
									Öğrenci Bulunmamaktadır.
								 </td>';
								 echo'<td>
								
								 </td>';
								 echo'<td>
									
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
							foreach($ogrenciler as $row)
							{
								
								echo "<td><input type='hidden' name='no' id='ogrNo' value='".$row->ogrenci_no."'>".$row->ogrenci_no."</input></td>";
								echo "<td><input type='hidden' id='idsi' value='".$row->ogrenci_no."'>".$row->ad_soyad."</td>";
								echo "<td>".$row->telefon."</td>";
								echo "<td><input type='hidden' name='no' id='sinif' value='".$tum."'>".$row->giris_yili."</td>";
								echo "<td>".$row->email."</td>";
								echo "<td>".$row->kalan_gun."</td>";
								
								if (Null == $row->no)
								{
									echo "<td><span class='badge badge-danger' style='color:#ffffff;'>Denetmen Yok</span></td>";
								}else{
									echo "<td>".$row->ds_ad."</td>";
								}
								
								if($yetki==1){
									echo "<td><select name='akademisyen' class='form-control xs'>";
									foreach($derssorumlulari as $row2)
									{
										
										echo "<option value= ".$row2->no.">".$row2->ad_soyad."</option>";
										
									}
								   echo "</select></td>";
								   
								   if (null != $row->no)
									{
										echo "<td>
										<div class='col-md-12'> 
											<button type='button' id='modal2'  class='btn btn-warning btn-sm'>
												<i class='fa fa-refresh' aria-hidden='true'></i>
											</button>
											
										</div>
										</td>";
									}else{
										echo "<td>
										<div class='col-md-12'> 
											<button type='button' id='modal2'  class='btn btn-success btn-sm '>
												<i class='fa fa-plus' aria-hidden='true'></i>
											</button>
											
										
										</div>
										</td>";
									}
								}
								
							   
						 ?>
					</tr>
					<?php   
							}   
						}
					?>
					<script>
					var url = window.location.href;
							var params = url.slice(-4);
							$('#ogrenciler').val(params).attr('selected','select');
							
					</script>
						<script>
						$("#ogrenciler").change(function(){
							$sinif = $(this).children(":selected").val();
							window.location.href = '<?=base_url();?>Komisyon/Ogrenciler/'+$sinif;
							
								
						});
				
					 var table = $('#example').DataTable();
						$("#denetmenyok").click(function(){
					   table.destroy();
					   var tbl = $('#example').DataTable({
						   "oSearch": {"sSearch": "Denetmen Yok"}
					   });
					});
 
	
					</script>
					
<script>
$('#example').on('click', '#modal2', function(){
	 $idim = $(this).parents("tr").find( ".xs option:selected" ).val();
	$ogrNo = $(this).parents("tr").find( "#ogrNo" ).val();
	$sinif = $(this).parents("tr").find( "#sinif" ).val();
        ssi_modal.confirm({
                    content: 'Denetmen Atamak istediğinize emin misiniz?',
                    okBtn: {
						
                        className: 'btn btn-primary'
					
                    },
                    cancelBtn: {
                        className: 'btn btn-danger'
                    }
                }, function (result) {
                    if (result){
						
							window.location.href = '<?=base_url();?>Komisyon/denetmeni_Degistir/'+$idim+"/"+$ogrNo+"/"+$sinif;
					}
                }
        );

    });
</script>
				</tbody>
			</table>
			
		</div>
	</div>
</div>