function eliminarIluminacion(e) {

    if (confirm("¿Desea dar de baja la iluminacion?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete8 = document.querySelectorAll("#btnEliminarIluminacion");

for (var i = 0; i < linkDelete8.length; i++) {
    linkDelete8[i].addEventListener('click', eliminarIluminacion);
}