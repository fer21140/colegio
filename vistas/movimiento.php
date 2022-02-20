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
            <h1>Movimientos</h1>
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
              <a type="submit" class="btn btn-primary" href="movimiento_ingresar.php">Ingresar movimiento</a>
              <br>
              <br>
              <!--<h4>Búsqueda</h4>-->
              <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Buscar y seleccionar alumno</label>
                        <select class="form-control selectCliente" id="lista2" name="lista2">
                        <option value="0">Seleccionar alumno</option>
                          <?php
                            $alumno = new Alumno();
            
                            $resultado = $alumno->obtenerAlumnos();

                            for($i=0; $i<sizeof($resultado);$i++){
                                $idAlumno= $resultado[$i]->getId();
                                $carnetAlumno = $resultado[$i]->getCarnet();
                                $nombreAlumno = "[" . $carnetAlumno . "] " . "[" . $resultado[$i]->getPrimerNombre() . " " . $resultado[$i]->getSegundoNombre() . " ". $resultado[$i]->getTercerNombre() . " " . $resultado[$i]->getPrimerApellido() . " ". $resultado[$i]->getSegundoApellido() ."]";

                                echo "<option value='$idAlumno'>$nombreAlumno</option>";
                            }

                            
                            
                          ?>
                          
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Filtro de búsqueda</label>
                        <select class="form-control" name="filtro" id="filtro">
                          <option value="0">Todos los registros hasta la fecha</option>
                          <option value="1">Por alumno</option>
                          <option value="2">Por rango de fechas</option>
                          <option value="3">Por alumno y rango de fechas</option>
                        </select>
                      </div>
                    </div>

                    
              
              <input type="date" class="btn btn-warning" placeholder="Desde" name="desde" id="desde">
              <input type="date" class="btn btn-warning" placeholder="Hasta" name="hasta" id="hasta">
              
              <input type="button" class="btn btn-primary" value="Buscar" id="btnGenerar" name="btnGenerar">
              <input type="button" class="btn btn-primary" value="Exportar PDF" id="btnExportar" name="btnExportar">
              
            
            </div>
            
              <!-- /.card-header -->
              <div id="tablaresultados"> 
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                 
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Operación</th>
                    <th>Alumno</th>
                    <th>Usuario emisor</th>
                    <th>Número de comprobante</th>
                    <th>Fecha de pago</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                

                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Operación</th>
                    <th>Alumno</th>
                    <th>Usuario emisor</th>
                    <th>Número de comprobante</th>
                    <th>Fecha de pago</th>
                    <th>Total</th>
                    <th>Estado</th>
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
    $(function () {
      //Initialize Select2 Elements
      $('.selectCliente').select2()

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

function filtrarPorAlumno(){
    
   
    $.ajax({
        type:"POST",
        url:"busqueda_movimiento_alumno.php?id=" + $ ('#lista2').val() ,
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#tablaresultados').html(r);
        }
    
    });

}

function filtrarPorFechas(){
  $.ajax({
        type:"POST",
        url:"busqueda_movimiento_fechas.php?fechaInicio=" + $ ('#desde').val() +"&fechaFin="+ $ ('#hasta').val(),
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#tablaresultados').html(r);
        }
    
    });
}

function filtrarPorAlumnoFecha(){
  $.ajax({
        type:"POST",
        url:"busqueda_movimiento_fechas_alumno.php?fechaInicio=" + $ ('#desde').val() +"&fechaFin="+ $ ('#hasta').val() + "&idAlumno=" + $ ('#lista2').val(),
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#tablaresultados').html(r);
        }
    
    });
}

