<?php
// Configuración de conexión a la base de datos
$host = 'localhost';
$dbname = 'Tienda';
$username = 'root';
$password = '';

// Conexión a la base de datos usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar: " . $e->getMessage());
}

// Llamar al procedimiento almacenado
try {
    $statement = $pdo->prepare("CALL ObtenerPedidosConProductos()");
    $statement->execute();
    $pedidos = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al llamar al procedimiento almacenado: " . $e->getMessage());
}

// Mostrar los resultados
foreach ($pedidos as $pedido) {
    echo "Usuario: " . $pedido['nombre_usuario'] . "<br>";
    echo "ID Pedido: " . $pedido['id_pedido'] . "<br>";
    echo "Producto: " . $pedido['nombre_producto'] . "<br>";
    echo "<br>";
}

// Cerrar la conexión
$pdo = null;
?>