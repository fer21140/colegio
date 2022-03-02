<?php

include ("layout/header.php");

?>
  <title>Módulo | Inscripciones</title>
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
            <h1>Inscripciones</h1>
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
              <a type="submit" class="btn btn-primary" href="matricula_ingresar.php">Inscribir alumno</a>
              <input type="button" class="btn btn-primary" value="Exportar PDF" id="btnExportar" name="btnExportar">
              
              <br>
              <br>
              <div class="row">
              <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Seleccionar grado académico</label>
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

                    <?php
                    $Date = date("d-m-Y");  
                    $year = date("Y");


                    echo "<div class='col-sm-6'>
                    
                    <div class='form-group'>
                      <label>Seleccione el ciclo académico</label>
                      <select class='form-control selectAnio' name='anio' id='anio'>";
                      

                        for($i=$year;$i>=2010;$i--) { 
                          echo "<option value='".$i."'>".$i."</option>";
                        }
                        
                    echo "</select>";
                    echo "</div>";
                    echo "</div>";


                   ?>

                      </div>

            </div>
              <!-- /.card-header -->
              <div id="tablaresultados">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Alumno</th>
                    <th>Grado académico</th>
                    <th>Valor de inscripción</th>
                    <th>Cuota mensual</th>
                    <th>Ciclo escolar</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Alumno</th>
                    <th>Grado académico</th>
                    <th>Valor de inscripción</th>
                    <th>Cuota mensual</th>
                    <th>Ciclo escolar</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              
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

<script>
    $(function () {
      //Initialize Select2 Elements
      $('.selectAnio').select2()

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

function filtrarPorAnioGrado(){
    
   
    $.ajax({
        type:"POST",
        url:"busqueda_matricula_anio_grado.php?idGrado=" + $ ('#grado').val() + "&anio="+ $ ('#anio').val(),
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
    var anio = document.getElementById('anio').value;
    
    if(idGrado>0){
      filtrarPorAnioGrado();
    }
   
   
    
    });

    $('#anio').change(function(){
    //Llamamos a la función
    //alert("haz hecho click en el boton generar");
    var idGradoAnio = document.getElementById('grado').value;
   
    
    if(idGradoAnio>0){
      filtrarPorAnioGrado();
    }else{
      alert("¡Selecciona un grado académico primero!");
    }
   
   
    
    });

    $('#btnExportar').click(function(){
    //Llamamos a la función
    //alert("haz hecho click en el boton generar");
    var idGradoPDF = document.getElementById('grado').value;
    var anioPDF = document.getElementById('anio').value;
    
    if(idGradoPDF>0){
      window.open('../reportes/reporte_matricula.php?idGrado='+idGradoPDF+'&anio='+anioPDF, '_blank');
    }else{
      alert("¡Debes generar una búsqueda primero!");
    }
   
   
    
    });

    

});


</script>



<?php

include ("layout/footer.php");

?>