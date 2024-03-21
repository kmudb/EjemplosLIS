<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Formulario de Inventario</title>
</head>
<body class="container">

<nav class="navbar bg-warning" data-bs-theme="dark">
<div class="container-fluid">
    <h2>Inventario de Productos</h2>
  </div>
</nav>



<div class="container text-center">
  <div class="row">
    <div class="col">
    <h2>Lista de Productos</h2>
    <ul>
        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "inventario_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para obtener los productos
        $sql = "SELECT id, nombre, descripcion, cantidad, precio FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul class='list-group'>";
            // Mostrar los productos en una lista
            while($row = $result->fetch_assoc()) {
                echo "<li class='list-group-item d-flex justify-content-between align-items-start'><div class='ms-2 me-auto'><div class='fw-bold'>". $row["nombre"] ."</div> Cantidad: " . $row["cantidad"] . "  Precio: $" . $row["precio"] . "</div>";
                // Mostrar botón de editar y ocultar formulario de editar
                echo "<span class='badge'>";
                echo "<img src='./img/edit.png' onclick='mostrarFormularioEditar(" . $row["id"] . ")' style='width:24px; height:24px;'>";
                echo "<form id='formEditar" . $row["id"] . "' action='editar_producto.php' method='post' style='display:none;'>";
                echo "<input class='form-control' type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<input class='form-control' type='text' name='nombre' value='" . $row["nombre"] . "' required>";
                echo "<input class='form-control' type='text' name='descripcion' value='" . $row["descripcion"] . "' required>";
                echo "<input class='form-control' type='number' name='cantidad' value='" . $row["cantidad"] . "' required>";
                echo "<input class='form-control' type='number' name='precio' value='" . $row["precio"] . "' required>";
                echo "<input class='btn btn-danger' type='submit' value='Guardar'>";
                echo "</form>";
                echo "</span>";

                echo "<span class='badge'>";
                echo "<form action='eliminar_producto.php' method='post' style='display:inline;'>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<input type='image' src='./img/delete.png' alt='Eliminar' style='width:24px; height:24px;'>";
                echo "</form>";
                echo "</span>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "No hay productos disponibles.";
        }

        $conn->close();
        ?>
    </ul>

    </div>
    <div class="col">
          <!-- Formulario de Agregar Producto -->
    <h2>Agregar Nuevo Producto</h2>
    <form id="formAgregar" class="px-4 py-3" action="agregar_producto.php" method="post">
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Nombre producto" id="nombre" name="nombre" required><br>
    </div>
    <div class="mb-3">
        <textarea id="descripcion" placeholder="Descripcion producto" class="form-control"  name="descripcion" required></textarea>
    </div>
    <div class="mb-3">
        <input type="number" placeholder="Cantidad" class="form-control"  id="cantidad" name="cantidad" required>
    </div>
    <div class="mb-3">
        <input type="number" placeholder="Precio" class="form-control" id="precio" name="precio" step="0.01" required>
    </div>
        <input type="submit" class="btn btn-danger" value="Agregar Producto">
    </form>
    </div>
  </div>
</div>



    <script>
        // Función para mostrar el formulario de edición y ocultar el formulario de agregar
        function mostrarFormularioEditar(id) {
            // Ocultar formulario de agregar
            document.getElementById("formAgregar").style.display = "none";
            // Mostrar formulario de editar correspondiente
            document.getElementById("formEditar" + id).style.display = "block";
        }
    </script>
</body>
</html>
