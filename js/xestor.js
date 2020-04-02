/* ---------------Conta--------------- */

function subirImaxe() {
    $(document).ready(function() {
        var formData = new FormData();
        var files = $('#file-3')[0].files[0];
        formData.append('file-3', files);
        $.ajax({
            data: formData,
            url: 'controller_subir_imaxe.php',
            dataType: 'html',
            type: 'post',
            contentType: false,
            processData: false,
            beforeSend: function() {
                //mostramos gif "cargando"
                $("#overlay").fadeIn(300);　
            },
            success: function(respuesta) {
                setTimeout(function() {
                    $("#overlay").fadeOut(300);
                }, 500);
                if (respuesta.includes("KO"))
                    alert("Erro o cambiar a imaxe.");
                else {
                    alert("Imaxe cambiada.");
                    $.ajax({
                        // la URL para la petición
                        url: 'controller_conta.php',
                        // especifica si será una petición POST o GET
                        type: 'post',
                        // el tipo de información que se espera de respuesta
                        dataType: 'html',
                        // código a ejecutar si la petición es satisfactoria;
                        success: function(respuesta) {
                            $(location).attr('href', 'controller_conta.php')
                        },
                        // código a ejecutar si la petición falla;
                        error: function(xhr, status) {
                            alert('Erro o cambiar a imaxe.');
                        },
                    });
                }
            },
            // código a ejecutar si la petición falla;
            error: function(xhr, status) {
                setTimeout(function() {
                    $("#overlay").fadeOut(300);
                }, 500);
                alert("Error");
            },
        });
    });
}

function selDate() {
    $(document).ready(function(e) {
        $("#datepicker").on('change', function() {
            var params = {
                "FECHA": $("#datepicker").val(),
            };
            $.ajax({
                data: params,
                // la URL para la petición
                url: 'controller_imputacion.php',
                // especifica si será una petición POST o GET
                type: 'post',
                // el tipo de información que se espera de respuesta
                dataType: 'html',
                // código a ejecutar si la petición es satisfactoria;
                beforeSend: function() {
                    //mostramos gif "cargando"
                    $("#overlay").fadeIn(300);　
                },
                success: function(respuesta) {
                    setTimeout(function() {
                        $("#overlay").fadeOut(300);
                    }, 300);
                    if (respuesta.includes("NO_SESSION")) {
                        alert("Tempo de sesión esgotado, debe volver a iniciar sesión.");
                        window.location.replace("session_timeout.php");
                    } else {
                        $('#imputacion').empty();
                        $('#imputacion').html(respuesta);
                    }
                },
                // código a ejecutar si la petición falla;
                error: function(xhr, status) {
                    setTimeout(function() {
                        $("#overlay").fadeOut(300);
                    }, 300);
                    alert('Error o obter a imputación.');
                },
            });


        });
    });
}



/* ---------------Tareas--------------- */

// Función para obter o historial dunha tarefa
function creaHistorial() {

    $(document).ready(function() {
        $('button.verHistorial').click(function() {
            var params = {
                "tar": $(this).val()
            };
            $.ajax({
                // la URL para la petición
                url: 'controller_historial.php',
                // la información a enviar                                
                data: params,
                // especifica si será una petición POST o GET
                type: 'post',
                // el tipo de información que se espera de respuesta
                dataType: 'html',
                // código a ejecutar si la petición es satisfactoria;
                success: function(respuesta) {
                    $('.modalTarefas').html(respuesta);
                },
                // código a ejecutar si la petición falla;
                error: function(xhr, status) {
                    alert('Error o obter o historial.');
                },
            });
        });
    });
}
//Fin función creaHistorial

function updateTar(id) {
    $(document).ready(function() {
        var params = {
            "tarefa": $("#tarefa_" + id).val(),
            "comentario": $("#comentario_" + id).val(),
            "estado": $("#estado_" + id + " option:selected").text(),
        };
        //  alert($("#asunto").val());
        $.ajax({
            data: params,
            url: 'controller_update_tar.php',
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
                    alert("Erro o actualizar a tarefa");
                } else {
                    alert("Tarefa actualizada.");
                    location.reload();
                }
            },
            // código a ejecutar si la petición falla;
            error: function(xhr, status) {
                alert("Erro o actualizar a tarefa");
            },
        });
    });
}

function textInput() {
    $(document).ready(function(e) {
        $("#enviar").hide();
        $("input[type=file]").on('change', function() {
            alert(this.files[0].name);
            $fileName = $('input[type=file]').val().split('\\').pop();
            $("#textFile").text($fileName);
            $("#enviar").show();
        });
    });
}

function sideVarCollapse() {
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });
    });
}

function selTar() {
    $(document).ready(function(e) {
        $("#selectTarefas").on('change', function() {
            $("#estado").val() = $("#selectTarefas").val();
        });
    });
}

