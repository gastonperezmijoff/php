<?php

include_once("config.php");

include_once("entidades/usuario.php");

$pg = "Listado de usuarios";

$usuario = new Usuario();
$aUsuarios = $usuario->obtenerTodos();

include_once("header.php");
?>

<div class="container-fuid">

    <h1 class="h3 mb-4 text-gray-800">Listado de usuarios</h1>

    <div class="row">
        <div class="col-12 mb-2">
            <a href="usuario-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
        </div>
    </div>

    <table class="table border-hover border">
        <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Accion</th>
        </tr>
        <tr><?php foreach ($aUsuarios as $usuario) : ?>
                <td><?php echo $usuario->usuario; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
                <td><?php echo $usuario->apellido; ?></td>
                <td><?php echo $usuario->correo; ?></td>
                <td><a href="usuario-formulario.php?id=<?php echo $usuario->idusuario;?>"> <i class="fas fa-pen-square"></i></a></td>
        </tr><?php endforeach ?>
</div>
</table>