<?php
class FormController{

   static public function ctrRegister(){

        if(isset($_POST["name"])){

            $tabla = "registros";

            $datos = array("nombre" => $_POST["name"],
                           "email" => $_POST["email"],
                           "password" => $_POST["pwd"]
        );

        $respuesta = formModel::mdlRegistro($tabla,$datos);

        return $respuesta;

        }

    }

    static public function ctrSeleccionarRegistros(){

        $tabla = "registros";

        $respuesta = formModel::mdlSeleccionarRegistros($tabla);

        return $respuesta;

    }

}

?>