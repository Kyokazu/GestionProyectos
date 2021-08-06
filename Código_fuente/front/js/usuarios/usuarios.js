$(document).ready(function() {
    iniciarTabla();
    obtenerDatos();
    ocultarModalUsuarios();
    $("#btnUserAct").hide();
});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTabla() {

    //tabla de alumnos
    $("#listadoUsuariosTabla").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "Cargando...",
            search: "Buscar:",
            info: "_START_ de _MAX_ registros", //_END_ muestra donde acaba _TOTAL_ muestra el total
            infoEmpty: "Ningun registro 0 de 0",
            infoFiltered: "(filtro de _MAX_ registros en total)",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Ultimo"
            }
        },
        columns: [{
                className: "text-center",
                orderable: false,
                data: null,
                visible: true,
                render: function(data) {
                    return "<img src='" + data.foto + "' alt='foto del usuario' width='50px'>"
                }
            },
            {
                data: "nombres",
                className: "text-center",
                orderable: false,
            },
            {
                data: "correo",
                className: "text-center",
                orderable: false,
            },
            {
                data: "telefono",
                className: "text-center",
                orderable: false,
            },
            {
                className: "text-center",
                orderable: true,
                data: null,
                visible: true,
                render: function(data) {
                    return data.estado === 1 ? "Activo" : "Inactivo";
                }
            },
            {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                    "<a class='personalizado actualizar' title='Gestionar'><i class='fa fa-edit'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "<a class='personalizado activar' title='Activar'><i class='fa fa-check-circle'></i></a>",
                    "<a class='personalizado inactivar'title='Inactivar'><i class='fa fa-times-circle'></i></a>",
                    "</div>",
                ].join(""),
            },
        ],
        rowCallback: function(row, data, index) {
            var idUser = data.id,
                estado = data.estado;

            if (estado === 1) {
                $(".activar", row).hide();
                $(".inactivar", row).click(function() {
                    cambiarEstado(idUser, 0);
                });
            } else {
                $(".inactivar", row).hide();
                $(".activar", row).click(function() {
                    cambiarEstado(idUser, 1);
                });
            }
            $(".actualizar", row).click(function() {
                gestionarItem(data, index);
            });
        },
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [{
                extend: "copy",
                className: "btn btn-primary glyphicon glyphicon-duplicate"
            },
            {
                extend: "csv",
                title: "listadoAlumnos",
                className: "btn btn-primary glyphicon glyphicon-save-file"
            },
            {
                extend: "excel",
                title: "listadoAlumnos",
                className: "btn btn-primary glyphicon glyphicon-list-alt"
            },
            {
                extend: "pdf",
                title: "listadoAlumnos",
                className: "btn btn-primary glyphicon glyphicon-file"
            },
            {
                extend: "print",
                className: "btn btn-primary glyphicon glyphicon-print",
                customize: function(win) {
                    $(win.document.body).addClass("white-bg");
                    $(win.document.body).css("font-size", "10px");
                    $(win.document.body)
                        .find("table")
                        .addClass("compact")
                        .css("font-size", "inherit");
                },
            },
        ],
    });

}

//----------------------------------CRUD----------------------------------
/**
 * @method obtenerDatos
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */
function obtenerDatos() {
    Utilitario.agregarMascara();
    fetch("../../back/controller/PersonaController_ListadoEspecialAlumnos.php", {
            method: "GET",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                //Authorization: Utilitario.getLocal("sesionId"),
            },
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            listadoEspecialUsuarios(data.usuario);
        })
        .catch(function(promise) {
            if (promise.json) {
                promise.json().then(function(response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function() {
                            Utilitario.cerrarSesion();
                        });
                    } else if (mensaje) {
                        Mensaje.mostrarMsjError("Error", mensaje);
                    }
                });
            } else {
                Mensaje.mostrarMsjError(
                    "Error",
                    "Ocurrió un error inesperado. Intentelo nuevamente por favor."
                );
            }
        })
        .finally(function() {
            Utilitario.quitarMascara();
        });
};

