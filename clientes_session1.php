<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(isset($_SESSION["listadoClientes"])){
    //Si existe la variable de session listadoClientes asigno su contenido a aClientes
    $aClientes = $_SESSION["listadoClientes"];
    }else {
        $aClientes = array();
    }


if($_POST){

//Si hace click en enviar entonces
if(isset($_POST["btnEnviar"])){

//Asignamos en variables los datos que vienen del formulario

$nombre = $_POST["txtNombre"];
$dni = $_POST["txtDni"];
$telefono = $_POST["txtTelefono"];
$edad = $_POST["txtEdad"];

//Creamos un array que contendrá el listado de clientes

$aClientes[] = array("nombre" => $nombre,
                     "dni" => $dni,
                     "telefono" => $telefono,
                     "edad" => $edad);

//Actualiza el contenido de variable de session

$_SESSION["listadoClientes"] = $aClientes;

}

//Si hace click en eliminar
if(isset($_POST["btnEliminar"])){
    session_destroy() ; 
    $aClientes = array();
}
if(isset($_POST["btnEliminar_1"])){

}

}
if(isset($_GET["pos"])){
//Recupero el dato que viene por la query string via get
    $pos = ($_GET["pos"]);
    unset($aClientes[$pos]);
//Actualizo la variable de session con el array actualizado
    $_SESSION["listadoClientes"] = $aClientes;
    header("Location: clientes_session1.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <main class="container">
        <div class="row text-center py-5">
            <div class="col-12">
                <h1>Listado de clientes</h1>
            </div>
        </div>
        <form action="" method="POST">
        <div class="row">
            <div class="col-4">

                <div class="pb-3">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control my-2" placeholder="Ingrese el nombre y apellido">
                </div>

                <div class="pb-3">
                    <label for=" txtDni">DNI:</label>
                    <input type="text" name="txtDni" id="txtDni" class="form-control my-2">
                </div>

                <div class="pb-3">
                    <label for=" txtTelefono">Telefono::</label>
                    <input type="text" name="txtTelefono" id="txtTelefono" class="form-control my-2">
                </div>

                <div class="pb-3">
                    <label for="txtEdad">Edad:</label>
                    <input type="number" name="txtEdad" id="txtEdad" class="form-control my-2">
                </div>
                <div class="pb-3">
                    <button class="btn btn-primary" name="btnEnviar" id="btnEnviar">Enviar</button>
                    <button type="submit" name="btnEliminar" id="btnEliminar" class="btn bg-danger text-white">Eliminar</button>

                </div>
                
                
            </div>


            <div class="col-5 offset-1 mt-4">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Telefono:</th>
                            <th>Edad:</th>
                            <th>Acciones:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aClientes as $pos => $cliente): ?>
                        <tr>
                            <th><?php echo $cliente["nombre"]; ?></th>
                            <th><?php echo $cliente["dni"]; ?></th>
                            <th><?php echo $cliente["telefono"]; ?></th>
                            <th><?php echo $cliente["edad"]; ?></th>
                            <th><a href="clientes_session1.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash-fill"></button></i></a></th>
                        </tr>
                        <?php endforeach ; ?>
                    </tbody>

                </table>
            </div>
        </div>
        </form>     

    </main>
</body>

</html>