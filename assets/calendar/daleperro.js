/* */
/*CONSTANTES DE DURACIÓN DE DÍAS */
var daysShown = 14;
var daysShownZero = daysShown-1;
var daysAWeek = 7;

function changeDaysShown(days) {
    daysShown = days;
    daysShownZero = daysShown-1;
    renderearCalendarioInicial();
}
/* */

function semanaActual() {
    fecha.getOneWeek(fecha, showWeeks);
}

function siguienteSemana(weeks) {
    var nextWeekBlock = daysAWeek*weeks
    fecha = fecha.addDays(nextWeekBlock);
    //console.log(fecha)
}

function anteriorSemana(weeks) {
    var nextWeekBlock = daysAWeek*weeks
    fecha = fecha.subDays(nextWeekBlock);
    //console.log(fecha)
}

/* FUNCIÓN PARA SACAR EL INICIO Y TERMINO DE COLUMNA */
function getWeekData(date) {
    let week = {
        start: {
            day: (String(date.getDate()).length == 1) ? `0${date.getDate()}` : String(date.getDate()),
            month: (String(date.getMonth()+1).length == 1) ? `0${date.getMonth()+1}` : String(date.getMonth()+1),
            year: (String(date.getFullYear())),
            date: `${(String(date.getFullYear()))}-${(String(date.getMonth()+1).length == 1) ? `0${date.getMonth()+1}` : String(date.getMonth()+1)}-${(String(date.getDate()).length == 1) ? `0${date.getDate()}` : String(date.getDate())}`
        },
        end: {
            day: (String(date.addDays(daysShownZero).getDate()).length == 1) ? `0${date.addDays(daysShownZero).getDate()}` : String(date.addDays(daysShownZero).getDate()),
            month: (String(date.addDays(daysShownZero).getMonth()+1).length == 1) ? `0${date.addDays(daysShownZero).getMonth()+1}` : String(date.addDays(daysShownZero).getMonth()+1),
            year: (String(date.addDays(daysShownZero).getFullYear())),
            date: `${(String(date.addDays(daysShownZero).getFullYear()))}-${(String(date.addDays(daysShownZero).getMonth()+1).length == 1) ? `0${date.addDays(daysShownZero).getMonth()+1}` : String(date.addDays(daysShownZero).getMonth()+1)}-${(String(date.addDays(daysShownZero).getDate()).length == 1) ? `0${date.addDays(daysShownZero).getDate()}` : String(date.addDays(daysShownZero).getDate())}`
        }
    };

    return week;
}
/* TERMINA LA FUNCIÓN PARA SACAR EL INICIO Y TERMINO DE COLUMNA */
/*-------TERMINAN FUNCIONESSSSS----------*/

var fecha = new Date();
fecha = fecha.getFirstDayOfTheWeek();
var showWeeks = 4;
//date.getOneWeek(date, 4);






var semanita = [];

function sortEvents() {
    listaEventos.sort(function(a,b) {return (a.start > b.start) ? 1 : ((b.start > a.start) ? -1 : 0);} );
}

function calendarRowHeightClass(num_Ciudades) {
    if(num_Ciudades <= 3) {
        return 'style="height:45vh;"';
    }
    else if(num_Ciudades == 4) {
        return 'style="height:50vh;"';
    }
    else if(num_Ciudades == 5) {
        return 'style="height:65vh;"';
    }
}

