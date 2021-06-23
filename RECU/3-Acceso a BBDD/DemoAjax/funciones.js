function llamaAjax() {
    var micronavegador = new XMLHttpRequest();
    alert ("¿Seguro que quieres ver lo que hay dentro?");
    micronavegador.addEventListener("readystatechange", function() {
        if(micronavegador.readyState == 4){
            if (micronavegador.status == 200) {
                
                document.getElementById("texto").innerHTML =  micronavegador.responseText;
            } else {
                if (document.getElementById("texto").innerHTML = "Ha habido un error" + this.responseText);
            }
        }
    });
    
    micronavegador.open("POST", "demo.txt");
    micronavegador.setRequestHeader("Content-tye", "application/x-www-form-urlencoded");
    micronavegador.send();
}

