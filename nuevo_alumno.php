<?php
require 'data/bdatos.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nombres = $_POST ['nombres'];
    $carrera = $_POST ['carrera'];
    $direccion = $_POST ['direccion'];
    $email = $_POST ['email'];
    $telefono = $_POST ['telefono'];


    $sql = "INSERT INTO `alumno`( `nombres`, `id_carrera`, `direccion`, 
    `email`, `telefono`, `estado`) 
    VALUES ('$nombres','$carrera','$direccion','$email',
    '$telefono','1')";

$resultado = $db->query($sql);
if($resultado){
    header ('location:alumno.php');
}
exit;
}


///PARA EL CASO DE CARRERA 
$sql = "SELECT * FROM carrera";
$resultado = $db->query($sql);           
$carreras = [];                       
while($tipo = $resultado->fetch_assoc()){  
$carreras[] = $tipo;                  
}  




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ALUMNO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous">    
</head>
<body>
    <div class="container">
        <h1>Nuevo Registro</h1>
        <form method= "POST">
        <div class="mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" name= "nombres" id="nombres" class="form-control">     
            </div>

            <div class="mb-3">
                <label for="carrera" class="form-label">Carrera:</label>
                <select class="form-control" id="carrera" name="carrera">
                    <option value="0">--SELECIONE--</option>
                    <?php
                    foreach ($carreras as $tipo):           
                    ?>
                    
                    <option value="<?php echo $tipo ['id'] ?>">
                    <?php echo $tipo['nombre']?> 
                </option>
                    <?php        
                    endforeach;

                ?>   
        

            </select>
            </div>


            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" name="direccion" id="direccion" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo:</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control">
            </div>

 
            <input type="submit" value="Grabar" class="btn btn-primary">

                </form>
                </div>
</body>
</html>