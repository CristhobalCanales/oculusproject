<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

session_start();
require_once "../models/UsuarioModel.php";

class ControlInsert
{
  public $rut;
  public $nombre;
  public $rol;
  public $clave;
  public $estado;

  public function __construct()
  {
    $this->rut = $_POST["rut"];
    $this->nombre = $_POST["nombre"];
    $this->rol = $_POST["rol"];
    $this->clave = $_POST["clave"];
    $this->estado = $_POST["estado"];
  }

  public function guardarUsuario()
  {
    if ($this->rut == "" || $this->nombre == "") {
      $_SESSION["error"] = "<i class='fas fa-exclamation-triangle'></i> <b>Error:</b> Por favor rellena el formulario correctamente.";
      header("Location: ../views/gestion.php");
      return;
    }

    $model = new UsuarioModel();
    $data = ["rut" => $this->rut, "nombre" => $this->nombre, "rol" => $this->rol, "clave" => $this->clave, "estado" => $this->estado];

    $count = $model->insertarUsuario($data);
    if ($count == 1) {
      $_SESSION["respuesta"] = "<i class='fas fa-check-circle'></i> Usuario creado correctamente.";
    } else {
      $_SESSION["error"] = "<i class='fas fa-exclamation-triangle'></i> <b>Error:</b> Base de datos.";
    }
    header("Location: ../views/gestion.php");
  }
}

$obj = new ControlInsert();
$obj->guardarUsuario();
