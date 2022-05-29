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
              <li class="breadcrumb-item"><a href="https://es.wikipedia.org/wiki/Gual%C3%A1n" target="_blank">Bienaventurado el hombre que halla la sabiduría y obtiene la inteligencia</a></li>
              
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
                $user = new Usuario();
                $resUser = $user->obtenerUsuarios();
                $numeroUsuarios = sizeof($resUser);
                echo "<h3 style='user-select: auto;'>$numeroUsuarios</h3>";
                ?>
                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <a href="usuario.php" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                 $alumnoCount = new Alumno();
                 $resAlumno = $alumnoCount->obtenerAlumnos();
                 $numeroAlumnos = sizeof($resAlumno);
                echo "<h3>$numeroAlumnos</h3>";
              ?>
                <p>Alumnos</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-alt"></i>
              </div>
              <a href="alumno.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                
                $curso = new Curso();
                $resCurso = $curso->obtenerCursos();
                $numeroCursos = sizeof($resCurso);

                echo "<h3>$numeroCursos</h3>";

              ?>
                <p>Cursos</p>
              </div>
              <div class="icon">
                <i class="fas fas fa-book"></i>
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
                  $grado = new Grado();
                  $resGrado = $grado->obtenerGrados();
                  $numeroGrados = sizeof($resGrado);
                  
                  echo "<h3>$numeroGrados</h3>";
                ?>

                <p>Grados</p>
              </div>
              <div class="icon">
                <i class="fas fa-school"></i>
              </div>
              <a href="grado.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $matricula = new Matricula();
                  $resMatricula = $matricula->obtenerMatriculas();
                  $numeroInscripciones = sizeof($resMatricula);
                  
                  echo "<h3>$numeroInscripciones</h3>";
                ?>

                <p>Inscripciones</p>
              </div>
              <div class="icon">
                <i class="fas fa-newspaper"></i>
              </div>
              <a href="matricula.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                
                $calificacion = new Nota();
                $resCalificacion = $calificacion->obtenerNotas();
                $numeroNotas = sizeof($resCalificacion);

                echo "<h3>$numeroNotas</h3>";

              ?>
                <p>Calificaciones</p>
              </div>
              <div class="icon">
                <i class="fas fas fa-list"></i>
              </div>
              <a href="nota.php" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                 $operacionCount = new Operacion();
                 $resOperacion = $operacionCount->obtenerOperaciones();
                 $numeroOperaciones = sizeof($resOperacion);
                echo "<h3>$numeroOperaciones</h3>";
              ?>
                <p>Operaciones monetarias</p>
              </div>
              <div class="icon">
              <i class="fas fas fa-wallet"></i>
              </div>
              <a href="operacion.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $movimiento = new Movimiento();
                $resMovimiento = $movimiento->obtenerMovimientos();
                $numeroMovimientos = sizeof($resMovimiento);
                echo "<h3 style='user-select: auto;'>$numeroMovimientos</h3>";
                ?>
                <p>Transacciones</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill-transfer"></i>
              </div>
              <a href="movimiento.php" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $planilla = new Planilla();
                  $resPlanilla = $planilla->obtenerPlanillas();
                  $numeroPlanillas = sizeof($resPlanilla);
                  
                  echo "<h3>$numeroPlanillas</h3>";
                ?>

                <p>Planilla</p>
              </div>
              <div class="icon">
                <i class="fas fa-newspaper"></i>
              </div>
              <a href="planilla.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $sueldo = new Sueldo();
                  $resSueldo = $sueldo->obtenerSueldos();
                  $numeroSueldos = sizeof($resSueldo);
                  
                  echo "<h3>$numeroSueldos</h3>";
                ?>

                <p>Sueldos</p>
              </div>
              <div class="icon">
                <i class="fas fa-newspaper"></i>
              </div>
              <a href="sueldo.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          


          <!-- ./col -->
        </div>
        
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->