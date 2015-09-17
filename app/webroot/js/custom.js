$( document ).ready(function() {
     
	var idtype =$( "#RapcubeType option:selected").val();
	//alert(idtype);
	$('#RapcubeType').on('change', function() {
		var idtypeon =$( "#RapcubeType option:selected").val();
		
		//alert(idtypeon);
		if(idtypeon==1){
			$('#updateset').removeClass( "hide" );
			$('#btsend').removeClass( "hide" );
			$('#queryfield').addClass( "hide" );
			$('#btsendq').addClass( "hide" );
			
			
		};
		if(idtypeon==2){
			$('#updateset').addClass( "hide" );			 
			$('#btsend').addClass( "hide" );
			$('#queryfield').removeClass( "hide" );
			$('#btsendq').removeClass( "hide" );
			 //alert("2");
			
			 
			 
			};
		if(idtypeon==0){
			$('#updateset').addClass( "hide" );
			$('#btsend').addClass( "hide" );
			$('#queryfield').addClass( "hide" );
			$('#btsendq').addClass( "hide" );
		};
	});
	
	
	if(idtype==1){
		$('#updateset').removeClass( "hide" );
		$('#btsend').removeClass( "hide" );
		$('#queryfield').addClass( "hide" );
		$('#btsendq').addClass( "hide" );
		 
	};
	if(idtype==2){
		$('#updateset').addClass( "hide" );
		$('#btsend').addClass( "hide" );
		$('#queryfield').removeClass( "hide" );
		};
	if(idtype==0){
		$('#updateset').addClass( "hide" );
		$('#btsend').addClass( "hide" );
		$('#queryfield').addClass( "hide" );
		$('#btsendq').addClass( "hide" );
		    
	};
	 
	
});