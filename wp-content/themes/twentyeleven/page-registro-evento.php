<?php
/**
 * Template name: Registro Evento
*/
get_header();

//init script
ini_set("display_errors", 1);
//includes
include("functions/func_eventos.php");

//Get request | post | get variables
$id = $_GET["id"];

//obtener preguntas
$mtzQ = obtenerPreguntas($id);


//obtener detalle de usuario
$mtzUsr = obtenerUsuario($_SESSION["idRegistro"]);

$id_User = $mtzUsr[0]->id_usuario;
$nombre = $mtzUsr[0]->nombre;
$paterno = $mtzUsr[0]->apellido_paterno;
$materno = $mtzUsr[0]->apellido_materno;
$fecha_nacimiento = $mtzUsr[0]->fecha_nacimiento;
$correo = $mtzUsr[0]->email;
$sexo = $mtzUsr[0]->sexo;
$nombre_completo = $nombre . $paterno . $materno;

//obtener detalle de evento
$mtz = obtenerEvento($id);
$id_post = $mtz[0]->id_post;
$nombre_evento =  $mtz[0]->nombre_evento;
$img_thumbnail = $mtz[0]->img_thumb;
$fecha_evento = $mtz[0]->fecha;
$permalink = get_permalink($id_post);  

?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="<? bloginfo("template_url"); ?>/js/jquery.ui.datepicker-es.js"></script>


    
    <div class="titulo-micrositio">

    <div class="tit-competencia">
        <?php echo $nombre_evento; ?></div>
    </div>
    
    <div class="info-evento">
    <div class="foto-micrositio-inscripcion">
        <img src="http://www.identidadatleta.com/cms/wp-content/plugins/gestion-identidad-atleta/images/uploads/imgThumbnail/<?php echo $img_thumbnail; ?>"/>
    </div>
    <div id="frmAvisoFinal"></div>
    <div class="marco-registro">
    <form id="frmRegistraEvento">
          <fieldset>
            <legend>Datos de Inscripción</legend>
    <table class="table_datos">
    <thead>
    <tr>
    <th class="titulo-datos"></th>
    <th align="right" colspan="2"></th>
    </tr>
    </thead>
    <tbody><tr>
    <td class="width200">
    Nombre:
    <br>
    <span class="txt_blue"><?php echo $nombre; ?></span>
    </td>
    <td class="width200">
    Apellido paterno:
    <br>
    <span class="txt_blue"><?php echo $paterno; ?></span>
    </td>
    <td class="width200">
    Apellido Materno:
    <br>
    <span class="txt_blue"><?php echo $materno; ?></span>
    </td>
    </tr>
    <tr>
    <td>
    Fecha de nacimiento:&nbsp;
    <br>
    <span class="txt_blue"><?php echo $fecha_nacimiento; ?></span>
    </td>
    <td>
    Sexo:
    <br>
    <span class="txt_blue"><?php echo $sexo; ?></span>
    </td>
    <td>
    Correo electrónico:
    <br>
    <span class="txt_blue"><?php echo $correo; ?></span>
    </td>
    </tr>
    </tbody></table>
   </fieldset>
<div style="height:20px;"></div>
    <fieldset>
    <legend>Cuestionario</legend>
    <table class="table_datos">
    
    <tr>
    <th class="titulo-datos"></th>
    <th align="right" colspan="2"></th>
    </tr>
    <tr>
        <td class="width200">
        	
             <?php
			 /*
			 $idPregunta = $mtzQ->id_pregunta;
			 $consultar_respuestas = consultarRespuestas($idPregunta);
			 */
			
			 
			 
             if(empty($mtzQ)){
                echo "No hay preguntas";
             }else{
                $cont = 0;
                foreach($mtzQ as $mtzQ){
                    $idP = $mtzQ->id_pregunta;
                    $P = $mtzQ->pregunta . "<br>";
					$mtzA = obtenerRespuestas($idP);
					
                    ?>
                    <?php echo $cont+1; ?>.- <?php echo $P; ?>
                    <p>
                    <input type="hidden" id="preguntas[]" name="preguntas[<?php echo $cont; ?>]" value="<?php echo $idP; ?>">
                    <input type="hidden" id="preguntas[]" name="preguntast[<?php echo $cont; ?>]" value="<?php echo $P; ?>">   
                    <?php if(!empty ($mtzA)){ ?>
                    <select name="respuestas[<?php echo $cont; ?>]" id="respuestas[]">
                    	<option value="">--Selecciona una Respuesta--</option>
                        <?php foreach($mtzA as $mtzA){ ?>
                        <option value="<?php echo $mtzA->respuesta; ?>"><?php echo $mtzA->respuesta; ?></option>
                        <?php } //close foreach ?> 
                    </select>
                    <?php }else{ //close if ?>
                    <input type="text" id="respuestas[]" name="respuestas[<?php echo $cont; ?>]" style="width:280px">
					<?php } ?>	
                    
                    </p>
                    <?php
					$cont++;
                }//forearch
             }
             ?>
        </td>
    </tr>
    </table>
   </fieldset>
   <div style="height:20px;"></div>
   <fieldset>
    <legend>Forma de Pago</legend>
    
				<?php 
				$pagos = consulta_pagos($id);
				foreach($pagos as $pagos){
				$indice_pago = $pagos->indicador_pago;
				
				if($indice_pago==""){
				echo "No hay Formas de pago";
				}
				if($indice_pago==1){?>
				<input name="tipodepago" value="1" type="radio">PayPal <br>
                <img alt="img_pagoPP" src="https://www.emociondeportiva.com/img/img_pagoPP.jpg" class="floatR tipoPago"><br><br>
                <?php } 
				if($indice_pago==2){?>
                <input name="tipodepago" value="1" type="radio">Tarjeta de Crédito<br>
                <img alt="img_trajetasCredito" src="https://www.emociondeportiva.com/img/img_trajetasCredito.jpg"><br><br>
                <?php }
				if($indice_pago==3){?>
                <input name="tipodepago" value="2" type="radio">Tarjeta de débito<br>
				<img alt="img_tarjetasDebito" src="https://www.emociondeportiva.com/img/img_tarjetasDebito.jpg" class="floatL">
                <br><br>

            	<?php 
					  } 
				}
				?> 



   </fieldset>
    <div style="color:#fff;" id="frmAviso"></div>
    <input type="hidden" name="accion" value="registra_evento"/>
    <input type="hidden" name="controlador" value="eventos"/>
    <input type="hidden" name="action" value="wpaction_registrar_evento"/>
    <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION["idRegistro"]; ?>">
    <input type="hidden" name="id_usuario" id"id_usuario" value="<?php echo $id_User; ?>"> 
    <input type="hidden" name="idEvento" id="idEvento" value="<?php echo $id; ?>">
    <input type="hidden" name="email" id="email" value="<?php echo $correo; ?>">
    <input type="hidden" name="fecha_evento" id="fecha_evento" value="<?php echo $fecha_evento; ?>">
    <input type="hidden" name="nombre_evento" id="nombre_evento" value="<?php echo $nombre_evento; ?>">
    <input type="hidden" name="nombre_completo" id="nombre_completo" value="<?php echo $nombre_completo; ?>">
    <input type="hidden" name="img_evento" id="img_evento" value="<?php echo $img_thumbnail; ?>">
    <input type="button" value="" class="registrar" id="btnRegistrar">
</form>
    </div>

<div style="clear:both"></div>

    </div>  

    </div>
    
<?php get_footer(); ?>