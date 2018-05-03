

			</div>
		</div>
	  </div>
      

      <script type="text/javascript">
         $(document).ready(function () {	
         $(".list-unstyled > li ").click(function(){
         $(".list-unstyled li").removeClass();
          	$(this).addClass("active");
          });
         });
         
      </script>
      <script>
         $.extend( $.fn.dataTable.defaults, {
          responsive: true
         } );
         
         $(document).ready(function() {
          $('#example').DataTable();
         } );
      </script>
      <script>
         $(document).ready(function () {	
         $("#example_filter input").addClass("form-control");
         $("#example_filter input").attr("placeholder", "Ara");
         $("#example_length select").addClass("form-control");
         });
      </script>
      
<script type="text/javascript">
         // Ajax post
         $(document).ready(function() {
         $("#notifications").click(function(event) {
         event.preventDefault();
		 var logintip="<?= $this->session->loginType ?>";
		 if (logintip == "Komisyonuye")
		 {
			   var ogrno=<?= $this->session->bolum_id ?>;	   
		 }
		 else{
			 var ogrno=<?= $this->session->no ?>;
		 }
        
         
         
         jQuery.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>" + "Bildirim/bildirim_gorme", 
         dataType: 'json',
         data: {name: ogrno},
		 
         });
         });
         });
      </script>
	  <script>
	  $( "#notifications" ).on( "click", function() {
	  $("#notifications #bsayisi").text('');
	 
	  });
	  
	  </script>
	  
	 
	<script type="text/javascript">  
	
         $("#b_gonder").click(function(event) {
         event.preventDefault();
        var ogr=$('select[name=o_ogr]').val();
		var mesaj=$("#mesaj").val();
        var bolum=<?= $this->session->bolum_id ?>;	 
		var isim="<?= $this->session->ad_soyad ?>";	 
         
        jQuery.ajax({
         type: 'POST',
         url: "<?php echo base_url(); ?>" + "Bildirim/bildirim_gonder", 
         dataType: 'html',
         data: {ogr: ogr, mesaj: mesaj, bolum: bolum, isim: isim},
		 success: function(data) {
			  alert(data);

		},
			error: function(data){
		   console.log(data);
  }
         });
		 
		 console.log(ogr);
         });
         
      </script>  
	
	  
<script>
	$( "#guncelle_button" ).click(function() {
		var inputs = document.getElementsByClassName("form-control p");
			for(var i = 0; i < inputs.length; i++) {
				inputs[i].disabled = false;
			}
			$( "#guncelle_button" ).removeClass( "fa fa-lock" ).addClass( "fa fa-unlock-alt" );
			$( "#btn_guncelle" ).css("visibility","visible");
			$( "#datePickerbita" ).attr("id","datePickerbit");
			$( "#datePickerbasa" ).attr("id","datePickerbas");

				$(function(){
						 $("#datePickerbas").datepicker({
				        	autoclose: true,
				            format: "yyyy-mm-dd",
				            language:"tr"
				        });
				
						 $("#datePickerbit").datepicker({
				        	autoclose: true,
				            format: "yyyy-mm-dd",
				            language:"tr"
							});
					}); 
					
		});

	
		
</script>
<script>
      $(document).ready(function () {	
      	$stajdurumu=$("#stajDurum").val();
      	$stajyeridurumu=$("#stajyeriDurum").val();
      	
      	var inputs = document.getElementsByClassName("form-control a");
      		for(var i = 0; i < inputs.length; i++) {
      		inputs[i].disabled = true;
      	}
      	
      	if(($stajdurumu==2 || $stajdurumu==0) && $stajyeridurumu==0){
      	$( "#guncelle_button" ).click(function() {
      		var inputs = document.getElementsByClassName("form-control a");
			
      		for(var i = 0; i < inputs.length; i++) {
      			inputs[i].disabled = false;
      		}  
      		$( "#guncelle_button" ).removeClass( "fa fa-lock" ).addClass( "fa fa-unlock-alt" );
      		$( "#btn_tekrarBasvuru" ).css("visibility","visible");
      		$( "#datePickerbita" ).attr("id","datePickerbit");
      		$( "#datePickerbasa" ).attr("id","datePickerbas");
      
      		$(function(){
      				 $("#datePickerbasgun").datepicker({
      					autoclose: true,
      					format: "yyyy-mm-dd",
      					language:"tr"
      				});
      		
      				 $("#datePickerbitgun").datepicker({
      					autoclose: true,
      					format: "yyyy-mm-dd",
      					language:"tr"
      					});
      			}); 
      
      });
      }
      
      	else if($stajdurumu==2 || $stajdurumu==0 && $stajyeridurumu==1){
      		
      		$( "#guncelle_button" ).click(function() {
      		var inputs = document.getElementsByClassName("form-control a b");
      		for(var i = 0; i < inputs.length; i++) {
      			inputs[i].disabled = false;
      		}
      		$( "#guncelle_button" ).removeClass( "fa fa-lock" ).addClass( "fa fa-unlock-alt" );
      		$( "#btn_tekrarBasvuru" ).css("visibility","visible");
      		$( "#checked" ).css("visibility","visible");
      		$( "#checked2" ).css("visibility","visible");
      		$( "#datePickerbita" ).attr("id","datePickerbit");
      		$( "#datePickerbasa" ).attr("id","datePickerbas");
      
      		$(function(){
      				 $("#datePickerbasgun").datepicker({
      					autoclose: true,
      					format: "yyyy-mm-dd",
      					language:"tr"
      				});
      		
      				 $("#datePickerbitgun").datepicker({
      					autoclose: true,
      					format: "yyyy-mm-dd",
      					language:"tr"
      					});
      			}); 
      
      });
      	}
      });
	  
   </script>
   <script>
$(".js-example-responsive").select2({
    width: 'resolve' // need to override the changed default
});
   </script>
<script>
	  $(".ozel-select").next().css('border', '1px solid #dad9d9');
	 
	  </script>

	  <script> 
	  	$( ".tolgaiskender" ).click(function()
		{
			deger=$(this).find(".baslik").text();
			if(deger=="Staj Başvurusu")
			{
				window.location.href="<?php baseurl(); ?>/stajbasvuru";
			}
		});
	  
	  </script>
   


   </body>
      
</html>