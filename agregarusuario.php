<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO USUARIO</title>

</head>

<body>
    <?php
    error_reporting(0);
    include('conexion.php');

    ?>
    <header>
        <h3>NUEVO USUARIO</h3>
    </header>
    <section>

        <form action="" method="post">
            <table class="table table-sm">

                <tr>
                    <td>CODIGO USUARIO</td>
                    

                    <td>
                        <?php
                        $fila = mysqli_query($cn, "SELECT max(SUBSTRING(IDUSUARIO, 2,
                        LENGTH(IDUSUARIO)-1 )) +1  AS CODIGO FROM USUARIO;");
                        $codigogenerado = "";
                        foreach ($fila as $r) {
                            $codigogenerado = "" . $r['CODIGO'];
                        }
                        ?>
                        <input type="text" name="txtCodigo" value="<?php echo $codigogenerado; ?>" />
                        <span>(Codigo Generado de manera Automatica)</span>

                    </td>

                </tr>
                <tr>
                    <td>NOMBRE</td>
                    <td colspan="3">
                        <input type="text" name="txtnombre">
                    </td>
                </tr>
                <tr>
                    <td>APELLIDO</td>
                    <td>
                        <input type="text" name="txtapellido">
                    </td>
                </tr>
                <tr>
                    <td>CARGO</td>
                    <td>
                        <input type="text" name="txtcargo">
                    </td>
                </tr>
                <tr>
                    <td>DNI</td>
                    <td>
                        <input type="text" name="txtdni">
                    </td>
                </tr>
                <tr>
                    <td>TELEFONO</td>
                    <td>
                        <input type="text" name="txttelefono">
                    </td>
                </tr>
                <tr>
                    <td>USUARIO</td>
                    <td>
                        <input type="text" name="txtusuario">
                    </td>
                </tr>
                <tr>
                    <td>CONTRASEÑA</td>
                    <td>
                        <input type="text" name="txtcontrasenia">
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="CANCELAR" name="btnCancelar" class="btn btn-danger"></td>
                    <td><input type="submit" value="AGREGAR" name="btnAgregar" class="btn btn-success"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php
                        if (isset($_POST['btnAgregar'])) {
                            $idusuario = $_POST['txtidusuario'];
                            $nombre = $_POST['txtnombre'];
                            $apellido = $_POST['txtapellido'];
                            $cargo = $_POST['txtcargo'];
                            $dni = $_POST['txtdni'];
                            $telefono = $_POST['txttelefono'];
                            $usuario = $_POST['txtusuario'];
                            $contrasenia = $_POST['txtcontrasenia'];
                        
                            $rs = mysqli_query($cn, "call sp_usuarionuevo('$idusuario','$nombre','$apellido',
                                                        '$cargo', $dni,'$telefono','$usuario','$contrasenia')");

                            if ($rs) {
                                echo "<script>alert('Usuario Registrado Correctamente!!!');
                                location.href='index.php'</script>";
                            } else {
                                echo "Ocurrio un error " . mysqli_error($cn);
                            }
                        }

                        ?>
                    </td>

                </tr>
            </table>
        </form>

    </section>
    <footer>

    </footer>
</body>

</html>