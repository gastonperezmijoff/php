<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Persona {
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;
    public function imprimir(){}

    public function __get($propiedad){
        return $this->$propiedad;
   }

   public function __set($propiedad, $valor){
       $this -> $propiedad = $valor;
   }
}



class Alumno extends Persona{
    private $legajo;
    private $notaPorfolio;
    private $notaPhp;
    private $notaProyecto;


    public function __construct()
{
        $this -> notaPorfolio = 0.0;
        $this -> notaPhp = 0.0;
        $this -> notaProyecto = 0.0;
    }

    public function __get($propiedad){
         return $this->$propiedad;
    }

    public function __set($propiedad, $valor){
        $this -> $propiedad = $valor;
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

    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";

    public function imprimir(){    }

    public function imprimirEspecialidadesHabilitadas(){
        echo "Un docente puede tener las siguientes especialidades: <br>";
        echo "Especialidad 1: " . SELF::ESPECIALIDAD_BBDD . "<br>";
        echo "Especialidad 2: " . SELF::ESPECIALIDAD_ECO. "<br>";
        echo "Especialidad 3: " . SELF::ESPECIALIDAD_WP . "<br>";
    }
}

$alumno1 = new Alumno();
$alumno1 -> nombre = "Gaston";
$alumno1 -> notaPorfolio = "9.5";
$alumno1 -> notaPhp = "9";
$alumno1 -> notaProyecto = "10";
$alumno1 -> imprimir();

$alumno1 = new Alumno();
$alumno1 -> nombre = "Bernabe";
$alumno1 -> notaPorfolio = "9";
$alumno1 -> notaPhp = "8";
$alumno1 -> notaProyecto = "9";
$alumno1 -> imprimir();

$docente1 = new docente();
$docente1 -> nombre = "docente1";
$docente1 -> imprimirEspecialidadesHabilitadas();



?>