<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
	 $("html, body").animate({ scrollTop: $(document).height() }, 1000);	
  });
});
</script>

</div>
<!--CIERRA CONTENT -->

<div style="clear:both"></div>
<div id="footer">  
    <div class="footer-int">
      <div id="flip"></div>
      <div class="terminos_footer"> <a href="<?php bloginfo("wpurl"); ?>/contacto" >Contacto </a> |  <a href="<?php bloginfo("wpurl"); ?>/aviso-de-privacidad" target="_blank">Aviso de Privacidad </a> |   2014 ® IdentidadAtleta</div>
    </div>
    <div style="clear:both"></div>
    <div id="panel">
    	<div class="mapa-sitio">
        <div class="sub-menu">
        <div class="columna">
            <span class="tit-seb">Identidad Atleta</span>
            <ul>
            	<a href="<?php bloginfo("wpurl"); ?>/nosotros"><li><!--Nosotros --></li></a>
            </ul>
        </div>
           
        <div class="columna">
	        <span class="tit-seb">Servicios</span>
            <ul>
            	<a href="<?php bloginfo("wpurl"); ?>/organizadores"><li>Organizadores</li></a>
                <a href="<?php bloginfo("wpurl"); ?>/tuatletaenvivo"><li>Tu Atleta en vivo</li></a>
                <a href="<?php bloginfo("wpurl"); ?>/contacto"><li>Contacto</li></a>
            </ul>
        </div>
        
        <div class="columna1">
        	<span class="tit-seb">Competencias</span>
        	<ul>
            	<a href="<?php bloginfo("wpurl"); ?>/competencias"><li>Próximas Competencias</li></a>
                <!--<a href="galeria.php"><li>Galería</li></a>-->
                <a href="<?php bloginfo("wpurl"); ?>/resultados"><li>Resultados</li></a>
            </ul>
        </div>
        
        </div>
        </div>
    </div>
  </div>
  
  <!--div class="footer-int">
        <div class="redes">
                    SÍGUENOS EN:&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="images/home/b_face.png" />&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="images/home/b_twitter.png" />
         </div>
         
         <div class="frase2">
            	<strong class="ligas">CONTACTO </strong>| <strong class="ligas">ORGANIZADORES</strong>
            </div>
        
        <div class="credits">   
        	<div class="terminos1">Términos y Condiciones</div>
            <div class="terminos2">Aviso de Privacidad</div>
            <div class="terminos">2013 &reg; Identidad Atleta</div>
        </div>
    </div>
</div--> 
  

</div>
<!--CIERRA CONTAINER -->
</body></html>