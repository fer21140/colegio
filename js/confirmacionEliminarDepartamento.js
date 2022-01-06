function eliminarDepartamento(e) {

    if (confirm("¿Desea dar de baja el departamento?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete2 = document.querySelectorAll("#btnEliminarDepartamento");

for (var i = 0; i < linkDelete2.length; i++) {
    linkDelete2[i].addEventListener('click', eliminarDepartamento);
}