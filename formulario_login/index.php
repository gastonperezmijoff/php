<?php

if($_POST){

$usuario = $_REQUEST["txtUsuario"];
$clave = $_REQUEST["txtClave"];


/*SI USUARIO ES DISTINTO DE VACIO Y CLAVE ES DISTINTO DE VACIO, ENTONCES: */

if($usuario != "" & $clave != ""){
    header("location: acceso-confirmado.php");
} else {
    $mensaje = "valido para usuarios registrados.";
}

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row pt-3">
            <div class="col-6">
                <h1>Formulario</h1>
            </div>
            <div class="row py-3">
                <div class="col-6">

                 <?php if (isset($mensaje)): ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $mensaje; ?>
                    </div>
                 <?php endif; ?>

                    <form action="" method="POST">
                <label for="txtUsuario">Usuario:</label>
                <input class="form-control" type="text" name="txtUsuario" id="txtUsuario">
                </div>
            </div>
        </div>
            <div class="row py-3">
                <div class="col-6">
                <label for="txtClave">Clave:</label>
                <input class="form-control" type="password" name="txtClave" id="txtClave">
                </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Ingresar</button>
            </div>
            </form>


    </main>


</body>

</html>