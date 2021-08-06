$(document).ready(function () {
    ocultarModalPublicaciones();
    iniciarTabla();
    $("#btnUserAct").hide();
    obtenerDatos();

});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */


function iniciarTabla() {


    $("#listadoTablaFO_IN_07").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "Sin solicitudes registradas",
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
                data: "nombre_docente",
                className: "text-center",
                orderable: true,
            },
            {
                data: "nombre_convenio",
                className: "text-center",
                orderable: true,
            },
            {
                data: "fecha_solicitud",
                className: "text-center",
                orderable: true,
            },
            {
                data: "vb_director_grupo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "vb_representante_facultad",
                className: "text-center",
                orderable: true,
            }
        ],
        rowCallback: function (row, data, index) {
            var id_order = data.id

//            alert(data.descripcion);
            $(".actualizar", row).click(function () {
                gestionarItem(data);
            });
            $(".eliminar", row).click(function () {
                DeleteOrder(id_order, index);
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


function obtenerDatos() {
    Utilitario.agregarMascara();
    fetch("../../back/controller/Solicitud_horas_tutorController_List.php", {
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
                listadoSolicitudes(data.solicitudes);
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
function listadoSolicitudes(solicitudes) {
    let tabla = $("#listadoTablaFO_IN_07").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitudes).draw();
}

/**
 * @method gestionarItem
 * Método que se encarga de abrir el modal con la info de la fila seleccinada
 *
 * @param {Object} btn id de la fila que se desea visualizar.
 */
function gestionarItem(data) {

    /* se quita la parte del correo del usuario porque no se puede editar*/

    $('#id').val(data.id);
    $('#descripcion').val(data.descripcion);


    /* botones y modal */
    $("#btnUserAct").show();
    $("#btnUserReg").hide();
    $("#modalPublicaciones").show();
    $("#tablaPublicaciones").hide();
    /* check de las validaciones de la info cargada */
//    validarNombre();
//    validarTelefono();
//    validarRol();
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

/** bloquearCamposDatos() {
 
 $('#txt_Numero_Contrato').;
 $('#combo_proyectos');
 $('#txt_Grupo_investigación');
 $('#txt_Lineas_Investigacion');
 $('#txt_Facultad');
 $('#txt_fecha_ultimo_informe');
 $('#txt_Fecha_inicio');
 $('#txt_Fecha_Fin');
 }
 */

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



function registrar_FO_IN_07() {


    let ordenes = {
        nombre_docente: $('#txt_Nombre_Docente').val(),
        nombre_convenio: $('#txt_Nombre_Convenio').val(),
        grupo_investigacion: $('#txt_Grupo_Investigacion_Pertenece').val(),
        nombre_propuesta: $('#txt_Nombre_Propuesta').val(),
        numero_acta: $('#txt_Numero_Acta').val(),
        fecha_inicio_actividades: $('#txt_Fecha_inicio_Actividades').val(),
        condicion_investigador: $('#combo_condicion').val(),
        horas_solicitadas: $('#txt_Horas_Solicitadas').val(),
        semestre_academico: $('#combo_semestre').val(),
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Solicitud_horas_tutorController_Insert.php", {
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
                Mensaje.mostrarMsjExito("Datos confirmados", data.mensaje);
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


//<editor-fold defaultstate="collapsed" desc="Select Grupos de Investigacion">

function cargar_Solicitudes() {

    fetch("../../../back/controller/Concepto_cumplimientoController_List.php", {
        method: "GET",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Plataform: "web",
        },
    })
            .then(function (response) {
                if (response.ok) {
                    return response.json();
                }
                throw response;
            })
            .then(function (data) {
                construirSelectProyectos(data.pro);
            })
            .catch(function (promise) {
                if (promise.json) {
                    promise.json().then(function (response) {
                        let status = promise.status,
                                mensaje = response ? response.mensaje : "";
                        if (status === 401 && mensaje) {
                            Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
                                Utilitario2.cerrarSesion();
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

function construirSelectProyectos(pro) {
    $("#combo_proyectos").empty();
    let input = $("#combo_proyectos");
    let opcion = new Option("Seleccione el proyecto", "-1");
    $(opcion).html("Seleccione el proyecto");
    input.append(opcion);
    for (let index = 0; index < pro.length; index++) {
        let gpI = pro[index],
                opcion = new Option(gpI.titulo, gpI.id);
        $(opcion).html(gpI.titulo);
        input.append(opcion);
    }
}

//</editor-fold>


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

