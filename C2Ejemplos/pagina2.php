<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</head>

</head>
<body class="container">
<h1>Datos</h1>
<p class="lh-base">
<?php
// Verifica si se enviaron datos a través de POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura los datos del formulario
    $nombre = $_POST["nombre"];
    $edad = $_POST["carrera"];
    $carrera = $_POST["edad"];

    // Puedes realizar acciones con los datos, por ejemplo, imprimirlos
    echo "Nombre: $nombre <br>";
    echo "edad: $edad <br>";
    echo "Carrera: $edad <br>";

    // También puedes almacenarlos en una base de datos, enviar correos electrónicos, etc.
} else {
    // Si no se enviaron datos por POST, redirecciona al formulario
    header("Location: pagina1.php");
    exit();
}
?>
</p>
<p><a class="link-opacity-100" href="pagina1.php">Regresar a formulario</a></p>
</body>
</html>