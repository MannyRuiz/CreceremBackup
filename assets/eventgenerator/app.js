var newEvent = null; //evento o eventos que se generaran

var packEvent = false;
var eventTypeSelected = "";

/* CLICKS*/
$(".event").on("click", function(e) {
    e.preventDefault();
    $(".eventType-container").addClass("hide-step");
    $(".eventType-small").removeClass("hide-step").addClass("section-active");
    //mostrar seccion actual a elegir y agregar efecto
    $(".event-creation-progress, .info-background-container").removeClass("hide-step").addClass("section-active");
    //agregar clases al paso anterior ya hecho
    $(".step1 .step-circle").addClass("done").addClass("section-active");
    $(".step1 .step-name").addClass("step-color");
    //quitar clases de pasos hechos, esto es cuando se vuelve a elegir un evento desde el principio y también en botones
    $(".step2, .step3, .step4, .step5").removeClass("done");
    $("#first-next-step, #second-next-step, #third-next-step").removeClass("dont-show-button");
    $("#customdate, #autodate").removeClass("selected");
    $(".date-selection-container, .event-data").addClass("hide-step").addClass("section-active");
    $(".step3 .step-circle, .step4 .step-circle, .step5 .step-circle").removeClass("current");
    $(".step3 .step-name, .step4 .step-name, .step5 .step-name  ").removeClass("current-text");
    //agregar clases al paso actual
    $(".step2 .step-circle").addClass("current");
    $(".step2 .step-name").addClass("current-text");

    $(this).addClass("selected");
    $(this).siblings().removeClass("selected");
    eventTypeSelected = $(this).data('event');
    
    if(eventTypeSelected == "pack") {
        packEvent = true;
    } else {
        packEvent = false;
    }

    $(".place-selection").removeClass("hide-step").addClass("section-active");
});

$(".eventType-small, .message").on("click", function(e) {
    e.preventDefault();
    $(".eventType-container").removeClass("hide-step").addClass("section-active");
    $(".eventType-small").addClass("hide-step").removeClass("section-active");
    $(".step, .step-circle").removeClass("done");
    $(".step-name").removeClass("step-color");
    $(".event-creation-progress, .info-background-container").addClass("hide-step").removeClass("section-active");
    $(".step1 .step-circle").addClass("done").addClass("section-active");
    $(".step1 .step-name").addClass("step-color");
    $(".step2, .step3, .step4, .step5").removeClass("done")
    $("#first-next-step, #second-next-step, #third-next-step").removeClass("dont-show-button");
    $("#customdate, #autodate").removeClass("selected");
    $(".date-selection-container, .event-data").addClass("hide-step").addClass("section-active");

    $(".event-creation-finalized").addClass("hide-step").removeClass("section-active");
})

$("#first-next-step").on("click", function(e) {
    e.preventDefault();
    //agregar clase al evento anterior ya realizado
    $(".step2 .step-circle").addClass("done").addClass("section-active");
    $(".step2 .step-name").addClass("step-color");
    //quitar clases al paso anterior (que era al paso current)
    $(".step2 .step-circle").removeClass("current");
    $(".step2 .step-name").removeClass("current-text");
    //agregar clases al paso actual
    $(".step3 .step-circle").addClass("current");
    $(".step3 .step-name").addClass("current-text");


    //opciones anteriores bloqueadas
    var opciones = $(".place-selection select");
    for(let i=0; i<opciones.length; i++) {
        opciones[i].disabled = true;
    }

    $("#first-next-step").addClass("dont-show-button");
    $(".event-data").removeClass("hide-step").addClass("section-active");
});

$("#second-next-step").on("click", function(e) {
    e.preventDefault();
    //agregar clase al evento anterior ya realizado
    $(".step3 .step-circle").addClass("done").addClass("section-active");
    $(".step3 .step-name").addClass("step-color");
    //quitar clases al paso anterior (que era al paso current)
    $(".step3 .step-circle").removeClass("current");
    $(".step3 .step-name").removeClass("current-text");
    //agregar clases al paso actual
    $(".step4 .step-circle").addClass("current");
    $(".step4 .step-name").addClass("current-text");

    //opciones anteriores bloqueadas
    var opciones = $(".event-data select");
    for(let i=0; i<opciones.length; i++) {
        opciones[i].disabled = true;
    }

    $("#second-next-step").addClass("dont-show-button");
    $(".date-selection-container").removeClass("hide-step").addClass("section-active");
});

