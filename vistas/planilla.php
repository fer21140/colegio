<?php

include ("layout/header.php");

?>
  <title>IMP | San Cristóbal</title>
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
            <h1>Planilla</h1>
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
              <a type="submit" class="btn btn-primary" href="planilla_ingresar.php">Ingresar planilla</a>
              <br>
              <br>
              
              <!--<h4>Búsqueda</h4>-->
              <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Seleccione el mes</label>
                        <select class="form-control selectMes" name="mes" id="mes">
                          <option value="1">Enero</option>
                          <option value="2">Febrero</option>
                          <option value="3">Marzo</option>
                          <option value="4">Abril</option>
                          <option value="5">Mayo</option>
                          <option value="6">Junio</option>
                          <option value="7">Julio</option>
                          <option value="8">Agosto</option>
                          <option value="9">Septiembre</option>
                          <option value="10">Octubre</option>
                          <option value="11">Noviembre</option>
                          <option value="12">Diciembre</option>
                        </select>
                      </div>
                    </div>

                    <?php
                    $Date = date("d-m-Y");  
                    $year = date("Y");


                    echo "<div class='col-sm-6'>
                    
                    <div class='form-group'>
                      <label>Seleccione el año</label>
                      <select class='form-control selectAnio' name='anio' id='anio'>";
                      

                        for($i=$year;$i>=2010;$i--) { 
                          echo "<option value='".$i."'>".$i."</option>";
                        }
                        
                    echo "</select>";
                    echo "</div>";
                    echo "</div>";


                   ?>

              <input type="button" class="btn btn-primary" value="Generar reporte" id="btnGenerar" name="btnGenerar">
              <input type="button" class="btn btn-primary" value="Exportar PDF" id="btnExportar" name="btnExportar">
                      </div>


            
              <!-- /.card-header -->
              <div id="tablaresultados"> 
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                 
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Dpi</th>
                    <th>Empleado</th>
                    <th>Salario ordinario</th>
                    <th>Abono</th>
                    <th>Descuento</th>
                    <th>No. Cheque</th>
                    <th>Sueldo líquido</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                
                


                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Dpi</th>
                    <th>Empleado</th>
                    <th>Salario ordinario</th>
                    <th>Abono</th>
                    <th>Descuento</th>
                    <th>No. Cheque</th>
                    <th>Sueldo líquido</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                 
                </table>
              </div>
              <!-- /.card-body -->
              </div> 
                <!--TABLA RESULTADOS DIV DINÁMICO-->
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
    $(function() {
        //Initialize Select2 Elements
        $('.selectMes').select2()

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
    $(function() {
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

function generarPlanilla(){
    
   
    $.ajax({
        type:"POST",
        url:"generar_planilla.php?mes=" + $ ('#mes').val() +"&anio=" + $ ('#anio').val(),
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#tablaresultados').html(r);
        }
    
    });

}

</script>

<script type="text/javascript">
    $(document).ready(function(){
    
        //recargarLista();

        $('#btnGenerar').click(function(){
        //Llamamos a la función
        
        //var idAlumno = document.getElementById('lista2').value;        
        //Generamos planilla  
        generarPlanilla();
        
        });

    });
</script>

<?php

include ("layout/footer.php");

?>