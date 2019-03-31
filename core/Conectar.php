<?php

// $add_ruta = "";

// if(!file_exists("dinamico/objetos/productos.php"))

//     $add_ruta = "../../";

// include_once($add_ruta."dinamico/objetos/productos.php");

$add_ruta = '';

if (file_exists('../config/Config.php')) {
    $add_ruta = '../';
} else {
    $add_ruta = './';
}
$archivo_config = $add_ruta.'config/Config.php';

include_once $archivo_config;

abstract class Conectar
{
    private $db_conection;
    private $config;

    public function __construct()
    {
        $this->config = new Config();
        try {
            $this->db_conection = new PDO('mysql:host='.$this->config::SERVIDOR.';dbname='.$this->config::BASE_DE_DATOS, $this->config::USUARIO_BASE_DATOS, $this->config::PASSWORD);
        } catch (PDOException $e) {
            echo 'Falló la conexión: '.$e->getMessage();
        }
    }

    public function getDataBaseConnection()
    {
        return $this->db_conection;
    }
}
