<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aEmpleados = array ();
$aEmpleados [] = array("dni" => 33525696, "nombre" => "Florencia Liguori", "bruto" => 85000.30);
$aEmpleados [] = array("dni" => 34548965, "nombre" => "Juan Palote", "bruto" => 90000);
$aEmpleados [] = array("dni" => 35536987, "nombre" => "Luis Liguori", "bruto" => 100000);
$aEmpleados [] = array("dni" => 36145896, "nombre" => "Marcos Rojo", "bruto" => 70000);

function calcularNeto($bruto){
    $neto = $bruto - ($bruto * 0.17);
    return $neto;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Lista de Empleados</h1>
            </div>
            <div class="col-12 py-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Sueldo</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                         
                        for ($i=0; $i < count($aEmpleados); $i ++ ){
                        
                          
        
                        ?>
                        <tr>
                            <td><?php echo $aEmpleados[$i]["dni"]; ?></td>
                            <td><?php echo mb_strtoupper ($aEmpleados[$i]["nombre"]); ?></td>
                            <td><?php echo number_format (calcularNeto ($aEmpleados[$i] ["bruto"]), 2, ",", "."); ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
<div class="row">
    <div class="col-12">
        <p>Cantidad de empleados activos: <?php echo count($aEmpleados); ?> </p>
    </div>
</div>
    </main>

</body>
</html>