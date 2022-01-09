function eliminarOperacion(e) {

    if (confirm("¿Desea dar de baja la operación?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete9 = document.querySelectorAll("#btnEliminarOperacion");

for (var i = 0; i < linkDelete9.length; i++) {
    linkDelete9[i].addEventListener('click', eliminarOperacion);
}