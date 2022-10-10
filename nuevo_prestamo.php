<?php
require('data/bdatos.php');


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo 'Enviado por el método post';
    $alumno = $_POST ['alumno'];
    $libro = $_POST ['libro'];
    $fechaPrestamo = $_POST ['fechaPrestamo'];
    $horaPrestamo = $_POST ['horaPrestamo'];
    $tipo_prestamo = $_POST ['tipo_prestamo'];
    $fechaEntrega = $_POST ['fechaEntrega'];
    $horaEntrega = $_POST ['horaEntrega'];


    $sql = "INSERT INTO `prestamo`( `id_alumno`, `id_libro`,`fechaPrestamo`,`horaPrestamo`,`id_tipo_prestamo`,
    `fechaEntrega`,`horaEntrega`,`estado`) 
    VALUES ('$alumno','$libro','$fechaPrestamo','$horaPrestamo','$tipo_prestamo','$fechaEntrega','$horaEntrega','1')";

    
$resultado = $db->query($sql);
if($resultado){
    header ('location:prestamo.php');
}
exit;

}


///PARA EL CASO DE AUTOR 
$sql = "SELECT * FROM alumno";
$resultado = $db->query($sql);           
$alumnos = [];                       
while($tipo = $resultado->fetch_assoc()){  
$alumnos[] = $tipo;                  
}  


////PARA EL CASO DE EDITORIAL 
$sql = "SELECT * FROM libro";
$resultado = $db->query($sql);    

$libros = [];                     
while($tipo = $resultado->fetch_assoc()){  
    $libros[] = $tipo;            
    }                                      

    ////PARA EL CASO DE CATEGORIA 
$sql = "SELECT * FROM tipo_prestamo";
$resultado = $db->query($sql);    

$tipos_prestamo = [];                     
while($tipo = $resultado->fetch_assoc()){  
    $tipos_prestamo[] = $tipo;            
    }   



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRESTAMO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous">    
</head>
<body>
    <div class="container">
        <h1>Nuevo Registro</h1>
        <form method= "POST">
            <div class="mb-3">
                <label for="alumno"class="form-label">Alumno:</label>
                <select class="form-control" id="alumno" name="alumno">
                    <option value="0">--SELECIONE--</option>
                    <?php
                    foreach ($alumnos as $tipo):           
                    ?>
                    
                    <option value="<?php echo $tipo ['id'] ?>">
                    <?php echo $tipo['nombres']?> 
                </option>
                    <?php        
                    endforeach;

                ?>   

            </select>
            </div>

            <div class="mb-3">
                <label for="libro" class="form-label-">Libro:</label>
                <select class="form-control" id="libro" name="libro">
                    <option value="0">--SELECIONE--</option>
                    <?php
                     foreach ($libros as $tipo):
                    ?>

                    <option value="<?php echo $tipo ['id'] ?>"> 
                    <?php echo $tipo['titulo']?></option>
                    <?php
                    endforeach;
                    ?>

            </select>
            </div>

            <div class="mb-3">
                <label for="fechaPrestamo" class="form-label">Fecha_Prestamo:</label>
                <input type="date" name= "fechaPrestamo" id="fechaPrestamo" class="form-control">     
            </div>

            <div class="mb-3">
                <label for="horaPrestamo" class="form-label">Hora_Prestamo:</label>
                <input type="time" name= "horaPrestamo" id="horaPrestamo" class="form-control">     
            </div>

            <div class="mb-3">
                <label for="tipo_prestamo"class="form-label-">Tipo_Prestamo:</label>
                <select class="form-control" id="tipo_prestamo" name="tipo_prestamo">
                    <option value="0">--SELECIONE--</option>
                    <?php
                     foreach ($tipos_prestamo as $tipo):
                    ?>

                    <option value="<?php echo $tipo ['id'] ?>"> 
                    <?php echo $tipo['tipo']?></option>
                    <?php
                    endforeach;
                    ?>

            </select>
            </div>

            <div class="mb-3">
                <label for="fechaEntrega" class="form-label">Fecha_Entrega:</label>
                <input type="date" name= "fechaEntrega" id="fechaEntrega" class="form-control">     
            </div>

            <div class="mb-3">
                <label for="horaEntrega" class="form-label">Hora_Entrega:</label>
                <input type="time" name= "horaEntrega" id="horaEntrega" class="form-control">     
            </div>

            <input type="submit" value="Guardar" class="btn btn-primary">

                </form>
                </div>
</body>
</html>