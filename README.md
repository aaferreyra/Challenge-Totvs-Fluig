# Bienvenido al Repositorio de Resolución de Challenge para Totvs
¡Hola! Gracias por visitar el repositorio donde resolví el challenge propuesto por Totvs. Aquí encontrarás la solución a los desafíos planteados y las instrucciones para ejecutar la aplicación web. 

## Instrucciones de uso:
1. Clonar el repositorio.
2. Instalar Composer: https://getcomposer.org/download/
3. Iniciar un servidor web con el comando php spark serve --port 8012
4. Acceder a la aplicación en el navegador: localhost:8012 

## Funcionalidades:

### Formulario de Alta de Álbumes:
Autocompleta la fecha de carga.
Permite seleccionar un usuario de la API Simpsons.
Recopila nombre del álbum, artista, color y estado.
Envía la información a un endpoint para su almacenamiento.
Muestra un mensaje de éxito o error.

### Formulario de Playlists:
Permite seleccionar un usuario de la API Simpsons.
Muestra una lista de álbumes aprobados para el usuario seleccionado.
Cada álbum se presenta como una tarjeta con color, nombre y artista.

## Archivos y estructura del repositorio:

app/: Contiene los archivos del backend de Codeigniter.
Controllers/: Directorio que contiene el controlador AlbumsController.php.
Models/: Directorio que contiene los modelos AlbumsModel.php y UsuariosModel.php.
public/: Contiene los archivos del frontend (CSS, JavaScript).
index.php: Archivo principal del frontend, dentro de la carpeta app/views.
challengeTotvs.db: Archivo de la base de datos SQLite3, dentro de la carpeta writable/database.
Database/Migrations: Contiene el archivo para crear la tabla de álbumes y el archivo para crear la tabla de usuarios para migración de la base de datos.

## Tecnologías:

Backend: Codeigniter
Frontend: JavaScript/jQuery, Bootstrap
Base de datos: SQLite3
API externa: API Simpsons

## Agradecimientos

¡Gracias por revisa mi trabajo y considerar mi aplicación para el puesto de Analista Programador en Totvs!
