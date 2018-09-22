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