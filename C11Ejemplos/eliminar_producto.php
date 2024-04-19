<?php
// Conexión a la base de datos
include 'conexion.php';

// Obtener ID del producto a eliminar
$id = $_POST['id'];

// Consulta SQL para eliminar el producto
$sql = "DELETE FROM productos WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Producto eliminado exitosamente.";
} else {
    echo "Error al eliminar el producto: " . $conn->error;
}
$conn->close();
?>
