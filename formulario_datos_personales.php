



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row pt-3 text-center py-5">
            <div class="col-12">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>
            <div class="row py-1">
                <div class="col-12">

                    <form action="resultados.php" method="POST">
                <label for="txtNombre">Nombre:*</label>
                <input class="form-control" type="text" name="txtNombre" id="txtNombre">
                </div>
            </div>
        </div>
            <div class="row py-1">
                <div class="col-12">
                <label for="txtDni">DNI:*</label>
                <input class="form-control" type="text" name="txtDni" id="txtDni">
                </div>
            </div>

            <div class="row py-1">
                <div class="col-12">
                <label for="txtTelefono">Telefono:*</label>
                <input class="form-control" type="text" name="txtTelefono" id="txtTelefono">
                </div>
            </div>
            <div class="row py-1">
                <div class="col-12">
                <label for="txtEdad">Edad:*</label>
                <input class="form-control" type="numbrer" name="txtEdad" id="txtEdad">
                </div>
            </div>
            <div>
                <button class="btn btn-primary mt-3 float-end" type="submit">ENVIAR</button>
            </div>
            </form>


    </main>


</body>

</html>