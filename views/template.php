<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container-fluid">
        <h3 class="text-center py-3"></h3>
    </div>

    <div class="container-fluid bg-light">
        <div class="container">
            <ul class="nav nav-justified py-2 nav-pills">    
                <li class="nav-item">
                    <a href="register" class="nav-link">Registro</a>
                </li>

                <li class="nav-item">
                    <a href="login" class="nav-link active">Ingreso</a>
                </li>

                <li class="nav-item">
                    <a href="home" class="nav-link">Inicio</a>
                </li>

                <li class="nav-item">
                    <a href="logout" class="nav-link">Salir</a>
                </li>
            </ul>
        </div>
    </div>


    <div class="container-fluid">
        <div class="container py-5">

        <?php

        if(isset($_GET["pages"])){

        if($_GET["pages"] == "register" ||
        $_GET["pages"] == "home" ||
        $_GET["pages"] == "logout" ||
        $_GET["pages"] == "edit" ||
        $_GET["pages"] == "login"){

            include "pages/".$_GET["pages"].".php";
        }else{
            include "pages/404.php";
        }

        }else{
            include "pages/login.php";
        }


        ?>

        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/b7aa95e782.js" crossorigin="anonymous"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="views/js/script.js"></script>
</body>

</html>