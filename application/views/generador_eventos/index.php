<!-- MAIN CONTENT-->
  <div class="main-content">
      <div class="section__content section__content--p30">
          <div class="container-fluid">
            <h2>Generador de eventos</h2>
            <br>
            <div class="eventType-small hide-step">
                <i class="zmdi zmdi-undo"></i>
            </div>
            <div class="newEvents-container">
                <div class="eventType-container">
                    <div class="eventType-wrapper">
                        <div class="event ev1 cm-event" data-event="pack">
                            <div class="event-selector-title">Todos los eventos</div>
                            <div class="event-selector-background back-pack"></div>
                        </div>
                        <div class="event ev2 bg-event" data-event="1">
                            <div class="event-selector-title">Evento Base</div>
                            <div class="event-selector-background back-base"></div>
                        </div>
                        <div class="event ev3 md-event" data-event="2">
                            <div class="event-selector-title">Evento Interpersonal</div>
                            <div class="event-selector-background back-inter"></div>
                        </div>
                        <div class="event ev4 ld-event" data-event="3">
                            <div class="event-selector-title">Evento Líderes</div>
                            <div class="event-selector-background back-lead"></div>
                        </div>
                    </div>
                </div>
                <div class="event-creation-progress hide-step">
                    <div class="step step1">
                        <div class="step-circle">1</div>
                        <div class="step-name">Curso</div>
                    </div>
                    <div class="step step2">
                        <div class="step-circle">2</div>
                        <div class="step-name">Sede y coach</div>
                    </div>
                    <div class="step step3">
                        <div class="step-circle">3</div>
                        <div class="step-name">Colores</div>
                    </div>
                    <div class="step step4">
                        <div class="step-circle">4</div>
                        <div class="step-name">Fechas</div>
                    </div>
                    <div class="step step5">
                        <div class="step-circle">5</div>
                        <div class="step-name">Creado</div>
                    </div>
                </div>
                <div class="info-background-container hide-step">
                    <div class="place-selection hide-step">
                        <div class="step-number-proccess">2</div>
                        <select class="form-control form-control-sm" name="sede" id="sede"></select>
                        <select class="form-control form-control-sm" name="staff" id="staff"></select>
                        <button class="btn btn-sm btn-success" id="first-next-step">Siguiente</button>
                    </div>
                    <div class="event-data hide-step">
                        <div class="step-number-proccess">3</div>
                        <select class="form-control form-control-sm" name="backgroundColor" onchange="colorizeMe(this);" id="backgroundColor">
                            <option selected value="red" style="background-color:red;">Color de fondo</option>
                            <option value="blue" style="background-color:blue;">Color de fondo</option>
                            <option value="green" style="background-color:green;">Color de fondo</option>
                            <option value="yellow" style="background-color:yellow;">Color de fondo</option>
                        </select>
                        <select class="form-control form-control-sm" name="textColor" onchange="colorizeMe(this);" id="textColor">
                            <option selected value="black" style="background-color:black; color:white;">Color de texto</option>
                            <option value="gray" style="background-color:gray;">Color de texto</option>
                            <option value="white" style="background-color:white;">Color de texto</option>
                            <option value="red" style="background-color:red;">Color de texto</option>
                            <option value="blue" style="background-color:blue;">Color de texto</option>
                            <option value="green" style="background-color:green;">Color de texto</option>
                        </select>
                        <button class="btn btn-sm btn-success" id="second-next-step">Siguiente</button>
                    </div>
                    <div class="date-selection-container hide-step">
                        <div class="step-number-proccess">4</div>
                        <div class="date-info" id="autodate">
                            <h4>Fecha automática</h4>
                        </div>
                        <div class="date-info" id="customdate">
                            <h4>Fecha personalizada</h4>
                        </div>
                        <button class="btn btn-sm btn-success disabled" id="third-next-step">Siguiente</button>
                    </div>
                    <div class="event-creation-finalized hide-step">
                        <div class="message">Cancelar creación de evento</div>
                        <div class="create-new-event">Crear evento</div>
                    </div>
                </div>
            </div>
          </div>
      </div>
      <!--MODAL-->
      <div class="modal fade" id="autodate-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Información de los horarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Fechas de cursos de vida Crecerem</h2>
                                </div>
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                        <table style="margin-top:4%;" summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Curso</th>
                                                    <th>Lugar</th>
                                                    <th>Fecha de inicio</th>
                                                    <th>Fecha de termino</th>
                                                    <th>Encargado</th>
                                                </tr>
                                            </thead>
                                            <tbody id="autodate-tablebody">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">De Acuerdo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->
  </div>