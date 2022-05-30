<link rel="stylesheet" href="../css/estiloLoginColegio.css" />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <!-- <link rel="stylesheet" href="style2.css"> -->
</head>
<body>
    <main>
        <div class="row">
            
            <div class="colm-form">
                <div class="form-container">
                <hr>
                <br>
                <h4>Acceso estudiantes</h4>
                <br>
                <hr>
                <br>

                <form action="../crud/validarAlumno.php" class="sign-in-form" method="post">
                <img src="../img/login_student.png" width="100px" height="100px">    
                <h2 class="title">Bienvenido/a</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Usuario" name="correo" id="correo" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="password" id="password" required/>
                    </div>
                    <input type="submit" class="btn-login" value="Iniciar sesión" id="btnEntrar" name="btnEntrar" class="btn solid" />
                    <p class="social-text">!Ingresa tus credenciales!</p>
                    <br>
                    <a href="login.php"><h3 class="social-text">Si eres profesor accede desde aquí</h3></a>
                </form>


                
                </div>
               
            </div>
        </div>
    </main>
   
</body>
</html>