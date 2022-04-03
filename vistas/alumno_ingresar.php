<?php

include ("layout/header.php");

?>
  <title>Módulo | Ingresar alumno</title>
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
            <h1>Ingresar alumno</h1>
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
          <!-- left column -->
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Ingresar información</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                <form role="form" method="post" action="../crud/ingresarAlumno.php">
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Carnet</label>
                        <input type="text" class="form-control" placeholder="Carnet" name="carnet" id="carnet"
                        pattern="^[a-zA-Z0-9]{1,50}" required minlength="1" maxlength="50">
                      </div>
                    </div>  
                   
                  
                  
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Primer nombre</label>
                        <input type="text" class="form-control" placeholder="Primer nombre" name="primerNombre" id="primerNombre"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" required minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Segundo nombre</label>
                        <input type="text" class="form-control" placeholder="Segundo nombre" name="segundoNombre" id="segundoNombre"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tercer nombre</label>
                        <input type="text" class="form-control" placeholder="Tercer nombre" name="tercerNombre" id="tercerNombre"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Primer Apellido</label>
                        <input type="text" class="form-control" placeholder="Primer apellido" name="primerApellido" id="primerApellido"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" required minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Segundo apellido</label>
                        <input type="text" class="form-control" placeholder="Segundo apellido" name="segundoApellido" id="segundoApellido"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" placeholder="Dirección" name="direccion" id="direccion"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚ, ]{1,50}" minlength="1" maxlength="50">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Teléfono</label>
                        <input type="number" class="form-control" placeholder="Teléfono" name="telefono" id="telefono"
                        pattern="^[0-9]{1,20}" required minlength="1" maxlength="20">
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Usuario (Automático)</label>
                        <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚÑñ, ]{1,50}" required minlength="1" maxlength="50" readonly>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Contraseña por defecto (Automática)</label>
                        <input type="text" class="form-control" placeholder="Contraseña" name="password" id="password"
                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚÑñ, ]{1,50}" required minlength="1" maxlength="50" readonly>
                      </div>
                    </div>

                  </div>  
                  <div class="">
                 <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardar" id="btnGuardar">
                  <a type="submit" class="btn btn-danger" href="alumno.php">Regresar</a>
                </div>     
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">

//Función para remover tildes y ñ
const removeAccents = (str) => {
  return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
} 

//Función para generar contraseña

function generatePasswordRand(length,type) {
    switch(type){
        case 'num':
            characters = "0123456789";
            break;
        case 'alf':
            characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            break;
        case 'rand':
            //FOR ↓
            break;
        default:
            characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            break;
    }
    var pass = "";
    for (i=0; i < length; i++){
        if(type == 'rand'){
            pass += String.fromCharCode((Math.floor((Math.random() * 100)) % 94) + 33);
        }else{
            pass += characters.charAt(Math.floor(Math.random()*characters.length));   
        }
    }
    return pass;
}

  </script>

  <script type="text/javascript">

    function obtenerCredenciales(){
      
    var primerNombre = document.getElementById('primerNombre').value;
    var primerApellido = document.getElementById('primerApellido').value;
    var carnet = document.getElementById('carnet').value;
   

    if(primerNombre.length>0 && primerApellido.length>0 && carnet.length>0){

      var primerLetraPrimerNombre = primerNombre.charAt(0);

      var usuarioGenerado = removeAccents(primerLetraPrimerNombre + primerApellido + carnet).trim().split(" ").join("");
      var passwordGenerada = generatePasswordRand(10);
      document.getElementById('usuario').value = usuarioGenerado.toLowerCase();
      document.getElementById('password').value =passwordGenerada;
    }
    }


    function obtenerCredencialesSinPassword(){
      
      var primerNombre = document.getElementById('primerNombre').value;
      var primerApellido = document.getElementById('primerApellido').value;
      var carnet = document.getElementById('carnet').value;
     
  
      if(primerNombre.length>0 && primerApellido.length>0 && carnet.length>0){
  
        var primerLetraPrimerNombre = primerNombre.charAt(0);
  
        var usuarioGenerado = removeAccents(primerLetraPrimerNombre + primerApellido + carnet).trim().split(" ").join("");
        //var passwordGenerada = generatePasswordRand(10);
        document.getElementById('usuario').value = usuarioGenerado.toLowerCase();
        document.getElementById('password').value =passwordGenerada;
      }
      }
  
  </script>

<script type="text/javascript">

$(document).ready(function(){
    
    //recargarLista();

    $('#carnet').change(function(){   

    obtenerCredenciales();

    });

    $('#primerNombre').change(function(){   

      obtenerCredenciales();

    });

    $('#primerApellido').change(function(){   

        obtenerCredenciales();

    });
    //Movimiento del mouse
    $(document).mousemove(function(event){
      obtenerCredencialesSinPassword();
    });

});



</script>

<?php

include ("layout/footer.php");

?>