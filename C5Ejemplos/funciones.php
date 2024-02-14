<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body class="container">
    <h1>Resultado</h1>
<?php
/********************************* */
// Definir una función sin parámetros ni retorno
function saludar() {
    echo "<h3>¡Hola, la fecha actual es: " . date("d/m/Y")."</h3>";
}

/******************************** */
// Definir una función con parámetros
function suma($num1, $num2) {
    $resultado = $num1 + $num2;
    echo "La suma es: $resultado";
}

/******************************** */
// Definir una función con retorno
function cuadrado($num) {
    return $num * $num;
}

/******************************** */
// Definir una función con parámetros por defecto
function saludo($nombre = "Invitado") {
    echo "Hola, $nombre!";
}

/***************************** */
// Definir una función con retorno múltiple
function obtenerDatos() {
    $nombre = "Ana";
    $edad = 25;
    $ciudad = "Barcelona";
    return array($nombre, $edad, $ciudad);
}


//////////////////////////////////////////////////////
if (isset($_POST['btnSaludar'])) {
    saludar();
} elseif (isset($_POST['btnSumar'])) {
    suma(5, 3);
} elseif (isset($_POST['btnCuadrado'])) {
    // Llamar a la función y almacenar el resultado en una variable
    $resultado = cuadrado(4);
    // Imprimir el resultado
    echo "El cuadrado es: $resultado";
}elseif (isset($_POST['btnSaludoParam'])) {
    // Llamar a la función con un argumento
    saludo("Juan"); // Imprime: Hola, Juan!
}elseif (isset($_POST['btnRetornoMul'])) {
    // Llamar a la función y almacenar los resultados en variables
    list($nombre, $edad, $ciudad) = obtenerDatos();
    // Imprimir los resultados
    echo "Nombre: $nombre, Edad: $edad, Ciudad: $ciudad";
}
?>
<p><a class="link-opacity-100" href="Funciones.html">Regresar a principal</a></p>
    
</body>
</html>
