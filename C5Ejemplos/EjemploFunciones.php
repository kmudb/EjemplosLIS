<html>
<header>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</header>
<body class="container">
<h2>Formulario:</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
         Nombre:
        <input type="text"   class="form-control" name="nombre" maxlength="50"><br>
    </div>
    <div class="form-group">
         DUI:
        <input type="text"  class="form-control" name="dui" maxlength="50"><br>
    </div>
    <div class="form-group">
         Edad:
        <input type="number" class="form-control" name="edad" max="50" min="18"><br>
    </div>
    <div class="form-group">
    Educacion:
    <select name="educacion" class="form-control">
        <option value="sin-estudios">Sin estudios</option>
        <option value="educacion-obligatoria" selected="selected">Educación Obligatoria</option>
        <option value="formacion-profesional">Formación profesional</option>
        <option value="universidad">Universidad</option>
    </select> <br>
    </div>
    <div class="form-group">
    Nacionalidad:
    <input type="radio" name="nacionalidad" value="hispana">Hispana</input>
    <input type="radio" name="nacionalidad" value="otra">Otra</input><br>
    </div>
    <div class="form-group">
    Idiomas:
    <input type="checkbox" class="form-check-label"  name="idiomas[]" value="español" checked="checked">Español</input>
    <input type="checkbox"  class="form-check-label" name="idiomas[]" value="inglés">Inglés</input>
    <input type="checkbox" class="form-check-label"  name="idiomas[]" value="francés">Francés</input>
    <input type="checkbox" class="form-check-label"  name="idiomas[]" value="aleman">Alemán</input><br>
    </div>
    <div class="form-group">
    Email:
    <input type="text" class="form-control" name="email"><br>
    </div>
    <div class="form-group">
        Sitio Web:
        <input type="text" class="form-control" name="sitioweb"><br>
    </div>
    <input type="submit" name="Guardar" class="btn btn-info" value="Guardar">
    <input type="submit" name="Mostrar" class="btn btn-info" value="Mostrar">
</form>
<?php 
   

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

if(isset($_POST["Guardar"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    if(!isset($_SESSION['data'])){
        $_SESSION['data']=array();
    }
    $dui = filtrado($_POST["dui"]);
    $nombre = filtrado($_POST["nombre"]);
    $edad = filtrado($_POST["edad"]);
    $educacion = filtrado($_POST["educacion"]);
    $nacionalidad = filtrado($_POST["nacionalidad"]);
    // Utilizamos implode para pasar el array a string
    $idiomas = filtrado(implode(", ", $_POST["idiomas"]));
    $email = filtrado($_POST["email"]);
    $sitioweb = filtrado($_POST["sitioweb"]);
    $registro = array($nombre,$edad,$educacion,$nacionalidad,$idiomas,$email,$sitioweb);

    if(isset($_SESSION['data'][$dui])){
        echo "Se modifico los datos del registro con DUI: ".$dui;
    }else{
        echo"Se ingreso correctamente el dato";
    }
        $_SESSION['data'][$dui] =$registro;
}

if(isset($_POST["Mostrar"]) ){
    session_start();
if(count($_SESSION['data'])===0){
echo "No hay datos registrados";
}else{

          echo "<table class='table'>";
        echo"<tr>";
        echo "<th>DUI</th><th>NOMBRE</th><th>EDAD</th><th>EDUCACIÓN</th><th>NACIONALIDAD</th><th>IDIOMAS</th><th>EMAIL</th><th>SITIO WEB</th></th>";
        echo"</tr>";
       
        foreach ($_SESSION['data'] as $key => $value) {
            echo"<tr>";
            echo"<td>".$key."</td>";
            echo"<td>".$value[0]."</td>";
            echo"<td>".$value[1]."</td>";
            echo"<td>".$value[2]."</td>";
            echo"<td>".$value[3]."</td>";
            echo"<td>".$value[4]."</td>";
            echo"<td>".$value[5]."</td>";
            echo"<td>".$value[6]."</td>";
            echo"</tr>";
        }
        echo "</table>";
}}
?>
</body>
</html>

