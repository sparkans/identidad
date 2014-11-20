<?php
/**
 * Template name: Contacto
 */

get_header(); ?>

   <script type="text/javascript" src="http://identidadatleta.com/js/addContacto.js"></script>
    <div class="content">
	
    <div class="titulo-comp">
	    <div class="img-tit">CONTACTO</div>
    </div>
    
        <div class="int-contacto">
            <div class="formulario-contecto">
            	<div class="sub-organizadores-frm">Escríbenos:</div>
            	<form id="frm-contacto">
                        <input type="text" name="name" id="name" class="txt-campo bg-name" placeholder="NOMBRE:" />
                        <div id="AvisoNombre"></div>
                        <input type="text" name="empresa" id="empresa" class="txt-campo bg-name" placeholder="EMPRESA:" />
                        <input type="text" name="phone" id="phone" class="txt-campo bg-phone" placeholder="TELEFONO:" />                        
                        <input type="text" name="mail" id="mail" class="txt-campo bg-mail" placeholder="E-MAIL" />
                        <div id="AvisoMail"></div>                        
                        <textarea type="text" name="message" id="message" class="txt-campo-msg bg-message" placeholder="MENSAJE:" ></textarea><br />
                        <div id="AvisoMensaje"></div>
                        <div class="btns-container">
                        <input type="button" name="send" id="send" class="btn-send-cont" value="" />

                        </div>                        
                        
					</form>
					<div id="frmAviso"></div>
            </div>
            <div class="col-der-cont">
            	<div class="txt-contacto">
                	<div class="sub-gracias">¡Gracias por contactarnos!</div>
				<br> En Identidad Atleta nos gusta saber de tí, porque tus comentarios nos ayudan a mejorar.
                </div>
            
            </div>
           
        </div>
    
    </div>
    
    
<?php get_footer(); ?>