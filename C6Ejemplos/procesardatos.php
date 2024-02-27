<?php
$error = "";
$datos_validos = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor del campo de nombre del formulario
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $telefono = htmlspecialchars($_POST["telefono"]);

    // Expresión regular para validar que el nombre contiene solo letras y espacios
    $patron = "/^[a-zA-Z ]+$/";
    $patron_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $patron_telefono = "/^\d{10}$/";

    // Validar el nombre
    if (preg_match($patron, $nombre)) {
        $datos_validos["nombre"] = $nombre;
             // Validar el correo electrónico
        if (preg_match($patron_email, $email)) {
            $datos_validos["email"] = $email;
                // Validar el número de teléfono
                if (preg_match($patron_telefono, $telefono)) {
                    $datos_validos["telefono"] = $telefono;
                } else {
                    $error = "Error en el número de teléfono.<br>";
                }
        } else {
            $error = "Error en el correo electrónico.<br>";
        }
    } else {
        $error = "Error: El nombre debe contener solo letras y espacios.";
    }


    // Si no hay errores, mostrar los datos válidos
    if (empty($error)) {
        echo "Datos válidos:<br>";
        print_r($datos_validos);
    } else {
        echo $error;
    }
}
?>
