//src/Salud/PlanCompras/Resources/public/js/PlanCompras/detalle.js
var grid_aux, total_antes;
$(document).ready(function(){  
    $("#detalle_plan").jqGrid({
        url: $('#front_controller').val() + "/plancompras/" + $("#id_plan").val() + "/detalle",
        editurl:$('#front_controller').val() + "/plancompras/" + $("#id_plan").val() + "/detalle/edit",
        datatype: 'json',
        mtype: 'POST',            
        colNames:['iditem', 'Producto','Unidad de medida', 'Precio Unitario', 'Cantidad', 'Total'],
        colModel :[ 
            {name:'iditem', index:'idItem', width:50, editable: true},
            {name:'descripcionitem', index:'descripcionitem', width:450, editable: true},
            {name:'descripcionunidadmedida', index:'descripcionunidadmedida', width:120, editable:true}, 
            {name:'preciounitario', index:'preciounitario', width:100, align:'right', editable:true}, 
            {name:'cantidadpedido', index:'cantidapedido', width:70, align:'right', editable: true },
            {name:'total', index:'total', width:90, align:'right', summaryType: 'sum', formatter:'currency', editable: true}                
        ]  
    }); 
});
