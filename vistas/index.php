<?php

include ("layout/header.php");

?>
  <link rel="stylesheet" href="../css/Reloj.css" />
  <title>Tránsito Zacapa</title>
  <!-- Tell the browser to be responsive to screen width -->
 
<?php

include ("layout/nav.php");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tablero</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="https://es.wikipedia.org/wiki/Gual%C3%A1n" target="_blank">Primero Gualán, Segundo Gualán y tercero Gualán</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $conexion = new Conexion();
                //Conectamos a la base de datos
                $conexion->conectar();
                $sql = "SELECT id_cliente FROM cliente  where estado=1";
                $resultado = mysqli_query($conexion->db,$sql);
                $row = mysqli_num_rows($resultado);
                echo "<h3 style='user-select: auto;'>$row</h3>";
                ?>
                <p>Clientes</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="cliente.php" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                 $conexion = new Conexion();
                 $conexion->conectar();
                 $sql3 = "SELECT id_detalle_servicio FROM detalle_servicio where estado=1";
                 $resultados = mysqli_query($conexion->db,$sql3);
                 $row4 = mysqli_num_rows($resultados);
                echo "<h3>$row4</h3>";
              ?>
                <p>Servicios</p>
              </div>
              <div class="icon">
                <i class="fas fa-tools"></i>
              </div>
              <a href="servicio.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                $conexion = new Conexion();
                $conexion->conectar();
                $sql ="SELECT id_personal FROM personal where estado=1";
                $resultado =  mysqli_query($conexion->db,$sql);
                $row = mysqli_num_rows($resultado);

                echo "<h3>$row</h3>";

              ?>
                <p>Personal</p>
              </div>
              <div class="icon">
                <i class="fas fas fa-user-cog"></i>
              </div>
              <a href="personal.php" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $conexion = new Conexion();
                  $conexion->conectar();
                  $sql = "SELECT id_usuario FROM usuario where estado=1";
                  $resultado = mysqli_query($conexion->db, $sql);
                  $row = mysqli_num_rows($resultado);
                  
                  echo "<h3>$row</h3>";
                ?>

                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-alt"></i>
              </div>
              <a href="usuario.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
        <!--reloj-->
        <div class="contenedor">
        <div class="widget">
        <div class="fecha">
            <p id="diaSemana" class="diaSemana"></p>
            <p id="dia" class="dia"></p>
            <p>de</p>
            <p id="mes" class="mes"></p>
            <p>del</p>
            <p id="anio" class="anio"></p>
        </div>
        <div class="reloj">
           <p id="horas" class="horas"></p>
           <p>:</p>
           <p id="minutos" class="minutos"></p>
           <p>:</p>
        <div class="cajaSegundos">
           <p id="ampm" class="ampm"></p>
           <p id="segundos" class="segundos"></p>
        </div>
        </div>
        </div>
        </div>
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">

          

          
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
           

            
                              
           
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php

include ("layout/footer.php");

?>

<script>
$(function(){
  var actualizarHora = function(){
    var fecha = new Date(),
        hora = fecha.getHours(),
        minutos = fecha.getMinutes(),
        segundos = fecha.getSeconds(),
        diaSemana = fecha.getDay(),
        dia = fecha.getDate(),
        mes = fecha.getMonth(),
        anio = fecha.getFullYear(),
        ampm;
    
    var $pHoras = $("#horas"),
        $pSegundos = $("#segundos"),
        $pMinutos = $("#minutos"),
        $pAMPM = $("#ampm"),
        $pDiaSemana = $("#diaSemana"),
        $pDia = $("#dia"),
        $pMes = $("#mes"),
        $pAnio = $("#anio");
    var semana = ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
    var meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
    
    $pDiaSemana.text(semana[diaSemana]);
    $pDia.text(dia);
    $pMes.text(meses[mes]);
    $pAnio.text(anio);
    if(hora>=12){
      hora = hora - 12;
      ampm = "PM";
    }else{
      ampm = "AM";
    }
    if(hora == 0){
      hora = 12;
    }
    if(hora<10){$pHoras.text("0"+hora)}else{$pHoras.text(hora)};
    if(minutos<10){$pMinutos.text("0"+minutos)}else{$pMinutos.text(minutos)};
    if(segundos<10){$pSegundos.text("0"+segundos)}else{$pSegundos.text(segundos)};
    $pAMPM.text(ampm);
    
  };
  
  
  actualizarHora();
  var intervalo = setInterval(actualizarHora,1000);
});
</script>


