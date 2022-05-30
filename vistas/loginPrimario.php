

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/Login_1.css" />
    <title>Inicio de sesión</title>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup"-->
                <form action="../crud/validarUsuario.php" class="sign-in-form" method="post">
                    <h2 class="title">Bienvenido</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Usuario" name="correo" id="correo" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Contraseña" name="password" id="password" required/>
                    </div>
                    <input type="submit" value="Iniciar sesión" id="btnEntrar" name="btnEntrar" class="btn solid" />
                    <p class="social-text">!Ingresa tus credenciales!</p>
                    <p class="social-text">Si eres estudiante accede desde aquí</p>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Instituto Mixto Privado San Cristóbal A.C</h3>
                    <p>
                        "Bienaventurado el que alcanza la sabiduría y obtiene la inteligencia"
                    </p>
                </div>
                <img src="../img/ICONO_LOGIN.svg" class="image" alt="" /> 
            </div>
        </div>
    </div>
</body>
</html>