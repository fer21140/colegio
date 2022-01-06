function eliminarMunicipio(e) {

    if (confirm("¿Desea dar de baja el municipio?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete4 = document.querySelectorAll("#btnEliminarMunicipio");

for (var i = 0; i < linkDelete4.length; i++) {
    linkDelete4[i].addEventListener('click', eliminarMunicipio);
}