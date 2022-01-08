function eliminarContacto(e) {

    if (confirm("¿Desea eliminar el tutor o encargado del alumno?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete4 = document.querySelectorAll("#btnEliminarContacto");

for (var i = 0; i < linkDelete4.length; i++) {
    linkDelete4[i].addEventListener('click', eliminarContacto);
}