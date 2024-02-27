<html>
<head>
<title>Encuesta de opinion</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="container">
<h1>Encuesta</h1>
<h3>¿Que opinas de este curso de php?</h3>
<form  method="post">
<input type="radio" name="reply" value="0">
Excelente, he aprendido mucho.<br>
<input type="radio" name="reply" value="1">
Mas o menos, es muy complicado.<br>
<input type="radio" name="reply" value="2">
¡Bah! para que quiero aprender php
<br> <br>
<input name="submit" type="submit" value="vota!">

</form>
</body>
</html>

<?php
    $array = array();
    $a=0;
    $b=0;
    $c=0;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) ) {
//Mostrar el botòn submit solo si el formulario todavia
// no se ha enviado y el usuario no ha votado.

if( isset( $_COOKIE['resultados']) ){
    $var=  $_COOKIE['resultados'];
    $datos= explode(" ",$var);
    $a=$datos[0];
    $b=$datos[1];
    $c=$datos[2];
}
    $reply = $_POST['reply'];
    switch($reply){
    case '0':
    $a++;
    break;
    case '1':
        $b++;
        break;
        case '2':
            $c++;
            break;
    }

    $array=[$a,$b,$c];
    $datos=implode(" ",$array);
    setcookie("resultados",$datos,time() + 3600);
    echo "<p>Gracias por tu voto.</p>\n";
    
echo "<h1>Resultados</h1><br>";
if($a>$b && $a>$c){
    echo "Todos opinan que el curso de php es: Excelente, he aprendido mucho";
}
elseif($b>$c && $b>$a){
echo "Todos oponan que Mas o menos, es muy complicado";
}
elseif($c>$a && $c>$b){
    echo "¡Bah! para que quiero aprender php";
}
else{
    echo "Tenemos empate";
}
}
?>