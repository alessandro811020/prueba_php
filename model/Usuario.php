<?php

require '../core/Conectar.php';

class Usuario extends Conectar
{
    private $table_name = 'Usuario';

    public function __construct()
    {
        parent::__construct();
        $sql_create_table = "CREATE TABLE IF NOT EXISTS `Usuario` (
            `id_usuario` INT NOT NULL AUTO_INCREMENT,
            `nombre` VARCHAR(50) NOT NULL DEFAULT '0',
            `email` VARCHAR(50) NOT NULL DEFAULT '0',
            `fecha_alta` TIMESTAMP NOT NULL,
            PRIMARY KEY (`id_usuario`)
        )";

        try {
            $this->usuarios = $this->getDataBaseConnection()->query($sql_create_table);
        } catch (PDOException $e) {
            echo 'Error conectando con la base de datos: '.$e->getMessage();
        }
    }

    public function readUsuarioById($id_usuario)
    {
        $sentencia = $this->getDataBaseConnection()->prepare(' SELECT * FROM Usuario WHERE id_usuario=:id_usuario');
        $sentencia->bindParam(':id_usuario', $id_usuario);

        return $sentencia->execute();
    }

    public function readAllUsuario()
    {
        return $sentencia = $this->getDataBaseConnection()->query(' SELECT * FROM Usuario');
    }

    public function insertUsuario($nombre, $email)
    {
        $sentencia = $this->getDataBaseConnection()->prepare('INSERT INTO Usuario (nombre, email) VALUES (:nombre, :email)');
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':email', $email);
        if ($sentencia->execute()) {
            return 'Data Inserted';
        } else {
            return 'Error';
        }
    }

    public function getIDRegisteredUser()
    {
        if ($sentencia = $this->getDataBaseConnection()->query(' SELECT MAX(id_usuario) FROM Usuario')) {
            while ($row = $sentencia->fetch()) {
                $id_usuario = $row['MAX(id_usuario)'];
            }
        }

        return $id_usuario;
    }

    public function updateUsuario($id, $nombre, $email)
    {
        $consulta = 'UPDATE Usuario SET ';
        $primero = false;
        if ($nombre != '') {
            $consulta .= "nombre='".$nombre."'";
            $primero = true;
        }

        if ($email != '') {
            if ($primero) {
                $consulta .= ', ';
            }
            $consulta .= "email='".$email."'";
        }
        $consulta .= ' WHERE id_usuario='.$id;

        $sentencia = $this->getDataBaseConnection()->prepare($consulta);
        if ($sentencia->execute()) {
            echo 'Data Updated';
        } else {
            echo 'Error';
        }
    }

    public function deleteUsuario($id_usuario)
    {
        $sentencia = $this->getDataBaseConnection()->prepare('DELETE FROM Usuario WHERE id_usuario= :id');
        $sentencia->bindParam(':id', $id_usuario);
        if ($sentencia->execute()) {
            echo 'Data Deleted';
        } else {
            echo 'Error';
        }
    }
}
