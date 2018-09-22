/*------- FUNCIONES PROTOTIPO --------- */

Date.prototype.addDays = function(days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
}

Date.prototype.subDays = function(days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() - days);
    return date;
}

Date.prototype.getFirstDayOfTheWeek = function() {
    var date = new Date(this.valueOf());
    var days = date.getDay()-1;
    date.setDate(date.getDate() - days);
    return date;
}

Date.prototype.getFirstDayOfTheWeekAdvancing = function() {
    var date = new Date(this.valueOf());
    var days = date.getDay()-1;
    date.setDate(date.getDate() - days);
    return date;
}

Date.prototype.getOneWeek = function(date, weeks = 4) {
    var array = [];
    var totalDays = weeks*7;
    var semana = 1;
    for(let i = 0; i<totalDays; i++) {
        if((i % 7) / 100 == 0) {
            /*console.log("Semana: " + semana);
            semana += 1;*/
        }
        //console.log(i + ": " + date.addDays(i))
        array.push(date.addDays(i))
    }
    //console.log(firstDay);
    //console.log(firstDay.addDays(6))
    return array;
}

/*--- TERMINAN LAS FUNCIONES PROTOTIPO */


var eventos =
{
    
}


/* */
function semanaActual() {
    fecha.getOneWeek(fecha, showWeeks);
}

function siguienteSemana(weeks) {
    var nextWeekBlock = 7*weeks
    fecha = fecha.addDays(nextWeekBlock);
    //console.log(fecha)
}

function anteriorSemana(weeks) {
    var nextWeekBlock = 7*weeks
    fecha = fecha.subDays(nextWeekBlock);
    //console.log(fecha)
}

var fecha = new Date();
fecha = fecha.getFirstDayOfTheWeek();
var showWeeks = 5;
//date.getOneWeek(date, 4);



var semanita = [];




function weekRender() {
    var tbody = document.getElementById("as");
    var h1 = document.getElementById("titulo");
    semanita = fecha.getOneWeek(fecha, showWeeks);
    var row = 1;
    var titulo = "";
    var domshit = ""
    domshit = "<tr>";
    semanita.forEach((dia, i, array) => {
        sdia = String(dia)
        var day_date = new Date(sdia);
        var year = day_date.getFullYear();
        var month = (String(day_date.getMonth()).length < 2) ? `0${day_date.getMonth()}` : `${day_date.getMonth()}`;
        var day = (String(day_date.getDate()).length < 2) ? `0${day_date.getDate()}` : `${day_date.getDate()}`;
        if((i % 7) / 100 == 0 && i != 0) {
            domshit += "</tr>"
            row += 1;
            domshit += `<tr><td data-date="${year}-${month}-${day}">${sdia.substring(4,10)}</td>`
        }
        else {
            domshit += `<td data-date="${year}-${month}-${day}">${sdia.substring(4,10)}</td>`
        }

        if(i === 0) {
            titulo += sdia.substring(4, 15) + " - ";
        }
        if(i === array.length-1) {
            domshit += "</tr>"
            titulo += sdia.substring(4,15);
        }  
        
    });
    
    h1.textContent = titulo;
    tbody.innerHTML = domshit;
}

weekRender();

function renderPrevious() {
    anteriorSemana(showWeeks);
    weekRender();
}

function renderNext() {
    siguienteSemana(showWeeks);
    weekRender();
}

