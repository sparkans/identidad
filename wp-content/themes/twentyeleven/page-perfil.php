<?php
/**
 * Template name: Perfil 
 */

get_header();
global $wpdb;
?>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/perfil.js"></script>
<?php
$id_user = $_SESSION["idRegistro"]; 

//recorre informacion del usuario 
$sqluser =  "SELECT * from tbl_usuarios WHERE idUser=$id_user";
$datosUsuario = $wpdb->get_results($sqluser);


foreach ($datosUsuario as $datosUsuario){
	$txtNombre = $datosUsuario->nombre; 
	$txtPaterno = $datosUsuario->apellido_paterno;
	$txtMaterno = $datosUsuario->apellido_materno;
	$txtFechaNac = $datosUsuario->fecha_nacimiento;
	$txtPaisNac = $datosUsuario->pais_nacimiento;
	$txtEstado = $datosUsuario->id_estado;
	$txtDireccion = $datosUsuario->direccion;
	$txtColonia = $datosUsuario->colonia;
	$txtDelegacion = $datosUsuario->delegacion_municipio;
	$txtCp = $datosUsuario->cp;
	$txtSexo = $datosUsuario->sexo;
	$txtEmail = $datosUsuario->email;
	$txtTelefono = $datosUsuario->telefono_contacto;
	$txtId_user = $datosUsuario->idUser;
	$id_Usuario = $datosUsuario->id_usuario;
}


$fechaNacimiento = explode("-", $txtFechaNac);
$diaFecha = $fechaNacimiento[0];
$mesFecha = $fechaNacimiento[1];
$anioFecha = $fechaNacimiento[2];

//recorre datos del perfil 
$sqlperfil =  "SELECT * from tbl_perfiles WHERE id_usuario=$id_Usuario";
$datosPerfil = $wpdb->get_results($sqlperfil);


foreach($datosPerfil as $datosPerfil){
	$tallaPlayera = $datosPerfil->id_talla_playera; 
	$carreraPreferida = $datosPerfil->id_carrera_preferida;
	$entrenamientoPer = $datosPerfil->id_entrenamiento;
	$marcaTennis = $datosPerfil->id_marca_tennis;
	$marcaBici = $datosPerfil->id_marca_bicicleta;
	$marcaRopaPer = $datosPerfil->id_marca_ropa;
	$medioPer = $datosPerfil->id_medio;	
}

