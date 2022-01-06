function reactivarUsuario(e) {

    if (confirm("¿Desea reactivar el usuario?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete1 = document.querySelectorAll("#btnReactivar");

for (var i = 0; i < linkDelete1.length; i++) {
    linkDelete1[i].addEventListener('click', reactivarUsuario);
}