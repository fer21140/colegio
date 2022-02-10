<!-- Modal -->

<div class="modal fade" id="ingresarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingrese una nota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="../crud/ingresarDireccion.php">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nota de 0 a 25 pts</label>
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nota</label>
                        <input type="number" class="form-control" placeholder="Ingrese la nota" id="nota" name="nota">
                    </div>

                

                    <div class="modal-footer">
                        <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardarD" id="btnGuardarD">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" name="btnCancelarD" id="btnCancelarD">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


