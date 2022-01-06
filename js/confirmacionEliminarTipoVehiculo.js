function eliminarTipoVehiculo(e) {

    if (confirm("¿Desea dar de baja el tipo de vehículo?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete12 = document.querySelectorAll("#btnEliminarTipoVehiculo");

for (var i = 0; i < linkDelete12.length; i++) {
    linkDelete12[i].addEventListener('click', eliminarTipoVehiculo);
}