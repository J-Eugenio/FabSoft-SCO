$(document).ready(function(){
    $('#tipoDeService').on('change', function(){
        var selectValor = $(this).val();
        alert(selectValor);
    });
});