<?php

include ("layout/header.php");

?>
  <title>Módulo | Horarios</title>
  <!-- Tell the browser to be responsive to screen width -->
 
<?php

include ("layout/nav.php");

?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mis horarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
             
              <input type="button" class="btn btn-primary" value="Exportar PDF" id="btnExportar" name="btnExportar">
              
              <br>
              <br>
              <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Filtrar por grado académico</label>
                        <select class="form-control selectGrado" id="grado" name="grado">
                        <option value="0">Seleccionar grado académico</option>
                          <?php
                            $gradoBusqueda = new Grado();
            
                            $resultadoGrado = $gradoBusqueda->obtenerGrados();

                            for($i=0; $i<sizeof($resultadoGrado);$i++){
                                $idGradoB= $resultadoGrado[$i]->getId();
                                $nombreGrado = $resultadoGrado[$i]->getNombre();
                                
                                echo "<option value='$idGradoB'>$nombreGrado</option>";
                            }

                            
                            
                          ?>
                          
                        </select>
                      </div>
                    </div>

            </div>

              

              <div id="tablaresultados">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Profesor</th>
                    <th>Grado</th>
                    <th>Hora de inicio</th>
                    <th>Hora de fin</th>
                    <th>Días de la semana</th>

                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Profesor</th>
                    <th>Grado</th>
                    <th>Hora de inicio</th>
                    <th>Hora de fin</th>
                    <th>Días de la semana</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!--CERRAMOS DIV DINÁMICO DE TABLA-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.selectGrado').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    });

    /*$( ".select2" ).change(function() {
     //Aquí cargamos el usuario
    });*/
    </script>

<script type="text/javascript">

function filtrarPorGrado(){
    
   
    $.ajax({
        type:"POST",
        url:"busqueda_horarios.php?id=" + $ ('#grado').val() ,
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#tablaresultados').html(r);
        }
    
    });

}
</script>

<script>

$(document).ready(function(){
    
    //recargarLista();

    $('#grado').change(function(){
    //Llamamos a la función
    //alert("haz hecho click en el boton generar");
    var idGrado = document.getElementById('grado').value;
    
    if(idGrado>0){
      filtrarPorGrado();
    }
   
   
    
    });

    $('#btnExportar').click(function(){
    //Llamamos a la función
    //alert("haz hecho click en el boton generar");
    var idGradoPDF = document.getElementById('grado').value;
    
    if(idGradoPDF>0){
      window.open('../reportes/reporte_cursos.php?id='+idGradoPDF+'&modoVista=2', '_blank');
    }else{
      alert("¡Debes generar una búsqueda primero!");
    }
   
   
    
    });

    

});


</script>



<?php

include ("layout/footer.php");

?>