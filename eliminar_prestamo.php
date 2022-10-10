<?php

include ('data/bdatos.php');

$id =$_GET['id'];
$query = mysqli_query($db,"DELETE FROM  prestamo WHERE (id = '$id') ");

if ($query){
    header('location: prestamo.php');
}


?>