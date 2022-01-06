function reactivarDepartamento(e) {

    if (confirm("¿Desea reactivar el departamento?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete3 = document.querySelectorAll("#btnReactivarDepartamento");

for (var i = 0; i < linkDelete3.length; i++) {
    linkDelete3[i].addEventListener('click', reactivarDepartamento);
}