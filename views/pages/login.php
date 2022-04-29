
<h1 class="text-center">Iniciar sesion</h1>

<div class="d-flex justify-content-center">
<form action="" class="p-5 bg-light" method="post">
    <div class="form-group">
        <label for="email">Email:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>

            <input type="email" class="form-control" name="ingresoEmail">

        </div>
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>

            <input type="password" class="form-control" name="ingresoPassword">

        </div>
    </div>

    <?php

    #Instancia de clase de un método no estatico

   // $registro = new FormController();
  // $registro -> ctrRegister();

    #Forma en que se instancia un método estático

    $ingreso = new FormController();

    $ingreso->ctrIngreso();


    ?>

    <button type="submit" class="btn btn-primary w-100">Ingresar</button>
</form>
</div>