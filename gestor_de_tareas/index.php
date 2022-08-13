<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(file_exists("archivo.txt")){
    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);
}else
    $aTareas = array();




if(isset($_GET["id"]) && ($_GET["id"]) >= 0) {
    $id = ($_GET["id"]);
}else
    $id = "";



if($_POST){

$prioridad = $_POST["lstPrioridad"];
$usuario = $_POST["lstUsuario"];
$estado = $_POST["lstEstado"];
$titulo = $_POST["txtTitulo"];
$descripcion = $_POST["txtDescripcion"];

//Creamos un array que contendrá el listado


if($id>=0){
    //Actualizo
    $aTareas[$id] = array(
        "fecha" => $aTareas[$id]["fecha"],
        "titulo" => $titulo,
        "prioridad" => $prioridad,
        "usuario" => $usuario,
        "estado" => $estado,  
        "descripcion" =>$descripcion,);

}else 
//sino estoy insertando

$aTareas[] = array(
    "fecha" => date("d/m/Y"),
    "prioridad" => $prioridad,
    "usuario" => $usuario,
    "estado" => $estado,
    "titulo" => $titulo,
    "descripcion" =>$descripcion,
);


//Convertir el array a jSon para almacenarlo en el archivo
$strJson = json_encode($aTareas);

//Almacenamos en el archivo
file_put_contents("archivo.txt", $strJson);


}
if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    unset($aTareas[$id]);

$strJson = json_encode($aTareas);

file_put_contents("archivo.txt", $strJson);

header("location: index.php");

}


?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <main class="container">
        <div class="row my-5">
            <div class="col-12 text-center">
                <h1>Gestor de Tareas</h1>

            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="row mt-5">
            <div class="col-4">
                <label for="lstPrioridad">Prioridad:</label>
                <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                    <option disabled selected>Seleccionar</option>
                    <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta" ? "selected" : "" ;?>>Alta </option>
                    <option value="Media"<?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Media" ? "selected" : "" ;?>>Media</option>
                    <option value="Baja"<?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Baja" ? "selected" : "" ;?>>Baja</option>
                </select>
            </div>

            <div class="col-4">
                <label for="lstUsuario">Usuario:</label>
                <select name="lstUsuario" id="lstUsuario" class="form-control">
                    <option disabled selected>Seleccionar</option>
                    <option value="Ana" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Ana" ? "selected" : "" ;?>>Ana</option>
                    <option value="Bernabe" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Bernabe" ? "selected" : "" ;?>>Bernabe</option>
                    <option value="Daniela" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Daniela" ? "selected" : "" ;?>>Daniela</option>
                </select>
            </div>

            <div class="col-4">
                <label for="lstEstado">Estado:</label>
                <select name="lstEstado" id="lstEstado" class="form-control">
                    <option disabled selected>Seleccionar</option>
                    <option value="Sin asignar" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Sin asignar" ? "selected" : "" ;?>>Sin asignar</option>
                    <option value="Asignado"<?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignado" ? "selected" : "" ;?>>Asignado</option>
                    <option value="En proceso"<?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En proceso" ? "selected" : "" ;?>>En proceso</option>
                    <option value="Terminado"<?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Terminado" ? "selected" : "" ;?>>Terminado</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-2">
                <label for="txtTitulo">Titulo:</label>
                <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" require value="<?php echo isset($aTareas[$id]) ? $aTareas[$id]["titulo"] : ""  ;?>">
            </div>
            <div class="col-12 py-2">
                <label for="txtDescripcion">Descripcion:</label>
                <textarea name="txtDescripcion" id="txtDescripcion" class="form-control"><?php echo isset($aTareas[$id]) ? $aTareas[$id]["descripcion"] : ""  ;?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary m-1">Enviar </button>
                <button type="submit" name="btnCancelar" id="btnCancelar" class="btn btn-secondary">Cancelar</button>
            </div>
            </form>
        </div>
        <?php if(count($aTareas)): ?>
        <div class="row py-5">
            <div class="col-12">
                <table class="table table-hover border">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de Insercion</th>
                        <th>Título</th>
                        <th>Prioridad</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($aTareas as $pos => $tarea): ?>
                    <tr>
                        <td><?php echo $pos; ?></td>
                        <td><?php echo $tarea["fecha"]; ?></td>
                        <td><?php echo $tarea["titulo"]; ?></td>
                        <td><?php echo $tarea["prioridad"]; ?></td>
                        <td><?php echo $tarea["usuario"]; ?></td>
                        <td><?php echo $tarea["estado"]; ?></td>
                        <td>
                        <a href="?id=<?php echo $pos; ?>&do=editar"><i class="bi bi-pencil"></i></a>
                        <a href="?id=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash3-fill"></i></a>
                        </td>

                    </tr>
                        <?php endforeach; ?>                    
                </tbody>
                </table>
            </div>
            <?php else: ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-info" role ="alert" >
                                Aun no se han cargado tareas.
                            </div>
                        </div>
                    </div>
        </div>
<?php endif ?>
    </main>
 
</body>

</html>