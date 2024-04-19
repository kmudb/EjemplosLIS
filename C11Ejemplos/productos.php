<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Consultar los productos desde la base de datos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

// Verificar si hay productos
$productos = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

// Devolver los productos como JSON
echo json_encode($productos);

// Cerrar la conexión a la base de datos
$conn->close();
?>