function weekRender() {    
    sortEvents();
    /*var divmamalon = `<div class="cr7">
                        <div class="CU"></div>
                        <div class="DF"></div>
                        <div class="TX"></div>
                      </div>`*/
    var alturaCiudad = calendarRowHeightClass(numCiudades);
    var divmamalon = createDivisionContainers();
    var tbody = document.getElementById("as");
    var h1 = document.getElementById("titulo");
    semanita = fecha.getOneWeek(fecha, showWeeks);
    var row = 1;
    var titulo = "";
    var domshit = `<div class="hday">`;
    var diasdelasemanaDOM = '<div class="hday">'

    for(let i = 0; i<daysShown; i++) {
        var array = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo"];
        domshit += `<div class="calendar-col"><span>${array[i]}</span></div>`
        diasdelasemanaDOM += `<div class="calendar-col"><span>${array[i]}</span></div>`
    }
    domshit += `</div>`
    diasdelasemanaDOM += "</div>"
    
    
    let j = 0;
    /*RENDERING SHEEEEET*/
    semanita.forEach((dia, i, array) => {

        sdia = String(dia)
        var day_date = new Date(sdia);
        var weekDay = day_date.getDay();
        var year = day_date.getFullYear();
        var month = (String(day_date.getMonth()).length < 2) ? `0${day_date.getMonth()+1}` : `${day_date.getMonth()+1}`;
        var day = (String(day_date.getDate()).length < 2) ? `0${day_date.getDate()}` : `${day_date.getDate()}`;
        var weekdays = ""

        if(i === 0) { //SI ES LA PRIMERA FILA
            let week = getWeekData(day_date);
            domshit += `<div class="calendar-row" ${alturaCiudad} data-weekstart="${week.start.date}" data-weekend="${week.end.date}">`;//empieza primera fila
        }

        if((i % daysShown) / 100 == 0 && i != 0) { //SI ES UNA NUEVA FILA
            j = 0;
            let week = getWeekData(day_date);
            domshit += `${divmamalon}</div>`
            row += 1;
            domshit += `${diasdelasemanaDOM}<div data-weekstart="${week.start.date}" data-weekend="${week.end.date}" class="calendar-row" ${alturaCiudad}><div class="calendar-col" data-margin="0" data-date="${year}-${month}-${day}">${sdia.substring(4,10)}</div>`
        }
        else { //SI SOLO ESTA AGREGANDO DÍAS
            domshit += `<div class="calendar-col" data-margin="${j}" data-date="${year}-${month}-${day}">${sdia.substring(4,10)}</div>`//rendereado normal
        }

        if(i === 0) {
            titulo += sdia.substring(4, 15) + " - ";
        }
        if(i === array.length-1) {// SI ES LA ÚLTIMA ITERACIÓN
            domshit += `${divmamalon}</div>`
            titulo += sdia.substring(4,15);
        }
        j++;
    });
    
    h1.textContent = titulo;
    tbody.innerHTML = domshit;

    //eventValidation(listaEventos[0]);//tranqui checa si jala o no
    listaEventos.forEach((evento) => {
        eventValidation(evento);
    })
}
/*RENDERING CALENDARIO TERMINA AQUIIIIIII*/


/* AQUÍ SE PONE LA DURACIÓN DE LOS EVENTOS */
function eventValidation(events) {
    var eventData = {
        start: {
            day: events.start.substring(8,10),
            month: events.start.substring(5,7),
            year: events.start.substring(0,4)
        },
        end: {
            day: events.end.substring(8,10),
            month: events.end.substring(5,7),
            year: events.end.substring(0,4)
        },
        backgroundColor: events.backgroundColor,
        lugar: events.lugar,
        titulo: events.title
    };
    var weekrows = document.querySelectorAll("#as .calendar-row");
    
    weekrows.forEach((week, i) => {
        let weekDate = {
            start: {
                day: week.dataset.weekstart.substring(8,10),
                month: week.dataset.weekstart.substring(5,7),
                year: week.dataset.weekstart.substring(0,4)
            },
            end: {
                day: week.dataset.weekend.substring(8,10),
                month: week.dataset.weekend.substring(5,7),
                year: week.dataset.weekend.substring(0,4)
            }
        };
        
        var daysOnRow = week.childNodes;
        
        var eventStartDate = moment(`${eventData.start.day}/${eventData.start.month}/${eventData.start.year}`, "DD/MM/YYYY");
        var eventEndDate = moment(`${eventData.end.day}/${eventData.end.month}/${eventData.end.year}`, "DD/MM/YYYY");
        var startDate = moment(`${weekDate.start.day}/${weekDate.start.month}/${weekDate.start.year}`, "DD/MM/YYYY");
        var endDate = moment(`${weekDate.end.day}/${weekDate.end.month}/${weekDate.end.year}`, "DD/MM/YYYY");
        

        var duration = eventEndDate.diff(eventStartDate, 'days')+1;
        var margin = week.dataset;


        if (eventStartDate.isSame(startDate) || (eventStartDate.isAfter(startDate) && eventStartDate.isBefore(endDate))) { 
            if(eventEndDate.isAfter(endDate)) {
                //console.log("es aquí pero el evento sigue en otra row", i);
                duration = endDate.diff(eventStartDate, 'days')+1;
                eventSetting(duration, eventData, daysOnRow);
                events.backing = true;
            } else {
                //console.log("nomas es en esta row el evento", i)
                eventSetting(duration, eventData, daysOnRow);
            }
        } else if(eventStartDate.isBefore(startDate) && (eventEndDate.isSame(endDate) || (eventEndDate.isBefore(endDate) && eventEndDate.isAfter(startDate)))) {
            //console.log("este evento viene de la row pasada", i)
            duration = eventEndDate.diff(startDate, 'days')+1;
            eventSetting(duration, eventData, daysOnRow);
            if(eventEndDate.isBefore(endDate) || eventEndDAte.isSame(endDate)) {
                events.backing = false;
            }
        } else if(events.backing) {
            //viene de atrás pero atravesará todo jajaa xd
            duration = daysShown;
            eventSetting(duration, eventData, daysOnRow);
            events.backing = false;
        }
        


    });
    
}

