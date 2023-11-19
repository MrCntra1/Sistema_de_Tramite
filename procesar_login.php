<?php
include("conexion.php");

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $resultado = mysqli_query($conexion, $sql);

    if (isset($_POST['remember'])) {
        $rememberToken = bin2hex(random_bytes(32));
        setcookie('remember_me', $rememberToken, time() + 604800, '/');
    }

    if ($resultado) {
        if (mysqli_num_rows($resultado) > 0) {
            header("Location: ../vistausuario/vistaprincipal.html");
        } else {
            header("Location: index.php?error=1");
        }
    } else {
        header("Location: index.php?error=2");  
    }
} else {

    header("Location: index.php");
}