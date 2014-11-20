<?php
/**
 * Template name: Organizadores
 */

get_header(); ?>


   <script type="text/javascript" src="http://identidadatleta.com/js/addOrganizadores.js"></script>
    <div class="content">
	
    <div class="titulo-comp">
	    <div class="img-tit-organizadores">ORGANIZADORES INDEPENDIENTES</div>
    </div>
    
        <div class="int-organizadores">
            
            <div class="col-der-organizadores">
            	<div class="txt-organizadores">
                	<div class="sub-organizadores">¿Eres organizador independiente?</div>
				<br> Nosotros vemos a los Organizadores Independientes en México como nuestros SOCIOS DE NEGOCIO. Danos la oportunidad de mostrarte nuestro modelo de atención personalizada, el cual estamos seguros será de tu total conveniencia ya que contamos con TODOS los recursos a TU disposición para hacer de TU evento, el MEJOR evento deportivo
                
                <div class="buttons-options1">
                <img src="<?php bloginfo("template_url"); ?>/images/flecha_menu.png" /> Sistema de Cronometraje
                </div>
                <div class="buttons-options">
                <img src="<?php bloginfo("template_url"); ?>/images/flecha_menu.png" /> Sonido Profesional
                </div>
                <div class="buttons-options">
                <img src="<?php bloginfo("template_url"); ?>/images/flecha_menu.png" /> Carpas y Vallas 
                </div>
                <div class="buttons-options">
                <img src="<?php bloginfo("template_url"); ?>/images/flecha_menu.png" /> Arco Salida/Meta
                </div>
                <div class="buttons-options">
                <img src="<?php bloginfo("template_url"); ?>/images/flecha_menu.png" /> Podio y Plataforma de Premiación
                </div>
                <div class="buttons-options">
                <img src="<?php bloginfo("template_url"); ?>/images/flecha_menu.png" /> Otros
                </div>
                
                </div>
            
            </div>
            
            <div class="formulario-organizadores">
               	<div class="sub-organizadores-frm">Escríbenos:</div>
            	<form id="contact-form">
                        <input type="text" name="name" id="name" class="txt-campo bg-name" placeholder="NOMBRE:" />
                        <div id="AvisoNombre"></div>
                        <input type="text" name="empresa" id="empresa" class="txt-campo bg-subject" placeholder="EMPRESA:" />
                        <input type="text" name="phone" id="phone" class="txt-campo bg-phone" placeholder="E-MAIL:" />                       
                        <input type="text" name="mail" id="mail" class="txt-campo bg-mail" placeholder="TELEFONO:" />
                        <div id="AvisoMail"></div>                        
                        <textarea type="text" name="message" id="message" placeholder="MENSAJE:" ></textarea><br />
                        <div id="AvisoMensaje"></div>
                        <div class="btns-container">
                        <input type="button" name="send" id="send" class="btn-send-cont" value="" />

                        </div>                        
                        
					</form>
					<div id="frmAviso"></div>
					<div class="clearing"></div>
                    </div><!-- cierra formulario-contecto-->
            </div>
            
           
        </div>
    
    </div>
    
<?php get_footer(); ?>