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
    <title>Buscar Cliente - Optica Oculus</title>
</head>

<body>
    <?php if (isset($_SESSION["user"])) { ?>
        <div class="container">
            <div class="row">
                <nav class="teal lighten-2">
                  <div class="nav-wrapper">
                          <ul id="nav-mobile" class="left hide-on-med-and-down">
                              <li><a href="clientes.php"><span title="Crear Cliente"><i class="fas fa-user-plus"></i></i></span></a></li>
                              <li class="activo"><a href="buscarCliente.php"><span title="Buscar Receta"><i class="fas fa-search"></i></span></li></a>
                              <li><a href="CrearReceta.php"><span title="Crear Receta"><i class="fas fa-glasses"></i></i></span></a></li>
                          </ul>
                          <ul id="nav-mobile" class="right hide-on-med-and-down">

                              <li class="nobg"><a href="#">HOLA <?= strtoupper($_SESSION["user"]["nombre"]) ?></a></li>
                          <li><a href="salir.php"><span title="Salir"><i class="fas fa-sign-out-alt"></i></span></a></li>
                          </ul>
                  </div>
                <div class="col l2 m4 s12"></div>
                <div class="col l8 m4 s12">
                    <div class="card">
                        <div class="card-action">
                            <br><br>
                            <form action="#" method="POST">
                                <input class="col l3" type="text" name="rutbus" placeholder="Rut">
                                <button class="btn teal lighten-2 col l2"><i class="fas fa-search"></i></button>
                                <div class="input-field col l2"></div>
                                <input class="col l3 validate datepicker" type="text" name="fechabus" placeholder="Fecha">
                                <button class="btn teal lighten-2 col l2"><i class="fas fa-search"></i></button>
                            </form>
                            <form action="#" method="POST">
                                <table class="teal-text text-lighten-2 accent-2">
                                    <tr>
                                        <th>Tipo Lente</th>
                                        <th>Fecha Entrega</th>
                                        <th>Acciones</th>
                                    </tr>
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
