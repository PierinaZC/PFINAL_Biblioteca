<?php
require('data/bdatos.php');

$id = $_GET['id']; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo 'Enviado por el método post';
    $nombre = $_POST ['nombre'];
    $direccion = $_POST ['direccion'];


    $sql = "UPDATE editorial SET nombre = '$nombre', direccion = '$direccion'
                WHERE id = $id";

    
$resultado = $db->query($sql);
if($resultado){
    header ('location:editorial.php');
}
exit;

}
$sql = "SELECT * FROM editorial WHERE id = $id";
$resultado = $db->query($sql);
$editorial = $resultado->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> AUTOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous">    
</head>
<body>
    <div class="container">
        <h1>Nuevo Registro</h1>
        <form method= "POST">
        <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name= "nombre" id="nombre" class="form-control"  value="<?php echo $editorial['nombre'] ?>">     
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" name= "direccion" id="direccion" class="form-control"  value="<?php echo $editorial['direccion'] ?>">     
            </div>

           
            <input type="submit" value="Guardar" class="btn btn-primary">

                </form>
                </div>
</body>
</html>