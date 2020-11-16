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
    <title>Ingresar Receta</title>
</head>

<body>
    <?php if (isset($_SESSION["user"])) { ?>
        <div class="container">
            <div class="row">
                <nav class="teal lighten-2">
                  <div class="nav-wrapper">
                          <ul id="nav-mobile" class="left hide-on-med-and-down">
                              <li><a href="clientes.php"><span title="Crear Cliente"><i class="fas fa-user-plus"></i></i></span></a></li>
                              <li><a href="buscarCliente.php"><span title="Buscar Receta"><i class="fas fa-search"></i></span></li></a>
                              <li class="activo"><a href="crearReceta.php"><span title="Crear Receta"><i class="fas fa-glasses"></i></i></span></a></li>
                          </ul>
                          <ul id="nav-mobile" class="right hide-on-med-and-down">

                              <li class="nobg"><a href="#">HOLA <?= strtoupper($_SESSION["user"]["nombre"]) ?></a></li>
                          <li><a href="salir.php"><span title="Salir"><i class="fas fa-sign-out-alt"></i></span></a></li>
                          </ul>
                  </div>
                </nav>
                <br>
                <div class="col l1 m4 s12"></div>
                <div class="col l10 m4 s12 white">
                    <br><br>
                    <form action="#" method="POST" class="responsive">
                        <input type="text" class="col l3" placeholder="Rut" name="ruting">
                        <button class="btn teal lighten-2 col l2"><i class="fas fa-search responsive"></i></button>
                        <div class="col l7"></div>
                    </form>
                    <br><br><br>

                    <form action="#" method="POST">
                        <div class="col l6 m6 s6 bteal-text text-lighten-2">
                            <p>Tipo Lente:</p>
                            <label>
                                <input type="checkbox" name="xx" value="1" class="filled-in"/>
                                <span>Lejos</span>
                            </label>
                            <label>
                            <input type="checkbox" name="xx" value="1" class="filled-in" />
                                <span>Cerca</span>
                            </label>
                            <Select name="tipo" id="tipo" class="icons">
                            <option value="" disabled selected>Selecciona...</option>
                                <option value="#" data-icon="../img/cristal.png">Tipo Cristal</option>
                                <option value="MONO" data-icon="../img/mono.jpg">Monofocal</option>
                                <option value="BI" data-icon="../img/bifocal.jpg">Bifocal</option>
                                <option value="MULTI" data-icon="../img/multi.png">Multifocal</option>
                            </Select>
                            <Select name="material" id="material" class="icons">
                            <option value="" disabled selected>Selecciona...</option>
                                <option value="#" data-icon="../img/materiales.jpg">Material de Cristal</option>
                                <option value="ORG" data-icon="../img/materiales.jpg">Orgánico</option>
                                <option value="POLI" data-icon="../img/materiales.jpg">Policarbonato</option>
                                <option value="MIN" data-icon="../img/materiales.jpg">Mineral</option>
                                <option value="ALTO" data-icon="../img/materiales.jpg">Alto Indice</option>
                            </Select>
                            <Select name="armazon" id="armazo" class="icons">
                            <option value="" disabled selected>Selecciona...</option>
                                <option value="#" data-icon="../img/armazon.png">Tipo Armazón</option>
                                <option value="INTER" data-icon="../img/armazon.png">Intermedio</option>
                                <option value="GAMA" data-icon="../img/armazon.png">Gama Alta</option>
                                <option value="ECO" data-icon="../img/armazon.png">Económico</option>
                            </Select>
                        </div>
                        <div class="col l3 center teal-text text-lighten-2 accent-2">
                            <p>Ojo Izquierdo</p>
                            <input class="input-field" type="text" placeholder="Esfera" name="esfeizq">
                            <input type="text" placeholder="Cilindro" name="cilizq">
                            <input type="text" placeholder="Eje" name="ejeizq">
                        </div>
                        <div class="col l3 center teal-text text-lighten-2 accent-2">
                            <p>Ojo Derecho</p>
                            <input type="text" placeholder="Esfera" name="esfeder">
                            <input type="text" placeholder="Cilindro" name="cilder">
                            <input type="text" placeholder="Eje" name="ejeder">
                        </div>
                        <br><br><br><br><br><br><br><br><br><br><br>
                        <div class="col l6">
                            <div class="input-field">
                                <input id="prisma" type="text" name="prisma">
                                <label for="prisma">Prisma</label>
                            </div>
                        </div>
                        <div class="col l6">
                            <div class="input-field">
                                <input id="pupilar" type="text" name="pupilar">
                                <label for="pupilar">Distancia Pupilar</label>
                            </div>
                        </div>
                        <div class="col l6">
                            <div class="input-field">
                                <i class="material-icons md-leal prefix">event_note</i>
                                <input id="fechaentrega" type="text" class="validate datepicker" name="fechaentrega">
                                <label for="fechaentrega">Fecha Entrega</label>
                            </div>
                        </div>
                        <div class="col l6">
                            <div class="input-field">
                                <i class="material-icons md-leal prefix">event_available</i>
                                <input id="fecharetiro" type="text" class="validate datepicker" name="fecharetiro">
                                <label for="fecharetiro">Fecha Retiro</label>
                            </div>
                        </div>

                        <div class="col l4">
                            <div class="input-field">
                                <input id="rutmed" type="text" name="rutmed">
                                <label for="rutmed">Rut Medico</label>
                            </div>
                        </div>
                        <div class="col l8">
                            <div class="input-field">
                                <input id="nombremed" type="text" name="nombremed">
                                <label for="nombremed">Nombre Medico</label>
                            </div>
                        </div>
                        <div class="col l12">
                            <div class="input-field">
                                <input id="obs" type="text" name="obs">
                                <label for="obs">Observaciones</label>
                            </div>
                        </div>
                        <div class="col l4"></div>
                        <div class="col l4">
                            <div class="input-field">
                                <input id="precio" type="number" name="precio">
                                <label for="precio">Precio Lente</label>
                            </div>
                        </div>
                        <div class="col l4">
                            <div class="input-field">
                            <button class="waves-effect waves-light btn teal lighten-2"><i class="material-icons right">arrow_forward</i>Crear Receta</button>
                            </div>
                        </div>
                    </form>
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
