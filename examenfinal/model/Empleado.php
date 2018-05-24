<?php

class Empleado
{

    protected $id;
    protected $id_departamento;
    protected $nombres;
    protected $apellidos;
    protected $pago_hora;
    protected $horas;  
    protected $datasource;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __construct($datasource)
    {
        $this->datasource = $datasource;
    }
}
