<?php

/**

 * Template name: Registro

 */



get_header(); 

?>



<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery.html5form-1.5.js"></script>

<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/contacto.js"></script>

<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/spark.validator.js"></script>

<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/oauthpopup.js"></script>

<script type="text/javascript">

$(document).ready(function(){

    $('#facebook').click(function(e){

        $.oauthpopup({

            path: '../../loginFacebook.php',

			width:600,

			height:300,

            callback: function(){

                window.location.reload();

            }

        });

		e.preventDefault();

    });

	 //$('#contact-form').html5form();

});



</script>

<?php 

$txtNombre=$_SESSION['User']["first_name"];

$lastName=$_SESSION['User']["last_name"];

$apellidos=explode(" ",$lastName);//separo los apellidos en dos 

$txtPaterno=$apellidos[0];

$txtMaterno=$apellidos[1];

$birthday=$_SESSION['User']['birthday'];

$fechaNacimiento=explode("/",$birthday);//separo la fecha de nacimiento por día  

$txtDiaNacimiento=$fechaNacimiento[1];

$txtMesNacimiento=$fechaNacimiento[0];

$txtAnioNacimiento=$fechaNacimiento[2];

$txtMail=$_SESSION['User']["email"];

?>

    <div class="content"> 

	

    <div class="titulo-comp">

	   

    </div>

   

        <div class="int-registro">

            

            <div class="col-der-registro">

            

            <div class="content-login"> 

            	

             <?php frm_login(); ?>

             

           </div><!--content-login-->



            <div class="content-formulario-registro">

            <div class="subtitle-registro">REGISTRATE</div>

             <div class="formulario-registro">

            	<form id="contact-form" method="post" action="../registro-final" name="contact_form">  

                    	<div class="campo-nombre">Nombre:</div>

                        <center><input type="text" name="nombre" id="nombre" class="txt-campo bg-name" value="<?php echo $txtNombre; ?>" required/></center>

                        <div id="AvisoNombre"></div>

                        <div class="campo-nombre">Apellido Paterno:</div>

                        <center><input type="text" name="apaterno" id="apaterno" class="txt-campo bg-name" value="<?php echo $txtPaterno; ?>" required/></center>

                        <div id="AvisoPaterno"></div>

                        <div class="campo-nombre">Apellido Materno:</div>

                        <center><input type="text" name="amaterno" id="amaterno" class="txt-campo bg-name" value="<?php echo $txtMaterno; ?>" required/></center>

                        <div id="AvisoMaterno"></div>

                        <div class="campo-nombre">Fecha de Nacimiento:</div>

                         

                        <center><div id="failFecha"><select id="dia" name="dia">

                        	<option value=""> Dia </option>

                           <?php

		  for($i=1;$i<=31;$i++){

		  ?>

              <option value="<?php echo $i; ?>" <?php if($txtDiaNacimiento==$i){echo "selected='selected'";}?>> <?php echo $i; ?> </option>

              <?php

		  }

		  ?>

                        </select>

                        

                        <select id="mes" name="mes">

	                          <option value="">Mes</option>

                              <option value="01" <?php if($txtMesNacimiento=="01"){echo "selected='selected'";}?>>ENERO</option>

                              <option value="02" <?php if($txtMesNacimiento=="02"){echo "selected='selected'";}?>>FEBRERO</option>

                              <option value="03" <?php if($txtMesNacimiento=="03"){echo "selected='selected'";}?>>MARZO</option>

                              <option value="04" <?php if($txtMesNacimiento=="04"){echo "selected='selected'";}?>>ABRIL</option>

                              <option value="05" <?php if($txtMesNacimiento=="05"){echo "selected='selected'";}?>>MAYO</option>

                              <option value="06" <?php if($txtMesNacimiento=="06"){echo "selected='selected'";}?>>JUNIO</option>

                              <option value="07" <?php if($txtMesNacimiento=="07"){echo "selected='selected'";}?>>JULIO</option>

                              <option value="08" <?php if($txtMesNacimiento=="08"){echo "selected='selected'";}?>>AGOSTO</option>

                              <option value="09" <?php if($txtMesNacimiento=="09"){echo "selected='selected'";}?>>SEPTIEMBRE</option>

                              <option value="10" <?php if($txtMesNacimiento=="10"){echo "selected='selected'";}?>>OCTUBRE</option>

                              <option value="11" <?php if($txtMesNacimiento=="11"){echo "selected='selected'";}?>>NOVIEMBRE</option>

                              <option value="12" <?php if($txtMesNacimiento=="12"){echo "selected='selected'";}?>>DICIEMBRE</option>

                        </select>

                        

            

                        	<select name="anio" id="anio">

                            <option value=""> Año </option>

    						<?php

     						for($anio=(date("Y")); 1940<=$anio; $anio--) {

								?>

                                <option value="<?php echo $anio; ?>" <?php if($txtAnioNacimiento==$anio){echo "selected='selected'";}?>><?php echo $anio ;?></option>

								<?php

						   

      						}

    						?>

                            

                        </select>

                        <div id="AvisoFecNac"></div>

                        </div></center>

                        

                        <div class="campo-nombre">

                        <input type="button" name="send" id="send" class="btn-send" value="" />

						<input type="hidden" name="data" id="data" value="datos" />

                        <input type="hidden" name="email" id="email" value="<?php echo $txtMail; ?>" />

                        </div>                        

                        

					</form>

                 <div class="contentLoginFacebook">

            <?php 



if(!isset($_SESSION['User']) && empty($_SESSION['User']))   { ?>

<img src="<?php bloginfo("template_url"); ?>/images/contacto/facebook-log.png" id="facebook"  style="cursor:pointer;" />

<?php  }  else{	

 echo '<img src="https://graph.facebook.com/'. $_SESSION['User']['id'] .'/picture" width="30" height="30"/><div>'.$_SESSION['User']['name'].'</div>';	

	echo '<a href="'.$_SESSION['logout'].'">Logout</a>';	

	

}

	?>

 

              </div><!--contentLoginFacebook-->   

           

           

              </div><!--formulario-registro-->

            </div><!--content-formulario-registro-->

           

        </div><!--col-der-registro-->

    

    </div><!--int registro-->



    

<?php get_footer(); ?>