$(document).ready(function() {
    $("#register-form").validate({
        errorElement: "span",
        rules: {
            login: {
                required: true,
                minlength: 4,
                maxlength: 16
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            cpassword: {
                required: true,
                equalTo: '#password'
            },
        },
        messages: {
            login: {
                required: "Introduzca un nome de usuario",
                minlength: "O nome de usuario é demasiado corto",
                maxlength: "O nome de usuario é demesido longo"
            },
            email: {
                required: "Debe introducir unha dirección de correo electrónico",
                email: "A dirección de correo electrónico intoducida non é valida"
            },
            password: {
                required: "Introduzca o contrasinal",
                minlength: "A contrasinal debe ser maior de 8 caracteres",
                maxlength: "O contrasinal introducido é demasiado longo"
            },
            cpassword: {
                required: "Repita o contrasinal",
                equalTo: "Os contrasinais non coinciden."
            }
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
            form.submit();
        }
    });

});

function volver() {
    window.history.back();
}