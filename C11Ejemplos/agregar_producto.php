<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se ha enviado una imagen y que no haya errores
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // Ruta de destino para guardar la imagen
    $carpeta_destino = 'imagenes/';
    // Obtener información sobre la imagen
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_temporal = $_FILES['imagen']['tmp_name'];
    // Mover la imagen al directorio de destino
    if (move_uploaded_file($imagen_temporal, $carpeta_destino . $imagen_nombre)) {
        // Obtener la ruta de la imagen relativa al proyecto
        $ruta_imagen = $carpeta_destino . $imagen_nombre;
    } else {
        die("Error al mover la imagen al servidor.");
    }
} else {
    die("Error: No se ha seleccionado ninguna imagen o ha ocurrido un error al subirla.");
}

// Obtener los otros datos del formulario y limpiarlos para evitar inyección SQL
$nombre = $conn->real_escape_string($_POST['nombre']);
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$precio = $_POST['precio'];

// Consulta SQL para insertar el producto en la base de datos
$sql = "INSERT INTO productos (nombre, descripcion, precio, imagen_ruta) VALUES ('$nombre', '$descripcion', $precio, '$ruta_imagen')";

if ($conn->query($sql) === TRUE) {
    echo "Producto agregado exitosamente.";
} else {
    echo "Error al agregar el producto: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
