<?php
    class ListaController extends ControladorBase{

        public function __construct() {
            parent::__construct();
        }

        public function index()
        {

            $lista = new Lista();

            $all = $lista->getAll();

            $this->view("index", array( "lista" => $all ));
        }

        public function crear()
        {
            if(isset($_POST["detalle"])){

                $lista = new Lista();


                $lista->setDetalle($_POST["detalle"]);
                $lista->setId($_POST["id"]);

                $save = $lista->guardar();
            }

            $this->redirect("Lista", "index");
        }

        public function editar()
        {
            if(isset($_POST["detalleedit"])){

                $lista = new Lista();


                $lista->setDetalle($_POST["detalleedit"]);
                $lista->setId($_POST["idedit"]);

                $save = $lista->guardar();
            }

            $this->redirect("Lista", "index");
        }

        public function borrar(){
            if(isset($_GET["id"])){
                $id=(int)$_GET["id"];

                $lista = new Lista();

                $lista->deleteById($id);
            }
            $this->redirect();
        }

    }
?>
