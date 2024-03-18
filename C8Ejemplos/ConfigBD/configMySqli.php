<?php
// Configuración de conexión a la base de datos
$host = 'localhost';
$dbname = 'Tienda';
$username = 'root';
$password = '';

// Conexión a la base de datos usando MySQLi
$mysqli = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error al conectar: " . $mysqli->connect_error);
}

// Llamar al procedimiento almacenado
$query = "CALL ObtenerPedidosConProductos()";
if ($mysqli->multi_query($query)) {
    // Procesar los resultados
    do {
        // Guardar el resultado
        if ($result = $mysqli->store_result()) {
            // Iterar sobre los resultados
            while ($row = $result->fetch_assoc()) {
                echo "Usuario: " . $row['nombre_usuario'] . "<br>";
                echo "ID Pedido: " . $row['id_pedido'] . "<br>";
                echo "Producto: " . $row['nombre_producto'] . "<br>";
                echo "<br>";
            }
            // Liberar el conjunto de resultados
            $result->free();
        }
        // Avanzar al siguiente resultado (si existe)
    } while ($mysqli->next_result());
} else {
    echo "Error al llamar al procedimiento almacenado: " . $mysqli->error;
}

// Cerrar la conexión
$mysqli->close();
?>