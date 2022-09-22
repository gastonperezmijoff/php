<?php

include_once("config.php"); 

include_once("entidades/tipoproducto.php"); 

$pg = "Listado de tipo de producto";

$tipoProducto = new TipoProducto ();
$aTipoProductos = $tipoProducto ->obtenerTodos();

include_once("header.php");
?>