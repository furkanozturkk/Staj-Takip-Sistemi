 <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Bütün Bildirimlerim</h2>
            </div>
  </header>   
       
         
<div class="col-lg-12" >
    <div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-12">
				 <div class="card text-white">
					<div class="card-header" style="background-color:#2f333e;">
					<i class="fa fa-volume-up" aria-hidden="true"></i> Bildirimler </a>
					</div>
					<div class="card-body" style="background-color:transparent; padding:3px;">
						<ul class="list-group list-group-flush">
						<?php
							foreach($bildirimler as $row){
 		echo "<li class='list-group-item' ><a style='color:#000; text-decoration:none; font-weight: bold;'>".$row->baslik." </br> <span style='display:inline-block; font-size:14px; font-weight:normal;'>".$row->icerik."</span><span style='float:right;position:absolute;display:inline-block; right:0;font-size:10px;'>".$row->gonderilme_tarih."</span></a></li>";
							}
						?>
						</ul>
					</div>
				</div>
				
				</div>
				
		
		
            </div> 
        </div>
    </div>
</div>



				