function enviarCorreo() {
    $(document).ready(function() {
        var params = {
            "asunto": $("#asunto").val(),
            "contido": $("#contido").val(),
        };
        //  alert($("#asunto").val());
        $.ajax({
            data: params,
            url: 'controller_envia_correo.php',
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
///
function modalAsignarTarefas() {

    $(document).ready(function() {
        $('button.verTarefas').click(function() {

            var params = {
                "idUsuario": $(this).val()
            };
            $.ajax({
                // la URL para la petición
                url: '../controllers/controller_obter_tar_asignar.php',
                // la información a enviar                                
                data: params,
                // especifica si será una petición POST o GET
                type: 'post',
                // el tipo de información que se espera de respuesta
                dataType: 'html',
                // código a ejecutar si la petición es satisfactoria;
                success: function(respuesta) {
                    $('.modalTarefas').html(respuesta);
                },
                // código a ejecutar si la petición falla;
                error: function(xhr, status) {
                    alert('Error o obter as tarefas.');
                },
            });
        });

        $('button.asignaTarefa').click(function() {

            var params = {
                "idTarefa": $(this).val(),
                "user": $("#userTar").val(),
            };

            $.ajax({
                data: params,
                url: '../controllers/controller_asigna_tar.php',
                dataType: 'html',
                type: 'post',
                success: function(respuesta) {
                    $('#alerta').html(respuesta);
                    $('#myModal').modal('hide');
                },
                // código a ejecutar si la petición falla;
                error: function(xhr, status) {
                    alert('Error o asignar a tarefa.');
                },
            });
        });


    });
}

function modalTarefasAsignadas() {

    $(document).ready(function() {
        $('button.verTarefasAsignadas').click(function() {

            var params = {
                "idUsuario": $(this).val()
            };
            $.ajax({
                // la URL para la petición
                url: '../controllers/controller_obter_tar_asignadas.php',
                // la información a enviar                                
                data: params,
                // especifica si será una petición POST o GET
                type: 'post',
                // el tipo de información que se espera de respuesta
                dataType: 'html',
                // código a ejecutar si la petición es satisfactoria;
                success: function(respuesta) {
                    $('.modalTarefasAsignadas').html(respuesta);
                },
                // código a ejecutar si la petición falla;
                error: function(xhr, status) {
                    alert('Error o obter as tarefas.');
                },
            });
        });

        $('button.desAsignaTarefa').click(function() {

            var params = {
                "idTarefa": $(this).val(),
                "user": $("#userTar").val(),
            };

            $.ajax({
                data: params,
                url: '../controllers/controller_desasigna_tar.php',
                dataType: 'html',
                type: 'post',
                success: function(respuesta) {
                    $('#alerta').html(respuesta);
                    $('#myModal2').modal('hide');
                },
                // código a ejecutar si la petición falla;
                error: function(xhr, status) {
                    alert('Error o desasignar a tarefas.');
                },
            });
        });


    });
}

function creaTarefa() {

    var params = {
        "user": $("#usuario option:selected").text(),
        "tituloTarefa": $("#titulo").val(),
        "descripcionTarefa": $("#descripcion").val(),
    };

    $.ajax({
        data: params,
        url: 'controller_crea_tar.php',
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
            alert(respuesta);
        },
        // código a ejecutar si la petición falla;
        error: function(xhr, status) {
            alert('Error o crear a tarefa.');
        },
    });

}

function creaUser() {

    $.ajax({
        data: $("#form-crea-user").serialize(),
        url: 'controller_crea_user.php',
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
            alert(respuesta);
        },
        // código a ejecutar si la petición falla;
        error: function(xhr, status) {
            alert('Error ó crear o usuario.');
        },
    });

}

function crearNovoEquipo() {
    //  alert($("#asunto").val());
    $.ajax({
        data: $("#formCreaEq").serialize(),
        url: 'controller_crea_equipo.php',
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
                alert("Erro o crear o equipo");
            } else {
                alert("Equipo creado correctamente.");
            }
        },
        // código a ejecutar si la petición falla;
        error: function(xhr, status) {
            alert("Erro o crear o equipo");
        },

    });
}

function creaSelect() {

    $(document).ready(function() {
        $("#numMembros").blur(function() {

            var params = {
                "numMembro": $(numMembros).val()
            };

            $.ajax({
                data: params,
                url: 'controller_select_users.php',
                dataType: 'html',
                type: 'post',
                success: function(response) {
                    //mostramos salida del PHP
                    jQuery("#selectUsuarios").html(response);

                }
            });
            $("#botonCrearEquipo").removeAttr("disabled");
        });

        $('button.verHistorial').click(function() {

            var params = {
                "tar": $(this).val()
            };
            $.ajax({
                // la URL para la petición
                url: 'func_obter_hist.php',
                // la información a enviar                                
                data: params,
                // especifica si será una petición POST o GET
                type: 'post',
                // el tipo de información que se espera de respuesta
                dataType: 'html',
                // código a ejecutar si la petición es satisfactoria;
                beforeSend: function() {
                    //mostramos gif "cargando"
                    $("#overlay").fadeIn(300);　
                },
                success: function(respuesta) {
                    setTimeout(function() {
                        $("#overlay").fadeOut(300);
                    }, 300);
                    $('#modalTarefas').html(respuesta);
                },
                // código a ejecutar si la petición falla;
                error: function(xhr, status) {
                    alert('Error o obter o historial.');
                },
            });
        });
    });
}

function cambiarEquipo() {
    $(document).ready(function(e) {
        $("#select_equipo").on('change', function() {
            var equipo = $("#select_equipo option:selected").text();
            $('.equipoSelec').text();
            $('#formEquipo').submit();
        });

    });
}