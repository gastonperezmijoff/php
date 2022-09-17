<?php

include_once("config.php");
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
            <a href="cliente-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>


        <div class="col-6 form-group">
            <label for="txtNombre">Nombre</label>
            <input type="select" require class="form-control" name="txtNombre" id="txtNombre">

        </div>
        <div class="col-6 form-group">
            <label for="lstTipoproducto">Tipo de producto</label>
            <select name="lstTipoproducto" id="lstTipoproducto" require class="form-control">
                <option disabled selected> Seleccionar</option>
            </select>
        </div>

        <div class="col-6 form-group">
            <label for="txtCantidad">Cantidad</label>
            <input type="select" require class="form-control" name="txtcantidad" id="txtcantidad">
        </div>
        <div class="col-6 form-group">
            <label for="txtPrecio">Precio</label>
            <input type="select" require class="form-control" name="txtPrecio" id="txtPrecio">
        </div>

        <div class="col-12 form-group">
            <label for="txtCorreo">Descripcion</label>
            <textarea type="text" name="txtDescripcion" id="txtdescripcion" class="form-control"></textarea>
            <script>
        ClassicEditor
            .create(document.querySelector('#txtDescripcion'))
            .catch(error => {
                console.error(error);
            });
    </script>
        </div>
    </div>





</div>




</body>




</html>