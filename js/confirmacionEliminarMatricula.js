function eliminarMatricula(e) {

    if (confirm("¿Desea dar de baja la inscripción?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete11 = document.querySelectorAll("#btnEliminarMatricula");

for (var i = 0; i < linkDelete11.length; i++) {
    linkDelete11[i].addEventListener('click', eliminarMatricula);
}