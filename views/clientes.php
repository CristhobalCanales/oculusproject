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
    <title>Gestión Clientes - Optica Oculus</title>
</head>

<body>
    <?php if (isset($_SESSION["user"])) { ?>
        <div class="container">
            <div class="row">
                <nav class="teal lighten-2">
                <div class="nav-wrapper">
                        <ul id="nav-mobile" class="left hide-on-med-and-down">
                            <li class="activo"><a href="clientes.php"><span title="Crear Cliente"><i class="fas fa-user-plus"></i></i></span></a></li>
                            <li><a href="buscarCliente.php"><span title="Buscar Receta"><i class="fas fa-search"></i></span></li></a>
                            <li><a href="CrearReceta.php"><span title="Crear Receta"><i class="fas fa-glasses"></i></i></span></a></li>
                        </ul>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">

                            <li class="nobg"><a href="#">HOLA <?= strtoupper($_SESSION["user"]["nombre"]) ?></a></li>
                        <li><a href="salir.php"><span title="Salir"><i class="fas fa-sign-out-alt"></i></span></a></li>
                        </ul>
                </div>
                </nav>
                <div class="col l2 m4 s12"></div>
                <div class="col l8 m4 s12">
                    <div class="card">
                        <div class="card-action">
                            <form action="../controllers/ClienteController.php" method="POST">
                                <div class="input-field col l4">
                                <i class="material-icons md-leal prefix">assignment_ind</i>
                                    <input id="clirut" type="text" name="clirut">
                                    <label for="clirut">Rut</label>
                                </div>
                                <div class="input-field col l8">
                                    <i class="material-icons md-leal prefix">person</i>
                                    <input id="cliname" type="text" name="cliname">
                                    <label for="cliname">Nombre</label>
                                </div>
                                <div class="input-field col l12">
                                    <i class="material-icons md-leal prefix">place</i>
                                    <input id="clidir" type="text" name="clidir">
                                    <label for="clidir">Dirección</label>
                                </div>
                                <div class="input-field col l6">
                                    <i class="material-icons md-leal prefix">phone_android</i>
                                    <input id="clifono" type="number" name="clifono">
                                    <label for="clifono">Teléfono o Celular</label>
                                </div>
                                <div class="input-field col l6">
                                    <i class="material-icons md-leal prefix">date_range</i>
                                    <input id="icon_prefix" type="text" class="validate datepicker" name="clifecha">
                                    <label for="icon_prefix">Fecha de creación</label>
                                </div>
                                <div class="input-field col l12">
                                    <i class="material-icons md-leal prefix">email</i>
                                    <input id="cliemail" type="email" name="cliemail">
                                    <label for="cliemail">Correo Eléctronico</label>
                                    <p class="verdeclaro center">
                                        <?php if (isset($_SESSION["respuestaCli"])) {
                                          echo $_SESSION["respuestaCli"];
                                          unset($_SESSION["respuestaCli"]);
                                        } ?>
                                    </p>
                                        <p class="rojoclaro center">
                                            <?php if (isset($_SESSION["errorCli"])) {
                                              echo $_SESSION["errorCli"];
                                              unset($_SESSION["errorCli"]);
                                            } ?>
                                        </p>
                                        <p class="rojoclaro center">
                                            <?php if (isset($_SESSION["respuesta"])) {
                                              echo $_SESSION["respuesta"];
                                              unset($_SESSION["respuesta"]);
                                            } ?>
                                        </p>
                                </div>
                                <button class="waves-effect waves-light btn teal lighten-2"><i class="material-icons right">arrow_forward</i>Crear Cliente</button>
                            </form>
                            <p class="rojoclaro">
                                <?php if (isset($_SESSION["respuesta"])) {
                                  echo $_SESSION["respuesta"];
                                  unset($_SESSION["respuesta"]);
                                } ?>
                            </p>
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
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                'autoClose': true,
                'format': 'yyyy/mm/dd',
                i18n: {
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                    weekdays: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                    weekdaysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    weekdaysAbbrev: ["D", "L", "M", "M", "J", "V", "S"],
                    cancel: 'Cancelar',
                    clear: 'Limpiar',
                    done: 'Aceptar'
                }
            });
        });
    </script>
</body>

</html>
