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
    <h1>Recoleccion de Datos</h1>
    <form action="pagina2.php" method="post">
    <div class="mb-3">
        <label class="form-label" for="nombre">Nombre:</label>
        <input  class="form-control" type="text" name="nombre" id="nombre" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="edad">Edad:</label>
        <input  class="form-control" type="number" name="edad" id="edad" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="carrera">Carrera:</label>
        <input  class="form-control" type="text" name="carrera" id="carrera" required>
    </div>
        <input class="btn btn-primary" type="submit" value="Enviar">
    </form>
</body>
</html>
