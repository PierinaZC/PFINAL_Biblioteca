<?php
require "data/bdatos.php";


$sql = "SELECT A.id,A.nombres,A.direccion,A.email,A.telefono, B.nombre AS carrera
FROM alumno A INNER JOIN carrera B
ON A.id_carrera = B.id;";

$resultado = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALUMNO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous">
</head>
<body>
    <div class="container">
<h1>Registro Alumnos </h1>
<hr></hr>
<a href="nuevo_alumno.php" class="btn btn-secondary"><img src="img/registro.png">Nuevo</a>
<a href="consulta_alumno.php" class="btn btn-primary"><img src="img/consulta.png">Consultar</a>
<table class="table">
    <thead>
        <tr>
        <th>Nombre</th>
        <th>Carrera</th>
        <th>Direccion</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($alumno = $resultado->fetch_assoc()):
        ?>
         <tr>
                            <td><?php echo $alumno['nombres']?></td>
                            <td><?php echo $alumno['carrera']?></td>
                            <td><?php echo $alumno['direccion']?></td>
                            <td><?php echo $alumno['email']?></td>
                            <td><?php echo $alumno['telefono']?></td>
             
                            <td>
                            <a href="editar_alumno.php?id=<?php echo $alumno['id'];?>" class="btn btn-primary"><img src="img/editar (1).png">Editar</a>
                            <th><a href="eliminar_alumno.php?id=<?php echo $alumno['id']; ?>" class="btn btn-danger"><img src="img/eliminar.png">Eliminar</a></th>
                            </td>
                        </tr>
                        <?php
                        endwhile;
                        ?>
                        </tbody>    
                </table>
                <a href="index.php"class="btn btn-secondary"><img src="img/atras.png">Regresar</a>
                    </div>
            </boy>
        </html> 