/**
 * @method cambiarEstado
 * Metodo para actualizar el estado de un usuario
 * @param {idUser} idUser Id del usuario a actualizar el estado
 * @param {estado} estado valor del nuevo estado
 */
function cambiarEstado(idUser, estado) {
    try {
        database
            .firestore()
            .collection("users_ref")
            .doc(idUser)
            .update({
                estado: estado,
            });
        return Mensaje.mostrarMsjExito(
            "¡Exito!",
            "Actualizacion de estado exitosa."
        );
    } catch (error) {
        return Mensaje.mostrarMsjError(
            "Error",
            "No se ha podido actualizar el estado del usuario!"
        );
    }
}

/**
 * @method registrarUsuario
 * Método que se encarga de ejecutar el servicio que registra un usuario.
 * @param {Object} usuario  Objeto con los datos del usuario a registrar.
 */
function registrarUsuario() {
    let email = $('#correo').val(),
        fotoBase = $('#fotobase').val(),
        data = {
            nombres: $('#nombre').val(),
            correo: email,
            telefono: $('#telefono').val(),
            foto: fotoBase,
            administrador: Number($('#rol').val()),
            estado: 1
        }

    fotoBase && fotoBase !== "" ?
        database
        .auth()
        .createUserWithEmailAndPassword(email, "password")
        .then((userCredential) => {
            var user = userCredential.user;
            //se envia email
            user
                .sendEmailVerification()
                .then(function() {
                    //
                })
                .catch(function() {
                    return Mensaje.mostrarMsjError(
                        "Error",
                        "No se ha podido enviar el correo de verificacion al usuario!"
                    );
                })
                .finally(function() {
                    //crear en collection
                    database
                        .firestore()
                        .collection("users_ref")
                        .doc(user.uid)
                        .set(data);
                    return Mensaje.mostrarMsjExito(
                        "¡Exito!",
                        "Registro del usuario exitoso."
                    );
                });
        }) :
        Mensaje.mostrarMsjError(
            "Error",
            "Debe Cargar una imagen para registro del usuario."
        );
}

/**
 * @method actualizarUsuario
 * Método que se encarga de ejecutar el servicio que actualiza un usuario.
 * @param {Object} usuario  Objeto con los datos del usuario a registrar.
 */
function actualizarUsuario() {
    let id = $('#idUsuario').val(),
        index = $('#index_order').val(),
        foto = $('#fotobase').val(),
        data = {
            nombres: $('#nombre').val(),
            administrador: $('#rol').val(),
            telefono: $('#telefono').val(),
        },
        dataUpdate = {
            id: $('#idUsuario').val(),
            foto: $('#fotoU').val(),
            correo: $('#correoU').val(),
            nombres: $('#nombre').val(),
            administrador: $('#rol').val(),
            telefono: $('#telefono').val(),
        }
        //si existe foto se añade
    foto && foto !== "" ? data.foto = foto : '';

    try {
        database
            .firestore()
            .collection("users_ref")
            .doc(id)
            .update(data)
        $('#listadoUsuariosTabla').DataTable().row(index).data(dataUpdate).draw()
        return Mensaje.mostrarMsjExito(
            "¡Exito!",
            "Actualizacion del usuario exitosa."
        );
    } catch (error) {
        return Mensaje.mostrarMsjError(
            "Error",
            "No se ha podido actualizar el usuario!"
        );
    }
}

//----------------------------------HELPERS----------------------------------

/**
 * @method listadoEspecialUsuarios
 * Método que se encarga de listar los usuarios a la tabla.
 *
 * @param {Object} usuarios Arreglo con los datos de los usuarios.
 */
