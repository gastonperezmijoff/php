<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definicion
function print_f($variable){
    if(is_array($variable)){
        $archivo = fopen('datos.txt', 'a+');
        //Si es un array, lo recorro y lo guardo el contenido en el archivo "datos.txt"
        fwrite($archivo, "datos del array==>");

        foreach($variable as $item){
            fwrite($archivo, "\n" . $item);
        }
        fclose($archivo);


//...........
    }else{ 
//Entonces es string, guardo el contenido en el archivo "datos.txt"
        file_get_contents("datos.txt", $variable);
}echo "Archivo generado"
}
//uso
$aNotas = array (8,5,7,9,10);
$msj = "Este es un mensaje";
print_f($aNotas);