<?php

include_once("config.php");
include_once "entidades/venta.php";
include_once "entidades/producto.php";
include_once "entidades/cliente.php";

$pg = "Listado de ventas";

$venta = new Venta();
$aVentas = $venta->cargarGrilla();

include_once("header.php");

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4 text-gray-800">Listado de ventas</h1>
        </div>
        <div class="col-12 mb-3">
            <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
        </div>
        <div class="col-12">
            <table class="table border-hover border">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach($aVentas as $venta): ?>
                    <tr>
                    <td><?php echo date_format(date_create($venta->fecha), "d/m/Y H:i"); ?></td>
                    <td><?php echo $venta->cantidad; ?></td>
                    <td><?php echo $venta->nombre_producto;?></td>
                    <td><?php echo $venta->nombre_cliente;?></td>
                    <td><?php echo number_format($venta->total, 2, ',', '.') ; ?></td>
                    <td style="width: 110px;">
                    <a href="venta-formulario.php?id=<?php echo $venta->idventa; ?>"><i class="fas fa-search"></i></a>
                </td>
                <?php endforeach; ?>
                    </tr>
            </thead>
            </table>
        </div>