/* PREPARA EL EVENTO NODE */
function eventSetting(time, event, daysOnRow) {
    let eventNode = "";
    let backgroundColor = event.backgroundColor;
    let lugar = event.lugar;
    let margin = "";
    let duration = time*100/daysShown;
    let eventDate = `${event.start.year}-${event.start.month}-${event.start.day}`;
    for(let i = 0; i<daysOnRow.length; i++) {
        let day = daysOnRow[i];
        if(day.dataset.date == eventDate) {
            margin = day.dataset.margin;
            break;
        }
    }
    margin = margin/daysShown*100;
    console.log(event.start)
    eventNode = `<div data-toggle="tooltip" data-html="true" data-placement="top" rel="tooltip" title="<b>${event.titulo}</b><br>${event.start.day}/${event.start.month}/${event.start.year} - ${event.end.day}/${event.end.month}/${event.end.year}" data-lugar="${lugar}" class="event-container" style="margin-left:${margin}%;background-color:${backgroundColor};opacity:1;width:${duration}%;height:4vh;"><span>${event.titulo}</span></div>`
    eventRender(eventNode, daysOnRow, lugar);
    //console.log(event)
}
/*PREPARA EL EVENTO NODE */


/* EVENT RENDERING */
function eventRender(node, dom, lugar) {
    dom = dom[dom.length-1].childNodes;
    //console.log(dom)
    for(let i = 1; i<dom.length; i+=2) {
        if(dom[i].classList.contains(lugar)) {
            dom = dom[i];
            break;
        }
    }
    //console.log(dom)
    dom.innerHTML += node;
}
/* EVENT RENDERING */

//CREACIÓN DE LAS DIFERENTES CIUDADES, TX, CUAUTLA, CDMX, ETC.
function createDivisionContainers() {
    var ciudades = listaCiudades;
    let divmamalon = `<div class='cr7'>`;

    ciudades.forEach((ciudad, i) => {
        if(ciudad.visualizar == 1 && ciudad.desactivar == 0) {
            if(i == 0) {
                divmamalon += `
            <div class="${ciudad.abbr} ciudad-container" style="padding-bottom:2px; margin-top:2.8%;background-color:${ciudad.backgroundColor};"></div>`
            } else {
                divmamalon += `
            <div class="${ciudad.abbr} ciudad-container" style="background-color:${ciudad.backgroundColor};"></div>`
            }
        }
    });

    divmamalon += `
</div>`;
    return divmamalon;
}




//weekRender();
//eventRender();






/* ON CLICK FUNCTIONS */
/* GO TO PREVIOUS AND NEXT WEEK */
function renderPrevious() {
    anteriorSemana(showWeeks);
    weekRender();
    clickModals();
   //eventRender();
}

function renderNext() {
    siguienteSemana(showWeeks);
    weekRender();
    clickModals();
    //eventRender();
}
/*  */