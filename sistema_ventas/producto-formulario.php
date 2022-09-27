<?php

include_once("config.php");

include_once("entidades/producto.php"); 
include_once("entidades/tipoproducto.php"); 

$pg = "Producto formulario";

$producto = new Producto();

if($_POST){
    if(isset($_POST["btnGuardar"])){

        $producto->cargarFormulario($_REQUEST);

        if (isset($_GET["id"]) && $_GET["id"] > 0 ){
            $producto->actualizar();
            $msg["texto"] = "Actualizado correctamente";
            $msg["codigo"] = "alert-success";
            }else{           
            $producto->insertar();
            $msg["texto"] = "Insertado correctamente";
            $msg["codigo"] = "alert-danger";     
            }   
    }else if(isset($_POST["btnBorrar"])){
        $producto->cargarFormulario($_REQUEST);
        $producto->eliminar();
        header("Location: producto-listado.php");
    }
}

if(isset($_GET["id"]) && $_GET["id"] > 0 ){
    $producto ->cargarFormulario($_REQUEST);
    $producto ->obtenerPorId();
}

$tipoproducto = new TipoProducto();
$aTipoProductos = $tipoproducto->obtenerTodos();

$producto = new Producto();
$aProductos = $producto->obtenerTodos();

include_once("header.php");
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Productos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 form-group">
            <a href="cliente-listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>


        <div class="col-6 form-group">
            <label for="txtNombre">Nombre</label>
            <input type="text" require class="form-control" name="txtNombre" id="txtNombre">

        </div>
        <div class="col-6 form-group">
            <label for="lstTipoproducto">Tipo de producto</label>
            <select name="lstTipoproducto" id="lstTipoproducto" require class="form-control">
                <option disabled selected> Seleccionar</option>
                <?php foreach ($aTipoProductos as $tipoProducto):  ?>
                    <option value="<?php echo $tipoProducto->idtipoproducto; ?>"><?php echo $tipoProducto->nombre ;?></option>
                    <?php endforeach ?>
            </select>
        </div>

        <div class="col-6 form-group">
            <label for="txtCantidad">Cantidad</label>
            <input type="number" require class="form-control" name="txtCantidad" id="txtCantidad">
        </div>
        <div class="col-6 form-group">
            <label for="txtPrecio">Precio</label>
            <input type="text" require class="form-control" name="txtPrecio" id="txtPrecio">
        </div>

        <div class="col-12 form-group">
            <label for="txtDescripcion">Descripcion</label>
            <textarea type="text" name="txtDescripcion" id="txtDescripcion" class="form-control"></textarea>
            <script>
        ClassicEditor
            .create(document.querySelector('#txtDescripcion'))
            .catch(error => {
                console.error(error);
            });
    </script>
        </div>
        <div class="col-6">
                <label for="fileImagen">Imagen:</label>
                <input type="file" class="form-control-file" name="imagen" id="imagen" >

        </div>
    </div>

</div>




</body>




</html>