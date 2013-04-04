<?php
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
if (!isset($_SESSION))session_start();  $_SESSION['lang']='ES';
include_once("functions/functions.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
    
    if(isset($_GET['practice'])){
        $i=0;
        $consulta=new Consulta;
        $consulta->setConsulta('SELECT * FROM project WHERE idpractice='.$_GET['practice']);
        echo '<ul>';
        if($consulta);
        do{
            $clase=($i==0)?'class="menuSelected"':'';
            echo '<li '.$clase.' onclick="recorre(\''.$i.'\',\'complete\');">'.($i+1).'</li>';
            $i++;
        }while($consulta->nextRow());
        echo '</ul>';
        exit;
    }
}
?>
<!DOCTYPE html>

<html>
    <head>
       <?php include_once("head.php");?> 
    
        <script type="text/javascript">
            var xInic, yInic, frame=220;
            var estaPulsado = false;
            var direction=0;
            var el,idEl;
            var maxWidth=0;
            var menu;
            var sec=0;
            var antFlag=0;
            var posicion=0;
            var movido;
            
            function ratonPulsado(evt) { 
                //Obtener la posición de inicio
                maxWidth=0;
                xClic = evt.clientX;
                xInic = evt.clientX;
                yInic = evt.clientY;    
                estaPulsado = true;
                //Para Internet Explorer: Contenido no seleccionable
                document.getElementById(idEl).unselectable = true;
                
                $('#'+idEl+" .slider").find('li').each(function(){
                    maxWidth+=$(this).width();
                })
            }
            
            function ratonMovido(evt) {
                if(estaPulsado) {
                    //Calcular la diferencia de posición
                    var xActual = evt.clientX;
                    var yActual = evt.clientY;  
                    if(xActual<xInic) direction=0; else direction=1;
                    var xInc = xActual-xInic;
                    var yInc = yActual-yInic;
                    xInic = xActual;
                    yInic = yActual;
                    //Establecer la nueva posición
                    var elemento = document.getElementById(idEl);
                    var position = getPosicion(elemento);
                    //elemento.style.top = (position[0] + yInc) + "px";
                    if(position[1] + xInc < 1 && position[1] + xInc >-(maxWidth-500))elemento.style.left = (position[1] + xInc) + "px";
                }
                
            }
            
            function ratonSoltado(evt) {  
                var box=$("#"+idEl);
                var flag=-1;
                var margin=5;
                var long=$("#"+idEl).find('.slider').children('li').length;
                var xActual = evt.clientX;
                var xInc = Math.abs(xActual-xClic);
                    
               $("#"+idEl).find('.slider').children('li').each(function( index ) {
                    if(flag!==-1) return 0;
                    var li=$(this);                    
                    var offset=li.offset();
                    var position=-(parseInt(offset.left)-frame);
                    var ancho=li.width();                    
                    var despl=ancho-position;
                    if(ancho<position) return 0;
                    else flag=li.index();
                    
                    
                    if(direction==0 && li.index()<long-1)
                    {     
                        flag++;
                        /*box.animate({
                            left: '-='+despl
                        }, "linear");*/
                  
                    }
                    else{
                        //if(position===0) position=10;  
                       /* box.animate({
                           left: '+='+position
                       }, "linear");*/
                    } 
                    
                });  
                var sectLength=-1;
                
                $("#"+idEl).find('.sections').children('li').each(function( index ) {
                    var ul=$(this); 
                    sectLength=ul.children('.slider').children('li').length; 
                    if(sec==index){
                       if(direction===0 && sectLength===flag){
                            flag=0;
                            sec++;          
                        }  
                   
                        if(direction===1 && antFlag<flag){
                            sec--;
                        }
                   }
                var pos=(box.parent().attr('id').split("_"));
                $('.submenu_'+pos[1]+' li').removeClass('menuSelected');
                $('.submenu_'+pos[1]+' li').eq(sec).addClass('menuSelected');
             
                });
                if(sectLength===-1){
                    var pos=(box.parent().attr('id').split("_"));
                    $('.submenu_'+pos[1]+' li').removeClass('menuSelected');
                    $('.submenu_'+pos[1]+' li').eq(flag).addClass('menuSelected');
                }
                estaPulsado = false;
                antFlag=flag;  
            }
            
            /*
             * Función para obtener la posición en la que se encuentra el
             * elemento indicado como parámetro.
             * Retorna un array con las coordenadas x e y de la posición
             */
            function getPosicion(elemento) {
                var posicion = new Array(2);
                if(document.defaultView && document.defaultView.getComputedStyle) {
                    posicion[0] = 0;
                    //posicion[0] = parseInt(document.defaultView.getComputedStyle(elemento, null).getPropertyValue("top"))
                    posicion[1] = parseInt(document.defaultView.getComputedStyle(elemento, null).getPropertyValue("left"));
                } else {
                    //Para Internet Explorer
                    posicion[0] = 0;
                    //posicion[0] = parseInt(elemento.currentStyle.top);             
                    posicion[1] = parseInt(elemento.currentStyle.left);               
                }      
                return posicion;
            }
            function recorre(index,pos) {
                sec=index;
                var despl=0;
                var borde=6;
                var boxi=$("#row_"+pos).children();
                var lista=$("#row_"+pos+' .sections>li');
                if(lista.length !== 0){
                lista.each(function( ind ) {
                    if(ind<index){
                        var li=$(this).find('li');
                        li.each(function() {
                            despl-=$(this).width()+borde;
                        });    
                    }                    
                });  
                }else{
                    var lista=$("#row_"+pos+' li');
                    for(var i=0;i<index;i++){
                        despl-=lista.eq(i).width()+borde;
                    }  
                }
                boxi.animate({
                    left: despl
                });    
                $('.submenu_'+pos+' li').removeClass('menuSelected');
                $('.submenu_'+pos+' li').eq(index).addClass('menuSelected');
            }
            function liberar() {
                if(estaPulsado){
                    //ratonSoltado();
                    //estaPulsado = false;
                }
            }
            
        </script>
    </head>
    <body ondragstart="return false">
        <div id="floater"></div>
        <div class="wrapper">     
             <div id="col_left">
                  <?php include_once("header.php");?>
             </div>
             <div id="col_right">
                 
                
                 <div id="row_complete" class="swipe"></div>
                 <div id="row_sup" class="swipe"></div>
                 <div id="row_inf" class="swipe"></div>
             </div>
             <div class="clr"></div>
            
        </div>
         <footer>
                 <div  style="float:left;">
                 <ul>
                     <li>1520 TRILLO AVENUE</li>
                     <li>CORAL GABLES FL 33146</li>
                     <li>305 333 2943</li>
                     <li><a href="mailto:studio1@cureandpenabad.com">EMAIL</a></li>                         
                     <li><a href="https://www.facebook.com/CUREandPENABAD" target="_blank">FACEBOOK</a></li>
                 </ul>
                 </div>
                 <div style="float:right;margin-right: 20px;">
                     CURE & PENABAD © ALL RIGHTS RESERVED 2012

                 </div>
                 <div class="clr"></div>
             </footer>
   

