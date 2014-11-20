$(document).ready(function() {
	ruta = "http://identidadatleta.com/cms/";
	//interaccion registro
	 $("#btnRegistrar").click(function(){
	     registra_javascript();
	 });

	 function registra_javascript(){
	 	//declaracion
	        var error = 0;
	        var preguntas = $("#preguntas").val();
	        var errorTitulo = "";

	        
	        //interaccion
	        $("#btnRegistrar").hide("slow");
		    $("#frmAviso").html("Un momento por favor.");
		    error = 0;
	        if (error == 0) {
	            var envio = $.post(ruta + "wp-admin/admin-ajax.php?page=agregar_eventos", $("#frmRegistraEvento").serialize(),
	                function (data) {
	                    //equipo agregado con exito
	                    if (data.msg == "1")
	                    {
	                         $("#btnRegistrar").show("slow");
	                         $(".marco-registro").hide();
	                         $("#frmAvisoFinal").html("<h2>Su información será validada, una vez recibido el pago le haremos llegar un correo.<h2>");
	                    }

	                    if (data.msg == "0")

	                    {
	                        $("#btnRegistrar").show("slow");
	                        $("#frmAviso").html("Hubo un error");                        
	                    }

	                }, "json");

	        }else{
	           $("#btnRegistrar").show("slow");
	            $("#frmAviso").html("Hubo un error al agregar preguntas. Intentalo de Nuevo.");
	        }
	 }


	  //jQuery('.content-mostrar').addClass('collapsed').removeClass('expanded');
	    $('#mostrarocultar').click(function() {
	    $('#divmostoc').slideToggle(800);
	    $('.content-mostrar').toggleClass('expanded');
	   });
	   $('#startsesion').click(function() {
		   
		       var error = 0; /*comienzo el error en cero */
			   
		   	   var pathname = $(location).attr('href');
			   
			   var txtuser=$("#user").val();		  
			  

			   var txtpass=$("#pass").val();
			   var errorestxtuser="";
			   
			   if(!validaCorreo(txtuser, 0, 3, 255)){			
				error = 1;
				$('#user').css( "border", "2px solid red" );
				errorestxtuser="El usuario es tu correo electrónico.";
				
				$("#AvisoUser").css({"position":"absolute","left":"262px","top":"33px"});
				$("#AvisoUser").html(errorestxtuser+"<span class='span-error-up'></span>");		
				$("#AvisoUser").show();
				
				}else{				
				$('#user').css( "border", "1px solid #01C601" );
				 $("#AvisoUser").hide();
				}
		
				if(!validaLongitud(txtpass, 0, 2, 255)){			
				error = 1;
				$('#pass').css( "border", "2px solid red" );
				errorestxtpass="La contraseña no puede ser vacía.";
				
				$("#AvisoPass").css({"position":"absolute","left":"536px","top":"33px"});
				$("#AvisoPass").html(errorestxtpass+"<span class='span-error-up'></span>");		
				$("#AvisoPass").show();
				
				}else{
				$('#pass').css( "border", "1px solid #01C601" );
				 $("#AvisoPass").hide();
				}
		     
			    
				if(error==0){	//Mostrar espere.

		

		   $("#frmAviso").html("Un momento...");

		   $("#frmAviso").show("slow");

		   var consulta = $.post("http://identidadatleta.com/procesa/login.php",$("#frmlogin").serialize(),    

		   function(data){    	   

				//El cliente se agrego con exito

			if(data.msg=="1"){	
	                  
			          window.location.href=("http://identidadatleta.com/cms");			 		   

				}

				//error en registro

				if(data.msg=="2"){							  			      

			          $("#frmErrorLogin").html("El usuario o la contraseña no son correctos.");

		   			  $("#frmErrorLogin").show("slow");					   			  			   

				}
				
		   },"json"); 

			 }else{	

			

			

			 } 
		   
	    
	   });
	   
	   
	   /**inicio sesion pagina registro***/
	   $('#startsesionregis').click(function() {
		   
		       var error = 0; /*comienzo el error en cero */
			   
		   	   var pathname = $(location).attr('href');
			   
			   var txtuser=$("#userregis").val();
			   
			   var idevento=$("#id_evento").val();		  

			   var txtpass=$("#passregis").val();
			   var errorestxtuser="";
			   
			   if(!validaCorreo(txtuser, 0, 3, 255)){			
				error = 1;
				$('#userregis').css( "border", "2px solid red" );
				errorestxtuser="El usuario es tu correo electrónico.";
				
				$("#AvisoUserregis").css({"position":"absolute","left":"200px","top":"86px"});
				$("#AvisoUserregis").html(errorestxtuser+"<span class='span-error-up'></span>");		
				$("#AvisoUserregis").show();
				
				}else{				
				$('#userregis').css( "border", "1px solid #01C601" );
				 $("#AvisoUserregis").hide();
				}
		
				if(!validaLongitud(txtpass, 0, 2, 255)){			
				error = 1;
				$('#passregis').css( "border", "2px solid red" );
				errorestxtpass="La contraseña no puede ser vacía.";
				
				$("#AvisoPassregis").css({"position":"absolute","left":"200px","top":"147px"});
				$("#AvisoPassregis").html(errorestxtpass+"<span class='span-error-up'></span>");		
				$("#AvisoPassregis").show();
				
				}else{
				$('#passregis').css( "border", "1px solid #01C601" );
				 $("#AvisoPassregis").hide();
				}
		     
			    
				if(error==0){	//Mostrar espere.


		   var consulta = $.post("../../procesa/login.php",$("#frmloginregistro").serialize(),    

		   function(data){    	   

				//El cliente se agrego con exito

			if(data.msg=="1"){	

			         if(idevento!=""){
					  document.location.href=('http://identidadatleta.com/cms/detalle-evento/?id='+idevento);	 
					 }else{
					  document.location.href=(document.URL);			 		   
					 }

				}

				//error en registro

				if(data.msg=="2"){							  			      

			          $("#frmErrorLoginRegis").html("El usuario o la contraseña no son correctos.");

		   			  $("#frmErrorLoginRegis").show("slow");					   			  			   

				}
				
		   },"json"); 

			 }else{		

			

			 } 
		   
	    
	   });
	   
	});
	function iniciarPass() {
	        $(".frmPass").show();
			$(".menu-login").hide();
	      }
	function cancelarPass() {
	        $(".frmPass").hide();
			$(".menu-login").show();
	      }	
	function validateEmail(email) { 
	    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;   
	     return re.test(email);
	} 

	      function recuperarContrasena(maile){
	        
	      if(validateEmail(maile)){
	        alert("Se envió la contraseña a tu correo, revísalo");
	        frmRecupera.submit();
	      }else{
	        alert("Correo invalido.");
		  }

 }

