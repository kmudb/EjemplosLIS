<?php
// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id = $_POST["id"];
    $nombre = !empty($_POST["nombre"]) ? $_POST["nombre"]: null;
    $descripcion = !empty($_POST["descripcion"]) ? $_POST["descripcion"]: null; 
    $cantidad = !empty($_POST["cantidad"]) ? $_POST["cantidad"]: 0;  
    $precio = !empty($_POST["precio"]) ? $_POST["precio"]: 0;  

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

    // Actualizar datos en la base de datos
    $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', cantidad=$cantidad, precio=$precio WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        // Mostrar mensaje de éxito y redireccionar después de 3 segundos
       // Redireccionar después de 2 segundos 
       echo "<div style='text-align:center; padding: 20px;'>";
       echo "<img src='./img/loading.gif' alt='Efecto visual' style='width: 200px; height: 200px;'>";
       echo "<p>Actualizando Producto.</p>";
       echo "</div>";
       echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 2000);</script>";
    } else {
        echo "Error al actualizar producto: " . $conn->error;
    }

    $conn->close();
}
?>