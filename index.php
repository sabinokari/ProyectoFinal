<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <title>Inicio de sesión</title>
</head>

<body>

   <div class="container">
      <div class="img">
      <center><img src="img/logoinicio.png"></center>
      </div>
      <div class="login-content">
         <form method="post" action="">

         <center> <h2 class="title">BIENVENIDO</h2></center>

            <?php
            include ("conexion.php");
            include ("login_cont.php");
            ?>

            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
               <center> <h5>Usuario (admin)</h5></center>
                  <center> <input id="usuario" type="text" class="input" name="usuario"></center>
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
               <center><h5>Contraseña (admin)</h5></center>
               <center><input type="password" id="input" class="input" name="password"></center>
               </div>
            </div>
            <div class="view">
               <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
            </div>
  
            <center><input name="btningresar" class="btn" type="submit" value="INICIAR SESION"></center>
         </form>
      </div>
   </div>
</body>

<table width="550" class="table table-hover">
                <tr>
                  
                    <td align="right">


                        <a href="agregarusuario.php" class="btn btn-success">
                            <i class='bi bi-file-earmark-pdf'></i>
                            <span>NUEVO USUARIO</span>
                        </a>

                        
                    </td>

                </tr>
        

            </table>

</html>