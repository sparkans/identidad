<?php
/**
 * Template name: Triatlon / Duatlon
 */

get_header();
//obtener interfaz al mvc
include("functions/func_eventos.php");

$tipo_evento = 3; //1=carreras , 2=duatlon , 3=ciclismo , 4=otro
$mesFiltro=$_GET["mes"];
//reverse
$mtzFecha = explode("-",$mesFiltro);
if(!empty($mesFiltro)){$mesFiltro = $mtzFecha[2] . "-" . $mtzFecha[1] . "-" . $mtzFecha[0];}

global $wpdb;
if(!empty($mesFiltro)){
$fechaActual=date('Y-m-d');
$sql="SELECT * FROM tbl_eventos WHERE tipo_evento=$tipo_evento and fecha like '%$mesFiltro%' and fecha >= '$fechaActual'";
}else{
$mesFiltro=date('Y-m-d');
$sql="SELECT * FROM tbl_eventos WHERE tipo_evento=$tipo_evento";
}   
$result=$wpdb->get_results($sql);
$plugins_url = plugins_url()."/gestion-identidad-atleta/";

?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="<? bloginfo("template_url"); ?>/js/jquery.ui.datepicker-es.js"></script>
<script>
    function getComboA(sel) {
    //var value = sel.options[sel.selectedIndex].value;  
    var value=sel;
    if(!value){
        document.location.href="<?php bloginfo("wpurl"); ?>/competencias/triatlon-duatlon/";
    }else{
        document.location.href="<?php bloginfo("wpurl"); ?>/competencias/triatlon-duatlon/?mes="+value;
    }    
}    
//calendario
//obtener dias con calendario
<?php $mtz =  obtenerFechaEventos($tipo_evento);?>
var availableDates = [<?php echo implode($mtz,",")?>];


function available(date) {
  dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
  console.log(dmy+' : '+($.inArray(dmy, availableDates)));
  if ($.inArray(dmy, availableDates) != -1) {
    return [true, "","Available"];
  } else {
    return [false,"","unAvailable"];
  }
}
        $(function () {
        
        $("#datepicker").datepicker({
            dateFormat: 'dd-mm-yy',
            beforeShowDay: available,
            minDate: 0,     
            onSelect: function (date) {
                //alert(date)
                getComboA(date);
            },      
          });
        }); 
    
  $(document).ready(function(){     
     $("#showall").click(function(){
        getComboA();
     });
    }); 
             
</script>
     <div class="content">
    
    <div class="titulo-micrositio">
        <div class="tit-competencia">CICLISMO</div>
        
        <div class="content-filtro">    
            <fieldset id="fieldset-filtro">
            <legend>Ver Calendario de Eventos</legend>  
                <input type="text" name=x    "datepicker"  id="datepicker" class="filtro-mes" readonly value="<?php echo $mesFiltro; ?>"/>
                <input type="button" id="showall" value="" />
            </fieldset> 
        </div>

    </div>
    <div class="interior-competencias">
        
    
    <?php   if(!empty($result)){?>
        
        <?php 
        foreach($result as $result){ 
          //$permalink = get_permalink( $result->id_post);  
        $imgThumbnail=$plugins_url."images/uploads/imgThumbnail/".$result->img_thumb;
        $titulo=$result->nombre_evento;
        $id_evento = $result->id_evento;
        $permalink = home_url() . "/detalle-evento/?id=$id_evento";

        ?>
        
        <div class="interior-competencia1">
            <a href="<?php echo $permalink; ?>">
            <div class="foto-competencia1"><img src="<?php echo $imgThumbnail; ?>" /></div>
            <div class="nombre-competencia"><?php echo $titulo; ?></div>
            </a>
        </div> 
        
       <?php }

}else{
    ?>
    
    <div class="interior-competencias-no"> 
        <div class="nocompetencias">
        <img src="<?php bloginfo("template_url");?>/images/eventos/convocatoria/eventos.png">  
        <div class="txt-nocompetencias">Espera nuestros próximos  eventos.</div>
        </div>
    
<?php } ?>
        
    </div><!-- CIERRA interior-competencias -->

    </div>

    
<?php get_footer(); ?>