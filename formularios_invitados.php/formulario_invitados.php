<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Si esxiste el archivo de invitados lo vamos a abrir y cargamos en una voriable del tipo array
//Los dni permitodos 

//Sino el array queda como vacio

if( file_exists("invitados.txt")){
    $archivo = fopen("invitados.txt", "r");
    $aDocumentos = fgetcsv($archivo, 0, ",");


}else{
    $aDocumentos = array();
}



if($_POST){
    
    if(isset($_POST["btnDni"])){
        //Si el dni ingresado se encuentra en la lista, se mostrara un mensaje de bienvenido
        $dni = $_REQUEST["txtDni"];

        if(in_array($dni, $aDocumentos)){

            $mensaje = "Bienvenid@.";

        }else{
        //Sino se mostrara un mensaje No se encuentra en la lista de invitados

        $mensaje = "No se encuentra en la lista de invitados";
        }

    }else{
        
    }


    if(isset($_POST["btnVip"])){
        //Si el codigo es "verde" entoncecs mostrara su codigo de acceso es ...
        $vip = $_REQUEST["txtVip"];

        if($vip == "verde"){
            $mensaje = "Su codigo de acceso es " . rand(1000, 9999);
        }else{
            $mensaje = "Usted no posee pase VIP";
        }
        //Sino Ud. no tiene pase VIP


}


}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <form action="" method="POST"  enctype="multipart/form-data">
            <div class="col-12 my-4 ">
                <h1>Lista de invitados</h1>
                <p>Complete el siguiente formulario</p>
                <?php echo $mensaje ; ?>

            </div>
            <div class="col-12">
                <label for="txtDni">Ingrese el DNI:</label>
                <input type="text" name="txtDni" id="txtDni" class="form-control mb-1">
                <input type="submit" name="btnDni" class="btn btn-primary" value="verificar invitado">

            </div>
            <div class="col-12">
            <label for="txtVip">Ingrese el codigo secreto para el pase VIP:</label>
                <input type="text" name="txtVip" id="txtVip" class="form-control mb-1">
                <input type="submit" name="btnVip" class="btn btn-primary" value="verificar codigo">

            </div>
        </div>
        </form>
    </main>
    
</body>
</html>





