 <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Kayıt Onayı Bekleyen Öğrenciler</h2>
            </div>
          </header>   
       
         
<div class="col-lg-12" >
    <div class="card">
		<div class="card-body">
           <table id="example" class="display" cellspacing="0" width="100%">
			   <thead>
                    <tr>
	                    <th>Öğrenci No</th>
	                    <th>Ad Soyad</th>
	                    <th>Telefon</th>
	                    <th>Giriş Yılı</th> 
	                    <th>Adres</th>
						<th>Ayarlar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
							$count = count($ogrenciler);
							
							if ($count == "0")
							{
								echo "<td>Kayıt onayı bekleyen öğrenci bulunmamaktadir!</td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td></td>";
								
							}
							else
							{
							
                             foreach($ogrenciler as $row){
							    echo "<td>".$row->ogrenci_no."</td>";
								echo "<td>".$row->ad_soyad."</td>";
								echo "<td>".$row->telefon."</td>";
								echo "<td>".$row->giris_yili."</td>";
								echo "<td>".$row->adres."</td>";
								echo "<td><a href='".base_url()."Komisyon/ogrenci_kayit_kabul/".$row->ogrenci_no."' class='col-md-3' ><button class='btn btn-success btn-sm'/><i class='fa fa-check' aria-hidden='true'></i></button></a>
										<a href='".base_url()."Komisyon/ogrenci_kayit_red/".$row->ogrenci_no."' class='col-md-3'><button class='btn btn-danger btn-sm' /><i class='fa fa-times' aria-hidden='true'></i></button></a>
									  </td>";
                            ?>
					   </tr>
							<?php  } }?>
                </tbody>
				
            </table>
        </div>
    </div>
</div>
