
<?php
require_once 'Persona.php';

// Recupera la cadena serializada de objetos POO de la cookie
$objetosPOORecuperados = isset($_COOKIE["objetos_poo_cookie"]) ? $_COOKIE["objetos_poo_cookie"] : "";

// Deserializa la cadena a un arreglo de objetos POO
$objetosPOORecuperados = unserialize($objetosPOORecuperados);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Formulario de Ejemplo con POO</title>
</head>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" ><h2>Alumnos Inscritos</h2></a>
    <form class="d-flex" action="formulario.php" role="search">
        <button class="btn btn-outline-success" type="submit">Regresar</button>
      </form>
  </div>


</nav>

<body class="container">

<?php
// Muestra los objetos POO recuperados
foreach ($objetosPOORecuperados as $objetoPOO) {
    echo "<div class='card w-75 mb-3'>
    <div class='card-body'>
    <h5 class='card-title'> {$objetoPOO->carnet}</h5>
    <p class='card-text'>Nobre:{$objetoPOO->nombre} 
       <br/> Edad:{$objetoPOO->edad}
       <br/>Carrera:{$objetoPOO->carreraT}/{$objetoPOO->carrera}</p>
</div>
</div>";

}
?>


</body>
</html>