<?php
/**
 * Template name: Recupera Contraseña
 */

get_header(); ?>


<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery.html5form-1.5.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/contacto.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/spark.validator.js"></script>


    <div class="content"> 
	
    <div class="titulo-comp">
	          <div class="img-tit">RECUPERA TU CONTRASEÑA</div>
    </div>
            
            <div class="frame-login"> 
             
                                 
            	<div class="login">
               <?php   include ("../cms/wp-login2.php");  ?>               
               <div style="clear:both;margin-bottom:60px;"></div>  
                </div><!--login-->
        
              <div style="clear:both;margin-bottom:60px;"></div>   
             
           </div><!--frame-login-->

    
<?php get_footer(); ?>