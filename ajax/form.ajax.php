<?php

require_once "../controllers/formController.php";
require_once "../models/formModel.php";

class AjaxForm{

public $validarEmail;

public function ajaxValidarEmail(){

  $item="email";

  $valor= $this->validarEmail;

  $respuesta = FormController::ctrSeleccionarRegistros($item, $valor);
  echo json_encode($respuesta);

}

}

#Crear objeto de ajax

if(isset($_POST["validarEmail"])){

    $valEmail = new AjaxForm;
    $valEmail->validarEmail = $_POST["validarEmail"];
    $valEmail->ajaxValidarEmail();

}



?>