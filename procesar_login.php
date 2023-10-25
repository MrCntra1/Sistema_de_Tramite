<?php
include("conexion.php");

if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
    $email = $_POST['correo'];
    $password = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $resultado = mysqli_query($conexion, $sql);

    if (isset($_POST['remember'])) {
        $rememberToken = bin2hex(random_bytes(32));
        setcookie('remember_me', $rememberToken, time() + 604800, '/');
    }

    if ($resultado) {
        if (mysqli_num_rows($resultado) > 0) {
            header("Location: vista/usuario/vistaUsuario.html");
        } else {
            header("Location: index.php?error=1");
        }
    } else {
        header("Location: index.php?error=2");
    }
} else {

    header("Location: index.php");
}
