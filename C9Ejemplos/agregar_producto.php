
<?php
// Verificar si se ha enviado el formulario de agregar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];

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

    // Insertar datos en la base de datos
	$sql = "CALL AgregarProducto('$nombre', '$descripcion', $cantidad, $precio)";
    if ($conn->query($sql) === TRUE) {
        // Mostrar mensaje de éxito y redireccionar después de 3 segundos
       // Redireccionar después de 2 segundos 
       echo "<div style='text-align:center; padding: 20px;'>";
       echo "<img src='./img/loading.gif' alt='Efecto visual' style='width: 200px; height: 200px;'>";
       echo "<p>Agregando Producto.</p>";
       echo "</div>";
       echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 2000);</script>";

    } else {
        echo "Error al agregar producto: " . $conn->error;
    }

    $conn->close();
}
?>
