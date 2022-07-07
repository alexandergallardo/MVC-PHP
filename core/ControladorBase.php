<?php
    class ControladorBase
    {

        public function __construct() {
            require_once 'Conectar.php';
            require_once 'EntidadBase.php';

            foreach(glob("model/*.php") as $file){
                require_once $file;
            }
        }

        public function view($vista, $info){
            foreach ($info as $id => $valor) {
                ${$id} = $valor;
            }

            require_once 'core/AyudaVistas.php';

            $helper = new AyudaVistas();

            require_once 'view/'.$vista.'View.php';
        }

        public function redirect($controlador = CONTROLADOR_DEFECTO, $accion = ACCION_DEFECTO, $det = "", $id = 0)
        {
            header("Location:index.php?controller=".$controlador."&action=".$accion);
        }

    }
?>
