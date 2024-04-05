function init_eventos(){
    //Activa y desactiva el NAV
    $(".nav-link").click(function(){
        $(this).toggleClass('active');
    });
    //funcion para boton cerrar modal
    $(".cerrar").click(function(event){
      event.preventDefault();
      $("#alert").hide();
    });
    //precarga de los usuarios tomados desde api de los simpsons
    $.ajax({
      url: "https://api.sampleapis.com/simpsons/characters",
      dataType: "json",
      success: function(data) {
        $(".usuarios").empty();
        $(".usuarios").append("<option value=''>Seleccionar...</option>"); // Add default option
        for (var i = 0; i < data.length; i++) {
          $(".usuarios").append("<option value='" + data[i].id + "'>" + data[i].name + "</option>");
        }
      }
    });  
    //boton limpiar para formulario de alta de albums
    $("#btn_limpiar").click(function(event){
      event.preventDefault();
      $("#alta_albumes").validationEngine('hideAll');
      $("#nombre_album").val('');
      $("#artista").val('');
      $("#color").val('');
      $('#estado').prop('selectedIndex',0);
      $('#usuarios').prop('selectedIndex',0);
    });
    //funcion para boton guardar el formulario de alta de albums
    //por medio de una peticion AJAX metodo POST al endpoint '/createAlbum' pasando parametros por POST 
    $("#btn_guardar").click(function(event){
      event.preventDefault();
      if($("#alta_albumes").validationEngine('validate')) {
          $.ajax({
              url: 'http://localhost:8012/createAlbum',
              type:"POST",
              data:{
                  "id_usuario":$("#usuarios").val(),
                  "d_nombre_us":$("#usuarios option:selected").text(),
                  "d_nombre_al":$("#nombre_album").val(),
                  "d_artista":$("#artista").val(),
                  "d_color":$("#color").val(),
                  "d_estado":$("#estado option:selected").text(),
                  "f_alta":$("#fecha_carga").val(),
              },
              async:false,
              dataType: 'json',
              success: function(data){
                $("#textAlert").text(data.message);
                $("#alert").show();
              }
          });
      }else{
          $("#textAlert").text("Complete los campos vacios, por favor.");
          $("#alert").show();
      }
    });
    
    $('#btn_limpiar_albums').click(function(event) {
        event.preventDefault();
        $('#usuario_playlist').prop('selectedIndex',0);
        $("#lista_albumes").empty();
        $(this).hide();
    });
    //funcion para boton recuperar albums el formulario de playlist, dependiendo el usuario seleccionado
    //por medio de una peticion AJAX metodo POST al endpoint '/buscarAlbums' 
    //pasando id_usuario como parametro por POST 
    $("#usuario_playlist").change(function() {
      if ($(this).val() !== '') {
        var selectedValue = $(this).val();
        if (selectedValue !== "Seleccionar...") {
            $('#btn_limpiar_albums').show();
        } else {
            $('#btn_limpiar_albums').hide();
        }
        $.ajax({
          url: 'http://localhost:8012/buscarAlbums',
          type:"POST",
          data:{
            "id_usuario":$("#usuario_playlist").val()
          },
          async:false,
          dataType: 'json',
          success: function(data){
            $("#lista_albumes").empty();
            //realiza un carga de los datos devueltos de la peticion
            $.each(data.datos, function(index, album) {
                var card = $("<div>", {class: "card col-md-2", style: "padding: 5px; padding-left: 10px; width: 10rem; height: 10rem; background-color: " + album.d_color});
                card.append($("<h4>", {class: "card-title", text: album.d_nombre, style: "color: white;"}));
                card.append($("<h6>", {class: "card-subtitle mb-2 text-body-secondary", style: "color: white !important;", text: album.d_artista}));
                var heartIcon = $("<i>", {class: "bi bi-heart-fill", style: "font-size: 1.2rem; position: absolute; bottom: 15px; left: 20px; color: white;"});
                card.append(heartIcon);
                
                $("#lista_albumes").append(card);
            });
          }
        });
      }
    });
  
}