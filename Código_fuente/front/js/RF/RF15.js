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

    $("#listadoTablaFO_IN_15_RF").DataTable({
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
                data: "nombre_proyecto",
                className: "text-center",
                orderable: true,
            },
            {
                data: "grupo_investigacion",
                className: "text-center",
                orderable: true,
            },
            {
                data: "facultad",
                className: "text-center",
                orderable: true,
            },
            {
                data: "estado_solicitud",
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
    $("#tablaDatosProyecto15RF").DataTable({
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
                data: "nombre_proyecto",
                className: "text-center",
                orderable: true,
            },
            {
                data: "grupo_investigacion",
                className: "text-center",
                orderable: true,
            },
            {
                data: "duracion_proyecto",
                className: "text-center",
                orderable: true,
            }, {
                data: "fecha_solicitud",
                className: "text-center",
                orderable: true,
            },
        ],
    });

    $("#tablaContratoProyecto15RF").DataTable({
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
                data: "numero_contrato",
                className: "text-center",
                orderable: true,
            },
            {
                data: "acta_comite",
                className: "text-center",
                orderable: true,
            },

            {
                data: "fecha_inicio",
                className: "text-center",
                orderable: true,
            },
            {
                data: "fecha_fin",
                className: "text-center",
                orderable: true,
            },
            {
                data: "fecha_suspension",
                className: "text-center",
                orderable: true,
            },
            {
                data: "fecha_reinicio",
                className: "text-center",
                orderable: true,
            },
            {
                data: "prorroga",
                className: "text-center",
                orderable: true,
            },
            {
                data: "tiempo_ejecucion",
                className: "text-center",
                orderable: true,
            },
            {
                data: "valor_financiado",
                className: "text-center",
                orderable: true,
            },
        ],
    });

    $("#tablaDatosInvolucrados15RF").DataTable({
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
                data: "nombre_investigador",
                className: "text-center",
                orderable: true,
            },
            {
                data: "tipo_investigador",
                className: "text-center",
                orderable: true,
            },
            {
                data: "horas_semana",
                className: "text-center",
                orderable: true,
            },
        ],
    });

    $("#tablaObjetivosProyecto15RF").DataTable({
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
                data: "objetivos_propuestos",
                className: "text-center",
                orderable: true,
            },
            {
                data: "actividades_propuestas",
                className: "text-center",
                orderable: true,
            },
            {
                data: "actividades_desarrolladas",
                className: "text-center",
                orderable: true,
            },
            {
                data: "logros_alcanzados",
                className: "text-center",
                orderable: true,
            },
            {
                data: "porcentaje_cumplimiento",
                className: "text-center",
                orderable: true,
            },
        ],
    });

    $("#tablaCompromisosProyecto15RF").DataTable({
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
                data: "numero",
                className: "text-center",
                orderable: true,
            },
            {
                data: "estado",
                className: "text-center",
                orderable: true,
            },
            {
                data: "cantidad",
                className: "text-center",
                orderable: true,
            },
        ],
    });
    $("#tablaEquiposProyecto15RF").DataTable({
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
                data: "equipo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "proyecto",
                className: "text-center",
                orderable: true,
            },
            {
                data: "otro_proyecto",
                className: "text-center",
                orderable: true,
            },
            {
                data: "uso_posterior",
                className: "text-center",
                orderable: true,
            },
        ],
    });

    $("#tablaCronogramaProyecto15RF").DataTable({
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
                data: "objetivo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "actividades",
                className: "text-center",
                orderable: true,
            },
            {
                data: "semestre",
                className: "text-center",
                orderable: true,
            },
            {
                data: "estado",
                className: "text-center",
                orderable: true,
            },
        ],
    });
    $("#tablaImpactosProyecto15RF").DataTable({
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
                data: "numero",
                className: "text-center",
                orderable: true,
            },
            {
                data: "impacto",
                className: "text-center",
                orderable: true,
            },
        ],
    });

}

//----------------------------------CRUD----------------------------------


