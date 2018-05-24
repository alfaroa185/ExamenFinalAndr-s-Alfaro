<?php

class DataSource
{
    /**
     * Atributos de la clase
     */
    private $driver, $host, $user, $pass, $database, $charset;

    /**
     * Constructor vacio de la clase
     */
    public function __construct()
    {
        // Obteniendo valores del arreglo y asignandole a los atributos los valores
        $data = require_once "config/database.php";
        $this->driver = $data["driver"];
        $this->host = $data["host"];
        $this->user = $data["user"];
        $this->pass = $data["pass"];
        $this->database = $data["database"];
        $this->charset = $data["charset"];
    }

    public function conectar()
    {
        // Evaluando si el sgbd a utilizar es de mysql o esta nulo
        if ($this->driver == "mysql" || $this->driver == null) {
            // Creando dsn correspondiente a mysql
            $dsn = "mysql:host={$this->host};dbname={$this->database};charset={$this->charset}";
            // Creando objeto del tipo PDO
            $con = new PDO($dsn, $this->user, $this->pass);
            // Creando objeto PDO
            return $con;
        } else {
            // Retornando nulo
            return null;
        }
    }
}