<?php
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$db = 'productos';
try {
    $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa";
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

function crearTablaCategorias($conexion)
{
    $nombreTabla = 'category';
    $consultaVerificar = "SHOW TABLES LIKE :nombreTabla";
    $stmt = $conexion->prepare($consultaVerificar);
    $stmt->bindParam(':nombreTabla', $nombreTabla);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        $consultaCrear = "CREATE TABLE $nombreTabla (
            name VARCHAR(255) NOT NULL,
            createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        try {
            $conexion->exec($consultaCrear);
            // echo "Tabla '$nombreTabla' creada exitosamente.";
        } catch (PDOException $e) {
            echo "Error al crear la tabla: " . $e->getMessage();
        }
    } else {
        // echo "La tabla '$nombreTabla' ya existe. No se realizó ninguna acción.";
    }
}

function crearTablaProductos($conexion)
{
    $nombreTabla = 'product';
    $consultaVerificar = "SHOW TABLES LIKE :nombreTabla";
    $stmt = $conexion->prepare($consultaVerificar);
    $stmt->bindParam(':nombreTabla', $nombreTabla);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        $consultaCrear = "CREATE TABLE $nombreTabla (
            code VARCHAR(255) NOT NULL UNIQUE,
            name VARCHAR(255) NOT NULL,
            category VARCHAR(255) NOT NULL,
            price FLOAT NOT NULL,
            createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
            updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        try {
            $conexion->exec($consultaCrear);
            // echo "Tabla '$nombreTabla' creada exitosamente.";
        } catch (PDOException $e) {
            echo "Error al crear la tabla: " . $e->getMessage();
        }
    } else {
        // echo "La tabla '$nombreTabla' ya existe. No se realizó ninguna acción.";
    }
}

crearTablaCategorias($conexion);
crearTablaProductos($conexion);
