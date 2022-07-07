<?php
    require_once 'Conectar.php';

    class EntidadBase
    {
        private $tabla;
        private $db;
        private $conectar;

        public function __construct($tabla) {
            $this->tabla = (string) $tabla;

            $this->conectar = new Conectar();
            $this->db       = $this->conectar->conexion();
        }

        public function getConetar()
        {
            return $this->conectar;
        }

        public function getDb()
        {
            return $this->db;
        }

        public function getAll()
        {
            $query = $this->db->query("SELECT * FROM $this->tabla where eliminado IS  NULL  ORDER BY id DESC");

          //  if($query)
                while ($row = $query->fetch_object()) {
                    $resultSet[] = $row;
                }

            return isset($resultSet) ? $resultSet : false;
        }

        public function getById($id){
            $query = $this->db->query("SELECT * FROM $this->tabla WHERE id = $id and eliminado IS  NULL");

            if($row = $query->fetch_object())
            {
                $resultSet = $row;
            }

            return isset($resultSet) ? $resultSet : false;
        }

        public function deleteById($id)
        {
            $query = $this->db->query("UPDATE $this->tabla SET eliminado = NOW() WHERE id = $id");
            return $query;
        }

    }
?>
