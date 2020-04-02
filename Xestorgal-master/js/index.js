/* # Validando Formulario
============================================*/
$(document).ready(function() {
    $('#formLogueo').validate({
        errorElement: "span",
        rules: {
            login: {
                minlength: 4,
                maxlength: 8,
                required: true
            },
            password: {
                minlength: 6,
                maxlength: 16,
                required: true
            }
        },
        messages: {
            login: {
                required: "Introduzca un nome de usuario",
                minlength: "O nome de usuario é demasiado corto",
                maxlength: "O nome de usuario é demasiado longo"
            },
            password: {
                required: "Introduzca o contrasinal",
                minlength: "A contrasinal debe ser maior de 8 caracteres",
                maxlength: "O contrasinal introducido é demasiado longo"
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
            $("#enviaLogueo").click(function() {
                logueo();
            });
        },
    });
});


function logueo() {
    var params = {
        "password": $("#password").val(),
        "login": $("#login").val(),
    };

    //  alert($("#asunto").val());
    $.ajax({
        data: params,
        url: 'MVC/controllers/controller_logueo.php',
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
                alert("Error KO, credenciais incorrectas.");
                document.location.href = 'index.html';
            } else {
                document.location.href = 'MVC/controllers/controller_conta.php';
            }
        },
        // código a ejecutar si la petición falla;
        error: function(xhr, status) {
            alert("Error, credenciais incorrectas.");
        },

    });
}