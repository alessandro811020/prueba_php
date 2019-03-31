<?php

require './core/Conectar.php';

class Pregunta extends Conectar
{
    private $table_name = 'Pregunta';

    public function __construct()
    {
        parent::__construct();
        $sql_create_table = "CREATE TABLE IF NOT EXISTS `Pregunta` (
            `id_pregunta` INT NOT NULL AUTO_INCREMENT,
            `pregunta` VARCHAR(50) NOT NULL DEFAULT '0',
            `respuesta` VARCHAR(100) NOT NULL DEFAULT '0',
            PRIMARY KEY (`id_pregunta`)
        )";

        try {
            $this->getDataBaseConnection()->query($sql_create_table);
        } catch (PDOException $e) {
            echo 'Error conectando con la base de datos: '.$e->getMessage();
        }
    }

    public function readPreguntaById($id_pregunta)
    {
        $sentencia = $this->getDataBaseConnection()->prepare(' SELECT * FROM Pregunta WHERE id_pregunta=:id_pregunta');
        $sentencia->bindParam(':id_pregunta', $id_pregunta);

        return $sentencia->execute();
    }

    public function readAllPregunta()
    {
        return $sentencia = $this->getDataBaseConnection()->query(' SELECT * FROM Pregunta');
    }

    public function insertPregunta($pregunta, $respuesta)
    {
        $sentencia = $this->getDataBaseConnection()->prepare('INSERT INTO Pregunta (pregunta, respuesta) VALUES (:pregunta, :respuesta)');
        $sentencia->bindParam(':pregunta', $pregunta);
        $sentencia->bindParam(':respuesta', $respuesta);
        if ($sentencia->execute()) {
            echo 'Data Inserted';
        } else {
            echo 'Error';
        }
    }

    public function updatePregunta($id_pregunta, $pregunta, $respuesta)
    {
        $consulta = 'UPDATE Pregunta SET ';
        $primero = false;
        if ($nombre != '') {
            $consulta .= "pregunta='".$pregunta."'";
            $primero = true;
        }

        if ($email != '') {
            if ($primero) {
                $consulta .= ', ';
            }
            $consulta .= "respuesta='".$respuesta."'";
        }
        $consulta .= ' WHERE id_pregunta='.$id_pregunta;

        $sentencia = $this->getDataBaseConnection()->prepare($consulta);
        if ($sentencia->execute()) {
            echo 'Data Updated';
        } else {
            echo 'Error';
        }
    }

    public function deletePregunta($id_pregunta)
    {
        $sentencia = $this->getDataBaseConnection()->prepare('DELETE FROM Pregunta WHERE id_pregunta= :id');
        $sentencia->bindParam(':id', $id_pregunta);
        if ($sentencia->execute()) {
            echo 'Data Deleted';
        } else {
            echo 'Error';
        }
    }
}
