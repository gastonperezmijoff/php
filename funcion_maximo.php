<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function maximo($aVector){
    $valorMaximo = 0;
    foreach($aVector as $valor){
       if ($valorMaximo < $valor){
       $valorMaximo = $valor;
       }
    } return $valorMaximo;

}




$aNotas = array (8, 5, 4, 3, 9, 1);
$aSueldo = array (800.30, 500.45, 3000, 900, 100, 900, 1800);

echo "el numero maximo es " . maximo($aNotas) . "<br>";
echo "el numero maximo es " . maximo($aSueldo) . "<br>";

?>