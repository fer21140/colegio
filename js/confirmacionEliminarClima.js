function eliminarClima(e) {

    if (confirm("¿Desea dar de baja el clima?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete6 = document.querySelectorAll("#btnEliminarClima");

for (var i = 0; i < linkDelete6.length; i++) {
    linkDelete6[i].addEventListener('click', eliminarClima);
}