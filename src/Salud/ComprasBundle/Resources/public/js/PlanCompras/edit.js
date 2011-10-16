$(document).ready(function(){
    var front_controller = $('#front_controller').val();
    $('#salud_comprasbundle_plancomprastype_idFuenteFinanciamiento').change(function(){
        var url = front_controller + '/fuentefinanciamiento/'+$(this).val()+'/subfuentes';
        $.getJSON(url, null, function(resp){
            var subfuente = $("#salud_comprasbundle_plancomprastype_idSubfuenteFinanciamiento");
            subfuente.empty();
            for (var i = 0; i < resp.length; i++) {
                subfuente.append('<option value="' + resp[i].id + '">' + resp[i].descripcionsubfuente + '</option>');
            }
        })
    })
})


