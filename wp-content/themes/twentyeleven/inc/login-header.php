<?php
/*
*Un solo Archivo para generar el login y los llamados para el login en el header y en la parte de registro este archivo solo se incluyera 
*/

/*Función que regresa la pagina actual */
ini_set("display_errors", 1);
session_start();

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


//cerrar sesion
if($_GET["close"]){
  
  //borra la sesiones	
  unset($_SESSION["nombre"]);
  unset($_SESSION["idRegistro"]);   
  //borra las cookies
  RemoveCookie("login");  
  ?>
  <script>
  var url = document.URL;
  url = url.slice( 0, url.indexOf('?') );  
  document.location.href="http://identidadatleta.com/cms/";
  </script>
<?php } 

//formulario de registro
function frm_login(){
	
	
	//si existe la cookie se inicia la sesion
	  if(!empty($_COOKIE["login"])){//si existe la cookie de login 
	
	    $login=explode(",", $_COOKIE["login"]);
		$usr = $login[0];
        $pass = $login[1];		
	  	$NombreCookie=datosUsuario($usr);	
	  
	  	$usuarioRegistrado=$NombreCookie;	   
		
	   }elseif(!empty($_SESSION["nombre"])){
		 $usuarioRegistrado=$_SESSION["nombre"];
	  }
	  ?>
      <div class="subtitle-registro">USUARIO REGISTRADO</div>
              <div class="login"> 
      <?php
 		if(!empty($usuarioRegistrado)){ //si no esta vacia la sesión o la cookie mostramos el menu 
		?>
        <br/>
        <center>Bienvenido <br/> <strong><?php echo $usuarioRegistrado;?></strong></center><br/>
        <center><a href="#" style="color:#BA0514;">Perfíl</a></center><br/>
        <!--<center><a href="#" onclick="iniciarPass();" style="color:#BA0514;">Recupera tu Contraseña</a></center><br/>-->
        <center><a href="?close=1" style="color:#BA0514;">Cerrar Sesión</a></center>
        <?php
 
 		}else{
		$id_evento = $_GET['id'];			
 ?>
	
	                
            	<form id="frmloginregistro">
                    	<div class="campo-nombre">Usuario:</div>
                        <center><input type="text" name="user" id="userregis" class="txt-campo bg-name"  /></center>    
                         <div id="AvisoUserregis"></div>	
                        <div class="campo-nombre">Contraseña:</div>
                        <center><input type="password" name="pass" id="passregis" class="txt-campo bg-name" /></center> 
                         <div id="AvisoPassregis"></div>  	  
                          <div id="frmErrorLoginRegis"></div>
                        <div class="campo-nombre"><input type="checkbox" style="width:10px;" class="checkbox-login" value="1" checked="1" name="sesion"/><label for="sesion" class="label-login" style="margin-top:9px !important;">No cerrar sesión</label></div><br><br/>
       			       	<div class="campo-nombre">                        
                        <input type="hidden" name="id_evento" id="id_evento" value="<?php echo $id_evento; ?>">
                        <button type="button" id="startsesionregis" class="btn-send"/></button>   
                       </div> 
                      
                 </form>
            	
              
  <?php
		}//if si existe el usaurio 
	?>    
    </div><!--login-->	
	<?php
		
}

//require('cms/wp-load.php'); //include framework de wordpress
global $wpdb;


 //Función para eliminar las cookies 
 function RemoveCookie($name) 
    { 
        unset($_COOKIE[$name]);  
        return setcookie($name, NULL, -1); 
    } 


//funcion que regresa los datos del usuario
function datosUsuario($usr){
	
	global $wpdb;
	
	$query = "SELECT * FROM wp_users WHERE user_login = '$usr'";
    //encontre busca Id

  $consulta = $wpdb->get_results($query);   
  foreach ( $consulta as $consulta ) 
  {     
	$idUsr= $consulta->ID;
  }
  //consulto los datos del usuario 
	  $query = "SELECT * FROM tbl_usuarios WHERE idUser = '$idUsr'";	
      $consulta = $wpdb->get_results($query);
     
      foreach ( $consulta as $consulta ) 
      { 
		   $txtnombre=$consulta->nombre;
		   $txtsegundonombre=$consulta->segundo_nombre;
		   $txtapellidopaterno=$consulta->apellido_paterno;
		   $txtapellidomaterno=$consulta->apellido_materno;          
	  }
	  if(!empty($txtsegundonombre)){
		  $txtsegundonombre=$txtsegundonombre." ";		  
	  }  
	  	  
	  $nombreCompleto=$txtnombre." ".$txtsegundonombre.$txtapellidopaterno." ".$txtapellidomaterno;
	  
	  return $nombreCompleto;
}

function compruebaRegistro($usr,$pass){
	
	
	
}//end function