function listadoEspecialUsuarios(usuarios) {
    let tabla = $("#listadoUsuariosTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(usuarios).draw();
}

/**
 * @method gestionarItem
 * Método que se encarga de abrir el modal con la info de la fila seleccinada
 *
 * @param {Object} btn id de la fila que se desea visualizar.
 */
function gestionarItem(data, index) {

    /* se quita la parte del correo del usuario porque no se puede editar*/
    $('#groupCorreo').hide();
    /* data del usuario */
    $('#index_order').val(index);
    $('#correoU').val(data.correo);
    $('#fotoU').val(data.foto);
    $('#idUsuario').val(data.id);
    $('#nombre').val(data.nombres);
    $('#telefono').val(data.telefono);
    $('#rol').val(data.administrador);
    /* botones y modal */
    $("#btnUserAct").show();
    $("#btnUserReg").hide();
    $("#modalUsuarios").show();
    $("#tablaUsuarios").hide();
    /* check de las validaciones de la info cargada */
    validarNombre();
    validarTelefono();
    validarRol();
}

/**
 * @method mostrarModalUsuarios
 * Método que se encarga de abrir el modal para registro o actualizacion
 */
function mostrarModalUsuarios() {
    $('#groupCorreo').show();
    limpiarcampos();
    $("#btnUserAct").hide();
    $("#btnUserReg").show();
    $("#modalUsuarios").show();
    $("#tablaUsuarios").hide();
}

/**
 * @method ocultarModalUsuarios
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function ocultarModalUsuarios() {
    $("#modalUsuarios").hide();
    $("#tablaUsuarios").show();
}

/**
 * @method limpiarcampos
 * Método que se encarga de limpiar los campos del modal para registro o actualizacion
 */
function limpiarcampos() {
    $('#nombre').val('');
    $('#correo').val('');
    $('#telefono').val('');
    $('#rol').val('');
}

$('#foto').change(function(e) {
    if (e.target.files[0].type === "image/png") {
        $("#btnUserAct").attr("disabled", true);
        $("#btnUserReg").attr("disabled", true);
        convertImage(this, 'fotobase');
    } else {
        input = document.getElementById("foto");
        input.value = '';
        return Mensaje.mostrarMsjError(
            "Error",
            "Solo se pueden cargar imagenes con formato png."
        );
    }
});

async function convertImage(input, id) {
    const file = input.files[0];
    $("#" + id).val(await toBase64(file));
    console.log($("#fotobase").val());
    $("#btnUserAct").attr("disabled", false);
    $("#btnUserReg").attr("disabled", false);
}

var toBase64 = file => new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result);
    reader.onerror = error => reject(error);
});

//-------------------------------HELPERS INPUTS-------------------------------

/**
 * @method validarNombre
 * Método que se encarga de validar el campo de nombre.
 */
function validarNombre() {
    let input = $("#nombre");

    if (input.val() === "" || input.val().length <= 6) {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
        $("#btnUserAct").prop("disabled", true);
        $("#btnUserReg").prop("disabled", true);
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        $("#btnUserAct").prop("disabled", false);
        $("#btnUserReg").prop("disabled", false);
    }
}

/**
 * @method validarCorreo
 * Método que se encarga de validar el campo de correo.
 */
function validarCorreo() {
    let input = $("#correo");

    if (input.val() === "" || /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{3,}$/i.test(input.val())) {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
        $("#btnUserAct").prop("disabled", true);
        $("#btnUserReg").prop("disabled", true);
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        $("#btnUserAct").prop("disabled", false);
        $("#btnUserReg").prop("disabled", false);
    }
}

/**
 * @method validarTelefono
 * Método que se encarga de validar el campo de telefono.
 */
function validarTelefono() {
    let input = $("#telefono");

    if (input.val() === "" || input.val().length <= 7) {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
        $("#btnUserAct").prop("disabled", true);
        $("#btnUserReg").prop("disabled", true);
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        $("#btnUserAct").prop("disabled", false);
        $("#btnUserReg").prop("disabled", false);
    }
}

/**
 * @method validarRol
 * Método que se encarga de validar el campo de rol.
 */
function validarRol() {
    let input = $("#rol");

    if (input.val() === "-1") {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
        $("#btnUserAct").prop("disabled", true);
        $("#btnUserReg").prop("disabled", true);
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        $("#btnUserAct").prop("disabled", false);
        $("#btnUserReg").prop("disabled", false);
    }
}