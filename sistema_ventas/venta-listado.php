<?php

include_once("config.php");
include_once("header.php");

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4 text-gray-800">Listado de ventas</h1>
        </div>
        <div class="col-12 mb-3">
            <a href="venta-listado.php" class="btn btn-primary mr-2">Nuevo></a>
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
            </thead>
            </table>
        </div>