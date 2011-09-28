//src/Salud/ComprasBundle/Resources/public/js/Producto/edit.js
$(document).ready(function(){
   //Especificar las validaciones
   $('#salud_comprasbundle_itemtype_preciounitario').attr('data-bvalidator', 'min[0.01]');
   
   //Opciones del validador
   var optionsPostIt = { 
       classNamePrefix: 'bvalidator_postit_', 
       offset: {x:-29, y:-10},
       lang: 'es',
       template: '<div class="{errMsgClass}">{message}\n\
                    <div class="bvalidator_postit_pointer">\n\
                        <div class="bvalidator_postit_inner_pointer">\n\
                        </div>\n\
                    </div>\n\
                 </div>' 
   };
   
   //Validar el formulario
   $('form').bValidator(optionsPostIt); 
});