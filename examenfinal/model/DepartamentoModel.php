<?php

require_once "Departamento.php";

class DepartamentoModel extends Departamento
{
   
    private $tabla;

    public function __construct($datasource)
    {
        $this->tabla = "departamentos";
        //$this->tabla2 = "departamentos";
        parent::__construct($datasource);
    }

    public function all()
    {
        $departamentos = array();
        $query = "SELECT * FROM {$this->tabla} ";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute();
        while ($departamento = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($departamentos, $departamento);
        }
        return $departamentos;
    }
}