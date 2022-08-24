<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Cliente {
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    public function imprimir(){
        echo "Dni" . $this -> dni . "<br>";
        echo "Nombre" . $this -> nombre . "<br>";
        echo "Correo" . $this -> correo . "<br>";
        echo "Telefono" . $this -> telefono . "<br>";
        echo "Descuento" . $this -> descuento . "<br><br>";
    }

    public function __construct()
    {
        $this -> descuento = 0.0;
    }

    public function __get($propiedad){
        return $this->$propiedad;
   }

   public function __set($propiedad, $valor){
       $this -> $propiedad = $valor;
   }

    }



class Producto {
    private $codigo;
    private $nombre;
    private $descripcion;
    private $precio;
    private $iva;

    public function imprimir(){
        echo "Codigo" . $this -> codigo . "<br>";
        echo "Nombre" . $this -> nombre . "<br>";
        echo "Descripcion" . $this -> descripcion . "<br>";
        echo "Iva" . $this -> iva . "<br><br>";
    }

    public function __construct()
    {
        $this -> precio = 0.0;
        $this -> iva = 0.0;
    }

    public function __get($propiedad){
        return $this->$propiedad;
   }

   public function __set($propiedad, $valor){
       $this -> $propiedad = $valor;
   }

    }

class Carrito {
    private $cliente;
    private $aProductos;
    private $subTotal;
    private $total;

    public function __construct()
    {
        $this -> aProductos = array();
        $this -> subTotal = 0.0;
        $this -> total = 0.0;
    }



    public function cargarProducto($producto){
        $this -> aProductos[] = $producto;
    }

    public function imprimirTicket(){
        echo "<table class='table table-hover border' style='width:400px'>" ;
        echo "<tr><th colspan='2' class='text-center'>ECO MARKET</th></tr>
         <tr>
         <th>Fecha</th>
         <td>" . date("d/m/Y H:i:s") . "</td>
         </tr>
         <tr>
         <th>DNI</th>
         <td>" . $this-> cliente->dni ."</td>
         </tr>
         <tr>
         <th>Nombre</th>
         <td>" . $this-> cliente->nombre . "</td>
         </tr>
         <tr>
         <th colspan='2'>Producto:</th>
         </tr>";
         foreach($this->aProductos as $producto){
            echo "<tr>
                        <td>" . $producto->nombre ."</td>
                        <td>$ " . number_format($producto->precio, 2, ",", ".") . "</td>
                        </tr>";
                        $this->subTotal += $producto->precio;
                        $this->total += $producto->precio * (($producto->iva / 100)+1);

         }
         echo "<tr>
        <th>Subtotal s/iva: </th>
        <td>" . $this->subTotal . "</td>
         </tr>";
         echo "<tr>
         <th>TOTAL:</th>
         <td>" . $this->total . "</td>
          </tr>";

    }




    public function __get($propiedad){
        return $this->$propiedad;
   }

   public function __set($propiedad, $valor){
       $this -> $propiedad = $valor;
   }

    }

$cliente1 = new Cliente();
$cliente1 -> dni = " 34256987";
$cliente1 -> nombre = " Bernabe";
$cliente1 -> correo = " bernabe@gmail.com";
$cliente1 -> telefono = " 1134256987";
$cliente1 -> descuento = " 0.05";

//print_r($cliente1)
//$cliente1 -> imprimir();

$producto1 = new Producto();
$producto1 -> codigo = "ABC56987";
$producto1 -> nombre = "Notebook 15\" HP";
$producto1 -> descripcion = "es una computadora HP";
$producto1 -> precio = 30.800;
$producto1 -> iva = 21;
//$producto1 -> imprimir();


$producto2 = new Producto();
$producto2 -> codigo = "QW5456464";
$producto2 -> nombre = "Heladera Wirpool";
$producto2 -> descripcion = "Esto es una heladera no froze";
$producto2 -> precio = 70.000;
$producto2 -> iva = 10.5;
//$producto2 -> imprimir() ;

$carrito = new Carrito();
$carrito -> cliente = $cliente1;
//print_r($carrito);
$carrito -> cargarProducto($producto1);
$carrito -> cargarProducto($producto2);
//print_r($carrito);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <?php $carrito -> imprimirTicket(); ?>
            </div>
        </div>

    </main>

    
</body>
</html>