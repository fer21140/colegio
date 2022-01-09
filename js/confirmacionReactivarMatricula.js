function reactivarMatricula(e) {

    if (confirm("¿Desea reactivar la inscripción?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete12 = document.querySelectorAll("#btnReactivarMatricula");

for (var i = 0; i < linkDelete12.length; i++) {
    linkDelete12[i].addEventListener('click', reactivarMatricula);
}