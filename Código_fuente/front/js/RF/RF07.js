$(document).ready(function () {
    iniciarTabla();
    obtenerDatos();
    ocultarModalPublicaciones();
    $("#btnUserAct").hide();
    cargar_solicitudes();
});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */

function iniciarTabla() {
    $("#listadoTablaFO_IN_07_RF").DataTable({
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
                data: "id",
                className: "text-center",
                orderable: true,
            },
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
            },
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
    fetch("../../back/controller/Solicitud_horas_tutorController_List_RF.php", {
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
    let tabla = $("#listadoTablaFO_IN_07_RF").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitudes).draw();
}

function obtenerDatosCombo() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF07').val()
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Solicitud_horas_tutorController_List_RF.php", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",

            Plataform: "web",
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
                listadoSolicitudesCombo(data.solicitud);
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
//----------------------------------HELPERS----------------------------------

/**
 * @method listadoEspecialUsuarios
 * Método que se encarga de listar los usuarios a la tabla.
 *
 * @param {Object} usuarios Arreglo con los datos de los usuarios.
 */
function listadoSolicitudesCombo(solicitud) {
    let tabla = $("#tablaComboSeleccionado").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitud).draw();
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




//<editor-fold defaultstate="collapsed" desc="Select Grupos de Investigacion">

function cargar_DatosInfos() {
    obtenerDatosCombo();
}

function cargar_solicitudes() {

    fetch("../../back/controller/Solicitud_horas_tutorController_List_RF.php", {
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
                construirSelectProyectos(data.solicitudes);
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
    $("#combo_solicitudesRF07").empty();
    let input = $("#combo_solicitudesRF07");
    let opcion = new Option("Seleccione la solicitud", "-1");
    $(opcion).html("Seleccione una solicitud");
    input.append(opcion);
    for (let index = 0; index < pro.length; index++) {
        let gpI = pro[index],
                opcion = new Option(gpI.nombre_convenio, gpI.id);
        if (gpI.vb_representante_facultad === "En trámite" || gpI.vb_representante_facultad === "En tramite") {
            $(opcion).html(gpI.nombre_docente + " - "+ gpI.nombre_convenio);
            input.append(opcion);
        }
    }
}

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




function aprobarSolicitudHoras_RF07() {

    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF07').val()
    };
    console.log("envio del la data ", ordenes);
    Utilitario.agregarMascara();
    fetch("../../back/controller/Solicitud_horas_tutorController_Update_RF.php", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Plataform: "web",
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
                $('#id_hidden_solicitud').val(data.id);
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

function rechazarSolicitudHoras_RF07() {

    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF07').val()
    };
    console.log("envio del la data ", ordenes);
    Utilitario.agregarMascara();
    fetch("../../back/controller/Solicitud_horas_tutorController_Update_RF2.php", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Plataform: "web",
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
                $('#id_hidden_solicitud').val(data.id);
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

