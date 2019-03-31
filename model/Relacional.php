<?php

require './core/Conectar.php';

class Relacional extends Conectar
{
    private $consulta_usuario;

    public function __construct($id_usuario)
    {
        parent::__construct();
        $sql_create_table = 'SELECT * FROM resultado LEFT JOIN pregunta ON pregunta.id_pregunta = resultado.id_pregunta WHERE id_usuario='.$id_usuario;

        try {
            $this->consulta_usuario = $this->getDataBaseConnection()->query($sql_create_table);
        } catch (PDOException $e) {
            echo 'Error conectando con la base de datos: '.$e->getMessage();
        }
    }

    public function getConsulta()
    {
        return $this->consulta_usuario;
    }

    public function getTotalRespuestas()
    {
        $contador = 0;
        while ($row = $this->consulta_usuario->fetch()) {
            ++$contador;
        }

        return $contador;
    }
}
