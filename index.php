<?php
    session_start();

    $_SESSION["myDetalle"] = "";
    $_SESSION["myId"]      = 0;

    require_once 'config/global.php';

    require_once 'core/ControladorBase.php';

    require_once 'core/ControladorFrontal.func.php';

    //Cargamos controladores y acciones
    if(isset($_GET["controller"])){
        $controllerObj = cargarControlador($_GET["controller"]);
        lanzarAccion($controllerObj);
    }else{
        $controllerObj = cargarControlador(CONTROLADOR_DEFECTO);
        lanzarAccion($controllerObj);
    }

