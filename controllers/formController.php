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

    static public function ctrSeleccionarRegistros($item,$valor){

        $tabla = "registros";

        $respuesta = formModel::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;

    }

    public function ctrIngreso(){
        if(isset($_POST["ingresoEmail"])){

        $tabla = "registros";

        $item="email";

        $valor=$_POST["ingresoEmail"];

        $respuesta = formModel::mdlSeleccionarRegistros($tabla,$item,$valor);

        if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]){

            $_SESSION["validarIngreso"] = "ok";

            echo '<script>

            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }

             window.location = "index.php?pages=home";
            
            </script>';


        }else{

            echo '<script>

            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
            
            </script>';

            echo '<div class="alert alert-danger">El email o contraseña son incorrectos</div>';
        }

        }
    }

    public function ctrUpdateRegistration(){

        if(isset($_POST["actualizarName"])){

            if($_POST["actualizarPassword"] != ""){

                $password = $_POST["actualizarPassword"];

            }else{
                $password = $_POST["passwordActual"];
            }

            $tabla = "registros";

            $datos = array("id" => $_GET["id"],
                           "nombre" => $_POST["actualizarName"],
                           "email" => $_POST["actualizarEmail"],
                           "password" => $password
                        );

        $respuesta = formModel::mdlUpdateRegistration($tabla,$datos);

        if($respuesta){

            echo '<script>

            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
            
            </script>';

            echo '<div class="alert alert-success">El usuario ha sido actualizado</div>';

        }

        }

    }

}

?>