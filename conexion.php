<?php
$servidor ="localhost";
$usuario = "root";
$clave = "";
$cn = mysqli_connect($servidor, $usuario, $clave);
//$cn = mysqli_connect($servidor, $usuario, $clave,"ventas2015");
mysqli_select_db($cn,"todolist") ;
//echo "conexion realizada";
