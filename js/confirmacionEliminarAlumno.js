function eliminarAlumno(e) {

    if (confirm("¿Desea dar de baja al alumno?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete2 = document.querySelectorAll("#btnEliminarAlumno");

for (var i = 0; i < linkDelete2.length; i++) {
    linkDelete2[i].addEventListener('click', eliminarAlumno);
}