function llamaAjax() {
    var micronavegador = new XMLHttpRequest();

    micronavegador.onreadystatechange = function() {
        if(micronavegador.readyState == 4 && micronavegador.status == 200) {
            document.getElementById("texto").innerHTML =  micronavegador.responseText;
        }
    }
    micronavegador.open("GET", "demo.txt", true);
    micronavegador.send();
};