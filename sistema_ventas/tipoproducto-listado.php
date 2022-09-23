<?php

include_once("config.php");

include_once("entidades/tipoproducto.php");

$pg = "Listado de tipo de producto";

$tipoProducto = new TipoProducto();
$aTipoProductos = $tipoProducto->obtenerTodos();

include_once("header.php");
?>

<div class="container-fuid">

    <h1 class="h3 mb-4 text-gray-800">Listado de productos</h1>

    <div class="row">
        <div class="col-12 mb-2">
            <a href="tipoproducto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
        </div>
    </div>

    <table class="table border-hover border">
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <tr><?php foreach ($aTipoProductos as $tipoProducto) : ?>
                <td><?php echo $tipoProducto->nombre; ?></td>
                <td><a href="tipoproducto-formulario.php?id=<?php echo $tipoProducto->idtipoproducto;?>"> <i class="fas fa-pen-square"></i></a></td>
        </tr><?php endforeach ?>
</div>
</table>