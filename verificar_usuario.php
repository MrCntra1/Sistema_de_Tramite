
    <?php
    require 'conexion.php'; // Asegúrate de que este archivo incluya la conexión a la base de datos

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recopila el código de confirmación ingresado por el usuario
        $codigo_confirmacion = $_POST['codigo'];

        // Consulta la base de datos para verificar el código de confirmación
        $query = "SELECT id FROM usuarios_registro WHERE codigo_confirmacion = '$codigo_confirmacion' AND activo = 0";
        $result = mysqli_query($conexion, $query);

        if (mysqli_num_rows($result) > 0) {
            // El código de confirmación es correcto, actualiza el registro a activo
            $usuario = mysqli_fetch_assoc($result);
            $id_usuario = $usuario['id'];
            $update_query = "UPDATE usuarios_registro SET activo = 1 WHERE id = $id_usuario";
            
            if (mysqli_query($conexion, $update_query)) {
                echo "Registro confirmado con éxito. Puede iniciar sesión.";
                // Opcional: Puedes redirigir al usuario a una página de éxito.
            } else {
                echo "Error al actualizar el registro: " . mysqli_error($conexion);
            }
        } else {
            echo "El código de confirmación es incorrecto o ha expirado.";
            // Opcional: Puedes redirigir al usuario a una página de error.
        }
    }

    ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Confirmación de Registro</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plantilla/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="plantilla/dist/css/adminlte.min.css">

        <!-- CSS personalizado -->
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

            .login-box-msg {
                font-weight: bold;
            }

            .forgot-password {
                text-align: center;
                margin-top: 20px;
                font-weight: bold;
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
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Ingrese el código de confirmación</p>

                        <form action="procesar_verificar_usuario.php" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Código de Confirmación" name="codigo">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Otros campos necesarios para la confirmación -->
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Confirmar</button>
                                    <div class="forgot-password">Se le envió un código a su correo electrónico, por favor ingrese el código enviado.</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.login-container -->

        <!-- jQuery -->
        <script src="../plantilla/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../plantilla/dist/js/adminlte.min.js"></script>
    </body>

    </html>