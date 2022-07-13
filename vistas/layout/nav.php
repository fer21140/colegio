
  <?php
function limitarCadena($cadena, $limite, $sufijo){
	// Si la longitud es mayor que el límite...
	if(strlen($cadena) > $limite){
		// Entonces corta la cadena y ponle el sufijo
		return substr($cadena, 0, $limite) . $sufijo;
	}
	
	// Si no, entonces devuelve la cadena normal
	return $cadena;
}


?>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../app/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
    </ul>

    <ul class="navbar-nav ml-auto"><a class="btn btn-primary" href="../crud/cerrarSesion.php">Cerrar sesión</a></ul>
  <?php

include("../db/Conexion.php");
          
include("../clases/Alumno.php");
include("../clases/Usuario.php");
include("../clases/Contacto.php");
include("../clases/Grado.php");
include("../clases/Curso.php");
include("../clases/Operacion.php");
include("../clases/Matricula.php");
include("../clases/Movimiento.php");
include("../clases/Nota.php");
include("../clases/Sueldo.php");
include("../clases/Planilla.php");


session_start();
  
    if(isset($_SESSION['usuario'])){
      
      $us = $_SESSION['usuario'];
      $idRolUs = $us->getIdRol();

      if($idRolUs==1){
        echo "<ul class='navbar-nav ml-auto'><a class='btn btn-success' href='../vistas/index.php'>Menú principal</a></ul>";
      }

    }
  
  ?>  
    
  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="https://m.facebook.com/PorEl9/" target="_blank" class="brand-link">
      <img src="../reportes/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">IMP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../app/AdminLTE-3.0.5/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">

        <?php
          
          //Incluimos todas las clases
          
          

          if(isset($_SESSION['usuario'])){

          }else{
            header("Location: ../vistas/login.php");
          }


          $usuario = $_SESSION['usuario'];
          $nombre = $usuario->getNombres();
          $apellido = $usuario->getApellidos();
          $rolPermisoMenu = $usuario->getIdRol();

          $concatenacionNombreApellido = $nombre . " " . $apellido;

          echo"<a href='#' class='d-block'>" . limitarCadena($concatenacionNombreApellido,20,"...") ."</a>";
        ?>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="fas fa-school" style="margin-right: 10px;"></i>
              <p>
                MÓDULOS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          <?php

          if($rolPermisoMenu==1){

            

            echo "<ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='alumno.php' class='nav-link '>
                  <i class='fas fa-users' style='margin-right:10px;'></i>
                  <p>Alumnos</p>
                </a>
              </li>
            </ul>";
          }
            ?>

            <?php
            if($rolPermisoMenu==1){
           
              echo "<ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='grado.php' class='nav-link '>
                  <i class='fas fa-graduation-cap' style='margin-right:10px;'></i>
                  <p>Grados académicos</p>
                </a>
              </li>
            </ul>";
            }
            
            ?>

            <?php
            
            if($rolPermisoMenu==1){
            echo "<ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='curso.php' class='nav-link '>
                  <i class='fas fa-book-reader' style='margin-right:15px;'></i>
                  <p>Cursos</p>
                </a>
              </li>
            </ul>";
            }
          ?>
            
            <?php
            
            if($rolPermisoMenu==1){
            echo "<ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='matricula.php' class='nav-link '>
                  <i class='fas fa-folder-open' style='margin-right:10px;'></i>
                  <p>Matrículas</p>
                </a>
              </li>
            </ul>";
            }
        ?>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='nota.php' class='nav-link '>
                  <i class='fas fa-award' style='margin-right:15px;'></i>
                  <p>Calificaciones</p>
                </a>
              </li>
            </ul>
<?php
           if($rolPermisoMenu==2){
           echo "<ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='lista_alumnos.php' class='nav-link '>
                  <i class='fas fa-users' style='margin-right:10px;'></i>
                  <p>Listado de alumnos</p>
                </a>
              </li>
            </ul>";

            echo "<ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='horarios.php' class='nav-link '>
                  <i class='fas fa-calendar' style='margin-right:15px;'></i>
                  <p>Horarios</p>
                </a>
              </li>
            </ul>";
           }
?>
            <?php
            if($rolPermisoMenu==1){
            echo "<ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='operacion.php' class='nav-link '>
                  <i class='fas fa-file-invoice-dollar' style='margin-right:10px;'></i>
                  <p>Operaciones monetarias</p>
                </a>
              </li>
            </ul>";
            }
            ?>

            <?php
            if($rolPermisoMenu==1){
            echo "<ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='movimiento.php' class='nav-link '>
                  <i class='fas fa-coins' style='margin-right:10px;'></i>
                  <p>Transacciones</p>
                </a>
              </li>
            </ul>";
            }
            ?>
            <?php
            if($rolPermisoMenu==1){
            echo "<ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='planilla.php' class='nav-link '>
                  <i class='fas fa-clipboard' style='margin-right:10px;'></i>
                  <p>Planilla</p>
                </a>
              </li>
            </ul>";
            }
            ?>

            <?php
            if($rolPermisoMenu==1){
            echo "<ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='sueldo.php' class='nav-link '>
                  <i class='fas fa-hand-holding-usd' style='margin-right:10px;'></i>
                  <p>Sueldos</p>
                </a>
              </li>
            </ul>";
            }

            ?>

          </li>
          
          
          <li class='nav-header'>ACCIONES DE ADMINISTRADOR</li>
          
          
         
         
          <?php
          
          if($rolPermisoMenu==1){
          echo "<li class='nav-item'>
            <a href='usuario.php' class='nav-link'>
              <i class='nav-icon fas fa-user-alt'></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>";
          }
          ?>
          
          <li class='nav-item'>
            <a href='manual_usuario.php' class='nav-link' target='_blank'>
              <i class='nav-icon fas fa-atlas'></i>
              <p>
                Manual de usuario
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>