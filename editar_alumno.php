<?php
require('data/bdatos.php');

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $nombres = $_POST['nombres'];
    $carrera = $_POST['carrera'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];



    $sql = "UPDATE alumno SET nombres = '$nombres', id_carrera = '$carrera', direccion = '$direccion', 
    email = '$email', telefono = '$telefono'
                WHERE id = $id";

    $resultado = $db->query($sql);
    if($resultado){
        header('location:alumno.php');
    }
    exit;
}



$sql = "SELECT * FROM alumno WHERE id = $id";
$resultado = $db->query($sql);
$alumno = $resultado->fetch_assoc();

//CARRERA//
$sql = "SELECT * FROM carrera";
$resultado = $db->query($sql);
$carreras= [];
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
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Editar Alumnos</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $alumno['nombres'] ?>">
            </div>

            

            <div class="mb-3">
                <label for="carrera" class="form-label">CARRERA:</label>
                <select class="form-control" id="carrera" name="carrera">
                    <option value="0">--SELECCIONE--</option>
                    <?php
                    foreach($carreras as $tipo):
                    ?>
                        <option value="<?php echo $tipo['id'] ?>" 
                            <?php echo $tipo['id'] === $alumno['id_carrera'] ? 'selected': ''?>>
                            <?php echo $tipo['nombre'] ?>
                        </option>
                    <?php
                    endforeach;
                    ?>
                    

                </select>
            </div>


            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" name="direccion" id="direccion" 
                    class="form-control" value="<?php echo $alumno['direccion'] ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" name="email" id="email" 
                    class="form-control" value="<?php echo $alumno['email'] ?>">
            </div>


            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="text" name="telefono" id="telefono" 
                    class="form-control" value="<?php echo $alumno['telefono'] ?>">
            </div>

    


   
            <input type="submit" value="Grabar" class="btn btn-primary">
           
        </form>
    </div>
</body>

</html>