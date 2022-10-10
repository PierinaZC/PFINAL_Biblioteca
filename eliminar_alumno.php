<?php

include ('data/bdatos.php');

$id =$_GET['id'];
$query = mysqli_query($db," DELETE FROM  alumno WHERE (id = '$id') ");

if ($query){
    header('location: alumno.php');
}


?>