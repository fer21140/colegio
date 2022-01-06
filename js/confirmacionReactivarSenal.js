function reactivarSenal(e) {

    if (confirm("¿Desea reactivar la señal?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete11 = document.querySelectorAll("#btnReactivarSenal");

for (var i = 0; i < linkDelete11.length; i++) {
    linkDelete11[i].addEventListener('click', reactivarSenal);
}