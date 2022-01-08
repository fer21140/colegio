function eliminarGrado(e) {

    if (confirm("¿Desea dar de baja el grado académico?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete5 = document.querySelectorAll("#btnEliminarGrado");

for (var i = 0; i < linkDelete5.length; i++) {
    linkDelete5[i].addEventListener('click', eliminarGrado);
}