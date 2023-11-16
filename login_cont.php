<?php
session_start();

if (!empty($_POST["btningresar"])) {
    //echo "Boton precionado";
 
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $sql="select *from usuario where usuario = '$usuario'";
        $result = $cn -> query($sql);
        $datosLogin= [];           
        if (mysqli_num_rows($result)) {


            
           if(@$datosLogin["usuario"]==$usuario && @$datosLogin["contrasenia"]==$password){
                    $_SESSION["id"]= $datosLogin["id"];
                    $_SESSION["nombres"]= $datosLogin["nombres"];
                    $_SESSION["apellidos"]= $datosLogin["apellidos"];
                    header ("location:home.php"); 
            }else echo "<script>alert('usuario o contraseña incorecto'); </script>";
            
        }else echo "<script>alert('usuario no existe en la base de datos'); </script>";
 
    }else echo "<script>alert('Ingrese usuario y contraseña'); </script>";
}

