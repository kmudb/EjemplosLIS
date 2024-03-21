<?php
// Verificar si se ha enviado el formulario de eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener ID del producto a eliminar
    $id = $_POST["id"];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inventario_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM productos WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // Mostrar mensaje de éxito y redireccionar después de 3 segundos
       // Redireccionar después de 2 segundos 
       echo "<div style='text-align:center; padding: 20px;'>";
       echo "<img src='./img/loading.gif' alt='Efecto visual' style='width: 200px; height: 200px;'>";
       echo "<p>Eliminar Producto.</p>";
       echo "</div>";
       echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 2000);</script>";
    } else {
        echo "Error al eliminar producto: " . $conn->error;
    }

    $conn->close();
}
?>