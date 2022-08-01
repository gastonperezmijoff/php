<?php
//Definicion
function promediar($aNumeros){
    $suma = 0;
    foreach ($aNumeros as $aNumero){
        $suma += $aNumero;
    }return $suma / count($aNumero);

}
?>

//Uso
$anotas = array(8, 4, 5, 3, 9, 1);
echo "El promedio es" . promediar($aNotas) . "<br>";

?>

