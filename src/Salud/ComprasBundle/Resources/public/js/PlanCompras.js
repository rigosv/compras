var grid_aux, total_antes;
$(document).ready(function(){
    $('#data_control').hide();    
    $(function(){ 
        $("#detalle_plan").jqGrid({
            url: $('#front_controller').val() + "/plancompras/" + $("#id_plan").val() + "/detalle",
            editurl:$('#front_controller').val() + "/plancompras/" + $("#id_plan").val() + "/detalle/edit",
            datatype: 'json',
            mtype: 'POST',            
            colNames:['Producto', 'iditem','Unidad de medida','Precio Unitario','Cantidad','Total'],
            colModel :[                 
            {
                name:'descripcionitem', 
                index:'descripcionitem', 
                width:450, 
                editable: true
            },

            {
                name:'iditem', 
                index:'iditem', 
                width:0, 
                editable: true
            },

            {
                name:'descripcionunidadmedida', 
                index:'descripcionunidadmedida', 
                width:120, 
                editable: true
            }, 

            {
                name:'preciounitario', 
                index:'preciounitario', 
                width:100, 
                align:'right', 
                editable:true
            }, 

            {
                name:'cantidadpedido', 
                index:'cantidapedido', 
                width:70, 
                align:'right', 
                editable:true
            },
            {
                name:'total', 
                index:'total', 
                width:90, 
                align:'right', 
                formatter:'currency', 
                editable: true
            }                
            ],
            sortname: 'descripcionitem',
            sortorder: 'desc',
            toolbar: [true,"bottom"],           
            caption: 'Detalle Plan de compras',
            loadComplete: function() { 
                var udata = jQuery(this).jqGrid('getGridParam','userData');
                jQuery("#t_detalle_plan").css('text-align','right').html("<B>Total Plan de compras:<span id='total_plan'>"+ udata.total + "</span>&nbsp;&nbsp;&nbsp;</B>"); 
                jQuery(this).jqGrid('hideCol',"iditem");
                grid_aux = this;
            }
        }); 
    });
    
    function calcular_total(){
        $("#total").val(parseFloat($("#cantidadpedido").val()) * parseFloat($("#preciounitario").val())); 
    }
    
    
    $("#add_button").click(function(){ 
        jQuery("#detalle_plan").jqGrid('editGridRow',"new",{
            width: 400,
            reloadAfterSubmit:false,
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
                        lastXhr = $.getJSON( $('#front_controller').val() + "/plancompras/item/buscar", request, function( data, status, xhr ) {
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
                        $("#cantidadpedido").focus();
                        $("#preciounitario").change(function(){
                            calcular_total();
                        });
                        $("#cantidadpedido").change(function(){
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
        }); 
    });
    $("#edit_button").click(function(){                
        var gr = jQuery("#detalle_plan").jqGrid('getGridParam','selrow');
        if( gr != null ) jQuery("#detalle_plan").jqGrid('editGridRow',gr,{
            reloadAfterSubmit:false,
            width: 400,
            beforeShowForm: function (){
                $("#preciounitario").change(function(){
                    calcular_total();
                });
                $("#cantidadpedido").change(function(){
                    calcular_total();
                });
            }
        }); else alert("Por favor elija una fila");
    });
    
    $("#delete_button").click(function(){
        var gr = jQuery("#detalle_plan").jqGrid('getGridParam','selrow');
        if( gr != null ) jQuery("#detalle_plan").jqGrid('delGridRow',gr,{
            reloadAfterSubmit:false
        }); else alert("Por favor elija la fila a borrar");
    });
});