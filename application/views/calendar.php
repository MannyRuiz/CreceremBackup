<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("header.php")
?>


<!-- MAIN CONTENT-->
  <div class="main-content">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="calendar-header">
              <h1 id="titulo"></h1>
              <div>
                <!--<button id="openModal" class="btn btn-primary"><i class="zmdi zmdi-settings"></i></button>-->
                <button id="openModal" class="btn-calendar btn btn-primary"><i class="zmdi zmdi-settings"></i></button>
                <button onclick="renderPrevious()" class="btn-calendar btn btn-primary"><i class="zmdi zmdi-skip-previous"></i></button>
                <button onclick="renderNext()" class="btn-calendar btn btn-primary"><i class="zmdi zmdi-skip-next"></i></button>
                <!--<button id="" class="btn btn-primary">Opciones de visualización</button>-->
              </div>
            </div>
            <div id="as">

            </div>

            <button onclick="renderPrevious()" class="btn-calendar btn btn-primary">Anterior Semana</button>
            <button onclick="renderNext()" class="btn-calendar btn btn-primary">Siguiente Semana</button>
          </div>
      </div>
  </div>

  <!--MODAL-->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTittie"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col d-flex justify-content-start align-items-center">
              <h3 style="margin-right:1%;">
                <img title="Manuel Ruiz" alt="Manuel Ruiz" class="img-responsive" style="width:60px; height:60px; border-radius:1000px;" src="https://i.cbc.ca/1.4857098.1539187290!/fileImage/httpImage/image.jpg_gen/derivatives/16x9_780/federer-roger-181010-1180.jpg" alt="Imagen de avatar">
                Coach
                <span class="font-weight-normal">Manuel Ruiz Cedillo</span>
              </h3>
              <a href="#" class="btn btn-sm btn-primary" title="Cambiar coach"><i class="zmdi zmdi-accounts-alt"></i></a>
            </div>
          </div>
          <div class="row" style="margin-top:3%;">
            <div class="col">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Inicio y Final</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Curso*</td>
                    <td>xyz</td>
                  </tr>
                  <tr>
                    <td>Reto</td>
                    <td>xyz</td>
                  </tr>
                  <tr>
                    <td>Primer fin</td>
                    <td>xyz</td>
                  </tr>
                  <tr>
                    <td>Segundo fin</td>
                    <td>xyz</td>
                  </tr>
                  <tr>
                    <td>Tercer fin</td>
                    <td>xyz</td>
                  </tr>
                  <tr>
                    <td>Zona amarilla</td>
                    <td>xyz</td>
                  </tr>
                  <tr>
                    <td>Zona verde</td>
                    <td>xyz</td>
                  </tr>
                  <tr>
                    <td>Ckp del 100%</td>
                    <td>xyz</td>
                  </tr>
                  <tr>
                    <td>Entrega de meta comunitaria</td>
                    <td>xyz</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Abrir otro modal</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL -->

  <!-- SECOND MODAL -->
  <div class="modal fade" id="optionsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Opciones del calendario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col d-flex">
              <form role="form" id="my-form" class="form-inline">
                <div class="form-group mb-2 mr-sm-3">
                  <label for="ciudadSede" class="sr-only">Ciudad de la sede</label>
                  <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="ciudadSede" />
                </div>
                <div class="form-group mb-2 mr-sm-3">
                  <input type="text" class="form-control" placeholder="Abreviatura" name="abbr" />
                </div>
                <div class="form-group mb-2 mr-sm-3">
                  <input type="color" class="colorpicker" class="form-control" placeholder="Color" name="backgroundColor" />
                </div>
                <div class="form-group mb-2">
                  <button class="btn btn-primary" id="nuevaCiudad">Crear nueva sede</button>
                </div>
              </form>
            </div>
          </div>
          <h3>Sedes</h3>
          <table class="table">
            <thead class="thead-inverse">
              <tr>
                <th>Ciudad</th>
                <th>Abreviación</th>
                <th>Color</th>
                <th colspan=3>Acciones</th>
              </tr>
            </thead>
            <tbody id="cities-table">
              
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL -->

  <!-- CALENDAR OPTIONS MODAL -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTittie"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam quia, in fugiat, eum nam autem enim sequi dolore quasi maiores, cumque quod atque voluptatum veniam error vero? Distinctio, quasi consequatur!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Abrir otro modal</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL -->

  <!-- CITY MODIFICATION OPTIONS MODAL -->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar ciudad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam quia, in fugiat, eum nam autem enim sequi dolore quasi maiores, cumque quod atque voluptatum veniam error vero? Distinctio, quasi consequatur!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Abrir otro modal</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL -->

</div>

<script>
  function abrirModalModificacionCiudad() {
    var modidick = $(".modificarModal");
    modidick.on("click", function() {
        $("#updateModal").modal();
    });
  }

  function clickModals() {
    /* CLICK EVENTS CUANDO SE RENDERA UNA NEUVA SEMANA */
  const modalTitle = document.getElementById("modalTittie");
  $(".event-container").on("click", (event) => {
      $("#exampleModalLong").modal();
      modalTitle.textContent = event.target.innerText;
  });

  $("#openModal").on("click", function() {
      $("#optionsModal").modal();
  });

  $(function () {
    $('body').tooltip({
        selector: '[rel=tooltip]'
    });

  });
  }
  
var listaEventos = [];
var listaCiudades = null;
var numCiudades = null;

  $("#my-form").on("submit", function(e) {
    var data0 = {nombre: "La susia y bieja tejas", abbr: "TX", backgroundColor: "rgba(0,243,233,0.24)"};
    var json = JSON.stringify(data0); 
    var seri = $(this).serialize();
    var request = $.ajax({
      url: "calendario/nuevaciudad",
      data: seri,
      type: "POST",
      contentType: "application/json; charset=utf-8",
      dataType: "text"
    });

    request.done(function(msg) {
      if(msg == "Success") {
        renderearCalendarioInicial();
        var form = document.getElementById("my-form");
        form.reset();
      }
      else if(msg == "Abbr already exists") {
        alert("Esa abreviatura ya existe, elige otra");
      }
    });

    request.fail(function(jqXHR, textStatus) {
      console.log(textStatus );
    });

    e.preventDefault();
  });

 function renderearCalendarioInicial() {
  var request = $.ajax({
    url: "calendario/eventos",
    type: "POST",
    dataType: "json"
  });

  request.done(function(msg) {
    listaEventos = msg;
    //console.log(listaEventos)
  }).then(function() {
    httpGetSucursales();
    
  });

  request.fail(function(jqXHR, textStatus) {
    console.log(textStatus );
  });
 }

 

  //OBTENER LAS SUCURSALES/CIUDADES
  function httpGetSucursales() {
    var sucRequest = $.ajax({
      url: "calendario/sucursales",
      type: "POST",
      dataType: "json"
    });

    sucRequest.done(function(msg) {
      listaCiudades = msg;
      numCiudades = msg.length;
    }).then(function() {
      weekRender();
      clickModals();
      setCitiesOptionsTable();
      abrirModalModificacionCiudad();
    });

    sucRequest.fail(function(jqXHR, textStatus) {
      console.log(textStatus);
    })
  }

  renderearCalendarioInicial();
</script>