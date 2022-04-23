<?php

//index : En el mostraremos la salida de las vistas al usuario 
//y también a traves de él enviaresmos las distintas acciones que el usuario envíe al controlador

require_once "controllers/templateController.php";

$template = new TemplateController();

$template->ctrGetTemplate();



?>