function mostrarTodos(){
  $.ajax({
        type:"POST",
        url:"busqueda_movimiento_todos.php",
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
        //alert("haz hecho click en el boton generar");
        var idAlumno = document.getElementById('lista2').value;
        var fechaInicio = document.getElementById('desde').value;
        var fechaFin = document.getElementById('hasta').value;
        var filtro = document.getElementById('filtro').value;

       //------------------Mostrar todos------------------------------

       if(filtro==0){
         mostrarTodos();
       }
        
       //------------Filtro solo por cliente--------------------------
      if(filtro==1){
        
        if(idAlumno!=0){
        
          filtrarPorAlumno();
        
        }else{
          
          alert('Debes seleccionar un alumno primero');
          
        }
      }

      //------------Filtro por rango de fechas-------------------------

      if(filtro==2){
        
        if(fechaInicio !=""){
          if(fechaFin !=""){
             //Validamos si la fecha de inicio es menor o igual a la fecha final
             if(Date.parse(fechaInicio)<=Date.parse(fechaFin)){
                filtrarPorFechas();
             }else{
               alert("La fecha de inicio no puede ser mayor a la fecha final");
             }
          }else{
            alert("La fecha final no puede estar vacía");
          }
        }else{
          alert("La fecha de inicio no puede estar vacía");
        }
      }

      if(filtro==3){
        if(idAlumno!=0){
        
          if(fechaInicio !=""){
          if(fechaFin !=""){
             //Validamos si la fecha de inicio es menor o igual a la fecha final
             if(Date.parse(fechaInicio)<=Date.parse(fechaFin)){
                filtrarPorAlumnoFecha();
             }else{
               alert("La fecha de inicio no puede ser mayor a la fecha final");
             }
          }else{
            alert("La fecha final no puede estar vacía");
          }
        }else{
          alert("La fecha de inicio no puede estar vacía");
        }
      
      }else{
        
        alert('Debes seleccionar un alumno primero');
        
      }
      }
        
        });

    });
</script>

<script>

$(document).ready(function(){
    
    //recargarLista();

    $('#btnExportar').click(function(){
    //Llamamos a la función
    //alert("haz hecho click en el boton generar");
    var idAlumno = document.getElementById('lista2').value;
    var fechaInicio = document.getElementById('desde').value;
    var fechaFin = document.getElementById('hasta').value;
    var filtro = document.getElementById('filtro').value;

   //------------------Mostrar todos------------------------------

   if(filtro==0){
     mostrarTodos();
     window.open('../reportes/reporte_pagos_pdf.php');
   }
    
   //------------Filtro solo por cliente--------------------------
  if(filtro==1){
    
    if(idAlumno!=0){
    
      filtrarPorAlumno();
      window.open('../reportes/reporte_pagos_pdf.php');
    
    }else{
      
      alert('Debes seleccionar un alumno primero');
      
    }
  }

  //------------Filtro por rango de fechas-------------------------

  if(filtro==2){
    
    if(fechaInicio !=""){
      if(fechaFin !=""){
         //Validamos si la fecha de inicio es menor o igual a la fecha final
         if(Date.parse(fechaInicio)<=Date.parse(fechaFin)){
            filtrarPorFechas();
            window.open('../reportes/reporte_pagos_pdf.php');
         }else{
           alert("La fecha de inicio no puede ser mayor a la fecha final");
         }
      }else{
        alert("La fecha final no puede estar vacía");
      }
    }else{
      alert("La fecha de inicio no puede estar vacía");
    }
  }

  if(filtro==3){
    if(idAlumno!=0){
    
      if(fechaInicio !=""){
      if(fechaFin !=""){
         //Validamos si la fecha de inicio es menor o igual a la fecha final
         if(Date.parse(fechaInicio)<=Date.parse(fechaFin)){
            filtrarPorAlumnoFecha();
            window.open('../reportes/reporte_pagos_pdf.php');
         }else{
           alert("La fecha de inicio no puede ser mayor a la fecha final");
         }
      }else{
        alert("La fecha final no puede estar vacía");
      }
    }else{
      alert("La fecha de inicio no puede estar vacía");
    }
  
  }else{
    
    alert('Debes seleccionar un alumno primero');
    
  }
  }
    
    });

});


</script>


<?php

include ("layout/footer.php");

?>