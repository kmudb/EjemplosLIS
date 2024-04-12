<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>.: HOME :.</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
</head>
<body>
<style>
        .boton-agregar {
            background-color: white; /* Cambiar color de fondo */
            border: none; /* Eliminar borde */
            padding: 10px; /* Ajustar padding */
            width: 150px; /* Ajustar ancho */
        }

        .boton-agregar img {
            width: 50%; /* Ajustar tamaño de la imagen al 100% del botón */
            height: auto; /* Mantener proporciones */
        }

        .w-75 {
            line-height: 1.65;
            height:50px;
            width:50px;
            padding: 0;
            margin: 0;
            border-radius:5px;
            border: 1px solid #eee;
        }

        .boton-eliminar {
            background-color: #ff3333; /* Cambiar color de fondo */
            border: none; /* Eliminar borde */
            color: white; /* Cambiar color de texto */
            padding: 5px 10px; /* Ajustar padding */
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <h1>Productos Disponibles</h1>
            <div class="productos">
                    <?php

                    include "./php/conexion.php";
			
                    // Función para agregar un producto al carrito
                    function agregarAlCarrito($id, $nombre, $precio, $cantidad) {
                        // Inicializar la sesión si no está iniciada
                        if (!isset($_SESSION)) {
                            session_start();
                        }

                        // Verificar si el producto ya está en el carrito, si lo está, aumentar la cantidad
                        if(isset($_SESSION['carrito'][$id])) {
                            $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
                        } else {
                            // Si el producto no está en el carrito, agregarlo
                            $_SESSION['carrito'][$id] = array(
                                'nombre' => $nombre,
                                'precio' => $precio,
                                'cantidad' => $cantidad
                            );
                        }
                    }

                    // Verificar la conexión
                    if ($con->connect_error) {
                        die("Error de conexión: " . $con->connect_error);
                    }

                    // Consulta SQL para obtener los productos
                    $sql = "SELECT * FROM productos";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                    echo '<div class="container">';
                        echo ' <div class="row">';
                        // Imprimir los productos en la página
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-4">';
                            echo "<div>";
                            echo "<h2>" . $row["nombre"] . "</h2>";
                            echo "<p><strong>Descripción:</strong> " . $row["descripcion"] . "</p>";
                            echo "<p><strong>Precio:</strong> $" . $row["precio"] . "</p>";
                            echo "<img src='" . $row["imagen"] . "' alt='" . $row["nombre"] . "' width='100'>";
                            // Botón para agregar al carrito
                            echo "<form method='post'>";
                            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                            echo "<input type='hidden' name='nombre' value='" . $row["nombre"] . "'>";
                            echo "<input type='hidden' name='precio' value='" . $row["precio"] . "'>";
                            echo "<input type='number' class='w-75' name='cantidad' value='1' min='1'>";
                            echo "<button class='boton-agregar' type='submit' name='agregar' value='submit'>";
                            echo "<img class='boton-agregar img' src='https://cdn-icons-png.flaticon.com/512/1004/1004733.png' alt='Agregar al Carrito' width='100' height='50'>";
                            echo "</button>";
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "</div>";
                    echo "</div>";
                    } else {
                        echo "No hay productos disponibles.";
                    }

                    // Cerrar conexión
                    $con->close();

                    // Lógica para agregar productos al carrito al enviar el formulario
                    if(isset($_POST['agregar'])) {
                        $id = $_POST['id'];
                        $nombre = $_POST['nombre'];
                        $precio = $_POST['precio'];
                        $cantidad = $_POST['cantidad'];
                        agregarAlCarrito($id, $nombre, $precio, $cantidad);
                        echo "<script>alert('Producto agregado al carrito');</script>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
            <h2>Carrito de Compras</h2>
            <div id="carrito">
                    <?php
                    // Mostrar el contenido del carrito si está configurado
                    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                        echo "<h3>Contenido del Carrito:</h3>";
                        echo "<ul>";
                        foreach($_SESSION['carrito'] as $id => $producto) {
                            echo "<li>{$producto['nombre']} - Cantidad: {$producto['cantidad']} - Precio: {$producto['precio']}";
                            echo "<form method='post' action=''>";
                            echo "<input type='hidden' name='eliminar_id' value='$id'>";
                            echo "<button type='submit' name='eliminar' value='submit' class='boton-eliminar'>Eliminar</button>";
                            echo "</form>";
                            echo "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<p>El carrito está vacío.</p>";
                    }
                    ?>
            </div>
        </div>              
    </div>
</body>
</html>
<?php
// Lógica para eliminar productos del carrito
if(isset($_POST['eliminar'])) {
    $id = $_POST['eliminar_id'];
    unset($_SESSION['carrito'][$id]);
    echo "<script>alert('Producto eliminado del carrito');</script>";
}
?>