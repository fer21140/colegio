function reactivarMunicipio(e) {

    if (confirm("¿Desea reactivar el municipio?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete5 = document.querySelectorAll("#btnReactivarMunicipio");

for (var i = 0; i < linkDelete5.length; i++) {
    linkDelete5[i].addEventListener('click', reactivarMunicipio);
}