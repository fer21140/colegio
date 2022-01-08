function reactivarGrado(e) {

    if (confirm("¿Desea reactivar el grado académico?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete6 = document.querySelectorAll("#btnReactivarGrado");

for (var i = 0; i < linkDelete6.length; i++) {
    linkDelete6[i].addEventListener('click', reactivarGrado);
}