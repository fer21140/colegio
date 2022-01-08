function reactivarCurso(e) {

    if (confirm("¿Desea reactivar el curso?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete8 = document.querySelectorAll("#btnReactivarCurso");

for (var i = 0; i < linkDelete8.length; i++) {
    linkDelete8[i].addEventListener('click', reactivarCurso);
}