<?php
require 'conexion.php'; // Asegúrate de que este archivo incluya la conexión a la base de datos

// Calcula la fecha límite (hace un minuto desde ahora)
$limite_tiempo = 60; // 60 segundos (1 minuto)
$fecha_limite = date("Y-m-d H:i:s", time() - $limite_tiempo);

// Consulta para eliminar registros no activados después de un minuto
$query = "DELETE FROM usuarios_registro WHERE activo = 0 AND fecha_registro< '$fecha_limite'";
if (mysqli_query($conexion, $query)) {
    echo "Registros eliminados con éxito.";
} else {
    echo "Error al eliminar registros: " . mysqli_error($conexion);
}
?>
