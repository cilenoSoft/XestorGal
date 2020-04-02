$(document).ready(function() {
    $('#formularioContacto').validate({
        errorElement: "span",
        rules: {
            asunto: {
                minlength: 4,
                maxlength: 40,
                required: true
            },
            contido: {
                minlength: 4,
                required: true
            },
        },
        messages: {
            asunto: {
                required: "Introduzca o asunto",
                minlength: "O asunto introducido é demasiado curto.",
                maxlength: "Máximo 40 caracteres"
            },
            contido: {
                required: "Introduzca o contido",
                minlength: "O contido introducido é demasiado curto.",
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
            enviarCorreo();
        },
    });

});


function enviarCorreo() {
    $(document).ready(function() {
        var params = {
            "asunto": $("#asunto").val(),
            "contido": $("#contido").val(),
        };
        //  alert($("#asunto").val());
        $.ajax({
            data: params,
            url: '../controllers/controller_envia_correo.php',
            dataType: 'html',
            type: 'post',
            beforeSend: function() {
                //mostramos gif "cargando"
                $("#overlay").fadeIn(300);　
            },
            success: function(respuesta) {
                setTimeout(function() {
                    $("#overlay").fadeOut(300);
                }, 300);
                if (respuesta == "KO") {
                    alert("Erro o enviar o correo");
                } else {
                    alert("Correo enviado.");
                }
            },
            // código a ejecutar si la petición falla;
            error: function(xhr, status) {
                alert("Erro o enviar o correo");
            },
        });
    });
}