$("#third-next-step").on("click", function(e) {
    if($(this).hasClass("disabled")) {
        alert("No has escogido fecha automática o las fechas personalizadas estan incompletas.");
    }
    else {
        e.preventDefault();
        $(".step4 .step-circle").addClass("done").addClass("section-active");
        $(".step4 .step-name").addClass("step-color");
        
        //quitar clases al paso anterior (que era al paso current)
        $(".step4 .step-circle").removeClass("current");
        $(".step4 .step-name").removeClass("current-text");

        //agregar clases al paso actual
        $(".step5 .step-circle").addClass("current");
        $(".step5 .step-name").addClass("current-text");

        $("#third-next-step").addClass("dont-show-button");
        $(".event-creation-finalized").removeClass("hide-step").addClass("section-active");
    }
});

$(".create-new-event").on("click", function(e) {
    e.preventDefault();
    $(".step5 .step-circle").addClass("done").addClass("section-active");
    $(".step5 .step-name").addClass("step-color");

    //quitar
    $(".step5 .step-circle").removeClass("current").addClass("section-active");
    $(".step5 .step-name").removeClass("current-text");

    crearEventos(newEvent);
});

$("#autodate").on("click", function(e) {
    e.preventDefault();
    if(packEvent) {
        automaticEventPack();
    } else {
        automaticEvent();
    }
    $("#third-next-step").removeClass("disabled");
    $(this).addClass("selected").siblings().removeClass("selected");
    $("#autodate-modal").modal();
});

$("#customdate").on("click", function(e) {
    e.preventDefault();
    if(packEvent) {
        customEventPack();
    } else {
        customEvent();
    }
    $(this).addClass("selected").siblings().removeClass("selected");
    $("#autodate-modal").modal();
    
});
/*--------------------------- EVENTOS DE CLICK -----------------------------------*/


Date.prototype.getWednesdayOfTheCurrentWeek = function() {
    var date = new Date(this.valueOf());
    var days = date.getDay()-1;
    date.setDate(date.getDate() - days + 2);
    return date;
}

function automaticEvent() {
    var today = new Date();
    //today = today.addDays(4); //nomas para probar que día de la semana es
    var day = today.getDay(); //saber que día es hoy
    console.log(today)

    var nextMonday = undefined;
    var start = undefined;
    var end = undefined;
    if(day>=3) {
        dif = 8-day;
        today = today.addDays(dif);

    }
    
    var eventPlace = $("#sede option:selected").data("title");//Marcara el id del lugar, se tendrá que obtener el nombre de la sede para mostrarlo
    var eventPlaceId = $("#sede option:selected").data("id");//Marcara el id del lugar, se tendrá que obtener el nombre de la sede para mostrarlo
    var eventHost = $("#staff option:selected").val();//Marcara el id del staff, se tendrá que obtener el nombre del staff para mostrarlo
    var eventHostId = $("#staff option:selected").data("id");//Marcara el id del staff, se tendrá que obtener el nombre del staff para mostrarlo
    var textColor = $("#textColor option:selected").val();//Color del texto del evento
    var backgroundColor = $("#backgroundColor option:selected").val();//Color del texto del evento
    var start = today.getWednesdayOfTheCurrentWeek();
    var end = start.addDays(4);
    var event = [
        {
            start: moment(start).format('YYYY-MM-DD'),
            end: moment(end).format('YYYY-MM-DD'),
            type: eventTypeSelected,
            sedeId: eventPlaceId,
            sede: eventPlace,
            hostId: eventHostId,
            host: eventHost,
            backgroundColor: backgroundColor,
            textColor: textColor
        }
    ];


    console.log(event)
    var tableNode = ``;

    

    event.forEach((e) => {

       let curso = "";
       if(e.type == 1) {
           curso = "Base";
       } else if(e.type == 2) {
            curso = "Interpersonal";
       } else {
           curso = "Líderes";
       }
       
       tableNode += `<tr>
                        <td>${curso}</td>
                        <td>${e.sedeId} - ${e.sede}</td>
                        <td>${e.start}</td>
                        <td>${e.end}</td>
                        <td>${e.host}</td>
                    </tr>` 
    });

    var tbody = document.getElementById("autodate-tablebody");
    tbody.innerHTML = tableNode;

    //crearEventos(event);
    newEvent = event;
}

