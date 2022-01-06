function eliminarSenal(e) {

    if (confirm("¿Desea dar de baja la señal?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete10 = document.querySelectorAll("#btnEliminarSenal");

for (var i = 0; i < linkDelete10.length; i++) {
    linkDelete10[i].addEventListener('click', eliminarSenal);
}