$(document).ready(function(){    
    
    $("h1").click(function(){
        $(this).css('color', 'red').fadeOut('slow').fadeIn('slow');
    });
    
    /* Agregamos una función al evento click de todas las etiquetas 'a'
     * que están dentro de la tabla con clase 'listado'
     */
    $("td.descripcionitem a").click(function(){
        //Verificar si existe el elemento 'resultado' creado de alguna
        //llamada anterior, y lo borra
        ($('#resultado')) ? $('#resultado').remove():'';
        
        //Recuperar el atributo href del enlace actual
        var href = $(this).attr('href');
        
        // crear un elemento para colocar la información
        var elem = $("<div id='resultado'></div>");
        
        //Agregar el elemento después de la etiqueta actual
        elem.insertAfter(this);
        
        // cargar mediante una llamada ajax la dirección que tiene href 
        $('#resultado').load(href, function(){
            $(this).dialog({modal: true, width: 600})
        });
                
        // Para que no haga el comportamiento normal del enlace y cargue la página
        return false;
    });
})
