$(document).ready(function () {
    iniciarTabla();
//    obtenerDatos();
    ocultarModalPublicaciones();
    $("#btnUserAct").hide();
});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTabla() {

    //tabla de alumnos
    $("#listadoTpTabla").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "Sin Ordenes...",
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
        columns: [
            {
                data: "id",
                className: "text-center",
                orderable: true,
            },
            {
                data: "descripcion",
                className: "text-center",
                orderable: true,
            },

            {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                    "<a class='personalizado actualizar' title='Gestionar'><i class='fa fa-edit'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "</div>",
                ].join(""),
            },
        ],
        rowCallback: function (row, data, index) {

//            alert(data.descripcion);
            $(".actualizar", row).click(function () {
                gestionarItem(data.id);
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
                customize: function (win) {
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
    fetch("../../back/controller/Tipo_publicacionesController_list.php", {
        method: "GET",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            //Authorization: Utilitario.getLocal("sesionId"),
        },
    })
            .then(function (response) {
                if (response.ok) {
                    return response.json();
                }
                throw response;
            })
            .then(function (data) {
                listadoTipoPublicaciones(data.publicaciones);
            })
            .catch(function (promise) {
                if (promise.json) {
                    promise.json().then(function (response) {
                        let status = promise.status,
                                mensaje = response ? response.mensaje : "";
                        if (status === 401 && mensaje) {
                            Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
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
            .finally(function () {
                Utilitario.quitarMascara();
            });
}
;





//----------------------------------HELPERS----------------------------------

/**
 * @method listadoEspecialUsuarios
 * Método que se encarga de listar los usuarios a la tabla.
 *
 * @param {Object} usuarios Arreglo con los datos de los usuarios.
 */
function listadoTipoPublicaciones(publicaciones) {
    let tabla = $("#listadoTpTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(publicaciones).draw();
}

/**
 * @method gestionarItem
 * Método que se encarga de abrir el modal con la info de la fila seleccinada
 *
 * @param {Object} btn id de la fila que se desea visualizar.
 */
function gestionarItem(data) {


}

/**
 * @method mostrarModalUsuarios
 * Método que se encarga de abrir el modal para registro o actualizacion
 */
function mostrarModalPublicaciones() {
    $('#groupCorreo').show();
    limpiarcampos();
    $("#btnUserAct").hide();
    $("#btnUserReg").show();
    $("#modalPublicaciones").show();
    $("#tablaPublicaciones").hide();
}

/**
 * @method ocultarModalUsuarios
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function ocultarModalPublicaciones() {

    $("#modalPublicaciones").hide();
    $("#tablaPublicaciones").show();
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

$('#foto').change(function (e) {
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

//<editor-fold defaultstate="collapsed" desc="CRUD">


function UpdateTp() {

    let order = {
        id: $('#id').val(),
        descripcion: $('#descripcion').val(),

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Tipo_publicacionesController_Update.php", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            //Authorization: Utilitario.getLocal("sesionId"),
        },
        body: JSON.stringify(order),
    })
            .then(function (response) {
                if (response.ok) {
                    return response.json();
                }
                throw response;
            })
            .then(function (data) {

                Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
                obtenerDatos();
                ocultarModalPublicaciones();
            })
            .catch(function (promise) {
                if (promise.json) {
                    promise.json().then(function (response) {
                        let status = promise.status,
                                mensaje = response ? response.mensaje : "";
                        if (status === 401 && mensaje) {
                            Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
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
            .finally(function () {
                Utilitario.quitarMascara();
            });

}

function registrarTp() {

    let ordenes = {
        id: $('#id').val(),
        descripcion: $('#descripcion').val(),

    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/Tipo_publicacionesController_Insert.php", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            //Authorization: Utilitario.getLocal("sesionId"),
        },
        body: JSON.stringify(ordenes),
    })
            .then(function (response) {
                if (response.ok) {
                    return response.json();
                }
                throw response;
            })
            .then(function (data) {

                Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
                obtenerDatos();
                ocultarModalPublicaciones();
            })
            .catch(function (promise) {
                if (promise.json) {
                    promise.json().then(function (response) {
                        let status = promise.status,
                                mensaje = response ? response.mensaje : "";
                        if (status === 401 && mensaje) {
                            Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
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
            .finally(function () {
                Utilitario.quitarMascara();
            });

}



function DeleteOrder(id) {
    Mensaje.mostrarMsjConfirmacion(
            'Eliminar Orden',
            'Este proceso es irreversible , ¿esta seguro que desea eliminar la Orden?',
            function () {
                eliminarTp(id);
            }
    );
}


/**
 * @method AlumnoEliminar
 * Método que se encarga de eliminar el estudiante de todas la bd
 */
function eliminarTp(id) {

    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Tipo_publicacionesController_Delete.php", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },

        body: JSON.stringify(data),
    })
            .then(function (response) {
                if (response.ok) {
                    return response.json();
                }
                throw response;
            })
            .then(function (data) {

                Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);

                ocultarModalPublicaciones();
                obtenerDatos();
            })
            .catch(function (promise) {
                if (promise.json) {
                    promise.json().then(function (response) {
                        let status = promise.status,
                                mensaje = response ? response.mensaje : "";
                        if (status === 401 && mensaje) {
                            Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
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
            .finally(function () {
                Utilitario.quitarMascara();
            });

}



//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Select">
function cargarSelectInspector() {

    fetch("../../back/controller/InspectorController_listAll.php", {
        method: "GET",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",

        },
    })
            .then(function (response) {
                if (response.ok) {
                    return response.json();
                }
                throw response;
            })
            .then(function (data) {
                construirSelectInspector(data.inspector);
            })
            .catch(function (promise) {
                if (promise.json) {
                    promise.json().then(function (response) {
                        let status = promise.status,
                                mensaje = response ? response.mensaje : "";
                        if (status === 401 && mensaje) {
                            Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
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
            });
}

/**
 * @method construirSelectNacionalidad
 * construye y agrega los tipos al contenedor
 */
function construirSelectInspector(inspectores) {
    $("#inspector").empty();
    let input = $("#inspector");
    for (let index = 0; index < inspectores.length; index++) {
        let inspector = inspectores[index],
                opcion = new Option(inspector.nombre, inspector.id);
        $(opcion).html(inspector.nombre);
        input.append(opcion);
    }


}

//</editor-fold>
