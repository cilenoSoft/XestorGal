$(document).ready(function() {
    $('#formCreaEq').validate({
        errorElement: "span",
        rules: {
            nombreEquipo: {
                minlength: 4,
                maxlength: 40,
                required: true
            }
        },
        messages: {
            nombreEquipo: {
                required: "Introduzca o nome do equipo",
                minlength: "O nome introducido é demasiado curto.",
                maxlength: "Máximo 40 caracteres"
            }
        },
        highlight: function(element) {
            $(element).closest('.control-group')
                .removeClass('success').addClass('error');
        },
        success: function(element) {
            $(element).closest('.help-block')
                .removeClass('error').addClass('success');
        },
        submitHandler: function(form) {
            crearNovoEquipo();
        },
    });
});