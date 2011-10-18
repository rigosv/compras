$(document).ready(function(){    
    $("#detalle_plan").jqGrid({
        url: $('#front_controller').val() + "/plancompras/" + $("#id_plan").val() + "/detalle",
        editurl:$('#front_controller').val() + "/plancompras/" + $("#id_plan").val() + "/detalle/edit",
        datatype: 'json',
        mtype: 'POST',            
        colNames:['iditem', 'Producto','Unidad de medida', 'Precio Unitario', 'Cantidad', 'Total'],
        colModel :[{
            name:'iditem', 
            index:'idItem', 
            width:0, 
            editable: true
        },

        {
            name:'descripcionitem', 
            index:'descripcionitem', 
            width:450, 
            editable: true
        },

        {
            name:'descripcionunidadmedida', 
            index:'descripcionunidadmedida', 
            width:120, 
            editable:true
        }, 

        {
            name:'preciounitario', 
            index:'preciounitario', 
            width:100, 
            align:'right', 
            editable:true
        }, 

        {
            name:'cantidadPedido', 
            index:'cantidadPedido', 
            width:70, 
            align:'right', 
            editable: true
        },

        {
            name:'total', 
            index:'total', 
            width:90, 
            align:'right', 
            summaryType: 'sum', 
            formatter:'currency', 
            editable: true
        }                
        ],
        sortname: 'descripcionitem',
        sortorder: 'desc',
        rowNum:3,
        rowList:[3, 50, 80], 
        pager: '#pager',
        toolbar: [true,"bottom"],
        caption: 'Detalle Plan de compras',
        loadComplete: function() { 
            var udata = jQuery(this).jqGrid('getGridParam','userData');
            jQuery("#t_detalle_plan").css('text-align','right').html("<B>Total Plan de compras:<span id='total_plan'>"+ udata.total + "</span>&nbsp;&nbsp;&nbsp;</B>"); 
            jQuery(this).jqGrid('hideCol',"iditem");
        }            
    }).navGrid("#pager",
    {},//options
    {},// edit options
    {reloadAfterSubmit:false, height:320, width: 500,
        beforeShowForm: function (){                
            var cache = {}, lastXhr;
            $("#descripcionitem").autocomplete({
                minLength: 2,
                source: function( request, response ) {
                    var term = request.term;
                    if ( term in cache ) {
                        response( cache[ term ] );
                        return;
                    }
                    lastXhr = $.getJSON( $('#front_controller').val() + 
                        "/plancompras/item/buscar", request, 
                    function( data, status, xhr ) {                        
                        cache[ term ] = data;
                        if ( xhr === lastXhr ) {
                            response( data );
                        }
                    });
                },
                select: function( event, ui ) {
                    $("#iditem").val(ui.item.id);
                    $("#preciounitario").val( ui.item.precio );
                    $("#descripcionunidadmedida").val( ui.item.unidadmedida).attr("readonly",true);                                
                    $("#cantidadPedido").focus();
                    $("#preciounitario").change(function(){
                        calcular_total();
                    });
                    $("#cantidadPedido").change(function(){
                        calcular_total();
                    });
                                                        
                },
                search: function(event, ui) { 
                    $("#idItem").val("");
                    $("#preciounitario").val("");
                    $("#descripcionunidadmedida").val("");
                }
            });
        }
    },// add options
    {width: 350},// del options
    {} // search options
    );
    function calcular_total(){
        $("#total").val(parseFloat($("#cantidadPedido").val()) * parseFloat($("#preciounitario").val())); 
    }
});