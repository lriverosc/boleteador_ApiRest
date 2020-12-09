# API REST PHP O.O.
## Objetivo
Desarrollar una Interfaz de Programación de Aplicaciones, con la finalidad de unificar los trabajos de Desarrollo de Aplicaciones Móviles y de Desarrollo Web, permitiendo la integración de datos a una única base de datos. Esta API, sera creada bajo Modelo Vista Controlador (MVC), con PHP Orientado a Objetos

## Software a utilizar
- Editor de código compatible con PHP (VSCode, PHPStorm, Sublime Text, Atom, Block de notas o el que elija).
- Servidor web local para producción (XAMPP, WAMPP, APPSERV, o el de su preferencia que incluya motor de base datos MySQL/MariaDB)
  
## Endpoints a generar
- /boleta            [GET / POST / PUT / PATCH]
- /boleta/:id        [GET]
- /dispositivo       [GET / POST / PUT / PATCH]
- /dispositivo/:id   [GET]
- /usuario           [GET / POST / PUT / PATCH]
- /usuario           [GET]
- /ingreso           [POST]

### /boleta
GET   : Lista todas las boletas existentes
POST  : Registra una nueva boleta
PUT   : Cambia todos los valores del registro
PATCH : Cambia el valor de un elemento del registro

### /boleta/:id
GET   : Muestra solo la información del :id solicitado

### /dispositivo
GET   : Lista todos los dispositivos existentes
POST  : Registra una nuevo dispositivo
PUT   : Cambia todos los valores del registro
PATCH : Cambia el valor de un elemento del registro

### /dispositivo/:id
GET   : Muestra solo la información del :id solicitado

### /usuario
GET   : Lista todos los usuarios existentes
POST  : Registra una nuevo usuario
PUT   : Cambia todos los valores del registro
PATCH : Cambia el valor de un elemento del registro

### /usuario/:id
GET   : Muestra solo la información del :id solicitado

### /ingreso
POST  : Valida si la credencial existe en su par usuario/clave

## Links de utilidad
- https://json.org/example.html
- https://jsonapi.org/format/1.1/
