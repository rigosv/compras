var grid_aux, total_antes;
$(document).ready(function(){
    $('#data_control').hide();    
    $(function(){ 
        $("#detalle_plan").jqGrid({
            url: $('#front_controller').val() + "/plancompras/" + $("#id_plan").val() + "/detalle",
            editurl:$('#front_controller').val() + "/plancompras/" + $("#id_plan").val() + "/detalle/edit",
            datatype: 'json',
            mtype: 'POST',            
            colNames:['Producto','Unidad de medida','Precio Unitario','Cantidad','Total'],
            colModel :[ 
                {name:'descripcionitem', index:'descripcionitem', width:450},
                {name:'descripcionunidadmedida', index:'descripcionunidadmedida', width:120}, 
                {name:'preciounitario', index:'preciounitario', width:100, align:'right'}, 
                {name:'cantidadpedido', index:'cantidapedido', width:70, align:'right' },
                {name:'total', index:'total', width:90, align:'right', formatter:'currency'}                
            ],
            autowidth: false,
            sortname: 'descripcionitem',
            sortorder: 'desc',
            viewrecords: true,            
            toolbar: [true,"bottom"],
            gridview: true,            
            caption: 'Detalle Plan de compras'            
        }); 
    });
});