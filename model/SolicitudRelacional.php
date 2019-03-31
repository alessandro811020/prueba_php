<?php

class SolicitudRelacional extends Conectar
{
    private $consulta;
    private $nueva_consulta;

    public function __construct($id_usuario)
    {
        parent::__construct();
        $sql_create_table = 'SELECT * FROM resultado 
                LEFT JOIN pregunta ON pregunta.id_pregunta = resultado.id_pregunta
                LEFT JOIN usuario ON usuario.id_usuario = resultado.id_usuario where resultado.id_usuario='.$id_usuario;

        try {
            $this->consulta = $this->getDataBaseConnection()->query($sql_create_table);
        } catch (PDOException $e) {
            echo 'Error conectando con la base de datos: '.$e->getMessage();
        }
    }

    public function getConsulta()
    {
        return $this->consulta;
    }

    public function getConnection()
    {
        return $this->getDataBaseConnection();
    }

    public function getTotalRespuestas()
    {
        $contador = 0;
        while ($row = $this->consulta->fetch()) {
            ++$contador;
        }

        return $contador;
    }

    // public function resultadoID($id_usuario)
    // {
    //     $nuevo_sql = $this->sql_create_table.' WHERE id_usuario = '.$id_usuario;

    //     try {
    //         $this->nueva_consulta = $this->getDataBaseConnection()->query($nuevo_sql);
    //     } catch (PDOException $e) {
    //         echo 'Error conectando con la base de datos: '.$e->getMessage();
    //     }
    //     var_dump($this->nueva_consulta);

    //     // return $this->nueva_consulta;
    // }
}
