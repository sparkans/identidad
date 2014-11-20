<?php
if(!$_POST){	
header("location: http://identidadatleta.com/cms/registro");
exit();
}
/**
 * Template name: Registro Final
 */

get_header();
ini_set('display_errors', 1);	 

global $wpdb;//objeto base de datos de worpdress
?>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/registroFinal.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/spark.validator.js"></script>
<!--<link href="css/ui-darkness/jquery-ui-1.10.3.custom.css" rel="stylesheet">-->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery.inputfocus-0.9.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery.main.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_url"); ?>/css/registroFinal.css" />
<?php 
//recibe las variebles del formulario inicial 
$txtNombre=$_POST["nombre"];
$txtPaterno=$_POST["apaterno"];
$txtMaterno=$_POST["amaterno"];
$txtDiaNacimiento=$_POST["dia"];
$txtMesNacimiento=$_POST["mes"];
$txtAnioNacimiento=$_POST["anio"];
$txtMail=$_POST["email"];

$NombreCompleto=$txtNombre." ".$txtPaterno." ".$txtMaterno;

$fechaNacimiento=$txtDiaNacimiento."-".$txtMesNacimiento."-".$txtAnioNacimiento;



if(!empty($txtMail)){
	$campomail=",email";
	$valormail=",$txtMail";
	}	

