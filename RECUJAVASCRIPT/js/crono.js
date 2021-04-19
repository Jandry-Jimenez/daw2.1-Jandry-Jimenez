window.onload = inicio;


function inicio() {

    document.getElementById("inicio").onclick = cronometro;

}
var crono = document.getElementById("cronometro");
crono=0;

function tiempo() {
        //alert("resultado 1: " +crono);
crono++;
    //alert("resultado 2: " +crono);
    document.getElementById("cronometro").innerHTML= crono;
}
var intervalo;

function cronometro() {


    intervalo = setInterval(tiempo, 1000);



}

