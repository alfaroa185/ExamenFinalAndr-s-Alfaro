<?php

require_once "Empleado.php";

class EmpleadosModel extends Empleado
{
    
    private $tabla;

    public function __construct($datasource)
    {
        $this->tabla = "empleados";
        //$this->tabla2 = "departamentos";
        parent::__construct($datasource);
    }

    public function save()
    {
        $query = "INSERT INTO {$this->tabla} (id,id_departamento,nombres,apellidos,pago_hora,horas) VALUES (:id,:id_departamento,:nombres, :apellidos, :pago_hora, :horas)";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":id" => $this->id,":id_departamento" => $this->id_departamento,":nombres" => $this->nombres, ":apellidos" => $this->apellidos, ":pago_hora" => $this->pago_hora, ":horas" => $this->horas));
    }

    public function update()
    {
        $query = "UPDATE {$this->tabla} SET id_departamento = :id_departamento, nombres = :nombres, apellidos = :apellidos, pago_hora = :pago_hora, horas = :horas WHERE id = :id";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":id_departamento" => $this->id_departamento,":nombres" => $this->nombres, ":apellidos" => $this->apellidos,":pago_hora" => $this->pago_hora, ":horas" => $this->horas, ":id" => $this->id));
    }

    public function all()
    {
        $empleados = array();
        $query = "SELECT e.id,e.id_departamento,e.nombres,e.apellidos,e.pago_hora,e.horas,d.nombre FROM {$this->tabla} e inner join departamentos d on  d.id = e.id_departamento";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute();
        while ($empleado = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($empleados,$empleado);
        }
        return $empleados;
    }

    function find(int $id)
    {
        $query = "SELECT * FROM {$this->tabla} where id = :id";
        //var_dump($query);
        $stmt = $this->datasource->prepare($query);
        $stmt -> execute(array(":id"=>$id));
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
 
    public function delete($id)
    {
        $query = "DELETE FROM {$this->tabla} WHERE id = :id";
        $stmt = $this->datasource->prepare($query);
        $stmt->execute(array(":id" => $id));
    }
}