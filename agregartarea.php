<?php
        
include('conexion.php');
 $flagError="error";       
if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $data = json_decode(file_get_contents("php://input"), true); 
    foreach ($data as $elemento) {
        $tarea = $elemento['tarea'];
        $completada= $elemento['completada'];
        $prioridad=$elemento['prioridad'];
        $sql="insert into tareas(tarea,completada,prioridad) values('$tarea','$completada','$prioridad')";
        //$rs = mysqli_query($cn, "call sp_insertartareas('$tarea','$completada')");
        $rs = mysqli_query($cn, $sql);
        if ($rs) {
            $flagError="exito";
        } else {
            $flagError="error";
        }

    }
    //$cn->error;
    echo $flagError;
    
}
