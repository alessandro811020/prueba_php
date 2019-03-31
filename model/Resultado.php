<?php

require '../core/Conectar.php';

class Resultado extends Conectar
{
    private $table_name = 'Resultado';

    public function __construct()
    {
        parent::__construct();
        $sql_create_table = "CREATE TABLE IF NOT EXISTS `Resultado` (
            `id_resultado` INT NOT NULL AUTO_INCREMENT,
            `id_usuario` INT(11) NOT NULL DEFAULT '0',
            `id_pregunta` INT(11) NOT NULL DEFAULT '0',
            `respuesta` VARCHAR(100) NOT NULL DEFAULT '0',
            `fecha_alta` TIMESTAMP NOT NULL,
            PRIMARY KEY (`id_resultado`)
        )";

        try {
            $this->getDataBaseConnection()->query($sql_create_table);
        } catch (PDOException $e) {
            echo 'Error conectando con la base de datos: '.$e->getMessage();
        }
    }

    public function readResultadoById($id_resultado)
    {
        $sentencia = $this->getDataBaseConnection()->prepare(' SELECT * FROM Resultado WHERE id_resultado=:id_resultado');
        $sentencia->bindParam(':id_resultado', $id_resultado);

        return $sentencia->execute();
    }

    public function readAllResultado()
    {
        $sentencia = $this->getDataBaseConnection()->prepare(' SELECT * FROM Resultado');

        return $sentencia->execute();
    }

    public function insertResultado($id_usuario, $id_pregunta, $respuesta)
    {
        $sentencia = $this->getDataBaseConnection()->prepare('INSERT INTO Resultado (id_usuario, id_pregunta, respuesta) VALUES (:id_usuario, :id_pregunta, :respuesta)');
        $sentencia->bindParam(':id_usuario', $id_usuario);
        $sentencia->bindParam(':id_pregunta', $id_pregunta);
        $sentencia->bindParam(':respuesta', $respuesta);
        if ($sentencia->execute()) {
            return 'Data Inserted';
        } else {
            return 'Error';
        }
    }

    public function updateResultado($id_resultado, $id_usuario, $id_pregunta, $respuesta)
    {
        $consulta = 'UPDATE Usuario SET ';
        $primero = false;
        if ($id_usuario != '') {
            $consulta .= "id_usuario='".$id_usuario."'";
            $primero = true;
        }

        if ($id_pregunta != '') {
            if ($primero) {
                $respuesta .= ', ';
            }
            $consulta .= "id_pregunta='".$id_pregunta."'";
            $primero = true;
        }

        if ($respuesta != '') {
            if ($primero) {
                $respuesta .= ', ';
            }
            $consulta .= "respuesta='".$respuesta."'";
        }
        $consulta .= ' WHERE id_resultado='.$id;

        $sentencia = $this->getDataBaseConnection()->prepare($consulta);
        if ($sentencia->execute()) {
            echo 'Data Updated';
        } else {
            echo 'Error';
        }
    }

    public function deleteResultado($id_resultado)
    {
        $sentencia = $this->getDataBaseConnection()->prepare('DELETE FROM Resultado WHERE id_resultado= :id');
        $sentencia->bindParam(':id', $id_resultado);
        if ($sentencia->execute()) {
            echo 'Data Deleted';
        } else {
            echo 'Error';
        }
    }
}
