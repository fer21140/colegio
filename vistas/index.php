<?php

include ("layout/header.php");

?>
  
  <title>Menú principal</title>
  <!-- Tell the browser to be responsive to screen width -->
 
<?php

include ("layout/nav.php");

if(isset($_SESSION['usuario'])){
  $miuser = $_SESSION['usuario'];
  $idusser = $miuser->getIdRol();

  if($idusser==1){
    include("layout/dashboard.php");

  }else{
    echo "<script>window.location.href='../vistas/horarios.php';</script>";
   
  }

}

?>
  <?php

include ("layout/footer.php");

?>




