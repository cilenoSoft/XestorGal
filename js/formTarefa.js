$(document).ready(function() {
    $('#formCreaTar').validate({
        errorElement: "span",
        rules: {
            titulo: {
                minlength: 4,
                maxlength: 40,
                required: true
            },
            descripcion: {
                minlength: 20,
                maxlength: 60,
                required: true
            }
        },
        messages: {
            titulo: {
                required: "Introduzca o título da tarefa",
                minlength: "O título introducido é demasiado curto.",
                maxlength: "Máximo 40 caracteres"
                
            },
            descripcion: {
                required: "Introduzca a descripcion da tarefa",
                minlength: "A descripcion introducida é demasiado curta.",
                maxlength: "Máximo 60 caracteres"
            },
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
            creaTarefa();
        },
    });
});