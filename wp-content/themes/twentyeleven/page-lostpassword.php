<?php
/**
 *
 */

get_header(); ?>

<link rel="stylesheet" href="<?php bloginfo("template_url")?>/css/theme-login.css" />

    <div class="content">     	

				<?php while ( have_posts() ) : the_post(); ?>
					
					<div class="titulo-comp">
			          <div class="img-tit">Recuperar Contraseña</div>
		   			</div>
		            
		            <div class="frame-login"> 
		             
		                                 
		            <div class="login">    
		            	
		            	<?php the_content(); ?>
		            
		               <div class="clearing"></div>
		              
		            </div>
					
					</div>

					

				<?php endwhile; // end of the loop. ?>			

<?php get_footer(); ?>