$(document).ready(function () {
    $('#typeSonda').children('div').hide();

    $('#tipoDeService').on('change', function () {
        var selectValor = $(this).val();
        if (selectValor == "Sonda") {
            $('#typeSonda').children('div').show();
        }

        if (selectValor == "Curativo") {
            $('#typeSonda').children('div').hide();
        }
    });

});