 <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Duyurular</h2>
            </div>
          </header>  
<div class="col-lg-12 padding-header">
  <div class="card">
    <div class="card-body">
      <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Duyuru Başlık</th>
            <th>Duyuru İçerik</th>
            <th>Duyuru Tarih</th>
            <th>Denetmen Adı</th>
            <th>Duyuru Dosya</th>
			<th>Ayarlar</th>
			
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php 
			  
              foreach ($duyurular as $row) {

               
                  echo "<td><input type='hidden' id='idsi' value='".$row->id."'>".$row->baslik."</td>";
                  echo "<td>".$row->icerik."</td>";
                  echo "<td>".$row->tarih."</td>";
                  echo "<td>".$row->ad_soyad."</td>";
                  if($row->dosya != "Dosya Yok")
                    echo "<td><a href=".base_url()."duyuru/dosyaindir?id=".$row->id.">".$row->dosya."</a></td>";
                  else echo "<td>".$row->dosya."</td>";
				  
                  echo "<td><div class='col-xs-12'> 
											<a  class='col-xs-3' href=".base_url()."duyuru/duyuru_Guncelle/".$row->id."><button class='btn btn-warning btn-sm' /><i class='fa fa-pencil' aria-hidden='true'></i></button></a>
											<a  class='col-xs-3'><button class='btn btn-danger btn-sm'  id='modal2' /><i class='fa fa-times' aria-hidden='true'></i></button></a>
	
										</div></td>";
              
				

            ?>
          </tr>
            <?php  } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
 <script>
$('#example').on('click', '#modal2', function(){
	$duyuru_id = $(this).parents("tr").find( "#idsi" ).val();
        ssi_modal.confirm({
                    content: 'Duyuruyu silmek istediğinize emin misiniz?',
                    okBtn: {
						
                        className: 'btn btn-primary'
					
                    },
                    cancelBtn: {
                        className: 'btn btn-danger'
                    }
                }, function (result) {
                    if (result){
						window.location.href = '<?=base_url();?>duyuru/duyuru_Sil/'+$duyuru_id;
					}
                }
        );

    });
</script>


										
