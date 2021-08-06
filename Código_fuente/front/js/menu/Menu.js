/* global Utilitario, fetch */

/**
 * Clase encargada de realizar las interacciones necesarias con la vista de Menu.
 *
 **/
class Menu {

    /**
     * @method listadoUsuarios
     * Metodo que se encarga de mostrar los usuarios registrados
     */
    static listadoUsuarios() {
        const {...usuario} = Utilitario.getLocal("user") ? JSON.parse(Utilitario.getLocal("user")) : {};
        Utilitario.agregarMascara();
        fetch("listadoUsuarios.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    (usuario.rol === 3 || usuario.rol === 2) ?
                            window.location.href = "principal.html" : $("#mostrarcontenido").html(vista);
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    /**
     * @method listadoOrdenes
     * Metodo que se encarga de mostrar las ordenes registradas
     */
    static listadoOrdenes() {
        console.log('ordenes');
        const {...usuario} = Utilitario.getLocal("user") ? JSON.parse(Utilitario.getLocal("user")) : {};
        Utilitario.agregarMascara();
        fetch("listadoOrdenes.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }

    static listadoTipo_Jovenes() {

        Utilitario.agregarMascara();
        fetch("listadoTipo_Jovenes.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static listadoTipo_Publicaciones() {

        Utilitario.agregarMascara();
        fetch("listadoTipo_Publicaciones.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static listadoTipo_Publicaciones_1() {

        Utilitario.agregarMascara();
        fetch("listadoTipo_Publicaciones_1.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_06() {

        Utilitario.agregarMascara();
        fetch("FO_IN_06.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_06_1() {

        Utilitario.agregarMascara();
        cargar_proyectos();
        fetch("FO_IN_06_1.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }

    static FO_IN_09_10() {

        Utilitario.agregarMascara();
        fetch("FO_IN_09_10.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_09_10_DD() {

        Utilitario.agregarMascara();
        fetch("FO_IN_09_10_DD.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_09_10_1_DD() {

        Utilitario.agregarMascara();
        fetch("FO_IN_09_10_1_DD.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_09_10_RF() {

        Utilitario.agregarMascara();
        fetch("FO_IN_09_10_RF.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_09_10_1_RF() {

        Utilitario.agregarMascara();
        fetch("FO_IN_09_10_1_RF.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_09_102() {

        Utilitario.agregarMascara();
        fetch("FO_IN_09_102.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_15() {

        Utilitario.agregarMascara();
        fetch("FO_IN_15.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_15_1() {

        Utilitario.agregarMascara();
        fetch("FO_IN_15_1.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_16() {

        Utilitario.agregarMascara();
        fetch("FO_IN_16.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_16_1() {

        Utilitario.agregarMascara();
        fetch("FO_IN_16_1.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_16_DD() {

        Utilitario.agregarMascara();
        fetch("FO_IN_16_DD.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_16_1_DD() {

        Utilitario.agregarMascara();
        fetch("FO_IN_16_1_DD.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_16_RF() {

        Utilitario.agregarMascara();
        fetch("FO_IN_16_RF.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_16_1_RF() {

        Utilitario.agregarMascara();
        fetch("FO_IN_16_1_RF.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_15_RF() {

        Utilitario.agregarMascara();
        fetch("FO_IN_15_RF.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_15_1_RF() {

        Utilitario.agregarMascara();
        fetch("FO_IN_15_1_RF.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_06_1_RF() {

        Utilitario.agregarMascara();
        fetch("FO_IN_06_1_RF.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_06_RF() {

        Utilitario.agregarMascara();
        fetch("FO_IN_06_RF.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }

    static FO_IN_07_1_RF() {

        Utilitario.agregarMascara();
        fetch("FO_IN_07_1_RF.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_07_RF() {

        Utilitario.agregarMascara();
        fetch("FO_IN_07_RF.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_12() {

        Utilitario.agregarMascara();
        fetch("FO_IN_12.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_12_DD() {

        Utilitario.agregarMascara();
        fetch("FO_IN_12_DD.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_12_1() {

        Utilitario.agregarMascara();
        fetch("FO_IN_12_1.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_07() {

        Utilitario.agregarMascara();
        fetch("FO_IN_07.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }

    static FO_IN_06_Lista() {

        Utilitario.agregarMascara();
        fetch("FO_IN_06_Lista.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    static FO_IN_06_detalles() {

        Utilitario.agregarMascara();
        fetch("FO_IN_06_1_detalles.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                    /*(usuario.rol == = 1 || usuario.rol === 2) ?
                     window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }

    static iniciarSesion2() {
        let ordenes = {
            correo: $('#correo').val(),
        };
        Utilitario.agregarMascara();
        fetch("../../back/controller/PersonaController_Consultar.php", {
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
                    if (data.id === "4") {
                        window.location.replace("view/principal_Docentes.html");
                    }
                    if (data.id === "5") {
                        window.location.replace("view/principal_Jovenes.html");
                    }
                    if (data.id === "6") {
                        window.location.replace("view/principal_Director_Departamento.html");
                    }
                    if (data.id === "7") {
                        window.location.replace("view/principal_Representante_Facultad.html");
                    }
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
        Utilitario.setLocal(
                "user",
                JSON.stringify({
                    emailUser: "danielcaballero796@gmail.com",
                    photoURL: "S6G9uniUYwVU9lNoqvppqmTQFL42",
                    displayName: "Daniel Caballero",
                    emailVerified: true,
                    isLogin: true,
                    uid: "S6G9uniUYwVU9lNoqvppqmTQFL42",
                    estado: 1,
                    rol: 1,
                })
                )
    }

    //<editor-fold defaultstate="collapsed" desc="Actas">

    //<editor-fold defaultstate="collapsed" desc="Actas">
    /**
     * 
     * @return {undefined}
     */
    static mostrarRangos() {

        Utilitario.agregarMascara();
        fetch("listadoRangos.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    //</editor-fold>

    //<editor-fold defaultstate="collapsed" desc="Actas Danadas">
    static mostrarDanadas() {

        Utilitario.agregarMascara();
        fetch("listadoDanadas.html", {
            method: "GET",
        })
                .then(function (response) {
                    return response.text();
                })
                .then(function (vista) {
                    $("#mostrarcontenido").html(vista);
                })
                .finally(function () {
                    Utilitario.quitarMascara();
                });
    }
    //</editor-fold>


}