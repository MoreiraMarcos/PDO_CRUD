<?php

class Conexion{
    public function conectar()
    {
        $root = 'root';
        $password = '';
        $host = 'localhost';
        $dbname = 'basededatos';
        
        return $conexion = new PDO("mysql:host=$host;dbname=$dbname;", $root, $password);
    }
}