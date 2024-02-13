<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Datos</title>
</head>
<body class="container">
    <h2>Datos Alumnos</h2>
<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $BDdatos = array();
    // Capturar datos del formulario y almacenarlos en un arreglo
    $datos = array(
        'nombre' => $_POST['nombre'],
        'email'  => $_POST['email'],
        'telefono'  => $_POST['telefono']
    );
    // Puedes guardar los datos en una base de datos, en un archivo, etc.
    // Aquí simplemente lo guardamos en array
    array_push($BDdatos,$datos);

    // Puedes realizar más validaciones y manipulaciones de datos aquí si es necesario

    // Imprimir el arreglo para verificar que los datos se capturaron correctamente
    // Crear la tabla HTML
    echo "<table class='table' border='1'>";
    echo "<thead>
    <tr>
      <th scope='col'>Nombre</th>
      <th scope='col'>Correo</th>
      <th scope='col'>Telefono</th>
    </tr>
  </thead>";
    foreach ($BDdatos as $fila) {
        echo "<tr>";
        foreach ($fila as $dato) {
            echo "<td>$dato</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    } else {
        // Si no se enviaron datos por el formulario, redirigir o manejar el caso según sea necesario
        echo "Error: No se enviaron datos por el formulario.";
}
?> 
</body>
</html>