<script>
function show(url,frame){
    if(frame==='row_complete'){        
        $('.submenu').hide();
        $('.submenu_pratice').show();   
        $('.swipe').html('');    
        $('#row_sup').hide();
        $('#row_inf').hide();
        $('#row_complete').show();
    }else{
        $('#comercial_menu').hide();
        $('#comercial_nav').hide();
        $('#row_sup').show();
        $('#row_inf').show();
        $('#row_complete').html('');
        $('#row_complete').hide();
    }
    $.post(url, function(data) {
      $('#'+frame).html(data); 
      var n=frame.split("_");
      recorre(0,n[1]);
    });
}
function practice(id){ 
    sec=0;
    $("#comercial_menu").children('li').removeClass('menuSelected');
    $("#comercial_menu li").eq(id).addClass('menuSelected');
    $.post('index.php?practice='+id, function(data) {
      $('#comercial_nav').html(data);  
      $('#comercial_nav').show();
    });
}
function menu(id,sub){
    $('.'+sub).css('display','none');
    $('#'+id).css('display','inherit');
}
function readMore(a){
    $(a).toggle();
     var pad=$(a).parents('li');
     var yellow=pad.find('.yellow_text');
     var imgBox=pad.find('.image_box');
     var img=pad.find('img');
     var width=img.width();
     yellow.animate({
         'width':width-40
     },1000);
     imgBox.animate({
         'width':width
     },1000);
}
function select_menu(id){
}
$(".swipe").on("mouseover", function(event){
    idEl=$(this).children().attr('id');
    el = document.getElementById(idEl);
    if (el.addEventListener){
        el.addEventListener("mousedown", ratonPulsado, false);
        el.addEventListener("mouseup", ratonSoltado, false);
        el.addEventListener("mouseout", liberar, false);
        document.addEventListener("mousemove", ratonMovido, false);
    } else { //Para IE
        el.attachEvent('onmousedown', ratonPulsado);
        el.attachEvent('onmouseup', ratonSoltado);
        el.attachEvent('mouseout', liberar);
        document.attachEvent('onmousemove', ratonMovido);
    }
    
});
$(".menu li").on("click", function(event){
    $(this).parent().children('li').removeClass('menuSelected');
    $(this).addClass('menuSelected');
    
});

var lastTap = null;  
$(document).ready(function() {
   $('#col_right').draggable();
    show('home.php','row_sup');
    show('homeText.php','row_inf');
});
</script>
</body>
</html>