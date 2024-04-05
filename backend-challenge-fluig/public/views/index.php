<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Albums</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+9AuY76Q/P7JWR94Lxs7r0IBZCL39n93iv0/2fYBu36RBG25Fl0A5B/!Q=" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEv1P/i4=" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
</head>
<body>
<div class="container">
    <h1>Formulario de Alta de Álbumes</h1>
    <form id="alta_albumes">
      <div class="row">
        <div class="col-md-6">
          <label for="fecha_carga">Fecha de carga:</label>
          <input type="date" id="fecha_carga" name="fecha_carga" class="form-control" disabled>
        </div>
        <div class="col-md-6">
          <label for="usuario">Usuario:</label>
          <select id="usuario" name="usuario" class="form-control">
            <option value="">Seleccionar...</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label for="nombre_album">Nombre del álbum:</label>
          <input type="text" id="nombre_album" name="nombre_album" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="artista">Artista:</label>
          <input type="text" id="artista" name="artista" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label for="color">Color:</label>
          <input type="color" id="color" name="color" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="estado">Estado:</label>
          <select id="estado" name="estado" class="form-control">
            <option value="">Seleccionar...</option>
            <option value="en_aprobacion">En Aprobación</option>
            <option value="aprobado">Aprobado</option>
            <option value="rechazado">Rechazado</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <h1>Formulario de Playlist</h1>
    <form id="playlist">
      <div class="row">
        <div class="col-md-6">
          <label for="usuario_playlist">Usuario:</label>
          <select id="usuario_playlist" name="usuario_playlist" class="form-control">
            <option value="">Seleccionar...</option>
          </select>
        </div>
      </div>
      <div id="lista_albumes"></div>
    </form>
  </div>
</body>
</html>