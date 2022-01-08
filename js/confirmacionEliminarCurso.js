function eliminarCurso(e) {

    if (confirm("¿Desea dar de baja el curso?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete7 = document.querySelectorAll("#btnEliminarCurso");

for (var i = 0; i < linkDelete7.length; i++) {
    linkDelete7[i].addEventListener('click', eliminarCurso);
}