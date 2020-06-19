$(document).ready(function(){
    //$('#typeSonda').children('div').hide();
    $('#tipoDeService').on('change', function(){
        var selectValor = $(this).val();
        alert(selectValor)
    });
});