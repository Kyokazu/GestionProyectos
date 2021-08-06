$(document).ready(function () {
    cargar_solicitudes();
    iniciarTabla();
    obtenerDatosTabla();
    //  obtenerDatos();
    ocultarModalPublicaciones();
    $("#btnUserAct").hide();

});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */

function iniciarTabla() {

    $("#listadoTablaFO_IN_16_DD").DataTable({
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
                data: "nombre_tutor",
                className: "text-center",
                orderable: true,
            },
            {
                data: "nombre_joven",
                className: "text-center",
                orderable: true,
            },
            {
                data: "convenio_colciencias",
                className: "text-center",
                orderable: true,
            },
            {
                data: "vb_director_grupo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "vb_director_departamento",
                className: "text-center",
                orderable: true,
            },
            {
                data: "vb_representante_facultad",
                className: "text-center",
                orderable: true,
            },
            {
                data: "fecha_solicitud",
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

    $("#tablaDatosProyecto16DD").DataTable({
        responsive: true,
        ordering: true,
        paging: false,
        searching: false,
        info: false,
        lengthChange: false,
        language: {
            emptyTable: "Sin datos",
        },
        columns: [
            {
                data: "id",
                className: "text-center",
                orderable: true,
            },
            {
                data: "facultad",
                className: "text-center",
                orderable: true,
            },
            {
                data: "grupo_investigacion",
                className: "text-center",
                orderable: true,
            },
            {
                data: "departamento",
                className: "text-center",
                orderable: true,
            },
            {
                data: "linea_investigacion",
                className: "text-center",
                orderable: true,
            },
            {
                data: "convenio_colciencias",
                className: "text-center",
                orderable: true,
            },
            {
                data: "numero_convocatoria",
                className: "text-center",
                orderable: true,
            },
            {
                data: "fecha_solicitud",
                className: "text-center",
                orderable: true,
            },
        ],
    });

    $("#tablaDatosInvolucrados16DD").DataTable({
        responsive: true,
        ordering: true,
        paging: false,
        searching: false,
        info: false,
        lengthChange: false,
        language: {
            emptyTable: "Sin datos",
        },
        columns: [
            {
                data: "nombre_tutor",
                className: "text-center",
                orderable: true,
            },
            {
                data: "nombre_joven",
                className: "text-center",
                orderable: true,
            },
            {
                data: "periodo_tutoria",
                className: "text-center",
                orderable: true,
            },
            {
                data: "vb_director_grupo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "vb_director_departamento",
                className: "text-center",
                orderable: true,
            },
            {
                data: "vb_representante_facultad",
                className: "text-center",
                orderable: true,
            },
        ],
    });
}

//----------------------------------CRUD----------------------------------


function obtenerDatosTabla() {
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informe_gestion_jovenesController_ListTablaDD.php", {
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
                //    construirSelectProyectos(data.solicitudes);
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

function listadoSolicitudes(solicitudes) {
    let tabla = $("#listadoTablaFO_IN_16_DD").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitudes).draw();
}

function obtenerDatosCombo() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesDD16').val()
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Concepto_cumplimientoController_Select.php", {
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

function listadoSolicitudesCombo(solicitud) {
    let tabla = $("#tablaComboSeleccionado").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitud).draw();
}


function obtenerDatosComboTabla1() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesDD16').val()
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informe_gestion_jovenesController_ListTabla1.php", {
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
                listadoSolicitudesComboTabla1(data.solicitudes);
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

function listadoSolicitudesComboTabla1(solicitud) {
    let tabla = $("#tablaDatosProyecto16DD").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitud).draw();
}


function obtenerDatosComboTabla2() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesDD16').val()
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informe_gestion_jovenesController_ListTabla2.php", {
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
                listadoSolicitudesComboTabla2(data.solicitudes);
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

function listadoSolicitudesComboTabla2(solicitud) {
    let tabla = $("#tablaDatosInvolucrados16DD").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitud).draw();
}



function gestionarItem(data) {


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



function mostrarModalPublicaciones() {
    $('#groupCorreo').show();
    limpiarcampos();
    $("#btnUserAct").hide();
    $("#btnUserReg").show();
    $("#modalPublicaciones").show();
    $("#tablaPublicaciones").hide();
}


function ocultarModalPublicaciones() {

    $("#modalPublicaciones").hide();
    $("#tablaPublicaciones").show();
}





function cargar_DatosInfos() {
    obtenerDatosComboTabla1();
    obtenerDatosComboTabla2();
}

function cargar_solicitudes() {

    fetch("../../back/controller/Informe_gestion_jovenesController_ListTablaDD.php", {
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
    $("#combo_solicitudesDD16").empty();
    let input = $("#combo_solicitudesDD16");
    let opcion = new Option("Seleccione la solicitud", "-1");
    $(opcion).html("Seleccione una solicitud");
    input.append(opcion);
    for (let index = 0; index < pro.length; index++) {
        let gpI = pro[index],
                opcion = new Option(gpI.convenio_colciencias, gpI.id);
        if (gpI.vb_director_departamento === "En trámite") {
            $(opcion).html(gpI.convenio_colciencias + " - " + gpI.nombre_tutor);
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




function aprobarSolicitudHorasTutor_DD() {

    let ordenes = {
        id_solicitud: $('#combo_solicitudesDD16').val()
    };
    console.log("envio del la data ", ordenes);
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informe_gestion_jovenesController_Update.php", {
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

