function reactivarMovimiento(e) {

    if (confirm("¿Desea reactivar el movimiento?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete14 = document.querySelectorAll("#btnReactivarMovimiento");

for (var i = 0; i < linkDelete14.length; i++) {
    linkDelete14[i].addEventListener('click', reactivarMovimiento);
}