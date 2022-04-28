<?php
class FormController{

   static public function ctrRegister(){

  

        if(isset($_POST["name"])){
            if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/',$_POST["name"]) &&
            preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i',$_POST["email"]) &&
            preg_match('/^[0-9a-zA-Z]+$/',$_POST["pwd"])){

            $tabla = "registros";

            $token = md5($_POST["name"]."+".$_POST["email"]);

            $encriptarPassword = md5($_POST["pwd"]);

            $datos = array("token" => $token,
                           "nombre" => $_POST["name"],
                           "email" => $_POST["email"],
                           "password" => $encriptarPassword
        );

        $respuesta = formModel::mdlRegistro($tabla,$datos);

        return $respuesta;

        }else{

            $respuesta="error";
            return $respuesta;

        }
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

        $encriptarPassword = md5($_POST["ingresoPassword"]);

        $respuesta = formModel::mdlSeleccionarRegistros($tabla,$item,$valor);

        if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $encriptarPassword){

             formModel::mdlUpdateErrors($tabla,0,$respuesta["token"]);

            $_SESSION["validarIngreso"] = "ok";

            echo '<script>

            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }

             window.location = "home";
            
            </script>';


        }else{

            if($respuesta["intentos_fallidos"] < 3){

            $intentos = $respuesta["intentos_fallidos"]+1;

            formModel::mdlUpdateErrors($tabla,$intentos,$respuesta["token"]);

            }else{
                echo '<div class="alert alert-warning">RECAPTCHA Debes validar que no eres un robot</div>';
            }

            echo '<script>

            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
            
            </script>';

            echo '<div class="alert alert-danger">El email o contraseña son incorrectos</div>';
        }

        }
    }

    static public function ctrUpdateRegistration(){

        if(isset($_POST["actualizarName"])){

            if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ ]+$/',$_POST["actualizarName"]) &&
            preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i',$_POST["actualizarEmail"])){

            $usuario = formModel::mdlSeleccionarRegistros("registros","token",$_POST["tokenUsuario"]);

            $compararToken=md5($usuario["nombre"]."+".$usuario["email"]);

                if($compararToken == $_POST["tokenUsuario"] && $_POST["idUsuario"] == $usuario["id"] ){

                    if($_POST["actualizarPassword"] != ""){

                        if(preg_match('/^[0-9a-zA-Z]+$/',$_POST["actualizarPassword"])){

                            $encriptarPassword = md5($_POST["actualizarPassword"]);

                            $password = $encriptarPassword;
                        }

                     }else{
                        $password = $_POST["passwordActual"];
                    }

                    $tabla = "registros";

                    $actualizarToken=md5($_POST["actualizarName"]."+".$_POST["actualizarEmail"]);

                    $datos = array(
                           "id" => $_POST["idUsuario"],
                           "token" => $actualizarToken,
                           "nombre" => $_POST["actualizarName"],
                           "email" => $_POST["actualizarEmail"],
                           "password" => $password
                        );

                    $respuesta = formModel::mdlUpdateRegistration($tabla,$datos);

                    return $respuesta;

                }else{

                    $respuesta="error";
                    return $respuesta;
                }
            }else{

                $respuesta="error";
                return $respuesta;
            }

        }
    }

    public function ctrDeleteRegistration(){

        if(isset($_POST["eliminarRegistro"])){

            $usuario = formModel::mdlSeleccionarRegistros("registros","token",$_POST["tokenUsuario"]);

            $compararToken=md5($usuario["name"]."+".$usuario["email"]);

            if($compararToken == $_POST["eliminarRegistro"] ){

                 $tabla="registros";

                $valor=$_POST["eliminarRegistro"];

                $respuesta = formModel::mdlDeleteRegistration($tabla,$valor);

                if($respuesta =="ok"){

                     echo '<script>

                     if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }

                     window.location = "home";
            
                    </script>';


        }
    }

    }

}

}

?>