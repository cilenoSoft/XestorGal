$(document).ready(function() {
    $('#formCambiaPass').validate({
        errorElement: "span",
        rules: {
            password: {
                minlength: 6,
                maxlength: 16,
                required: true
            },
            password_new: {
                minlength: 6,
                maxlength: 16,
                required: true
            }
        },
        messages: {
            password: {
                required: "Introduzca o contrasinal actual",
                minlength: "A contrasinal debe ser maior de 8 caracteres",
                maxlength: "O contrasinal introducido é demasiado longo"
            },
            password_new: {
                required: "Introduzca o novo contrasinal",
                minlength: "A contrasinal debe ser maior de 8 caracteres",
                maxlength: "O contrasinal introducido é demasiado longo"
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
            form.submit();
        },
    });
});