<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

	


    <div class="content">
    <div class="main-slide">
        <div class="slider">
        		<div id="da-slider" class="da-slider">

                <div class="da-slide">
					<h2>21 de Septiembre 2013<br>
                    <span class="sub-tit">Inscribete en: asdeporte.com</span>
                    </h2>
					<!--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>-->
					<!--<a href="#" class="da-link">Read more</a>-->
				  <div class="da-img"><a href="micro_competencia.php"><img src="<?php bloginfo("template_url"); ?>/images/slide/banner1.jpg" alt="image01" /></a></div>
				</div>
				<div class="da-slide">
                <h2>Campeonato Panamericano <br>
                    <span class="sub-tit">Inscribete en: asdeporte.com</span>
                    </h2>
					<!--<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>-->
					<!--<a href="#" class="da-link">Read more</a>-->
					<div class="da-img"><a href="micro_competencia-2.php"><img src="<?php bloginfo("template_url"); ?>/images/slide/banner2.jpg" alt="image01" /></a></div>
				</div>
                <div class="da-slide">
					<h2>Medio Maratón Acapulco<br>
                    <span class="sub-tit">PRÓXIMAMENTE</span>
                    </h2>
					<!--<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>-->
					<!--<a href="#" class="da-link">Read more</a>-->
					<div class="da-img"><img src="<?php bloginfo("template_url"); ?>/images/slide/banner3.jpg" alt="image01" /></div>
				</div>
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>     
			</div>
		</div>

        </div><!--termina main-slide -->
        <div class="servicios">
        	<a href="competencias"><div class="btn-serv1"><img src="<?php bloginfo("template_url"); ?>/images/home/boton_pe.png" /></div></a>
            <a href="tu-atleta-en-vivo"><div class="btn-serv2"><img src="<?php bloginfo("template_url"); ?>/images/home/boton_tav.png" /></div></a>
            <a href="resultados"><div class="btn-serv3"><img src="<?php bloginfo("template_url"); ?>/images/home/boton_etr.png" /></div></a>   
        </div>
           
    </div><!-- TERMINA CONTENT -->
	
		<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery.cslider.js"></script>
		<script type="text/javascript">
			$(function() {
			
				$('#da-slider').cslider({
					autoplay	: true,
					bgincrement	: 450
				});
			
			});
		</script>
		<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery.cslider.js"></script>
		<script type="text/javascript">
			$(function() {
			
				$('#da-slider').cslider({
					autoplay	: true,
					bgincrement	: 450
				});
			
			});
		</script>


</div>

<?php get_footer(); ?>