function automaticEventPack() {
    var today = new Date();
    //today = today.addDays(4); //nomas para probar que día de la semana es
    var day = today.getDay(); //saber que día es hoy

    var nextMonday = undefined;
    var start = undefined;
    var end = undefined;
    if(day>=3) {
        dif = 8-day;
        today = today.addDays(dif);
    }
    
    var eventPlace = $("#sede option:selected").data("title");//Marcara el id del lugar, se tendrá que obtener el nombre de la sede para mostrarlo
    var eventPlaceId = $("#sede option:selected").data("id");//Marcara el id del lugar, se tendrá que obtener el nombre de la sede para mostrarlo
    var eventHost = $("#staff option:selected").val();//Marcara el id del staff, se tendrá que obtener el nombre del staff para mostrarlo
    var eventHostId = $("#staff option:selected").data("id");//Marcara el id del staff, se tendrá que obtener el nombre del staff para mostrarlo
    var textColor = $("#textColor option:selected").val();//Color del texto del evento
    var backgroundColor = $("#backgroundColor option:selected").val();//Color del texto del evento
    console.log(backgroundColor)
    var threeEvents = [
        {
            start:undefined,
            end:undefined,
            type: 1,
            sedeId: eventPlaceId,
            sede: eventPlace,
            hostId: eventHostId,
            host: eventHost,
            backgroundColor: backgroundColor,
            textColor: textColor
        },
        {
            start:undefined,
            end:undefined,
            type: 2,
            sedeId: eventPlaceId,
            sede: eventPlace,
            hostId: eventHostId,
            host: eventHost,
            backgroundColor: backgroundColor,
            textColor: textColor
        },
        {
            start:undefined,
            end:undefined,
            type: 3,
            sedeId: eventPlaceId,
            sede: eventPlace,
            hostId: eventHostId,
            host: eventHost,
            backgroundColor: backgroundColor,
            textColor: textColor
        }
    ];

    
    start = today.getWednesdayOfTheCurrentWeek();
    end = start.addDays(4);
    var eventMedium = EventInTwoWeeks(start);
    var eventLeader = EventInTwoWeeks(eventMedium.date);


    //Se ponen las fechas de los tres eventos INICIO, MEDIO Y LÍDERES
    threeEvents[0].start = moment(start).format('YYYY-MM-DD');
    threeEvents[0].end = moment(end).format('YYYY-MM-DD');
    threeEvents[1].start = eventMedium.start;
    threeEvents[1].end = eventMedium.end;
    threeEvents[2].start = eventLeader.start;
    threeEvents[2].end = eventLeader.end;

    
    var tableNode = ``;

    threeEvents.forEach((event) => {
       let curso = "";
       if(event.type == 1) {
           curso = "Base";
       } else if(event.type == 2) {
            curso = "Interpersonal";
       } else {
           curso = "Líderes";
       }

       tableNode += `<tr>
                        <td>${curso}</td>
                        <td>${event.sedeId} - ${event.sede}</td>
                        <td>${event.start}</td>
                        <td>${event.end}</td>
                        <td>${event.host}</td>
                        <td><a</td>
                    </tr>` 
    });

    var tbody = document.getElementById("autodate-tablebody");
    tbody.innerHTML = tableNode;

    //crearEventos(threeEvents);
    newEvent = threeEvents;
}

function EventInTwoWeeks(date) {
    var nextTwoWeeks = new Date(date);
    var event = {
        start:"",
        end:"",
        date:undefined
    }
    var start = nextTwoWeeks.addDays(14);
    var end = start.addDays(4);
    event.date = start;
    event.start = moment(start).format('YYYY-MM-DD');
    event.end = moment(end).format('YYYY-MM-DD');
    return event;
}

function SedesActivas() {
    var sede = document.getElementById("sede");
    var options = ``;
    var request = $.ajax({
      url: "/crecerem/index.php/api/sedes",
      type: "GET",
      dataType: "json"
    });
  
    request.done(function(msg) {
      var listaSede = msg;
      //console.log(listaSede)
      listaSede.forEach((sede) => {
        options += `<option data-title="${sede.nombre}" data-id="${sede.id}" value="${sede.abbr}">${sede.abbr} - ${sede.nombre}</option>`
      });
      sede.innerHTML = options;
    }).then(function() {
      
    });
    request.fail(function(jqXHR, textStatus) {
      console.log(textStatus );
    });
};

