function eventRender() {
    var div = document.querySelector('div[data-date="2018-08-14"]');
    var div2 = document.querySelector('div[data-date="2018-08-16"]');
    div.style.background = 'lightsalmon'
    /*PRUEBA*/
    
    var divi = document.getElementById("messi");
    //divi.innerHTML += divmamalon;
    var margin = div.dataset.day-1;
    var margin2 = div2.dataset.day-1;
    margin = 100/7*margin;
    margin2 = 100/7*margin2;
    var duration = 3;
    duration = 100/7*duration
    var duration2 = 2;
    duration2 = 100/7*duration2;
    var cr = document.getElementById("cu");
    var df = document.getElementById("df");
    var eventillo = `<div class="event-container" style="margin-left:${margin}%;background-color:purple;opacity:1;width:${duration}%;height:2vh;"></div>`
    var eventillo2 = `<div class="event-container" style="margin-left:${margin2}%;background-color:lightgreen;opacity:1;width:${duration2}%;height:2vh;"></div>`
    var eventillo3 = `<div class="event-container" style="margin-left:${margin}%;background-color:purple;opacity:1;width:${duration}%;height:2vh;"></div>`
    var eventillo4 = `<div class="event-container" style="margin-left:${margin}%;background-color:lightgreen;opacity:1;width:${duration2}%;height:2vh;"></div>`
    cr.innerHTML += eventillo;
    cr.innerHTML += eventillo2;
    df.innerHTML += eventillo3;
    df.innerHTML += eventillo4;
    /**/
}