function recuperarPass(){
	?>
    <div class="frmPass">

   <form method="post" id="frmRecupera" action="<?php echo 'recuperaContrasena?action=lostpassword'; ?>" class="wp-user-form">
    <div class="username">
        <label for="user_login" class="label-login"><?php _e('Correo'); ?>: </label>
        <input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" class="input-login" />        
    </div>
    <div class="login_fields">
        <?php do_action('login_form', 'resetpass'); ?>
        <input type="button" class="boton-login" style="width:147px !important;" onclick="recuperarContrasena(document.getElementById('user_login').value);" name="user-submit" value="<?php _e('Recuperar Contraseña'); ?>"  tabindex="1002" />
        <button type="button"  class="boton-login" onclick="cancelarPass();">Cancelar</button>
        <?php $reset = $_GET['reset']; if($reset == true) { echo '<p>El correo se envio con éxito.</p>'; } ?>
        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
        <input type="hidden" name="user-cookie" value="1" />        
    </div>
</form>
</div> <!--frmPass-->
    <?php
}


function login_header_principal(){
	
//si existe la cookie se inicia la sesion
if(!empty($_COOKIE["login"])){//si existe la cookie de login 
	
	    $login=explode(",", $_COOKIE["login"]);
		$usr = $login[0];
        $pass = $login[1];		
	  $NombreCookie=datosUsuario($usr);	
	  
	  $usuarioRegistrado=$NombreCookie;	   
		
	}elseif(!empty($_SESSION["nombre"])){
	 $usuarioRegistrado=$_SESSION["nombre"];
	 
	}
 if(!empty($usuarioRegistrado)){ //si no esta vacia la sesión o la cookie mostramos el menu ?>
<div id="main-menu-login">
  <div class="menu-login">
    <span class="nombre-usuario">Bienvenido: <strong><?php if (!empty($_SESSION["nombre"])) {
		 echo $_SESSION["nombre"];
	}else{
    //split de id
		 echo $NombreCookie;
		}
		  ?></strong></span>
    <table width="400px" cellspacing="0" cellpadding="0" border="0" class="menu-links-login">
      <tbody><tr>
      <td width="394">
         <table width="100%" cellspacing="0" cellpadding="0" border="0">
         <tbody><tr height="15">
         <td width="80">&nbsp;</td>
         <td width="24"><a href="<?php bloginfo("url");?>/perfil/">Perfíl</a></td>
         <td width="5">&nbsp;</td>
         <td width="1" bgcolor="#6a6a6a"></td>
         <td width="5">&nbsp;</td>
         <td width="237">   
         
             <a href="<?php bloginfo("wpurl");?>/lostpassword/">Recupera tu Contraseña</a>  
         
         </td>
         <td width="5">&nbsp;</td>
         <td width="1" bgcolor="#6a6a6a"></td>
         <td width="5">&nbsp;</td>
         <td width="135"><a href="?close=1">Cerrar Sesión</a></td>  
         <td width="5">&nbsp;</td>
         <td width="1"></td>         
         
         </tr>
        
      </tbody></table>
      
      </tbody></table>
  </div>
  <?php recuperarPass(); //llama formulario de recuperar contraseña?> 
</div>  


   <?php }else{
	$pagCur=curPageURL();//pagina actual
	?>

	<div class="content-mostrar">   
    <div id="divmostoc">
    
    <div class="menu-login">
      <div class="content-login-frm">
       
    <form id="frmlogin">
                    	
           <label class="label-login">Usuario: </label><input type="text" name="user" id="user" class="input-login"/>    
           <div id="AvisoUser"></div>         
           <label class="label-login">Contraseña: </label><input type="password" name="pass" id="pass" class="input-login" />                         
           <div id="AvisoPass"></div> 
           <button type="button" class="boton-login" id="startsesion"/></button><br/>           <input type="checkbox" class="checkbox-login" value="1" checked="1" name="sesion" style="width:10px;"/><label for="sesion" class="label-login">No cerrar sesión</label>                       
    </form>
    <div id="frmErrorLogin"></div>
    </div>
    <div class="menu-links-login"><a href="<?php bloginfo("wpurl");?>/lostpassword/" > 
    <img src=" <?php bloginfo("template_url");?>/images/mail-formularios/recuperar-contrasena.png" />  </a><br/>
    <a href="<?php bloginfo("wpurl"); ?>/registro" ><img src=" <?php bloginfo("template_url");?>/images/mail-formularios/registrarse.png" />  </a>
    </div>   
    </div>       
     
   <?php recuperarPass(); //llama formulario de recuperar contraseña?>
    
    </div><!--divmostoc-->           
             
    </div><!--content-mostrar-->
            <?php } ?>
            
    <div class="content-inicio-sesion">
      <div class="inicio-sesion">
    	<div class="pleca-sesion"><a href="#" id="mostrarocultar">INICIAR SESIÓN <img src="<?php bloginfo("template_url");?>/images/mail-formularios/flecha-abajo.png" width="10" /> </a></div>
      </div>  
    </div>		
    
<?php }//end funcion login_header    