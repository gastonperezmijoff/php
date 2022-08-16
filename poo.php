<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
    public $dni;
    public $nombre;
    public $edad;
    public $nacionalidad;
    public function imprimir(){}
}

class Alumno extends Persona{
    public $legajo;
    public $notaPorfolio;
    public $notaPhp;
    public $notaProyecto;


    public function __construct()
    {
        $this -> notaPorfolio = 0.0;
        $this -> notaPhp = 0.0;
        $this -> notaProyecto = 0.0;
    }

    public function imprimir(){
        echo "Nombre: " . $this -> nombre . "<br>";
        echo "Nota Porfolio: " . $this -> notaPorfolio . "<br>";
        echo "Nota PHP: " . $this -> notaPhp . "<br>";
        echo "Nota Proyecto: " . $this -> notaProyecto . "<br>";
        echo "Nota Promedio: " . number_format($this -> calcularPromedio(), "2", ".", ",") . "<br><br>" ;
    }

    public function calcularPromedio(){
        $promedio = 0;
        $promedio = ($this->notaPorfolio + $this->notaProyecto + $this->notaPhp)/3;
           return $promedio;
        }

    }


class Docente extends Persona{

    public $especialidad;
    public function imprimir(){}
    public function imprimirEspecialidadesHabilitadas(){}
}

$alumno1 = new Alumno();
$alumno1 -> nombre = "Gaston";
$alumno1 -> notaPorfolio = "9.5";
$alumno1 -> notaPhp = "9";
$alumno1 -> notaProyecto = "10";
$alumno1 -> imprimir();



?>