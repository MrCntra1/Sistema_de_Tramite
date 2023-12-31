<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DIREPRO | Log in</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plantilla/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plantilla/dist/css/adminlte.min.css">
    <style>
        body {
            background: linear-gradient(45deg, #F9796E, #02CBF7, #E7B1A5, #60E1F7, #C9F3FF);
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-box {
            width: 400px;
            margin-left: 1cm;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
        }

        .login-image {
            width: 31%;
            height: auto;
            margin-top: 1cm;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-container">
        <img src="img/Direpro.jpg" alt="Imagen" class="login-image">
        <div class="login-box">
            <div class="login-logo">
                <a href="../vista/index.html"><b>DIRE</b>PRO</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Iniciar sesión.</p>
                    <form action="vistausuario/vistaprincipal.html" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Correo" name="correo">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
                            <div class="input-group-append">
                                <div class="input-grou  p-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">
                                        Recordar
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                            </div>
                        </div>
                    </form>
                    <div class="social-auth-links text-center mb-3">
                        <br></br>
                    </div>
                    <p class="mb-1">
                        <a href="contraseña.php">Olvidé mi contraseña</a>
                    </p>
                    <p class="mb-0">
                        <a href="register.php" class="text-center">Registrar nuevo usuario</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script src="plantilla/plugins/jquery/jquery.min.js"></script>
    <script src="plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plantilla/dist/js/adminlte.min.js"></script>
</body>

</html>