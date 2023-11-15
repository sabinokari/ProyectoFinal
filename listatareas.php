<?php
include('conexion.php');
$query="SELECT id,tarea,completada,prioridad FROM todolist.tareas order by id desc;";
$rs = mysqli_query($cn,$query);
$html="";
$resultados = array();
while ($fila = mysqli_fetch_assoc($rs)) {
    $resultados[] = $fila;
}

$json = json_encode($resultados); 
echo $json;
?>