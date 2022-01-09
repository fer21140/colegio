function reactivarOperacion(e) {

    if (confirm("¿Desea reactivar operación?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete10 = document.querySelectorAll("#btnReactivarOperacion");

for (var i = 0; i < linkDelete10.length; i++) {
    linkDelete10[i].addEventListener('click', reactivarOperacion);
}