<?php
require "data/bdatos.php";

$sql = "SELECT A.id,titulo, B.nombre AS autor, C.nombre AS editorial, D.nombre As categoria
FROM Libro A INNER JOIN autor B
ON A.id_autor = B.id INNER JOIN editorial C 
ON A.id_editorial = C.id INNER JOIN categoria D
ON A.id_categoria = D.id;";

$resultado = $db->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBROS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
    crossorigin="anonymous">
</head>
<body>
    <div class="container">
<h1>Registro Libros </h1>
<hr></hr>
<a href="nuevo_libro.php" class="btn btn-secondary"><img src="img/registro.png">Nuevo</a>
<a href="consulta_libro.php" class="btn btn-primary"><img src="img/consulta.png">Consultar</a>

<table class="table">
    <thead>
        <tr>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Editorial</th>
        <th>Categoria</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($libro = $resultado->fetch_assoc()):
        ?>
         <tr>
                            <td><?php echo $libro['titulo']?></td>
                            <td><?php echo $libro['autor']?></td>
                            <td><?php echo $libro['editorial']?></td>
                            <td><?php echo $libro['categoria']?></td>
                            <td>
                            <a href="editar_libro.php?id=<?php echo $libro['id'];?>" class="btn btn-primary"><img src="img/editar (1).png">Editar</a>
                            <th><a href="eliminar_libro.php?id=<?php echo $libro['id']; ?>" class="btn btn-danger"><img src="img/eliminar.png">Eliminar</a></th>
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