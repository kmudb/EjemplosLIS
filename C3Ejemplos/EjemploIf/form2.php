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
$anio = $_POST["anio"];
// Estructura condicional if para verificar si el año es bisiesto o no
if (($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0)) {
    echo "<h2>$anio</h2> es un año bisiesto.\n";
} else {
    echo "<h2>$anio</h2> no es un año bisiesto.\n";
}
?>
</p>
<p><a class="link-opacity-100" href="form1.php">Regresar a formulario</a></p>
</body>
</html>