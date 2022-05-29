
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


                <form action="../crud/validarUsuario.php" class="sign-in-form" method="post">
                <img src="../reportes/logo.jpg" width="100px" height="100px">    
                <h2 class="title">Bienvenido</h2>
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
                </form>


                
                </div>
               
            </div>
        </div>
    </main>
   
</body>
</html>