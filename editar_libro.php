<?php
require('data/bdatos.php');

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $titulo = $_POST ['titulo'];
    $autor = $_POST ['autor'];
    $editorial = $_POST ['editorial'];
    $categoria = $_POST ['categoria'];


    $sql = "UPDATE libro SET titulo = '$titulo', id_autor = '$autor', id_editorial = '$editorial', 
    id_categoria = '$categoria'
                WHERE id = $id";


    $resultado = $db->query($sql);
    if($resultado){
        header('location:libros.php');
    }
    exit;
}



$sql = "SELECT * FROM libro WHERE id = $id";
$resultado = $db->query($sql);
$libro = $resultado->fetch_assoc();

///PARA EL CASO DE AUTOR 
$sql = "SELECT * FROM autor";
$resultado = $db->query($sql);           
$autores = [];                       
while($tipo = $resultado->fetch_assoc()){  
$autores[] = $tipo;                  
}  


////PARA EL CASO DE EDITORIAL 
$sql = "SELECT * FROM editorial";
$resultado = $db->query($sql);    

$editor = [];                     
while($tipo = $resultado->fetch_assoc()){  
    $editor[] = $tipo;            
    }                                      

    ////PARA EL CASO DE CATEGORIA 
$sql = "SELECT * FROM categoria";
$resultado = $db->query($sql);    

$cat = [];                     
while($tipo = $resultado->fetch_assoc()){  
    $cat[] = $tipo;            
    }   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBRO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Editar Libros</h1>
        <form method="POST">
        <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" name= "titulo" id="titulo" class="form-control" value="<?php echo $libro['titulo'] ?>">     
            </div>


            <div class="mb-3">
                <label for="autor"class="form-label">Autor:</label>
                <select class="form-control" id="autor" name="autor">
                    <option value="0">--SELECIONE--</option>
                    <?php
                    foreach($autores as $tipo):
                    ?>
                        <option value="<?php echo $tipo['id'] ?>" 
                            <?php echo $tipo['id'] === $libro['id_autor'] ? 'selected': ''?>>
                            <?php echo $tipo['nombre'] ?>
                        </option>
                    <?php
                    endforeach;
                    ?>

            </select>
            </div>

            <div class="mb-3">
                <label for="editorial"class="form-label">Editorial:</label>
                <select class="form-control" id="editorial" name="editorial">
                    <option value="0">--SELECIONE--</option>
                    <?php
                    foreach($editor as $tipo):
                    ?>
                        <option value="<?php echo $tipo['id'] ?>" 
                            <?php echo $tipo['id'] === $libro['id_editorial'] ? 'selected': ''?>>
                            <?php echo $tipo['nombre'] ?>
                        </option>
                    <?php
                    endforeach;
                    ?>

            </select>
            </div>

            <div class="mb-3">
                <label for="categoria"class="form-label">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria">
                    <option value="0">--SELECIONE--</option>
                    <?php
                    foreach($cat as $tipo):
                    ?>
                        <option value="<?php echo $tipo['id'] ?>" 
                            <?php echo $tipo['id'] === $libro['id_categoria'] ? 'selected': ''?>>
                            <?php echo $tipo['nombre'] ?>
                        </option>
                    <?php
                    endforeach;
                    ?>

            </select>
            </div>
           
            <input type="submit" value="Grabar" class="btn btn-primary">
           
        </form>
    </div>
</body>

</html>