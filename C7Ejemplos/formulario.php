
<?php
require_once 'Persona.php';

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $carrera = $_POST["opciones"];
    $carnet = $_POST["carnet"];
    $carreraC = $_POST["opcionesC"];


      // Leer el contenido del archivo JSON
      $jsonFile = file_get_contents('carreras.json');
            
      // Decodificar el JSON a un array asociativo
      $datos = json_decode($jsonFile, true);

      // Iterar sobre las opciones y llenar el elemento select

    foreach ($datos['opciones'][$carreraC] as $opcion) {
        if($opcion['id']==$carrera){
            $carrera=$opcion['nombre'];
        } 
    }

    foreach ($datos['carrerasT'] as $opcion) {
        if($opcion['id']==$carreraC){
            $carreraC=$opcion['nombre'];
        } 
    }
    // Crea un nuevo objeto POO con los datos del formulario
    $objetoPOO =new Persona($nombre, $edad, $carnet, $carrera, $carreraC);

    // Recupera los objetos POO existentes de la cookie si hay alguno
    $objetosPOOExistente = isset($_COOKIE["objetos_poo_cookie"]) ? unserialize($_COOKIE["objetos_poo_cookie"]) : array();

    // Agrega el nuevo objeto POO al arreglo existente
    $objetosPOOExistente[] = $objetoPOO;

    // Guarda el arreglo de objetos POO serializado en una cookie
    setcookie("objetos_poo_cookie", serialize($objetosPOOExistente), time() + 3600); // Caduca en 1 hora

    // Redirige o realiza otras acciones después de procesar el formulario
    header("Location: procesar_formulario.php");
    exit();
}
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
<body class="container">
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Formulario de Ejemplo con POO</span>
  </div>
</nav>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="mb-3">
        <label  class="form-label" for="nombre">Nombre:</label>
        <input class="form-control" type="text" name="nombre" id="nombre" required>
    </div>
      
    <div class="mb-3">
        <label  class="form-label" for="edad">Edad:</label>
        <input class="form-control" type="number" name="edad" id="edad" required>
        </div>
           <div class="mb-3">
        <label  class="form-label" for="nombre">Carnet:</label>
        <input class="form-control" type="text" name="carnet" id="carnet" required>
    </div>
    <div class="mb-3">
        <label class="form-label"  for="edad">Carrera:</label>
        <select class="form-select"  id="opcionesC" name="opcionesC"  required >
            <?php
            // Leer el contenido del archivo JSON
            $jsonFile = file_get_contents('carreras.json');
            
            // Decodificar el JSON a un array asociativo
            $datos = json_decode($jsonFile, true);
    
            // Iterar sobre las categorías
            foreach ($datos['carrerasT'] as $categoria) {
                echo '<option value="' . $categoria['id'] . '">' . $categoria['nombre'] . '</option>';
            }
            ?>
        </select>
        </div>
    <div class="mb-3">
        <label class="form-label"  for="edad">Carrera:</label>
        <select class="form-select"  id="opciones" name="opciones"  required >
        </select>
        </div>
        <br>
        <input class="btn btn-outline-success" type="submit" value="Enviar">
    </form>

    <script>
            document.getElementById('opcionesC').addEventListener('change', function() {
                var categoriaId = this.value;
                console.log(categoriaId);
                var opciones = <?php 
                echo json_encode($datos['opciones']); 
                ?>;
                
                // Obtener el elemento de selección de opciones
                var opcionSelect = document.getElementById('opciones');
                                
                // Limpiar las opciones existentes
                opcionSelect.innerHTML = '';

                // Habilitar o deshabilitar el segundo select según la selección de la categoría
                opcionSelect.disabled = (categoriaId === '');

                // Llenar las opciones del segundo select según la categoría seleccionada
                if (opciones[categoriaId]) {
                    opciones[categoriaId].forEach(function(opcion) {
                        var optionElement = document.createElement('option');
                        optionElement.value = opcion.id;
                        optionElement.textContent = opcion.nombre;
                        opcionSelect.appendChild(optionElement);
                    });
                }
            });
        </script>


</body>
</html>
