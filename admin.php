<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap' rel='stylesheet' />
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Iniciar Sesión Administrador - Optica Oculus</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col l4 m4 s12">

            </div>
            <div class="col l4 m4 s12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-image">
                            <img src="img/logo.png">
                        </div>
                        <h5 class="center teal-text text-lighten-2">Iniciar Sesión Administradores</h5>
                    </div>
                    <div class="card-action">
                        <form action="controllers/LoginControllerAdmin.php" method="POST">
                        <div class="input-field">
                            <i class="material-icons md-leal prefix">account_circle</i>
                                <input id="rut" type="text" name="rut">
                                <label for="rut">RUT</label>
                            </div>
                            <div class="input-field">
                            <i class="material-icons md-leal prefix">lock</i>
                                <input id="clave" type="password" name="clave">
                                <label for="clave">Clave</label>
                            </div>
                            <p class="rojoclaro center">
                                <?php
                                session_start();
                                if (isset($_SESSION["error"])) {
                                  echo $_SESSION["error"];
                                  unset($_SESSION["error"]);
                                }
                                ?>
                            </p>
                            <button class="waves-effect waves-light btn teal lighten-2"><i class="material-icons right">arrow_forward</i>Iniciar Sesión</button>
                            <p>¿Eres Vendedor? <a href="index.php" class="teal-text text-lighten-2">Inicia Sesión</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>                       
</body>

</html>