function StaffActivo() {
    var staff = document.getElementById("staff");
    var options = ``;
    var request = $.ajax({
      url: "/crecerem/index.php/api/staffcursos",
      type: "GET",
      dataType: "json"
    });
  
    request.done(function(msg) {
      var listaStaff = msg;
      listaStaff.forEach((staff) => {
        options += `<option data-id="${staff.id}" value="${staff.nombre}">${staff.nombre}</option>`
      });
      staff.innerHTML = options;
    }).then(function() {
      
    });
    request.fail(function(jqXHR, textStatus) {
      console.log(textStatus);
    });
};


function crearEventos(eventos) {
    console.log(eventos)
    var json = JSON.stringify(eventos); 
    var request = $.ajax({
        url: "/crecerem/index.php/api/creareventos",
        data: {ohd:json},
        type: "POST",
        contentType: "application/json; charset=utf-8",
        dataType: "text"
    });
  
    request.done(function(msg) {
        if(msg == 1) {
            setTimeout(function() {
                window.location.replace("/crecerem/index.php/calendario");
            }, 2500);
        } else {
            alert("No se ha podido realizar el evento, vuelva a intentarlo. \nSi el problema persíste, comuníquelo al equipo de desarrollo de Crecerem.\n crecerem@hotmail.com")
        }
    });
  
    request.fail(function(jqXHR, textStatus) {
    console.log(textStatus );
    });
}

SedesActivas();
StaffActivo();

function colorizeMe(element){
    // Use the selected value to set the color
    element.options[element.selectedIndex].style.backgroundColor
    element.setAttribute('style','background-color: ' + element.options[element.selectedIndex].style.backgroundColor + '!important;');
}

function eventPackCreator() {
    var eventPlace = $("#sede option:selected").data("title");//Marcara el id del lugar, se tendrá que obtener el nombre de la sede para mostrarlo
    var eventPlaceId = $("#sede option:selected").data("id");//Marcara el id del lugar, se tendrá que obtener el nombre de la sede para mostrarlo
    var eventHost = $("#staff option:selected").val();//Marcara el id del staff, se tendrá que obtener el nombre del staff para mostrarlo
    var eventHostId = $("#staff option:selected").data("id");//Marcara el id del staff, se tendrá que obtener el nombre del staff para mostrarlo
    var textColor = $("#textColor option:selected").val();//Color del texto del evento
    var backgroundColor = $("#backgroundColor option:selected").val();//Color del texto del evento
    var fechas = [
        {
            start: undefined,
            end: undefined
        },
        {
            start: undefined,
            end: undefined
        },
        {
            start: undefined,
            end: undefined
        }
    ];


    if(newEvent!= null && newEvent.length == 3) {
        fechas.forEach((fecha, i) => {
            fecha.start = newEvent[i].start;
            fecha.end = newEvent[i].end;
        });
    }

    var eventsCreated = [
        {
            start: fechas[0].start,
            end: fechas[0].end,
            type:0,
            sedeId: eventPlaceId,
            sede: eventPlace,
            hostId: eventHostId,
            host: eventHost,
            backgroundColor: backgroundColor,
            textColor: textColor
        },
        {
            start: fechas[1].start,
            end: fechas[1].end,
            type:1,
            sedeId: eventPlaceId,
            sede: eventPlace,
            hostId: eventHostId,
            host: eventHost,
            backgroundColor: backgroundColor,
            textColor: textColor
        },
        {
            start: fechas[2].start,
            end: fechas[2].end,
            type:2,
            sedeId: eventPlaceId,
            sede: eventPlace,
            hostId: eventHostId,
            host: eventHost,
            backgroundColor: backgroundColor,
            textColor: textColor
        }
    ];

    return eventsCreated;
}

