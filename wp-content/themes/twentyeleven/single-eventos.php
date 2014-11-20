<?php
/**
 * The Template for displaying eventos single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); 

global $wpdb;

$idPost = get_the_ID();// id del post correspondiente

$sql="SELECT * FROM tbl_eventos WHERE id_post=".$idPost;
$result=$wpdb->get_results($sql);

foreach($result as $result){
	$titulo=$result->nombre_evento;
	$contenido=$result->convocatoria;
}


?>

  <div class="content">
	
    <div class="titulo-micrositio">
    <div class="tit-competencia-single"><?php echo $titulo; ?></div>
    </div>
    
    <?php echo $contenido; ?>

    </div>



<?php get_footer(); ?>