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
$numeroMes  = $_POST["mes"];
// Estructura switch para determinar la estación del año
switch ($numeroMes) {
    case 1:
    case 2:
    case 12:
        $estacion = "Invierno";
        break;
    case 3:
    case 4:
    case 5:
        $estacion = "Primavera";
        break;
    case 6:
    case 7:
    case 8:
        $estacion = "Verano";
        break;
    case 9:
    case 10:
    case 11:
        $estacion = "Otoño";
        break;
    default:
        $estacion = "Número de mes no válido.";
}

echo "El mes <h2>$numeroMes</h2><br/> corresponde a la estación del año: <h3>$estacion.</h3>\n";

?>
</p>
<p><a class="link-opacity-100" href="form1.php">Regresar a formulario</a></p>
</body>
</html>