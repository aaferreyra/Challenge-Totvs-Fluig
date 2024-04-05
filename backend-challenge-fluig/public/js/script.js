function init_eventos(){
    $(".nav-link").click(function(){
        // Remover clase 'active' de todos los elementos del menú
        // Añadir clase 'active' al elemento clickeado
        $(this).toggleClass('active');
    });
    $(".cerrar").click(function(event){
        event.preventDefault();
        $("#alert").hide();
      });
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
      $("#btn_limpiar").click(function(event){
        event.preventDefault();
        $("#alta_albumes").validationEngine('hideAll');
        $("#nombre_album").val('');
        $("#artista").val('');
        $("#color").val('');
        $('#estado').prop('selectedIndex',0);
        $('#usuarios').prop('selectedIndex',0);
        });
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
                    console.log(data);
                    $("#alert").show();
                }
            });
        }else{
            console.log('error');
        }
    });
    
    $('#btn_limpiar_albums').click(function(event) {
        event.preventDefault();
        $('#usuario_playlist').prop('selectedIndex',0);
        $("#lista_albumes").empty();
        $(this).hide();
    });

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
            $.each(data.datos, function(index, album) {
                var card = $("<div>", {class: "card col-md-2", style: "padding: 5px; padding-left: 10px; margin: auto; width: 10rem; height: 10rem; background-color: " + album.d_color});
                          
                card.append($("<h4>", {class: "card-title", text: album.d_nombre, style: "color: white;"}));
                card.append($("<h6>", {class: "card-subtitle mb-2 text-body-secondary", style: "color: white !important;", text: album.d_artista}));
                
                // Agregar icono de corazón
                var heartIcon = $("<i>", {class: "bi bi-heart-fill", style: "font-size: 1.2rem; position: absolute; bottom: 15px; left: 20px; color: white;"});
                card.append(heartIcon);
                
                $("#lista_albumes").append(card);
            });
          }
        });
      }
    });
  
}