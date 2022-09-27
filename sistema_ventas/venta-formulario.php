<?php

include_once("config.php");
include_once("entidades/cliente.php");
include_once("entidades/producto.php");
include_once("entidades/venta.php");

$pg = "Formulario ventas";


$venta = new Venta();

if($_POST){
    if(isset($_POST["btnGuardar"])){

        $venta->cargarFormulario($_REQUEST);

        if (isset($_GET["id"]) && $_GET["id"] > 0 ){
            $venta->actualizar();
            $msg["texto"] = "Actualizado correctamente";
            $msg["codigo"] = "alert-success";
            }else{           
            $venta->insertar();
            $msg["texto"] = "Insertado correctamente";
            $msg["codigo"] = "alert-success";     
            }   
    }else if(isset($_POST["btnBorrar"])){
        $venta->cargarFormulario($_REQUEST);
        $venta->eliminar();
        header("Location: venta-listado.php");
    }
}

if(isset($_GET["id"]) && $_GET["id"] > 0 ){
    $venta ->cargarFormulario($_REQUEST);
    $venta ->obtenerPorId();
}

$cliente = new Cliente();
$aClientes = $cliente->obtenerTodos();

$producto = new Producto();
$aProductos = $producto->obtenerTodos();

include_once("header.php");

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            <h1 class="h3 mb-4 text-gray-800">Venta</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 form-group">
            <a href="venta-listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="venta-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
        <div class="col-12 form-group">
            <label for="txtFecha" class="d-block">Fecha y hora</label>
            <select class="form-control d-inline" name="txtDia" id="txtDia" style="width: 80px">
                <option selected="" disabled="">DD</option>
                <?php for($i=1; $i<=31; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
            </select>
            <select class="form-control d-inline" name="txtMes" id="txtMes" style="width: 80px">
                <option selected="" disabled="">MM</option>
                <?php for($i=1; $i<=12; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
            </select>

            <select class="form-control d-inline" name="txtAnio" id="txtAnio" style="width: 100px">
                <option selected="" disabled="">YYYY</option>
                <?php for($i=2020; $i<=date("Y"); $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
            </select>

            <input type="time" require="" class="form-control d-inline" style="width: 120px" name="txtHora" id="txtHora" value="00:00">
        </div>

        <div class="col-6 form-group">
            <label for="lstCliente">Cliente</label>
            <select required="" class="form-control selectpicker" data-live-search="true" name="lstCliente" id="lstCliente">
            <option  disabled selected> Seleccionar</option>
                <?php foreach ($aClientes as $cliente) :  ?>
                    <?php if ($cliente->idcliente == $venta->fk_idcliente) : ?>
                        <option selected value="<?php echo $cliente->idcliente; ?>"><?php echo $cliente->nombre; ?></option>
                    
                        <?php else : ?>
                        <option value="<?php echo $cliente->idcliente; ?>"><?php echo $cliente->nombre; ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>

        <div class="col-6 form-group">
            <label for="lstProducto">Producto</label>
            <select required="" class="form-control selectpicker" data-live-search="true" name="lstProducto" id="lstProducto">
            <option disabled selected> Seleccionar</option>
                <?php foreach ($aProductos as $producto) :  ?>
                    <?php if ($producto->idproducto == $venta->fk_idproducto) : ?>
                        <option selected value="<?php echo $producto->idproducto; ?>"><?php echo $producto->nombre; ?></option>
                    <?php else : ?>
                        <option value="<?php echo $producto->idproducto; ?>"><?php echo $producto->nombre; ?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>

        <div class="col-6 form-group">
            <label for="txtPrecioUni">Precio unitario:</label>
            <input type="text" required class="form-control" name="txtPrecioUni" id="txtPrecioUni" value="$ 0">
        </div>
        <div class="col-6 form-group">
            <label for="txtCantidad">Cantidad:</label>
            <input type="text" required class="form-control" name="txtCantidad" id="txtCantidad" value="0">
        </div>
        <div class="col-6 form-group">
            <label for="txtTotal">Total:</label>
            <input type="text" required class="form-control" name="txtTotal" id="txtTotal" value="0">
        </div>