$(document).ready(function(){	

	 $("#send").click(function(){

	 	 $("#send").hide("slow");		
	 	 $("#load").show("slow");

		  var error = 0; /*comienzo el error en cero */

		  /*Traigo los datos del formulario */	

		  var txtnombre=$("#nombre").val();		  

		  var txtapaterno=$("#apaterno").val();

		  var txtamaterno=$("#amaterno").val();
		  		  
		  var dia = $("#dia option:selected").val();
		  
		  var mes = $("#mes option:selected").val();
		  
		  var anio = $("#anio option:selected").val();

          var errorestxt = "";

		  var errorestxtnombre = "";
		  var errorestxtapaterno = "";
		  var errorestxtamaterno = ""; 
		   var errorestxtfecnac = ""; 		 

		  var errorestxtemail = "";	 

		  var errorestxtmensaje = "";
		

		    if(!validaLongitud(txtnombre, 0, 3, 255)){			
			error = 1;
			$('#nombre').css( "border", "2px solid red" );
			errorestxtnombre="El nombre no puede ser vacío.";
			
			$("#AvisoNombre").css({"position":"absolute","left":"236px","top":"35px"});
			$("#AvisoNombre").html(errorestxtnombre+"<span class='span-error'></span>");		
			$("#AvisoNombre").show();
			
			}else{				
			$('#nombre').css( "border", "1px solid #01C601" );
			 $("#AvisoNombre").hide();
			}
	
			if(!validaLongitud(txtapaterno, 0, 2, 255)){			
			error = 1;
			$('#apaterno').css( "border", "2px solid red" );
			errorestxtapaterno="El apellido paterno no puede ser vacío.";
			
			$("#AvisoPaterno").css({"position":"absolute","left":"236px","top":"98px"});
			$("#AvisoPaterno").html(errorestxtapaterno+"<span class='span-error'></span>");		
			$("#AvisoPaterno").show();
			
			}else{
			$('#apaterno').css( "border", "1px solid #01C601" );
			 $("#AvisoPaterno").hide();
			}

			if(!validaLongitud(txtamaterno, 0, 2, 255)){			
			error = 1;
			$('#amaterno').css( "border", "2px solid red" );
			errorestxtamaterno="El apellido materno no puede ser vacío.";
			
			$("#AvisoMaterno").css({"position":"absolute","left":"236px","top":"154px"});
			$("#AvisoMaterno").html(errorestxtamaterno+"<span class='span-error'></span>");		
			$("#AvisoMaterno").show();
			}else{
			$('#amaterno').css( "border", "1px solid #01C601" );
			 $("#AvisoMaterno").hide();
			}
			
			if(!validaNumero(dia, 0, 1, 255)){			
			error = 1;
			$('#dia').css( "border", "2px solid red" );
			errorestxtfecnac="La fecha de nacimiento no puede ser vacía.";
			
			$("#AvisoFecNac").css({"position":"absolute","left":"236px","top":"206px"});
			$("#AvisoFecNac").html(errorestxtfecnac+"<span class='span-error'></span>");		
			$("#AvisoFecNac").show();
			//errores += "Día de Nacimiento \n";
			}else{
			$('#dia').css( "border", "1px solid #01C601" );
			$("#AvisoFecNac").hide();
			}
			
			
			if(!validaNumero(mes, 0, 1, 255)){			
			error = 1;
			$('#mes').css( "border", "2px solid red" );
			errorestxtfecnac="La fecha de nacimiento no puede ser vacía.";
			
			$("#AvisoFecNac").css({"position":"absolute","left":"236px","top":"206px"});
			$("#AvisoFecNac").html(errorestxtfecnac+"<span class='span-error'></span>");		
			$("#AvisoFecNac").show();
			}else{
			$('#mes').css("border", "1px solid #01C601" );
			$("#AvisoFecNac").hide();
			}
			
			if(!validaLongitud(anio, 0, 1, 5)){						
			error = 1;
			$('#anio').css( "border", "2px solid red" );
			errorestxtfecnac="La fecha de nacimiento no puede ser vacía.";
			
			$("#AvisoFecNac").css({"position":"absolute","left":"236px","top":"206px"});
			$("#AvisoFecNac").html(errorestxtfecnac+"<span class='span-error'></span>");		
			$("#AvisoFecNac").show();
			}else{				
			$('#anio').css( "border", "1px solid #01C601" );
			$("#AvisoFecNac").hide();
			}
  		    

  		    

		 if(error==0){	//Mostrar espere.

	   $("#frmAviso").html("Un momento...");

	   $("#frmAviso").show("slow");

		document.contact_form.submit(); 

			//El cliente se agrego con exito
			//error en registro

		 }else{	

		$("#load").hide("slow"); 

		$("#send").show("slow");

		
		$("#frmAviso").html('*Por favor revisa los campos ');		
        

		$("#AvisoMail").html(errorestxtemail);			

		$("#AvisoMensaje").html(errorestxtmensaje);

		 }

	 });/*Fin de la funcion click*/


}); /*fin de documen ready*/