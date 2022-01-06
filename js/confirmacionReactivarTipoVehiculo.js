function reactivarTipoVehiculo(e) {

    if (confirm("¿Desea reactivar el tipo de vehículo?")) {
        return true;
    } else {

        e.preventDefault(); //se cancela el evento

    }

}

let linkDelete13 = document.querySelectorAll("#btnReactivarTipoVehiculo");

for (var i = 0; i < linkDelete13.length; i++) {
    linkDelete13[i].addEventListener('click', reactivarTipoVehiculo);
}