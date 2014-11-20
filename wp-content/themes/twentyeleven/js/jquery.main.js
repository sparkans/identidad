$(function(){
    //original field values
    var field_values = {
            //id        :  value
            'nombre'  : 'Nombre',
			'apaterno'  : 'Apellido Paterno',
			'apaterno'  : 'Apellido Materno',						
            'email'  : 'Correo Eléctronico'
		};


    //inputfocus
    $('input#nombre').inputfocus({ value: field_values['nombre'] });
	$('input#apaterno').inputfocus({ value: field_values['apaterno'] });
	$('input#amaterno').inputfocus({ value: field_values['amaterno'] });
	$('input#amaterno').inputfocus({ value: field_values['amaterno'] });  
    $('input#email').inputfocus({ value: field_values['email'] });
	
    /*$('input#cpassword').inputfocus({ value: field_values['cpassword'] }); 
    $('input#lastname').inputfocus({ value: field_values['lastname'] });
    $('input#firstname').inputfocus({ value: field_values['firstname'] });
    $('input#email').inputfocus({ value: field_values['email'] }); */




    //reset progress bar
    $('#progress').css('width','0');
    $('#progress_text').html('0% Completado');

    //first_step
    $('form').submit(function(){ return false; });
    $('#submit_first').click(function(){
        //remove classes
        $('#first_step input').removeClass('error').removeClass('valid');

        //ckeck if inputs aren't empty
		var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
        var fields = $('#nombre,#apaterno,#amaterno,#email');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<1 || value==field_values[$(this).attr('id')] || ( $(this).attr('id')=='email' && !emailPattern.test(value) ) ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });        
        
        if(!error) {              
                //update progress bar
                $('#progress_text').html('33% Completado');
                $('#progress').css('width','113px');
                
                //slide steps
                $('#first_step').slideUp();
                $('#second_step').slideDown();     
                           
        } else return false;
    });


    $('#submit_second').click(function(){
        //remove classes
        $('#second_step input').removeClass('error').removeClass('valid');
         
        var fields = $('');
        var error = 0;
        fields.each(function(){
            var value = $(this).val();
            if( value.length<1 || value==field_values[$(this).attr('id')]  ) {
                $(this).addClass('error');
                $(this).effect("shake", { times:3 }, 50);
                
                error++;
            } else {
                $(this).addClass('valid');
            }
        });

        if(!error) {
                //update progress bar
                $('#progress_text').html('66% Completado');
                $('#progress').css('width','226px');
                
                //slide steps
                $('#second_step').slideUp();
                $('#third_step').slideDown();     
        } else return false;

    });


    $('#submit_third').click(function(){
        //update progress bar
        $('#progress_text').html('100% Completado');
        $('#progress').css('width','339px');

        //prepare the fourth step
        var fields = new Array(
            $('#nombre').val()+ ' ' + $('#apaterno').val()+ ' ' + $('#amaterno').val(),           
            $('#email').val()
                                
        );
        var tr = $('#fourth_step tr');
        tr.each(function(){
            //alert( fields[$(this).index()] )
            $(this).children('td:nth-child(2)').html(fields[$(this).index()]);
        });
                
        //slide steps
        $('#third_step').slideUp();
        $('#fourth_step').slideDown();            
    });


    $('#submit_fourth').click(function(){
		
        //send information to server
        var consulta = $.post("../procesa/addRegistro.php",$("#frmRegistroFinal").serialize(),    
	   function(data){    	   
	   
	   if(data.msg=="1"){	       
		          $("#frmRegistroFinal").hide("slow");
		          $("#frmAvisoExitoso").html("<center>Su solicitud ha sido enviada, revisa tu correo para terminar el proceso de solicitud.</center> ");
	   			  $("#frmAvisoExitoso").show("slow");				 		   
			}
			//error en registro
			if(data.msg=="2"){
				//hubo un error en la incersión  a la base de datos
				  $("#frmRegistroFinal").hide("slow"); 				 			  			      
		          $("#frmAviso").html("Algo no salio bien intentalo de nuevo.");
	   			  $("#frmAviso").show("slow");					   			  			   
			}  
			
		    },"json");
    });

});