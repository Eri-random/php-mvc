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
                    <a href="index.php?pages=register" class="nav-link">Registro</a>
                </li>

                <li class="nav-item">
                    <a href="index.php?pages=login" class="nav-link">Ingreso</a>
                </li>

                <li class="nav-item">
                    <a href="index.php?pages=home" class="nav-link active">Inicio</a>
                </li>

                <li class="nav-item">
                    <a href="index.php?pages=logout" class="nav-link">Salir</a>
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

    <script src="https://kit.fontawesome.com/b7aa95e782.js" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>