function obtenerDatosTabla() {
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informes_gestion_financiadoController_ListTablaRF.php", {
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
    let tabla = $("#listadoTablaFO_IN_15_RF").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitudes).draw();
}



function obtenerDatosComboTabla1() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF15').val()
    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/Informes_gestion_financiadoController_ListTabla1.php", {
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
    let tabla = $("#tablaDatosProyecto15RF").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitud).draw();
}


function obtenerDatosComboTabla2() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF15').val()
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informes_gestion_financiadoController_ListTabla2.php", {
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
    let tabla = $("#tablaContratoProyecto15RF").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitud).draw();
}

function obtenerDatosComboTabla3() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF15').val()
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informes_gestion_financiadoController_ListTabla3.php", {
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
                listadoSolicitudesComboTabla3(data.solicitudes);
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

function listadoSolicitudesComboTabla3(solicitud) {
    let tabla = $("#tablaDatosInvolucrados15RF").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitud).draw();
}

function obtenerDatosComboTabla4() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF15').val()
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informes_gestion_financiadoController_ListTabla4.php", {
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
                listadoSolicitudesComboTabla4(data.solicitudes);
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

function listadoSolicitudesComboTabla4(solicitud) {
    let tabla = $("#tablaObjetivosProyecto15RF").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitud).draw();
}

function obtenerDatosComboTabla5() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF15').val()
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informes_gestion_financiadoController_ListTabla5.php", {
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
                listadoSolicitudesComboTabla5(data.solicitudes);
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

function listadoSolicitudesComboTabla5(solicitud) {
    let tabla = $("#tablaCompromisosProyecto15RF").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitud).draw();
}


function obtenerDatosComboTabla6() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF15').val()
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informes_gestion_financiadoController_ListTabla6.php", {
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
                listadoSolicitudesComboTabla6(data.solicitudes);
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

function listadoSolicitudesComboTabla6(solicitud) {
    let tabla = $("#tablaEquiposProyecto15RF").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitud).draw();
}

function obtenerDatosComboTabla7() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF15').val()
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informes_gestion_financiadoController_ListTabla7.php", {
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
                listadoSolicitudesComboTabla7(data.solicitudes);
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

function listadoSolicitudesComboTabla7(solicitud) {
    let tabla = $("#tablaCronogramaProyecto15RF").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitud).draw();
}

function obtenerDatosComboTabla8() {
    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF15').val()
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informes_gestion_financiadoController_ListTabla8.php", {
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
                listadoSolicitudesComboTabla8(data.solicitudes);
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

function listadoSolicitudesComboTabla8(solicitud) {
    let tabla = $("#tablaImpactosProyecto15RF").DataTable();
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
    obtenerDatosComboTabla3();
    obtenerDatosComboTabla4();
    obtenerDatosComboTabla5();
    obtenerDatosComboTabla6();
    obtenerDatosComboTabla7();
    obtenerDatosComboTabla8();
}

function cargar_solicitudes() {

    fetch("../../back/controller/Informes_gestion_financiadoController_ListTablaRF.php", {
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
    $("#combo_solicitudesRF15").empty();
    let input = $("#combo_solicitudesRF15");
    let opcion = new Option("Seleccione la solicitud", "-1");
    $(opcion).html("Seleccione una solicitud");
    input.append(opcion);
    for (let index = 0; index < pro.length; index++) {
        let gpI = pro[index],
                opcion = new Option(gpI.nombre_proyecto, gpI.id);
        if (gpI.estado_solicitud === "En trámite") {
            $(opcion).html(gpI.nombre_proyecto);
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




function aprobarInformeGestionF_RF() {

    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF15').val()
    };

    console.log("envio del la data ", ordenes);
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informes_gestion_financiadoController_Update.php", {
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

function rechazarInformeGestionF_RF() {

    let ordenes = {
        id_solicitud: $('#combo_solicitudesRF15').val()
    };

    console.log("envio del la data ", ordenes);
    Utilitario.agregarMascara();
    fetch("../../back/controller/Informes_gestion_financiadoController_Update2.php", {
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