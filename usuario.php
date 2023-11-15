<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title></title>
</head>

<body>
    <header>
        <?php
        include('encabezado.php');
        include('conexion.php');
        ?>
    </header>
    <section>

        <table width="550" class="table table-hover">
            <tr>
                <td>
                    <h2>Administrar Usuarios del Sistema</b></h2>
                </td>
                <td align="right">
                    <a href="agregarusuario.php" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i>
                        <span>Agregar nuevo Usuario</span>
                    </a>
                <td>
                    <a href="home.php" class="btn btn-success">
                        <span>Menu</span>
                    </a>
                </td>
                </td>
            </tr>

            <tr>
                <td colspan="2" align="right">

                    <form action="usuario.php" method="POST">
                        <span>Busque por Apellidos</span>
                        <input type="text" name="txtbusqueda">

                        <input type="submit" name="btnUsuario" value="Buscar" class="btn btn-primary" placeholder="Buscar ">

                    </form>
                </td>
            </tr>
        </table>
        <table border="0" cellpading="5" cellspacing="0" width="550" class="table table-hover">
            <tr>
                <th>CÓDIGO</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>CARGO</th>
                <th>DNI</th>
                <th>TELEFONO</th>
                <th>USUARIO</th>
                <th>CONTRASEÑA</th>
                <th></th>
                <th></th>
            </tr>

            <?php

            $busqueda = '';
            if (isset($_POST["btnUsuario"])) {
                $busqueda = $_POST["txtbusqueda"];
            }

            $rs = mysqli_query($cn, "CALL sp_usuariolistar ('$busqueda')");
            foreach ($rs as $r) { ?>
                <tr>
                    <td><?php echo $r['COD'] ?></td>
                    <td><?php echo $r['NOM'] ?></td>
                    <td><?php echo $r['APE'] ?></td>
                    <td><?php echo $r['CARG'] ?></td>
                    <td><?php echo $r['DNI'] ?></td>
                    <td><?php echo $r['TELEF'] ?></td>
                    <td><?php echo $r['USU'] ?></td>
                    <td><?php echo $r['CONTRA'] ?></td>

                    <td>
                        <a href="editarusuario.php?codigo=<?php echo $r['COD']; ?> &nombre=<?= $r['NOM']; ?>
                        &apellido=<?= $r['APE']; ?> &cargo=<?= $r['CARG']; ?> &dni=<?= $r['DNI']; ?>
                        &telefono=<?= $r['TELEF']; ?> &usuario=<?= $r['USU']; ?> &contrasenia=<?= $r['CONTRA']; ?>
                        ">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    </td>
                    <td>
                        <a href="usuarioeliminar.php?eliminar=<?php echo $r['COD'] ?>" onclick="return confirm('Esta seguro eliminar el registro?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>

                    </td>
                </tr>
            <?php } ?>
        </table>


    </section>
    <footer>
        <?php
        include('pie.php');
        ?>
    </footer>  
</body>

</html>