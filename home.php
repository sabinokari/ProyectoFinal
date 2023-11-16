<?php
session_start();
if (!isset($_SESSION["nombres"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        Usuario logueado:<?php echo $_SESSION["nombres"] . " " . $_SESSION["apellidos"]; ?>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="login_cerrarsesion.php" class="nav-link">
                        <i class='bi bi-file-earmark-pdf'></i>
                        <span>Cerrar Sesion</span></a>
                </li>
            </ul>
        </header>

        <h1>Todo List </h1>

        <div class="search">
            <div class="row">
                <div class="col-12">
                    <table border="1" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tarea</th>
                                <th>Completadas</th>
                                <th>Prioridad</th>
                                <th>Accion <input type='button' id='btnAgregar' value='Agregar' class='btn btn-success' /></th>
                            </tr>
                        </thead>
                        <tbody id="tbl">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <input type="button" id="btnGuardar" value="Guardar" class="btn btn-success" />
                </div>
                <div class="col-4">
                    <input type="button" id="btnListar" value="Listar" class="btn btn-primary" />
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Tareas</td>
                                <td>Completada</td>
                                <td>Prioridad</td>
                                <td>Acción</td>
                            </tr>
                        </thead>
                        <tbody id="tbllista">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>



<script type="text/javascript">
    let tbl = document.getElementById("tbl");
    let btnAgregar = document.getElementById("btnAgregar");
    let btnGuardar = document.getElementById("btnGuardar");
    const tbllista = document.getElementById("tbllista");
    const btnListar = document.getElementById("btnListar");
    let indice = 0;
    window.onload = function() {
        btnAgregar.onclick = function() {
            agregarFilas();
        };
        btnGuardar.onclick = function() {
            enviarFormulario();
        };
        btnListar.onclick = function() {
            listar();
        };
        listar();
    }

    function agregarFilas() {
        var tr = document.createElement("tr");
        var txttarea = "<input type='text' name='txttarea' class='form-control' />";
        var checkbox = "<input type='checkbox' name='chkcompletada' class='form-check-input' />";

        var ddlbPrioridad = "<select name='ddlbPrioridad' class='form-control'>";
        ddlbPrioridad += "<option value=''>--Seleccione--</option>";
        ddlbPrioridad += "<option value='Normal'>Normal</option>";
        ddlbPrioridad += "<option value='Media'>Media</option>";
        ddlbPrioridad += "<option value='Alta'>Alta</option>";
        ddlbPrioridad += "</select";

        var btnEliminar = "<input type='button' name='btnEliminar' value='Eliminar' onclick='Eliminar(this)' class='btn btn-danger bucket-fill' />";
        var html = "";
        indice = indice + 1;
        html += "<td>" + (indice) + "</td>";
        html += "<td>" + txttarea + "</td>";
        html += "<td>" + checkbox + "</td>";
        html += "<td>" + ddlbPrioridad + "</td>";
        html += "<td>" + btnEliminar + "</td>";
        tr.innerHTML = html;
        tbl.appendChild(tr);
    }

    function Eliminar(el) {
        indice--;
        el.parentElement.parentElement.remove();
    }

    function enviarFormulario() {
        let fila = tbl.querySelectorAll("tr");
        let columnas = null;
        let inputTarea = null;
        let check = null;
        let combo = null;
        let totalFilas = fila.length;
        let datos = [];
        let flagError = true;
        let flagErrorCombo = true;
        if (fila.length == 0) {
            alert("ingrese las tareas");
            return;
        }
        for (let index = 0; index < totalFilas; index++) {
            columnas = fila[index].querySelectorAll("td");
            inputTarea = columnas[1].querySelector("input[type=text]");
            if (inputTarea.value == "") {
                flagError = false;
                break;
            }
        }
        for (let index = 0; index < totalFilas; index++) {
            columnas = fila[index].querySelectorAll("td");
            combo = columnas[3].querySelector("select");
            if (combo.value == "") {
                flagErrorCombo = false;
                break;
            }
        }
        if (flagError == false) {
            alert("Ingrese una tarea");
            return;
        }
        if (flagErrorCombo == false) {
            alert("Seleccione una prioridad");
            return;
        }
        for (let index = 0; index < totalFilas; index++) {
            columnas = fila[index].querySelectorAll("td");
            inputTarea = columnas[1].querySelector("input[type=text]");
            check = columnas[2].querySelector("input[type=checkbox]");
            combo = columnas[3].querySelector("select");
            datos.push({
                tarea: inputTarea.value,
                completada: check.checked,
                prioridad: combo.value
            });
        }

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "agregartarea.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == "exito") {
                    alert("Tarea guardada Correctamente");
                    tbl.innerHTML = "";
                    listar();
                }

            }
        };

        xhr.send(JSON.stringify(datos));
    }

    function listar() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "listatareas.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {

                var data = xhr.responseText;
                var filas = JSON.parse(data);
                var html = "";
                tbllista.innerHTML = "";
                for (let i = 0; i < filas.length; i++) {
                    html = html + "<tr>";
                    html = html + "<td>" + filas[i].id + "</td>";
                    html = html + "<td>" + filas[i].tarea + "</td>";
                    html = html + "<td>" + (filas[i].completada == true ? "si" : "no") + "</td>";
                    html = html + "<td>" + filas[i].prioridad + "</td>";
                    html = html + "<td><input type='button' name='btneliminar' class='btn btn-danger' value='Eliminar' onclick='EliminarTarea(" + filas[i].id + ")' /></td>";
                    html = html + "</tr>";
                }
                tbllista.innerHTML = html;
            }
        };
        xhr.send(null);

    }

    function EliminarTarea(id) {
        let res = confirm("¿Esta seguro que quiere eliminar?");
        if (res == false) {
            return;
        }
        let url = "eliminartareas.php?id=" + id;
        const xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == "exito") {
                    listar();
                }
            }
        };
        xhr.send(null);
    }
</script>

</html>