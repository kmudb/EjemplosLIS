<?php

class Persona {
    public $nombre;
    public $edad;
    public $carnet;
    public $carrera;

    public function __construct($nombre, $edad, $carnet, $carrera, $carreraT) {
        $this->setNombre($nombre);
        $this->setEdad($edad);
        $this->setCarnet($carnet);
        $this->setCarrera($carrera);
        $this->setCarreraT($carreraT);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getCarnet() {
        return $this->carnet;
    }

    public function getCarrera() {
        return $this->carrera;
    }

    public function getCarreraT() {
        return $this->carreraT;
    }

    public function setNombre($nombre) {
        // Validar el nombre con una expresión regular
        if (preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
            $this->nombre = $nombre;
        } else {
            die("Error: Nombre no puede contener numeros ");
        }
    }

    public function setEdad($edad) {
        // Validar la edad con una expresión regular
        if (preg_match('/^(1[8-9]|[2-5][0-9]|60)$/', $edad)) {
            $this->edad = $edad;
        } else {
            die("Error: La edad debe ser de 18 a 60 años.");
        }
    }

    public function setCarrera($carrera) {
        $this->carrera = $carrera;
    }

    public function setCarreraT($carreraT) {
        $this->carreraT = $carreraT;
    }

    public function setCarnet($carnet){
                // Validar la carnet con una expresión regular
                if (preg_match('/^[A-Z]{2}\d{6}$/', $carnet)) {
                    $this->carnet = $carnet;
                } else {
                    die("Error: No cumple formato [AA000000]");
                }
    }
}

?>