function eventCreator() {
    var eventPlace = $("#sede option:selected").data("title");//Marcara el id del lugar, se tendrá que obtener el nombre de la sede para mostrarlo
    var eventPlaceId = $("#sede option:selected").data("id");//Marcara el id del lugar, se tendrá que obtener el nombre de la sede para mostrarlo
    var eventHost = $("#staff option:selected").val();//Marcara el id del staff, se tendrá que obtener el nombre del staff para mostrarlo
    var eventHostId = $("#staff option:selected").data("id");//Marcara el id del staff, se tendrá que obtener el nombre del staff para mostrarlo
    var textColor = $("#textColor option:selected").val();//Color del texto del evento
    var backgroundColor = $("#backgroundColor option:selected").val();//Color del texto del evento
    var fechas = [
        {
            start: undefined,
            end: undefined
        }
    ];

    if(newEvent!= null && newEvent.length == 1) {
        fechas[0].start = newEvent[0].start;
        fechas[0].end = newEvent[0].end;
    }
    
    var eventCreated = [
        {
            start: fechas[0].start,
            end: fechas[0].end,
            type: eventTypeSelected,
            sedeId: eventPlaceId,
            sede: eventPlace,
            hostId: eventHostId,
            host: eventHost,
            backgroundColor: backgroundColor,
            textColor: textColor
        }
    ];

    return eventCreated;
}

function dateFormat(date) {
    const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var format = null;
    if(date != null) {
        let year = date.substr(0,4);
        let month = Number(date.substr(5,2))-1;
        let day = date.substr(8,2);
        format = `${day}/${months[month]}/${year}`;
    }

    return format;
}

function customEventPack() {
    var today = new Date();
    //today = today.addDays(4); //nomas para probar que día de la semana es
    var day = today.getDay(); //saber que día es hoy

    var nextMonday = undefined;
    var start = undefined;
    var end = undefined;
    if(day>=3) {
        dif = 8-day;
        today = today.addDays(dif);
    }
    

    var threeEvents = eventPackCreator();
    
    var tableNode = ``;
    

    threeEvents.forEach((event, i) => {
        var startButton = `<a id="btn-i${i}" href="#" class="btn btn-danger selectDate">Sin fecha de inicio <i class="zmdi zmdi-calendar-check"></i></a>`;
        var endButton = `<a id="btn-f${i}" href="#" class="btn btn-danger selectDate">Sin fecha de termino <i class="zmdi zmdi-calendar-check"></i></a>`;
        var startInput = `<input placeholder="Seleccionar fecha" id="i${i}" href="#" class="selectDate">`;
        var endInput = `<input placeholder="Seleccionar fecha" id="f${i}" href="#" class="selectDate">`
        if(event.start != undefined) {
            let dateStart = dateFormat(event.start);
            startButton = `<a id="btn-i${i}" href="#" class="btn btn-success selectDate">Fecha Seleccionada <i class="zmdi zmdi-calendar-check"></i></a>`;
            startInput = `<input value="${dateStart}" placeholder="Seleccionar fecha" id="i${i}" href="#" class="selectDate">`;
        }
        if(event.end != undefined) {
            let dateEnd = dateFormat(event.end);
            endButton = `<a id="btn-f${i}" href="#" class="btn btn-success selectDate">Fecha Seleccionada <i class="zmdi zmdi-calendar-check"></i></a>`;
            endInput = `<input value="${dateEnd}" placeholder="Seleccionar fecha" id="f${i}" href="#" class="selectDate">`
        }


       let fechaInicio = `<td>${startButton}${startInput}</td>`;
       let fechaTermino = `<td>${endButton}${endInput}</td>`;

       let curso = "";
       if(event.type == 1) {
           curso = "Base";
       } else if(event.type == 2) {
            curso = "Interpersonal";
       } else {
           curso = "Líderes";
       }

       tableNode += `<tr>
                        <td>${curso}</td>
                        <td>${event.sedeId} - ${event.sede}</td>
                        ${fechaInicio}
                        ${fechaTermino}
                        <td>${event.host}</td>
                    </tr>` 
    });

    var tbody = document.getElementById("autodate-tablebody");
    tbody.innerHTML = tableNode;

    //crearEventos(threeEvents);
    newEvent = threeEvents;
    selectDate();
}

