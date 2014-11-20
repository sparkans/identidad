<?php
/**
 * Template name: Detalle Evento
 */

get_header(); 

//Get request | post | get variables
$id = $_GET["id"];


//includes
include("functions/func_eventos.php");

//local functions

//local operations
//urlRegistro

if(empty($_SESSION["nombre"])){
$urlRegistro = get_home_url() . "/registro/?id=$id";
$_SESSION["redireccion"] = "$id";
}else{
$urlRegistro = get_home_url() . "/registro-evento/?id=$id";    
}

//obtener detalle de evento
$mtz = obtenerEvento($id);
$id_post = $mtz[0]->id_post;
$nombre_evento =  $mtz[0]->nombre_evento;
$imgDestacada = $mtz[0]->img_destacada;
$permalink = get_permalink($id_post);  

?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="<? bloginfo("template_url"); ?>/js/jquery.ui.datepicker-es.js"></script>


    <div class="content">
    <div class="titulo-micrositio">
    <div class="tit-competencia"><?php echo $nombre_evento; ?></div>
    </div>
    
    <div class="info-evento">
    
    <div class="foto-micrositio">
        <img src="http://www.identidadatleta.com/cms/wp-content/plugins/gestion-identidad-atleta/images/uploads/imgDestacada/<?php echo $imgDestacada; ?>"/>
    </div>
    <div class="accesos-micrositio">
            <a class="botones" href="<?php echo $permalink; ?>">
            <div class="boton-micrositio">
            <img src="<?php bloginfo("template_url"); ?>/images/micro_sitios/ico_mapa.png"/>RUTA</div></a>
            <a class="botones" href="<?php echo $permalink; ?>"><div class="boton-micrositio">
            <img src="<?php bloginfo("template_url"); ?>/images/micro_sitios/ico_convocatoria.png"/>CONVOCATORIA</div></a>
            <a class="botones" href="<?php echo $urlRegistro; ?>" ><div class="boton-micrositio">
            <img src="<?php bloginfo("template_url"); ?>/images/micro_sitios/ico_inscripciones.png"/>INSCRIPCIONES</div>
        
            </a>
    </div>

<div style="clear:both"></div>

    </div>  

    </div>
    
<?php get_footer(); ?>