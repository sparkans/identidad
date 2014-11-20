<?php

if(isset($_POST["sesion"])){	
	setcookie("login", $_POST["user"].",".$_POST["pass"], 2592000 + time(),"/", "identidadatleta.com",1);   
	//$creaCookie=crearCookie("login", $usr.",".$pass, $Month);// funcion que crea la cookie con tres parametros $nameCookie, $value, $tiempo
	}
//funcion para crear cookie
/*function crearCookie($nameCookie, $value, $tiempo){
 return setcookie($nameCookie, $value, $tiempo,"", "www.identidadatleta.com");//cookie que contiene el nombre del usuario 
}*/
 $Month = 2592000 + time();  //esto estara activo 30 días 
    
  $usr = $_POST["user"];
  $pass = $_POST["pass"];
  $check=$_POST["sesion"]; 
	

//require('../cms/wp-load.php'); //include framework de wordpress      
    global $wpdb;	
	
	$query = "SELECT * FROM wp_users WHERE user_login = '$usr'";
	
    //encontre busca pass

  $consulta = $wpdb->get_results($query);   
  foreach ( $consulta as $consulta ) 
  { 
    $passdb = $consulta->user_pass;
	$idUsr= $consulta->ID;
  }
  

  if(!empty($pass)){
    
    //$wp_hasher = new PasswordHash(8, TRUE);      
    $password_hashed = $passdb;
	
	require_once( ABSPATH.'/wp-includes/class-phpass.php');
	
	$wp_hasher = new PasswordHash(8, TRUE);  
          /*
          Check if the password matches
          - Check if md5 matches
          - or Check if PasswordHash class matches        */

    if($wp_hasher->CheckPassword($pass, $password_hashed) || $password_hashed == md5($pass)) {     
	
		//oculta el error si hay 
		
	  
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
	  session_start();	
	  
	  //Se crea la sesio	  
	  $_SESSION["idRegistro"] =$idUsr;
	  $_SESSION["nombre"] = $nombreCompleto;
	  
	  ?>
     
      <?php
	 $arr = array("msg"=>1);		
	  echo json_encode($arr);
      exit();
      //$userinfo = get_user_by('email',$usr); 

     //enjoy
    }else{//si no esta registrado muestra el error 
	
	$arr = array("msg"=>2);		
	echo json_encode($arr);
    exit();	
	  
	}

  }		
?>