?>  
     
        <div class="int-registroFinal">
          <div class="titulo-comp">
	    	<div class="img-tit-registro">PROCESO DE REGISTRO</div>
    		</div>
        <?php
        //compruebo si el usurio no ha sido registrado en wordpress
   $sql="SELECT * FROM wp_users WHERE user_email='".$txtMail."'";		 
   $results=$wpdb->get_results($sql);
   
   if($results){//ya existe
   ?>
      <div id="frmYaExiste">
      	<center>Ya existe un usuario con el correo: <strong><?php echo $txtMail; ?></strong></center> <br /><br />
        <center>Si has olvidado tu contraseña <a href="#">haz click aquí</a></center>
        </div>
   <?php   
   }else{
   ?> 
    <form id="frmRegistroFinal">    
     <div id="container-registro-final">       
      <!-- #first_step -->
            <div id="first_step">
                <h1>Bienvenido: <?php echo $NombreCompleto ;?> </h1>

                <div class="form">
                    
                     <label>Nombre (s):</label>
           <input type="text" name="nombre" id="nombre" class="txt-campo bg-name" value="<?php echo $txtNombre; ?>"/>
           <div id="AvisoNombre"></div>
           <!--<label>Segundo Nombre:</label>
           <input type="text" name="segundoNombre" id="segundoNombre" class="txt-campo bg-name" value=""/>-->
           <label>Apellido Paterno</label>
           <input type="text" name="apaterno" id="apaterno" class="txt-campo bg-name" value="<?php echo $txtPaterno; ?>" />
           <label>Apellido Materno:</label>
           <input type="text" name="amaterno" id="amaterno" class="txt-campo bg-name" value="<?php echo $txtMaterno; ?>"/>
           <label>Fecha de Nacimiento</label>
           <select id="dia" name="dia">
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
                        
                        <label>Pais de Nacimiento:</label>
                        <input type="text" name="paisNacimiento" id="paisNacimiento" class="txt-campo bg-name" value=""/>   
                          
                        <label>Correo Electrónico:</label>
                        <input type="text" name="email" id="email" class="txt-campo bg-name" value="<?php echo $txtMail; ?>"/>
                        
                        <label>Telefono de Contacto:</label>
                        <input type="text" name="telefono" id="telefono" class="txt-campo bg-name" value=""/>
                        
                        <label>Sexo:</label>
                        <div class="sexo">
                        <input type="radio" name="sexo"  class="txt-campo bg-name" value="masculino"/>Masculino
                        <input type="radio" name="sexo"  class="txt-campo bg-name" value="femenino"/>Femenino<br />
                        </div>
                    
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit1" type="submit" name="submit_first" id="submit_first" value="" />
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->


            <!-- #second_step -->
            <div id="second_step">
                <h1>DATOS DE DOMICILIO</h1>

                <div class="form">
                   <!--<input type="text" name="vives" id="vives" class="txt-campo bg-name" value=""/>-->
                 
                  <label>Calle y Numero:</label>
                  <input type="text" name="calle" id="calle" class="txt-campo bg-name" value=""/>
                  
                  <label>Estado:</label>
                  <select name="estado" id="estado">
                       <option value="">Selecciona una opción </option>
                       <?php 
                       $sql="SELECT * FROM tbl_estados";		 
                       $results=$wpdb->get_results($sql);
                       foreach($results as $results){
                          $idEstado=$results->id_estado;
                          $nombreEstado=$results->nombre_estado;
                           
                        ?>
                        <option value="<?php echo $idEstado; ?>"><?php echo $nombreEstado; ?></option>
                        <? 
                       }
                        ?>
                   </select><br><br><br><br><br>
                  
                  <label>Colonia:</label>
                  <input type="text" name="colonia" id="colonia" class="txt-campo bg-name" value=""/>
                  
                  <label>Delegación / Municipio:</label>
                  <input type="text" name="municipio" id="municipio" class="txt-campo bg-name" value=""/>
                  
                  <label>Código Postal:</label>
                  <input type="text" name="cp" id="cp" class="txt-campo bg-name" value=""/>
                    
                    
                    
                                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
				<input class="back" type="submit" name="" id="" value="" />
                <input class="submit" type="submit" name="submit_second" id="submit_second" value="" />
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->


            <!-- #third_step -->
            <div id="third_step">
                <h1>DATOS DE PERFIL</h1>

                <div class="form"> 
                        
					<table width="100%">
                        <tr>
                            <td scope="2"> <label class="label-tabla">Talla de Playera:</label></td>
                         </tr>
                         <tr>   
                            <td scope="2"  ><select name="playera" id="playera" class="select-tabla">
                                <option value="">Selecciona una opción </option>
                                   <?php 
                                   $sql="SELECT * FROM tbl_tallas_playeras";		 
                                   $results=$wpdb->get_results($sql);
                                   foreach($results as $results){
                                      $idPlayera=$results->id_talla_playera;
                                      $talla=$results->talla;
                                       
                                    ?>
                                    <option value="<?php echo $idPlayera; ?>"><?php echo $talla; ?></option>
                                    <? 
                                   }
                                    ?>
                            </select></td>
                        </tr>
                        <tr>
                        <td scope="2"><label class="label-tabla">Medio por el cual prefieres recibir información:</label></td>
                        </tr>
                        <tr>
                        <td scope="2"> <select name="medio" id="medio" class="select-tabla">
                            <option value="">Selecciona una opción </option>
                            <?php 
							   $sql="SELECT * FROM tbl_medios";		 
							   $results=$wpdb->get_results($sql);
							   foreach($results as $results){
								  $idMedio=$results->id_medio;
								  $medio=ucfirst(strtolower($results->medio));
								   
								?>
								<option value="<?php echo $idMedio; ?>"><?php echo $medio; ?></option>
								<? 
							   }
								?>                       
                        </select></td>
                        </tr>
                        <tr>
                        <td scope="2"><label class="label-tabla">Carrera(s) que prefieres:</label></td>
                        </tr>
                        <tr>
                        <td scope="2"><?php   
                               $sql="SELECT * FROM tbl_deportes";		 
								   $results=$wpdb->get_results($sql);
								   $i=0;
								   foreach($results as $results){
									  $idDeporte=$results->id_deporte;
									  $deporte=ucfirst(strtolower($results->deporte));
									 /*   if($i==5){
										echo "<br/>";//slato de linea  
									  }*/
									  ?> 
<input type="checkbox" name="carrerafavoritas<?php echo $i; ?>" id="carrerafavoritas<?php echo $i; ?>"  value="<?php echo $idDeporte;?>"/><?php echo $deporte . "<br>";?>  
                                      <?php
									
									$i++;	  
                                }
								?>  <br>        
                                </td>
                        </tr>
                        <tr>
                        <td scope="2"><label class="label-tabla">¿Cuantas veces por semana entrena?:</label></td>
                        </tr>
                        <tr>
                        <td scope="2"><?php   
							 $sql="SELECT * FROM tbl_entrenamientos";		 
							 $results=$wpdb->get_results($sql);
							
								foreach($results as $results){
								  $idEntrenamiento=$results->id_entrenamiento;
								  $entrenamiento=ucfirst(strtolower($results->entrenamiento));
													   
									?>
									<input type="radio" name="entrena" id="entrena" value="<?php echo $idEntrenamiento; ?>"/> <?php echo $entrenamiento . "<br>"; ?>
							<?php } ?>                                                                 
                        <tr>
                        <td scope="2">
                        <label class="label-tabla">¿Cual es la marca de tenis que usas?:</label>
                        </td>
                        </tr>
                        <tr>
                        <td scope="2">
                        <?php   
							 $sql="SELECT * FROM tbl_marcas_tennis";		 
							 $results=$wpdb->get_results($sql);
							 $i=0;
								foreach($results as $results){
								  $idTenis=$results->id_marca_tennis;
								  $tenis=ucfirst(strtolower($results->marca_tennis));
								/*  if($i==8){
										echo "<br/>";//slato de linea  
									  } */
													   
									?>
<input type="radio" name="tenis" id="tenis" value="<?php echo $idTenis;?>"/><?php echo $tenis . "<br>"; ?>
							<?php 
							$i++;
							} ?></td>
                           </tr>
                        <tr>
<td scope="2"><label class="label-tabla">¿Cual es la marca de bicicleta que usas?:</label></td>
                        </tr>
                        <tr>
                        <td scope="2"> <?php   
							 $sql="SELECT * FROM tbl_marcas_bicicletas";		 
							 $results=$wpdb->get_results($sql);
							
								foreach($results as $results){
								  $idBicicleta=$results->id_marca_bicicleta;
								  $bicicleta=ucfirst(strtolower($results->marca_bicicleta));
													   
									?>
<input type="radio" name="bicicleta" id="bicicleta" value="<?php echo $idBicicleta;?>"/><?php echo $bicicleta . "<br>";?>
							<?php } ?>  
                         </td>
                         </tr>
                         <tr>
                         <td scope="2">                         
                        
                        <label class="label-tabla">¿Cual es la marca de ropa de natación que usas?:</label>
                        </td>
                        </tr>
                        <tr>
                        <td scope="2">
                        <?php   
							 $sql="SELECT * FROM tbl_marcas_ropas";		 
							 $results=$wpdb->get_results($sql);
							
								foreach($results as $results){
								  $idMarcaRopa=$results->id_marca_ropa;
								  $marcaRopa=ucfirst(strtolower($results->marca_ropa));
													   
									?>
								    <input type="radio" name="ropanatacion" id="ropanatacion" value="<?php echo $idMarcaRopa; ?>"/><?php echo $marcaRopa; ?>     
							<?php } ?>    </td>
                        </tr>
                        
                    </table>                  
                    
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
				<input class="back" type="submit" name="" id="" value="" />
                <input class="submit" type="submit" name="submit_third" id="submit_third" value="" />
                
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
            
            
            <!-- #fourth_step -->
            <div id="fourth_step">
                <h1>GRACIAS MANDA TU INFORMACIÓN</h1>

                <div class="form">
                    <h2>Datos</h2>
                    
                    <table>
                        <tr><td>Nombre:</td><td></td></tr>                       
                        <tr><td>Email:</td><td></td></tr>
                        
                    </table>
                </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix -->
                <input class="submit" type="submit" name="submit_fourth" id="submit_fourth" value="" />            
            </div>
            
       </div>
       </form>
       <div style="clear:both"></div>
         <div id="progress_bar">
            <div id="progress"></div>
            <div id="progress_text">0% Complete</div>
         </div>
         
         <div id="frmAvisoExitoso"> </div>
         <div id="frmAviso"></div>
          <?php } //else existe usuario WP ?>
        </div><!--int-registroFinal-->
       

 
 <script>
//$( "#tabs" ).tabs();
</script>
    

    
<?php get_footer(); ?>