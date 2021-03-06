/**
 * Clase encargada de ejecutar los servicios y obtener la data necesaria para la vista de Login.
 *
 **/
class LoginController {
    /**
     * @method iniciarSesion
     * Método que se encarga de ejecutar el servicio que inicia la sesión de un usuario.
     *
     * @param {String} correo   Correo electronico del usuario que desea iniciar sesión.
     * @param {String} clave    Clave del usuario que desea iniciar sesión.
     */
    static iniciarSesion2(correo, clave) {
        var login = {
            correo,
            clave,
        };
        Utilitario.agregarMascara();
        fetch("../../back/controller/UsuarioController_Login.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(login),
        })
                .then(function (response) {
                    if (response.ok) {
                        return response.json();
                    }
                    throw response;
                })
                .then(function (data) {
                    let usuario = data.usuario;
                    Utilitario.setLocal("sesionId", usuario[0].token);
                    Utilitario.setLocal("rol", usuario[0].rol);
                    Utilitario.setLocal("id", usuario[0].id);
                    Utilitario.setLocal("nombre", usuario[0].nombre);
                    Utilitario.setLocal("id_semillero", usuario[0].id_semillero);
                    Utilitario.setLocal("semillero", usuario[0].semillero);
                    Utilitario.setLocal("correo", usuario[0].correo);
                    if (correo == "" && clave == "") {
                        alert("Por favor, diligencie todos los campos");
                    } else {
                        if (correo === "shirleyn@ufps.edu.co" && clave == "poncho") {
                            window.location.href = "principal_Docentes.html";
                        }
                        if (correo === "alejandra@ufps.edu.co" && clave == "william") {
                            window.location.href = "principal_Jovenes.html";
                        }
                        if (correo === "salvador@ufps.edu.co" && clave == "huertasplata") {
                            window.location.href = "principal_Director_Departamento.html";
                        }
                        if (correo === "jpilar@ufps.edu.co" && clave == "william") {
                            window.location.href = "principal_Representante_Facultad.html";
                        } else {
                            alert("Usuario o clave incorrectos");
                        }
                    }




//               alert(data);
//               if(data.usuario.correo === "shirleyn@ufps.edu.co"){
//                    window.location.href = "principal_Docentes.html";
//                }
//                if(data.usuario.correo === "alejandra@ufps.edu.co"){
//                    window.location.href = "principal_Jovenes.html";
//                }
//                if(data.usuario.correo === "salvador@ufps.edu.co"){
//                    window.location.href = "principal_Director_Departamento.html";
//                }
//                if(data.usuario.correo === "jpilar@ufps.edu.co"){
//                    window.location.href = "principal_Representante_Facultad.html";
//                }
                })
                .catch(function (promise) {
                    if (promise.json) {
                        promise.json().then(function (response) {
                            var mensaje = response ? response.mensaje : "";
                            if (mensaje) {
                                Mensaje.mostrarMsjWarning("Advertencia", mensaje);
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

    static iniciarSesion(correo, clave) {

        if (correo == "" && clave == "") {
            alert("Por favor, diligencie todos los campos");
        } else {
            if (correo === "shirleyn@ufps.edu.co" && clave == "poncho") {
                window.location.href = "principal_Docentes.html";
            }
            else if (correo === "alejandra@ufps.edu.co" && clave == "william") {
                window.location.href = "principal_Jovenes.html";
            }
            else if (correo === "salvador@ufps.edu.co" && clave == "huertasplata") {
                window.location.href = "principal_Director_Departamento.html";
            }
            else if (correo === "jpilar@ufps.edu.co" && clave == "ingsistemas") {
                window.location.href = "principal_Representante_Facultad.html";
            } else {
                alert("Usuario o clave incorrectos");
            }
        }

    }

    /**
     * @method registrarUsuario
     * Método que se encarga de ejecutar el servicio que registra un usuario.
     *
     * @param {Object} usuario  Objeto con los datos del usuario a registrar.
     */
    static registrarUsuario(usuario) {
        Utilitario.agregarMascara();
        fetch("../../../back/controller/UsuarioController_Insert.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(usuario),
        })
                .then(function (response) {
                    if (response.ok) {
                        return response.json();
                    }
                    throw response;
                })
                .then(function (data) {
                    $("#modalusuario").modal("hide");
                    Mensaje.mostrarMsjExito(
                            "Registro exitoso",
                            "Los datos de usuario fueron registrados exitosamente. Por favor espere a que un usuario administrador lo habilite en la plataforma."
                            );
                })
                .catch(function (promise) {
                    if (promise.json) {
                        promise.json().then(function (response) {
                            var mensaje = response ? response.mensaje : "";
                            if (mensaje) {
                                Mensaje.mostrarMsjWarning("Advertencia", mensaje);
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

    /**
     * @method recuperarClave
     * Método que se encarga de ejecutar el servicio que realiza la solicitud de cambio de contraseña.
     *
     * @param {String} correo   Correo electronico del usuario.
     */
    static recuperarClave(correo) {
        Utilitario.agregarMascara();
        fetch("../../back/controller/UsuarioController_Recover.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify({correo}),
        })
                .then(function (response) {
                    if (response.ok) {
                        return response.json();
                    }
                    throw response;
                })
                .then(function (data) {
                    $("#modalrecover").modal("hide");
                    Mensaje.mostrarMsjExito(
                            "Mensaje enviado",
                            "Se ha enviado un mensaje al correo diligenciado. Por favor reviselo y siga los pasos mencionados en en el mensaje."
                            );
                })
                .catch(function (promise) {
                    if (promise.json) {
                        promise.json().then(function (response) {
                            var mensaje = response ? response.mensaje : "";
                            if (mensaje) {
                                Mensaje.mostrarMsjWarning("Advertencia", mensaje);
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

    /**
     * @method cambiarClave
     * Método que se encarga de cambiar la clave del usuario.
     *
     * @param {String} token  Token enviado atraves de url.
     * @param {String} clave  Clave diligenciada por el usuario.
     */
    static cambiarClave(token, clave) {
        Utilitario.agregarMascara();
        fetch("../../back/controller/UsuarioController_NewPassword.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify({token, clave}),
        })
                .then(function (response) {
                    if (response.ok) {
                        return response.json();
                    }
                    throw response;
                })
                .then(function () {
                    Mensaje.mostrarMsjExito(
                            "Cambio exitoso",
                            "Clave cambiada exitosamente.",
                            function () {
                                window.location.href = "login.html";
                            }
                    );
                })
                .catch(function (promise) {
                    if (promise.json) {
                        promise.json().then(function (response) {
                            var mensaje = response ? response.mensaje : "";
                            if (mensaje) {
                                Mensaje.mostrarMsjWarning("Advertencia", mensaje);
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

    /**
     * @method irPortal
     * Método que se encarga de redireccionar al portal
     */
    static irPortal() {
        window.location.href = "../portal/";
    }

    /**
     * @method mensajeRoles
     * Método que se encarga de mostrar los roles del usuario en la pantalla
     */
    static mensajeRoles() {
        if (Utilitario.getLocal("esSuperAdmin") === "Y") {
            $("#superAdmLog").text("- Administrador");
            let br = document.createElement("br");
            var foo = document.getElementById("superAdmLogin");
            foo.appendChild(br);
        } else {
            $("#superAdmLog").remove();
            $("#superAdmLogin").remove();
        }
//---------------------------------------------------
        if (Utilitario.getLocal("esJuradoLogin") === "1") {
            $("#juradoLog").text("- Jurado");
        } else {
            $("#juradoLog").remove();
        }
//---------------------------------------------------
        if (Utilitario.getLocal("esCoordinadorLogin") === "1") {
            $("#coordinadorLog").text("- Coordinador");
            let br = document.createElement("br");
            var foo = document.getElementById("coordinadorLogin");
            foo.appendChild(br);
        } else {
            $("#coordinadorLog").remove();
            $("#coordinadorLogin").remove();
        }
    }

}