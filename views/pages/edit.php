<?php

if(isset($_GET["id"])){

    $item = "id";

    $valor= $_GET["id"];

    $usuario = FormController::ctrSeleccionarRegistros($item,$valor);

}

?>


<div class="d-flex justify-content-center">
<form action="" class="p-5 bg-light" method="post">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>

            <input type="text" class="form-control" placeholder="Escriba su nombre" id="name" name="actualizarName" value="<?php echo $usuario["nombre"]?>">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>

            <input type="email" class="form-control" placeholder="Escriba su email" id="email" name="actualizarEmail" value="<?php echo $usuario["email"]?>" >

        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>

            <input type="password" class="form-control" placeholder="Escriba su contraseña" id="pwd" name="actualizarPassword">

            
            <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]?>">
        </div>
    </div>

    <?php

    $actualizar = new FormController();
    $actualizar->ctrUpdateRegistration();

    ?>


    <button type="submit" class="btn btn-primary w-100">Actualizar</button>
</form>
</div>