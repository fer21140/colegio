function eliminarMovimiento(e) {

    if (confirm("¿Desea dar de baja el movimiento?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete13 = document.querySelectorAll("#btnEliminarMovimiento");

for (var i = 0; i < linkDelete13.length; i++) {
    linkDelete13[i].addEventListener('click', eliminarMovimiento);
}