function customEvent() {
    var today = new Date();
    //today = today.addDays(4); //nomas para probar que día de la semana es
    var day = today.getDay(); //saber que día es hoy

    var nextMonday = undefined;
    var start = undefined;
    var end = undefined;
    if(day>=3) {
        dif = 8-day;
        today = today.addDays(dif);

    }
    
    var customNewEvent = eventCreator();

    var tableNode = ``;

    customNewEvent.forEach((event, i) => {
        var startButton = `<a id="btn-i${i}" href="#" class="btn btn-danger selectDate">Sin fecha de inicio <i class="zmdi zmdi-calendar-check"></i></a>`;
        var endButton = `<a id="btn-f${i}" href="#" class="btn btn-danger selectDate">Sin fecha de termino <i class="zmdi zmdi-calendar-check"></i></a>`;
        var startInput = `<input placeholder="Seleccionar fecha" id="i${i}" href="#" class="selectDate">`;
        var endInput = `<input placeholder="Seleccionar fecha" id="f${i}" href="#" class="selectDate">`
        if(event.start != undefined) {
            let dateStart = dateFormat(event.start);
            startButton = `<a id="btn-i${i}" href="#" class="btn btn-success selectDate">Fecha Seleccionada <i class="zmdi zmdi-calendar-check"></i></a>`;
            startInput = `<input value="${dateStart}" placeholder="Seleccionar fecha" id="i${i}" href="#" class="selectDate">`;
        }
        if(event.end != undefined) {
            let dateEnd = dateFormat(event.end);
            endButton = `<a id="btn-f${i}" href="#" class="btn btn-success selectDate">Fecha Seleccionada <i class="zmdi zmdi-calendar-check"></i></a>`;
            endInput = `<input value="${dateEnd}" placeholder="Seleccionar fecha" id="f${i}" href="#" class="selectDate">`
        }


       let fechaInicio = `<td>${startButton}${startInput}</td>`;
       let fechaTermino = `<td>${endButton}${endInput}</td>`;

       let curso = "";
       if(event.type == 1) {
           curso = "Base";
       } else if(event.type == 2) {
            curso = "Interpersonal";
       } else {
           curso = "Líderes";
       }

       tableNode += `<tr>
                        <td>${curso}</td>
                        <td>${event.sedeId} - ${event.sede}</td>
                        ${fechaInicio}
                        ${fechaTermino}
                        <td>${event.host}</td>
                    </tr>` 
    });

    var tbody = document.getElementById("autodate-tablebody");
    tbody.innerHTML = tableNode;

    //crearEventos(event);
    newEvent = customNewEvent;
    selectDate();
}



function EventInTwoWeekssss(date) {
    var nextTwoWeeks = new Date(date);
    var event = {
        start:"",
        end:"",
        date:undefined
    }
    var start = nextTwoWeeks.addDays(14);
    var end = start.addDays(4);
    event.date = start;
    event.start = moment(start).format('YYYY-MM-DD');
    event.end = moment(end).format('YYYY-MM-DD');
    return event;
}

function restrictedDates(array, start=null, end=null) {
    var paquito = false;
    if(end == null && start != null) {
        array.forEach((a) => {
            if(a._i == start._i) {
                paquito = true;
            } else {
                paquito = false;
            }
        });
    }
    else if(start == null && end != null) {
        array.forEach((a) => {
            if(a._i == end._i) {
                paquito = true;
            } else {
                paquito = false;
            }
        });
    }
    else {
        array.forEach((a) => {
            if(a.isBetween(start, end) || a.isSame(start) || a.isSame(end)) {
                paquito = true;
            }
            else {
                paquito = false;
            }
        });
    }
    return paquito;
}


