<?php

include('conexion.php');
$id=$_GET["id"];
$query="DELETE FROM todolist.tareas where id=$id";
$rs = mysqli_query($cn,$query);
if ($rs) {
    $flagError="exito";
} else {
    $flagError="error";
}
echo $flagError;
?>