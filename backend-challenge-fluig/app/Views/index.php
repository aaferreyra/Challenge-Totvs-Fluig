<?php
$fechahoy = date('d/m/Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alta de Álbumes y Playlists</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css"><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="/css/styles.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-es.min.js"></script>
  <script src="/js/script.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      init_eventos(); // funcion dentro de "/js/script.js"
    });
  </script>
</head>
<body id="body">
  <header id="header" class="container d-flex align-items-center py-3 mb-4 bg-light shadow">
    <nav class="me-auto"> <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="collapse" href="#altaAlbumes" role="button" aria-expanded="true" aria-controls="altaAlbumes">Alta de Álbumes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#crearPlaylist" role="button" aria-expanded="false" aria-controls="crearPlaylist">Crear Playlist</a>
        </li>
      </ul>
    </nav>
  </header>

  <div class="container">
    <div class="collapse show" id="altaAlbumes">
      <div class="card rounded-3 border-primary" >
        <div class="card-header bg-primary text-white">Alta de Álbumes</div>
        <div class="card-body">
          <?php
          $fechahoy = date('d/m/Y');
          ?>
          <form id="alta_albumes" >
            <div class="row">
              <div class="col-md-6">
                <label for="fecha_carga">Fecha de carga</label>
                <input type="text" id="fecha_carga" name="fecha_carga" class="form-control" disabled value="<?= $fechahoy ?>">
              </div>
              <div class="col-md-6">
                <label for="usuarios">Usuario</label>
                <select id="usuarios" class="usuarios validate[required] form-select form-select-mg mb-3" aria-label="medium select example">
                  <option selected>Seleccionar...</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="nombre_album">Nombre del álbum</label>
                <input type="text" id="nombre_album" name="nombre_album" class="form-control validate[required]" >
              </div>
              <div class="col-md-6">
                <label for="artista">Artista</label>
                <input type="text" id="artista" name="artista" class="form-control validate[required]" >
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="color">Color</label>
                <input type="color" id="color" name="color" class="form-control form-control-mg validate[required]">
              </div>
              <div class="col-md-6">
                <label for="estado">Estado</label>
                <select id="estado" name="estado" class="form-control validate[required]" >
                  <option selected>Seleccionar...</option>
                  <option value="en_aprobacion">En Aprobación</option>
                  <option value="aprobado">Aprobado</option>
                  <option value="rechazado">Rechazado</option>
                </select>
              
                </div>
            </div>
            <button id="btn_guardar" class="btn btn-primary">Guardar</button>
            <button id="btn_limpiar" class="btn">Limpiar</button>
          </form>
        </div>
      </div>
    </div>

    <div class="collapse" id="crearPlaylist">
      <div class="card rounded-3 border-primary">
          <div class="card-header bg-primary text-white">Crear Playlist</div>
          <div class="card-body">
              <form id="playlist">
                  <div class="row">
                      <div class="col-md-6">
                          <label for="usuario_playlist" class="form-label">Usuario</label>
                          <div class="d-flex align-items-start">
                              <select id="usuario_playlist" name="usuario_playlist" class="usuarios form-select form-select-mg mb-3" aria-label="medium select example">
                                  <option selected>Seleccionar...</option>
                              </select>
                              <button id="btn_limpiar_albums" class="btn btn-secondary ms-2" style="display: none;">
                                  <i class="bi bi-arrow-clockwise"></i>
                              </button>
                          </div>
                      </div>
                  </div>
                  <div id="lista_albumes" class="row">
                  </div>
              </form>
          </div>
      </div>
  </div>

  <div id="alert" class="modal" tabindex="-1" hide>
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Album</h5> 
          <button type="button" class="btn-close cerrar"  aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="textAlert"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary cerrar">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

<footer id="footer" class="container-fluid text-center fixed-bottom bg-light p-1 ">
  <p class="m-0">
    &copy; 2024 - Aaron Ferreyra 
    <br>
    Mail:  
    <a id="mail" href="mailto:aaron.a.ferreyra@gmail.com">aaron.a.ferreyra@gmail.com</a>
  </p>
</footer>

</html>