function selectDate() {
    $(".selectDate").datepicker({
        // The format you want
        altFormat: "yy-mm-dd",
        // The format the user actually sees
        dateFormat: "dd/MM/yy",
        onSelect: function (date, e) {
            var month = (e.currentMonth+1 < 10) ? `0${e.currentMonth+1}` : e.currentMonth+1;
            var day = (e.currentDay.length < 2) ? `0${e.currentDay}` : e.currentDay;
            var daymonth = `${month}-${day}`;
            var selectedDate = `${e.currentYear}-${month}-${day}`;
            var id = $(this).attr("id");
            var i = id.substr(1,1); //aquí se sabe que evento es: 0=base, 1=inter, 2=lideres
            var j = id.substr(0,1); //aquí se sabe que fecha es: fecha de inicio=i o fecha final=f
            var tipoFecha = (j == "i") ? "start" : "end"; //dependiendo el tipo de fecha se utiliza para explorar el objeto
            var fechasObjeto = [moment("12-24", "MM-DD"), moment("12-25", "MM-DD"), moment("01-01", "MM-DD"), moment("05-10", "MM-DD"), moment("09-15", "MM-DD"), moment("09-16", "MM-DD")];
            daymonth = moment(daymonth, "MM-DD");      
            
            if(tipoFecha == "start") { //si la fecha que elegiste es una fecha de inicio
                if(newEvent[i]["end"] == undefined) { //si no se ha seleccionado una fecha de termino
                    if(restrictedDates(fechasObjeto, daymonth)) {
                        noPoner();
                        alert("Fecha restringida\nNo puedes realizar eventos durante estas fechas");
                    }
                    else {
                        poner();
                    }
                } else { //si la fecha de termino ya fue seleccionada
                    let daymonthend = newEvent[i]["end"].substr(5);
                    daymonthend = moment(daymonthend, "MM-DD");
                    var endDate = newEvent[i]["end"];
                    endDate = moment(endDate);
                    var startDate = moment(selectedDate);
                    if(startDate.isSameOrAfter(endDate)) {
                        noPoner();
                    } else {
                        if(restrictedDates(fechasObjeto, daymonth, daymonthend)) {
                            noPoner();
                            alert("Fecha restringida\nNo puedes realizar eventos durante estas fechas");
                        }
                        else {
                            poner();
                        }
                    }
                }
            } else { //si la fecha que elegiste es una fecha de termino
                if(newEvent[i]["start"] == undefined) { //si no se ha seleccionado una fecha de termino
                    if(restrictedDates(fechasObjeto, daymonth)) {
                        noPoner();
                        alert("Fecha restringida");
                    }
                    else {
                        poner();
                    }
                } else { //si la fecha de inicio ya fue seleccionada
                    let daymonthstart = newEvent[i]["start"].substr(5);
                    daymonthstart = moment(daymonthstart, "MM-DD");
                    var startDate = newEvent[i]["start"];
                    startDate = moment(startDate);
                    var endDate = moment(selectedDate);
                    if(startDate.isSameOrAfter(endDate)) {
                        noPoner();
                    } else {
                        if(restrictedDates(fechasObjeto, daymonthstart, daymonth)) {
                            noPoner();
                            alert("Fecha restringida\nNo puedes rsssealizar eventos durante estas fechas");
                        }
                        else {
                            poner();
                        }
                    }
                }
            }

            function poner() {
                var btn = $("#btn-" + j + i);
                btn.removeClass("btn-danger").removeClass("btn-warning").addClass("btn-success");
                btn[0].textContent = "Fecha seleccionada";
                newEvent[i][tipoFecha] = selectedDate;

                var boolly = true;
                newEvent.forEach((event) => {
                    if(event.start == undefined || event.end == undefined) {
                        boolly = false;
                    }
                });

                if(boolly) {
                    $("#third-next-step").removeClass("disabled");
                }
            }

            function noPoner() {
                var inp = $("#" + j + i);
                inp[0].value = "";
                var btn = $("#btn-" + j + i);
                btn.removeClass("btn-danger").removeClass("btn-success").addClass("btn-warning");
                btn[0].textContent = "Fecha inválida";
                newEvent[i][tipoFecha] = undefined;
                if(!($("#third-next-step").hasClass("disabled"))) {
                    $("#third-next-step").addClass("disabled");
                }
            }
        

            
        }
    });
}

$("#upload-image").on("click", function() {
    $("#modal-upload-image").modal();
});

$(document).on('submit', '#image-form', function(e){
    e.preventDefault();
  
    var form_data = new FormData($('#image-form')[0]);
    $.ajax({
        type:'POST',
        url:'/crecerem/index.php/api/uploadimage',
        processData: false,
        contentType: false,
        async: false,
        cache: false,
        data : form_data,
        success: function(response) {
            console.log(response);
            if(response == "error") {
                alert("No se pudo subir la imagen");
            } else {
                var imagenes = $(".profile-image-hover");
                if(imagenes.length == 0) {
                    window.location.reload(true); 
                }
                else {
                    for(let i = 0; i<imagenes.length; i++) {
                        imagenes[i].src = `/crecerem/uploads/${response}`;
                    } 
                }
            }
        }
    });
  });