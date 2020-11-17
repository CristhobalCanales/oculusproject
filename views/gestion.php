<?php

use models\UsuarioModel as UsuarioModel;

session_start();
require_once "../models/UsuarioModel.php";

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (isset($_SESSION["user"])) {
  $model = new UsuarioModel();
  $usuario = $model->getAllUsuarios();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Gestión de Usuarios - Optica Oculus</title>
</head>

<body>
    <?php if (isset($_SESSION["user"])) { ?>
        <div class="container">
            <div class="row">
                <nav class="teal lighten-2">
                <div class="nav-wrapper">
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li class="nobg"><a href="#">HOLA <?= strtoupper($_SESSION["user"]["nombre"]) ?></a></li>
      <li><a href="salir.php"><span title="Salir"><i class="fas fa-sign-out-alt"></i></span></a></li>
      </ul>
    </div>
                </nav>
                <div class="col l4 m4 s12">
                    <!-- EDITAR USUARIO -->
                    <?php if (isset($_SESSION["editar"])) { ?>
                        <div class="card">
                            <div class="card-action">
                                <form action="../controllers/ControlEdit.php" method="POST">
                                    <div class="input-field">
                                        <input id="rut" type="text" name="rut" value="<?= $_SESSION["usuario"]["rut"] ?>">
                                        <label for="rut">RUT</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="nombre" type="text" name="nombre" value="<?= $_SESSION["usuario"]["nombre"] ?>">
                                        <label for="nombre">Nombre</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <select name="estado" id="estado">
                                            <option value="1">Habilitado</option>
                                            <option value="0">Bloqueado</option>
                                        </select>
                                        <label>Estado</label>
                                    </div>
                                    <button class="waves-effect waves-light btn teal lighten-2"><i class="material-icons right">check_box</i>Editar Usuario</button>
                                </form>
                            </div>
                        </div>
                    <?php
                    unset($_SESSION["editar"]);
                    unset($_SESSION["usuario"]);
                    } else { ?>
                        <!-- ---------------------- -->
                        <!-- Nuevo Vendedor -->
                        <!-- --------------------- -->
                        <div class="card">
                            <div class="card-action col s12">
                                <form action="../controllers/ControlInsert.php" method="POST">
                                    <div class="input-field">
                                        <input id="rut" type="text" name="rut">
                                        <label for="rut">RUT Vendedor</label>
                                    </div>
                                    <div class="input-field">
                                        <input id="nombre" type="text" name="nombre">
                                        <label for="nombre">Nombre Vendedor</label>
                                    </div>
                                    <input type="hidden" name="rol" value="vendedor">
                                    <input type="hidden" name="estado" value="1">
                                    <input type="hidden" name="clave" value="vendedor">

                                    <p class="verdeclaro center">
                                    <?php if (isset($_SESSION["respuesta"])) {
                                      echo $_SESSION["respuesta"];
                                      unset($_SESSION["respuesta"]);
                                    } ?>
                                </p>
                                <p class="rojoclaro center">
                                    <?php if (isset($_SESSION["error"])) {
                                      echo $_SESSION["error"];
                                      unset($_SESSION["error"]);
                                    } ?>
                                </p>
                                    <button class="waves-effect waves-light btn teal lighten-2"><i class="material-icons right">arrow_forward</i>Crear Vendedor</button>
                                </form>

                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col l8 m8 s12">
                    <div class="card">
                        <div class="card-action">
                            <form action="../controllers/ControlTabla.php" method="POST">
                                <table class="teal-text text-lighten-2 accent-2">
                                    <tr>
                                        <th>Rut</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                    <?php foreach ($usuario as $item) { ?>
                                        <tr>
                                            <td> <?= htmlspecialchars($item["rut"]) ?> </td>
                                            <td> <?= htmlspecialchars($item["nombre"]) ?> </td>
                                            <?php if ($item["estado"] == 1) { ?>
                                                <td class="verdeclaro-texto fa-2x"> <?= $item["estado"] = "<i class='fas fa-user-check'></i>" ?></td>
                                            <?php } else { ?>
                                                <td class="rojoclaro-texto fa-2x"> <?= $item["estado"] = "<i class='fas fa-user-slash'></i>" ?> </td>
                                            <?php } ?>
                                            <td>
                                                <span title="Editar Vendedor">
                                                  <button name="bt_edit" value="<?= $item[
                                                    "rut"
                                                  ] ?>" class="waves-effect waves-light btn teal lighten-2"><i class="material-icons right">mode_edit</i>Editar</button>
                                                <span title="Eliminar Vendedor">
                                                  <button name="bt_delete" value="<?= $item[
                                                    "rut"
                                                  ] ?>" class="waves-effect waves-light btn teal lighten-2"><i class="material-icons right">delete</i>Eliminar</button></span>
                                                </span>

                                            </td>
                                            <td>
                                                <span title="Eliminar Vendedor">

                                                </button>

                                                </span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {header("Location: ../index.php"); ?>

    <?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>

</body>

</html>
