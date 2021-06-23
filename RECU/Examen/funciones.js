window.onload = inicio;

function inicio() { // FUNCION QUE LLAMA A LOS PARÁMETROS DEL HTML
    //document.getElementById("listaProductos").addEventListener("click", listaAJAX);
    document.getElementById("finalizaSesion").addEventListener("click", cerrarSesion);
    iniciarSesion();
    listaAJAX();
}

function iniciarSesion() { // FUNCION PARA INICIAR SESIÓN

    if(typeof(Storage) != undefined) {

        if (localStorage.getItem("usuario") != null) {
            document.getElementById("saludo").innerHTML = "Hola de nuevo " + localStorage.getItem("usuario");
        } else  {
            localStorage.setItem("usuario", prompt("Escriba su usuario"));
            document.getElementById("saludo").innerHTML = "Bievenido " + localStorage.getItem("usuario")
        }
    }
}

function cerrarSesion() { // FUNCION PARA CERRAR SESIÓN
    localStorage.removeItem("usuario");
    localStorage.clear();
    alert ("Sesion Cerrada");
    iniciarSesion();
}

function listaAJAX() {
    var objeto = { // FORMATO JSON
        "tabla":"lista"
    };
    

    var lista = new XMLHttpRequest();
    var objeto_json = JSON.stringify(objeto);
    lista.open("POST", "conecta.php", true);
    lista.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    lista.onreadystatechange = function() {
        
        if (this.readyState == 4 && this.status == 200) {
            var array = JSON.parse(this.responseText); //DESCODIFICAMOS PARA QUE SEA UN ARRAY DE OBJETOS
            var filas = "";

            for (i in array) { // RECORREMOS EL ARRAY
                filas += array[i].Producto +" "+ array[i].Precio +"<br />"; // EN FILAS AÑADIMOS LOS PRODCUTOS

                var parrafo = document.createElement("p"); //CREAMOS UN PARRAFO
                var checkbox = document.createElement("input"); // CREAMOS UN ELEMENTO INPUT
                var listaPintar = filas[i];
                var texto = document.createTextNode(listaPintar);

                checkbox.type = "checkbox"; // AHORA YA ES UN CHECKBOX
                checkbox.setAttribute("id", "caja"); // LE AÑADIMOS UNA ID = "CAJA"

                parrafo.appendChild(texto); 
                parrafo.appendChild(checkbox);
                document.getElementById("listaProductos").appendChild(parrafo);
                
            }
            
            //document.getElementById("listaProductos").innerHTML = filas; // COLOCAMOS FILAS EN EL DIV ="listaProductos"
            
        }
    }
    lista.send("objeto =" + objeto_json);
}

