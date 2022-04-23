<div class="d-flex justify-content-center">
<form action="" class="p-5 bg-light" method="post">
    <div class="form-group">
        <label for="name">Nombre:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>

            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>

            <input type="email" class="form-control" id="email" name="email">

        </div>
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>

            <input type="password" class="form-control" id="pwd" name="pwd">

        </div>
    </div>

    <?php

    #Instancia de clase de un método no estatico

   // $registro = new FormController();
  // $registro -> ctrRegister();

    #Forma en que se instancia un método estático

    $registro = FormController::ctrRegister();

    if($registro){

        echo '<script>

        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
        
        </script>';

        echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
    }

    ?>

    <button type="submit" class="btn btn-primary w-100">Enviar</button>
</form>
</div>