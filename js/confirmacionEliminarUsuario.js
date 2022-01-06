function eliminarUsuario(e) {

    if (confirm("¿Desea eliminar el usuario?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete = document.querySelectorAll("#btnEliminar");

for (var i = 0; i < linkDelete.length; i++) {
    linkDelete[i].addEventListener('click', eliminarUsuario);
}