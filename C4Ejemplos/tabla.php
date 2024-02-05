<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Multiplicar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  

</head>
<body class="container">

<h2>Tabla de Multiplicar</h2>

<form method="post" action="">
    <label for="numero">Ingrese un número:</label>
    <input class="form-control" type="text" name="numero" id="numero" required>
    <input class="btn btn-primary" type="submit" value="Generar tabla">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el número ingresado por el usuario
    $numero = $_POST["numero"];

    //*********************************************/
    //                  FOR
    //*********************************************/
    // Validar que el número sea un entero positivo
    if (ctype_digit($numero) && $numero > 0) {
        echo "<h3>Tabla de Multiplicar del $numero(For):</h3>";
        echo "<table class='table table-striped table-bordered border-primary' >";
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "<tr><td>$numero x $i</td><td>$resultado</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Por favor, ingrese un número entero positivo.</p>";
    }

    //*********************************************/
    //                  While
    //*********************************************/
    // Validar que el número sea un entero positivo
    if (ctype_digit($numero) && $numero > 0) {
        echo "<h3>Tabla de Multiplicar del $numero(While):</h3>";
        echo "<table class='table table-striped table-bordered border-primary' >";
        $i=1;
        while($i<=10){
            $resultado = $numero * $i;
            echo "<tr><td>$numero x $i</td><td>$resultado</td></tr>";
        $i++;
        }
            
          echo "</table>";
    } else {
        echo "<p>Por favor, ingrese un número entero positivo.</p>";
    }

    //*********************************************/
    //                 Do-While
    //*********************************************/
    // Validar que el número sea un entero positivo
    if (ctype_digit($numero) && $numero > 0) {
        echo "<h3>Tabla de Multiplicar del $numero(Do-While):</h3>";
        echo "<table class='table table-striped table-bordered border-primary' >";
        $i=1;
        do{
            $resultado = $numero * $i;
            echo "<tr><td>$numero x $i</td><td>$resultado</td></tr>";
        $i++;
        }while($i<=10);
            
          echo "</table>";
    } else {
        echo "<p>Por favor, ingrese un número entero positivo.</p>";
    }
}
?>

</body>
</html>