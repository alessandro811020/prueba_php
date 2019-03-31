<?php

require '../model/Usuario.php';
$usuario = new Usuario();

if (isset($_POST)) {
    $nombre = $_POST['nombre_usuario'];
    $email = $_POST['email_usuario'];
    $res = $usuario->insertUsuario($nombre, $email);
    if ($res == 'Data Inserted') {
        session_start();
        $_SESSION['id_usuario'] = $usuario->getIDRegisteredUser();
        var_dump($_SESSION);
        header('Location:../index.php?accion=ok');
    } else {
        header('Location:../index.php?accion=ko');
    }
} else {
    header("Location:'../index.php?accion=ko");
}
