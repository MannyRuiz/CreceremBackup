function setCitiesOptionsTable() {
    var visualizacion = "";
    var desactivacion = "";
    var htmlNode = ``;
    var citiesTable = document.getElementById("cities-table");
    listaCiudades.forEach((ciudad) => {
        visualizacion = (ciudad.visualizar == 1) ? "No visualizar" : "Visualizar";
        desactivacion = (ciudad.desactivar == 0) ? "Desactivar" : "Activar";

        htmlNode += `<tr>
                        <td>${ciudad.nombre}</td>
                        <td>${ciudad.abbr}</td>
                        <td><span style="background-color:${ciudad.backgroundColor}; width:100%; padding:5px;"></span></td>
                        <td><a href="#" data-id="${ciudad.id}" class="modificarModal">Modificar</a></td>
                        <td><a href="#" data-id="${ciudad.id}" onclick="event.preventDefault(); desactivarVisualizacionCiudad(${ciudad.id}, ${ciudad.visualizar});">${visualizacion}</a></td>
                        <td><a href="#" data-id="${ciudad.id}" onclick="event.preventDefault(); desactivarSede(${ciudad.id}, ${ciudad.desactivar});">${desactivacion}</a></td>
                    </tr>`;
    });
    citiesTable.innerHTML = htmlNode;
}

//Desactivar la visualización de una sede
function desactivarVisualizacionCiudad(id, vis) {
  var idarray = {id:id, num:vis};
  var request = $.ajax({
    url: "calendario/borrarciudad",
    data: idarray,
    type: "POST",
    contentType: "application/json; charset=utf-8",
    dataType: "text"
  });

  request.done(function(msg) {
    if(msg == "Visualizacion actualizada") {
      renderearCalendarioInicial();
    }    
  });

  request.fail(function(jqXHR, textStatus) {
    console.log(textStatus );
  });
}
  
//Desactivar una sede (hacerla no disponible para ningún trámite)
function desactivarSede(id, des) {
  var idarray = {id:id, des:des};
  console.log(des)
  var request = $.ajax({
    url: "/crecerem/index.php/api/desactivarciudad",
    data: idarray,
    type: "POST",
    contentType: "application/json; charset=utf-8",
    dataType: "text"
  });

  request.done(function(msg) {
    console.log(msg)
    if(msg == "Sede desactivada") {
      renderearCalendarioInicial();
    }
  });

  request.fail(function(jqXHR, textStatus) {
    console.log(textStatus );
  });
}