?>



   
<div class="content">
	
	<div class="titulo-comp">
	    <div class="img-tit-organizadores">PERFIL</div>
    </div>
    

	<form id="formulario-perfil">
	<div class="col-left">
		<table>
        <tr>
        <td><label>Nombre (s):</label></td>
        <td><input type="text" name="nombre" id="nombre" class="txt-campo bg-name" value="<?php echo $txtNombre; ?>"/>
        <div id="AvisoNombre"></div></td>
        </tr>
		<tr>	
        <td><label>Apellido Paterno</label></td>
        <td><input type="text" name="apaterno" id="apaterno" class="txt-campo bg-name" value="<?php echo $txtPaterno; ?>" /></td>
        </tr>
        <tr>
        <td><label>Apellido Materno:</label></td>
        <td><input type="text" name="amaterno" id="amaterno" class="txt-campo bg-name" value="<?php echo $txtMaterno; ?>"/></td>
        </tr>
        <tr>
        <td><label>Fecha de Nacimiento</label></td>
        <td><select id="dia" name="dia">
             <option value=""> Dia </option>
                <?php
		  for($i=1;$i<=31;$i++){   
		  ?>
              <option value="<?php echo $i; ?>" <?php if($diaFecha==$i){echo "selected='selected'";}?>> <?php echo $i; ?> </option>
              <?php
		  }
		  ?>
         </select>
                        
         <select id="mes" name="mes">
         	<option value="">Mes</option>
            <option value="01" <?php if($mesFecha=="01"){echo "selected='selected'";}?>>ENERO</option>
            <option value="02" <?php if($mesFecha=="02"){echo "selected='selected'";}?>>FEBRERO</option>
            <option value="03" <?php if($mesFecha=="03"){echo "selected='selected'";}?>>MARZO</option>
            <option value="04" <?php if($mesFecha=="04"){echo "selected='selected'";}?>>ABRIL</option>
            <option value="05" <?php if($mesFecha=="05"){echo "selected='selected'";}?>>MAYO</option>
            <option value="06" <?php if($mesFecha=="06"){echo "selected='selected'";}?>>JUNIO</option>
            <option value="07" <?php if($mesFecha=="07"){echo "selected='selected'";}?>>JULIO</option>
            <option value="08" <?php if($mesFecha=="08"){echo "selected='selected'";}?>>AGOSTO</option>
            <option value="09" <?php if($mesFecha=="09"){echo "selected='selected'";}?>>SEPTIEMBRE</option>
            <option value="10" <?php if($mesFecha=="10"){echo "selected='selected'";}?>>OCTUBRE</option>
            <option value="11" <?php if($mesFecha=="11"){echo "selected='selected'";}?>>NOVIEMBRE</option>
            <option value="12" <?php if($mesFecha=="12"){echo "selected='selected'";}?>>DICIEMBRE</option>
        </select>
                        
            
		<select name="anio" id="anio">
        	<option value=""> Año </option>
    		<?php
     		for($anio=(date("Y")); 1940<=$anio; $anio--) {								?>
            	<option value="<?php echo $anio; ?>" <?php if($anioFecha==$anio){echo "selected='selected'";}?>><?php echo $anio ;?></option>
<?php } ?>              
		</select></td>
        </tr>
        <tr>                
		<td><label>Pais de Nacimiento:</label></td>
		<td><input type="text" name="paisNacimiento" id="paisNacimiento" class="txt-campo bg-name" value="<?php echo $txtPaisNac ?>"/></td>
        </tr>
        <tr>   
		<td><label>Correo Electrónico:</label></td>
		<td><input type="text" name="email" id="email" class="txt-campo bg-name" readonly value="<?php echo $txtEmail; ?>"/></td>
        </tr>
        <tr>
        <td><label>Telefono de Contacto:</label></td>
		<td><input type="text" name="telefono" id="telefono" class="txt-campo bg-name" value="<?php echo $txtTelefono ?>"/></td>
        </tr>
        <tr>
		<td><label>Sexo:</label></td>
		<div class="sexo">
		<td><input type="radio" name="sexo"  class="txt-campo bg-name" 
			value="masculino"<?php if($txtSexo=="masculino"){echo "checked='checked'";}?>/>Masculino
			<input type="radio" name="sexo"  class="txt-campo bg-name" 
			value="femenino" <?php if($txtSexo=="femenino"){echo "checked='checked'";}?>/>Femenino<br />
        </td>
		</div>
        </tr>               
        <tr>
        	<td><label>Calle y Numero:</label></td>
            <td><input type="text" name="calle" id="calle" class="txt-campo bg-name" value="<?php echo $txtDireccion ?>"/></td>
        </tr>
        <tr>          
		<td><label>Estado:</label></td>
		<td><select name="estado" id="estado">
            <option value="">Selecciona una opción </option>
            <?php 
            $sql="SELECT * FROM tbl_estados";		 
            $results=$wpdb->get_results($sql);
            foreach($results as $results){
            $idEstado=$results->id_estado;
            $nombreEstado=$results->nombre_estado;
			?>
			<option value="<?php echo $idEstado; ?>" <?php if($idEstado==$txtEstado){ echo "selected='selected'"; } ?>><?php echo $nombreEstado; ?></option>
			<? } ?>
            </select></td>
            </tr>
			<tr>
            <td><label>Colonia:</label></td>
			<td><input type="text" name="colonia" id="colonia" class="txt-campo bg-name" value="<?php echo $txtColonia; ?>"/></td>
            </tr>
            <tr>      
			<td><label>Delegación / Municipio:</label></td>
            <td><input type="text" name="municipio" id="municipio" class="txt-campo bg-name" value="<?php echo $txtDelegacion; ?>"/></td>		
            </tr>
            <tr>
			<td><label>Código Postal:</label></td>
            <td><input type="text" name="cp" id="cp" class="txt-campo bg-name" value="<?php echo $txtCp ?>"/></td>
            </tr>
            <tr>
			<td><label class="label-tabla">Talla de Playera:</label></td>
            <td><select name="playera" id="playera" class="select-tabla">
			<option value="">Selecciona una opción </option>
			<?php 
				$sql="SELECT * FROM tbl_tallas_playeras";		 
				$results=$wpdb->get_results($sql);
				foreach($results as $results){
				$idPlayera=$results->id_talla_playera;
				$talla=$results->talla;
			?>
			<option value="<?php echo $idPlayera; ?>" <?php if($idPlayera==$tallaPlayera){ echo "selected='selected'"; } ?>><?php echo $talla; ?></option>
			<? } ?>
			</select></td>
            </tr>                
            <tr>
			<td><label class="label-tabla">Medio por el cual prefieres recibir información:</label></td>
			<td><select name="medio" id="medio" class="select-tabla">
					<option value="">Selecciona una opción </option>
					<?php 
					$sql="SELECT * FROM tbl_medios";		 
					$results=$wpdb->get_results($sql);
					foreach($results as $results){
					$idMedio=$results->id_medio;
					$medio=ucfirst(strtolower($results->medio));
					?>
					<option value="<?php echo $idMedio; ?>" <?php if($idMedio==$medioPer){ echo "selected='selected'"; } ?>><?php echo $medio; ?></option>
					<? } ?>                       
                    </select></td>
                    </tr>
			</table>
            </div> <!-- close col-left -->
            
            <div class="col-right">
            <table>
            
                    <tr>
                    <td><label class="label-tabla">Carrera(s) que prefieres:</label></td>
                    </tr>
						<?php   
                        $sql="SELECT * FROM tbl_deportes";		 
						$results=$wpdb->get_results($sql);
						$i=0;
						foreach($results as $results){
						$idDeporte=$results->id_deporte;
						$deporte=ucfirst(strtolower($results->deporte));
						?>
					<tr>
                    <td><input type="checkbox" name="carrerafavoritas<?php echo $i; ?>" id="carrerafavoritas<?php echo $i; ?>"  value="<?php echo $idDeporte;?>" <?php if($idDeporte==$carreraPreferida){ echo "checked='checked'"; } ?> /><?php echo $deporte . "<br>";?>			  
					<?php	$i++; } ?></td>
                    </tr>
                    <tr>
                    	<td>&nbsp;</td>
                    </tr> 
                    <tr>
                    <td><label class="label-tabla">¿Cuantas veces por semana entrena?:</label></td>
					</tr>
					<?php   
					$sql="SELECT * FROM tbl_entrenamientos";		 
					$results=$wpdb->get_results($sql);
							
					foreach($results as $results){
					$idEntrenamiento=$results->id_entrenamiento;
					$entrenamiento=ucfirst(strtolower($results->entrenamiento));
					?>
                    <tr>
					<td><input type="radio" name="entrena" id="entrena" value="<?php echo $idEntrenamiento; ?>" <?php if($idEntrenamiento==$entrenamientoPer){echo "checked='checked'";}?>/> <?php echo $entrenamiento . "<br>"; ?>
					<?php } ?></td>
                    </tr>
                    <tr>
                    	<td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td><label class="label-tabla">¿Cual es la marca de tenis que usas?:</label></td>
                    </tr>
                    <?php   
					$sql="SELECT * FROM tbl_marcas_tennis";		 
					$results=$wpdb->get_results($sql);
					$i=0;
						foreach($results as $results){
						$idTenis=$results->id_marca_tennis;
						$tenis=ucfirst(strtolower($results->marca_tennis));
					?>
                    <tr>
					<td><input type="radio" name="tenis" id="tenis" value="<?php echo $idTenis;?>" <?php if($idTenis==$marcaTennis){echo "checked='checked'";}?> /><?php echo $tenis . "<br>";  ?>
					<?php $i++; } ?></td>
                    </tr>
                    <tr>
                    	<td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td><label class="label-tabla">¿Cual es la marca de bicicleta que usas?:</label></td> 
                    </tr>
                    <?php   
					$sql="SELECT * FROM tbl_marcas_bicicletas";		 
					$results=$wpdb->get_results($sql);
							
					foreach($results as $results){
					$idBicicleta=$results->id_marca_bicicleta;
					$bicicleta=ucfirst(strtolower($results->marca_bicicleta));								   
					?>
                    <tr>
					<td><input type="radio" name="bicicleta" id="bicicleta" value="<?php echo $idBicicleta;?>" <?php if($idBicicleta==$marcaBici){echo "checked='checked'";}?> /><?php echo $bicicleta . "<br>";?>
					<?php } ?> </td>
                    </tr>
                    <tr>
                    <tr>
                    	<td>&nbsp;</td>
                    </tr>
                    <td><label class="label-tabla">¿Cual es la marca de ropa de natación que usas?:</label></td>
                    </tr      
                    ><?php   
					$sql="SELECT * FROM tbl_marcas_ropas";		 
					$results=$wpdb->get_results($sql);
							
					foreach($results as $results){
					$idMarcaRopa=$results->id_marca_ropa;
					$marcaRopa=ucfirst(strtolower($results->marca_ropa));
					?>
                    <tr>
                    <td><input type="radio" name="ropanatacion" id="ropanatacion" value="<?php echo $idMarcaRopa; ?>" <?php if($idMarcaRopa==$marcaRopaPer){echo "checked='checked'";}?> /><?php echo $marcaRopa; ?>
					<?php } ?></td>
                    </tr>
        </table>                 
        </div>    <!-- close col-right -->                  
        <div class="control">
        <input type="button" name="modificar_perfil" class="btn-send" id="modificar_perfil" value="Actualizar">
        <input type="hidden" name="id_user" id="id_user" value="<?php echo $txtId_user; ?>" >
        <input type="hidden" name="id_Usuario" id="id_Usuario" value="<?php echo $id_Usuario; ?>" >
    	</form>
        
    </div>
<?php get_footer(); ?>