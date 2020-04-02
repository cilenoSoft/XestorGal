$(document).ready(function() {
    $('#form-crea-user').validate({
        errorElement: "span",
        rules: {
            login: {
                minlength: 4,
                maxlength: 8,
                required: true
            },
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            login: {
                required: "Introduzca un nome de usuario",
                minlength: "O nome de usuario é demasiado corto",
                maxlength: "O nome de usuario é demasiado longo"
            },
            email: {
                required: "Debe introducir unha dirección de correo electrónico",
                email: "A dirección de correo electrónico intoducida non é valida"
            },
        },
        highlight: function(element) {
            $(element).closest('.control-group')
                .removeClass('success').addClass('error');
        },
        success: function(element) {
            $(element)
                .closest('.control-group')
                .removeClass('error').addClass('success');
        },
        submitHandler: function(form) {
            creaUser();
        },
    });
});