/* Original code by AnhSirk Dasarp on Stack Overflow */

var timeout = 60;
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
    if (counter >= timeout) {
        alert("This is probably annoying if you're actually still reading.");
    }
}