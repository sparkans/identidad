<?php 
include("inc/login-header.php"); //un solo archivo para el login de la cabecera ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="description" content="Parallax Content Slider with CSS3 and jQuery" />
<meta name="keywords" content="slider, animations, parallax, delayed, easing, jquery, css3, kendo UI" />
<meta name="author" content="Codrops" />
<title>Identidad Atleta</title>
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/style.css" type="text/css"/>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>    
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_url"); ?>/css/style2.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_url"); ?>/fonts/stylesheet.css" />
<link rel="shortcut icon" href="<?php bloginfo("template_url"); ?>/images/favicon.ico" />

<!--  Codigo Analytics   --> 

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48849743-1', 'identidadatleta.com');
  ga('send', 'pageview');

</script>

<!--  Codigo Analytics   --> 




<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/modernizr.custom.28468.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/spark.validator.js"></script><!--js para el login-->
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/scriptLogin.js"></script><!--js para el login-->
<noscript>
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_url"); ?>/css/nojs.css" />
</noscript>



</head>

<body>
     
<?php  login_header_principal(); //funcion que llama el html del login ?>


   
<?php //if(is_home()){ ?>
   <!-- <div id="main-menu">
        <div class="menu">
            <div class="logo"><a href="<?php bloginfo("wpurl"); ?>"><img src="<?php bloginfo("template_url"); ?>/images/logoia.png" /></a></div>        
        </div>
    </div>-->
<?php  //}else{ ?>
	
<div id="main-menu">
  <div class="menu">
    <div class="logo"><a href="<?php bloginfo("wpurl"); ?>"><img src="<?php bloginfo("template_url"); ?>/images/logoia2.png" /></a></div>
    <div class="menu-nav">
      <ul>
        <li class="opcion1_interior"><a href="<?php bloginfo("wpurl"); ?>/competencias">PRÓXIMAS COMPETENCIAS <img src="<?php bloginfo("template_url"); ?>/images/flecha_menu.png" /></a></li>
        <li class="opcion2_interior"><a href="<?php bloginfo("wpurl"); ?>/resultados">FOTOS Y <br>
 RESULTADOS <img src="<?php bloginfo("template_url"); ?>/images/flecha_menu.png" /></a></li>
      </ul>
      <ul class="ul-menuderecho">
        <li class="opcion3_interior"><a href="<?php bloginfo("wpurl"); ?>/organizadores">ORGANIZADORES INDEPENDIENTES <img src="<?php bloginfo("template_url"); ?>/images/flecha_menu.png" /></a></li>
        <li class="opcion4_interior"><a href="<?php bloginfo("wpurl"); ?>/organizacion-de-eventos">ORGANIZACIÓN <br>DE EVENTOS <img src="<?php bloginfo("template_url"); ?>/images/flecha_menu.png" /></a></li>
      </ul>
    </div>
  </div>
</div>
	
<?php //} ?>

<div id="container">