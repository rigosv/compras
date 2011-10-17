//src/Salud/PlanCompras/Resources/public/js/PlanCompras/detalle.js
$(document).ready(function(){  
    tableToGrid("#detalle_plan", {
        toolbar: [true,"bottom"],
        loadComplete: function() { 
            jQuery("#t_detalle_plan").css('text-align','right').
                html("<B>Total Plan de compras:<span id='total_plan'>"+ 
                        $('#total').val()+ 
                       "</span>&nbsp;&nbsp;&nbsp;</B>");
            jQuery(this).jqGrid('hideCol','id');
         }
    });
});
