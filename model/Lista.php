<?php
    class Lista extends EntidadBase{
        private $id;
        private $detalle;

        public function __construct() {
            $tabla = "lista";

            parent::__construct($tabla);
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getDetalle() {
            return $this->detalle;
        }

        public function setDetalle($detalle) {
            $this->detalle = $detalle;
        }


        public function guardar(){
            if($this->id <= 0)
                 $query = "INSERT INTO lista (detalle) VALUES('".$this->detalle."')";
            else $query = "UPDATE lista SET detalle = '".$this->detalle."' WHERE id=". $this->id;

            $procesar = $this->getDb()->query($query);

            return $procesar;
        }
    }
?>
