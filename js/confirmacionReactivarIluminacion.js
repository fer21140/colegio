function reactivarIluminacion(e) {

    if (confirm("¿Desea reactivar iluminacion?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete9 = document.querySelectorAll("#btnReactivarIluminacion");

for (var i = 0; i < linkDelete9.length; i++) {
    linkDelete9[i].addEventListener('click', reactivarIluminacion);
}