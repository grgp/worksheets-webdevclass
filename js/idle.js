/* Original code by AnhSirk Dasarp on Stack Overflow */

var timeout = 30;
var counter = 0;

document.onclick = function() {
    counter = 0;
};

document.onmousemove = function() {
    counter = 0;
};

document.onkeypress = function() {
    counter = 0;
};

window.setInterval(CheckIdleTime, 1000);

function CheckIdleTime() {
    counter++;
    var oPanel = document.getElementById("SecondsUntilExpire");
    if (oPanel)
        oPanel.innerHTML = (timeout - counter) + "";
    if (counter >= timeout) {
        alert("\n30 seconds spent\nOnly to finally read\nA boring haiku");
    }
}