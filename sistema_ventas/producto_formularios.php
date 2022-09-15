<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto formulario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h1>Productos</h1>
            </div>
            <form action="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-12">
                        <a href="cliente-listado.php" class="btn btn-primary mr-2">Listado</a>
                        <a href="cliente-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                        <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
                        <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="txtNombre">Nombre</label>
                        <input type="select" require class="form-control" name="txtNombre" id="txtNombre">

                    </div>
                    <div class="col-6">
                        <label for="lstTipoproducto">Tipo de producto</label>
                        <select name="lstTipoproducto" id="lstTipoproducto" require class="form-control">
                            <option disabled selected> Seleccionar</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="txtCantidad">Cantidad</label>
                        <input type="select" require class="form-control" name="txtcantidad" id="txtcantidad">
                    </div>
                    <div class="col-6">
                        <label for="txtPrecio">Precio</label>
                        <input type="select" require class="form-control" name="txtPrecio" id="txtPrecio">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="txtDescripcion">Descripcion</label>
                        </div>
                    </div>
            </form>
        </div>

    </main>


</body>

</html>