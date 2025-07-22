<?php

// Incluir conexión a la base de datos
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recibir nombre sin espacios en blanco
    $nombre = trim($_POST['nombre']);

    if (!empty($nombre)) {
        // Preparar la consulta SQL
        $sql = "INSERT INTO usuarios (nombre) VALUES (?)";
        
        // Preparar la declaración
        $stmt = $conexion->prepare($sql);
        
        if ($stmt) {
            // Vincular parámetros
            $stmt->bind_param("s", $nombre);
            
            // Ejecutar la declaración
            if ($stmt->execute()) {
                echo "Nombre guardado correctamente.";
            } else {
                echo "Error al guardar el nombre: " . $stmt->error;
            }
            
            // Cerrar la declaración
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conexion->error;
        }
    } else {
        echo "El nombre no puede estar vacío.";
    }

}

$conexion->close();

?>