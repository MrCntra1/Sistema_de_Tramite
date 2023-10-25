<?php
require 'vendor/autoload.php';
include("conexion.php");

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];

    $query = "SELECT email, password FROM usuarios_registro WHERE codigo_confirmacion = '$codigo' AND activo = 0";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $password = $row['password'];

        $insertQuery = "INSERT INTO usuarios (email, password) VALUES ('$email', '$password')";
        mysqli_query($conexion, $insertQuery);

        $updateQuery = "UPDATE usuarios_registro SET activo = 1 WHERE email = '$email'";
        mysqli_query($conexion, $updateQuery);

        header("Location: login.php?email=" . urlencode($email) . "&password=" . urlencode($password) . "&confirmado=true");
        exit();
    } else {
        header("Location: verificar_usuario.php?error=codigo_invalido");
        exit();
    }
} else {
    header("Location: verificar_usuario.php");
    exit();
}
?>