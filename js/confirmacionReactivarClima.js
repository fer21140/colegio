function reactivarClima(e) {

    if (confirm("¿Desea reactivar el clima?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete7 = document.querySelectorAll("#btnReactivarClima");

for (var i = 0; i < linkDelete7.length; i++) {
    linkDelete7[i].addEventListener('click', reactivarClima);
}