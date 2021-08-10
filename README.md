# Título del proyecto: 
### Aplicativo web para la sistematización del plan de acción e informe de gestión de unidades investigativas UFPS.
### Modulo de Proyectos.
***
## Índice
1. [Características](#características)
3. [Tecnologías](#tecnologías)
4. [IDE](#ide)
5. [Instalación](#instalación)
6. [Demo](#Demo)
6. [Autor(es)](#autores)
7. [Institución Académica](#institución-académica)
***
### Características:

  - Registro y revisión de FO-IN-06
  - Registro y revisión de FO-IN-07
  - Registro y revisión de FO-IN-09
  - Registro y revisión de FO-IN-10
  - Registro y revisión de FO-IN-12
  - Registro y revisión de FO-IN-15
  - Registro y revisión de FO-IN-16

***
### Tecnologías
  
  ##### BackEnd
  - PHP
  ##### FrontEnd
  - HTML5
  - CSS3
  - JavaScript
  - Bootstrap
  - jQuery
  - DataTable JS
  
  ***
### IDE

- El proyecto se desarrolla usando [NetBeans](https://www.oracle.com/technetwork/java/javase/downloads/jdk-netbeans-jsp-3413139-esa.html)

***
### Instalación

- Xampp -> [descargar](https://www.apachefriends.org/es/download.html).
- Base de Datos -> [.sql](https://github.com/EdwardMarti/sistema_semillero/blob/665fd29c023ca358e2ff4072b662f49ee64a7219/semillero.sql

1 Instalación de LAMP 
Actualizando Debian Linux, ejecute:
sudo -- sh -c 'apt update && apt upgrade'
Instale Apache, ejecute:
sudo apt install apache2
Actualice el Firewall y abra los puertos 80 y 443, ejecute:
sudo ufw allow in "WWW Full"
Configurar MariaDB:
sudo apt install mariadb-server
Asegure su servidor MariaDB, escriba:
sudo mysql_secure_installation
Instalación de PHP 7.3:
sudo apt install php libapache2-mod-php php-gd php-mysql
Pruebe su configuración de LÁMPP

2. Instalación del servidor web Apache
Servidor HTTP Apache, también conocido como "Apache". Es un servidor web famoso por promover el crecimiento de la World Wide Web. Por lo tanto, instalaremos Apache en Debian 10, ejecute:
sudo apt install apache2
+ Cómo iniciar, detener, reiniciar y obtener el estado del servidor Apache
La sintaxis es la siguiente para el comando systemctl:
sudo systemctl start apache2.service ## <-- Start the server ##
sudo systemctl restart apache2.service ## <-- Restart the server ##
sudo systemctl stop apache2.service ## <-- Stop the server ##
sudo systemctl reload apache2.service ## <-- Reload the server config ##
sudo systemctl status apache2.service ## <-- Get the server status ##

3. Actualice el cortafuegos y abra los puertos 80 y 443.
Es importante que abra el puerto TCP 80 (www) y 443 (https) para que funcione LAMP en Debian 10. Escriba los siguientes comandos: Ejemplos de salidas:
sudo ufw allow www
sudo ufw allow https
sudo ufw status

4. Cómo instalar MariaDB en Debian 10
Ahora tiene un servidor web en funcionamiento. Es hora de instalar MariaDB, que es un reemplazo directo del servidor MySQL. Escriba el siguiente comando apt :
sudo apt install mariadb-server
Ejecute el script mysql_secure_installation:
sudo mysql_secure_installation

5 importar Base de Datos
mysql -u usuario -p nombre_basededatos < data.sql

6 copiar  la carpeta del proyecto en la carpeta publica

7 ingresar al sistema con el usuario y claves por defecto


****************

Credenciales Iniciales del Sistema 
admin@admin.ufps.edu.co
Ufps2021

****************

El proyecto para su mantenimento esta dockerizado 
1 para inicializar el servicio de lando
lando init 
p2 ara ejecutar el proyecto
lando start

https://docs.lando.dev/basics/installation.html

https://www.cyberciti.biz/faq/how-to-install-lamp-on-debian-10-buster/


```sh
- Descargar proyecto
- Desplegar el archivo para la creacion de la BD 
- Desplegar el proyecto en un Navegador Web
```
### Demo

- La aplicación se encuentra alojada en el siguiente vínculo : https://nortcoding-demos.tk/proyecto/front/view/login.html

```sh
- Usuario Docente: shirleyn@ufps.edu.co :: Clave: poncho
- Usuario Joven Investigador: alejandra@ufps.edu.co :: Clave: william
- Usuario Director Departamento: salvador@ufps.edu.co :: Clave: huertasplata
- Usuario Representante Facultad: jpilar@ufps.edu.co :: Clave: ingsistemas
```

***


***
### Autor(es)

Proyecto desarrollado por:

- [Juan Manuel Salvador Huertas Plata] (<juanmanuelsalvadorhp@ufps.edu.co>).
- [Jessica Alejandra Barragan Jaimes] (<jessicaalejandrabj@ufps.edu.co>).


***
### Institución Académica   
Proyecto desarrollado para el Curso de Profundización de Software [Programa de Ingeniería de Sistemas] de la [Universidad Francisco de Paula Santander]

   [Juan Manuel Salvador Huertas Plata]: <https://www.linkedin.com/in/juan-manuel-salvador-huertas-plata-276ab11a1/>
   [Jessica Alejandra Barragan Jaimes]: <https://www.linkedin.com/in/alejandra-barragan-jaimes-a7b373165/>
   [Programa de Ingeniería de Sistemas]:<https://ingsistemas.cloud.ufps.edu.co/>
   [Universidad Francisco de Paula Santander]:<https://ww2.ufps.edu.co/>
   
# GestionProyectos
