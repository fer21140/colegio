function eliminarPlani(e) {

    if (confirm("¿Desea eliminar la planilla?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete15 = document.querySelectorAll("#btnEliminarPlani");

for (var i = 0; i < linkDelete15.length; i++) {
    linkDelete15[i].addEventListener('click', eliminarPlani);
}