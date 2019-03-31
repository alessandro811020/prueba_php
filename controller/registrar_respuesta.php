<?php


if (isset($_POST)) {
    require '../model/Resultado.php';
    $resultado = new Resultado();

    $preguntas = array();
    $respuestas = array();

    $respuesta1 = '';
    if (isset($_POST['1'])) {
        $respuesta1 = $_POST['1'];
        array_push($respuestas, $respuesta1);
        array_push($preguntas, 1);
    }
    $respuesta2 = '';
    if (isset($_POST['2'])) {
        $respuesta2 = $_POST['2'];
        array_push($respuestas, $respuesta2);
        array_push($preguntas, 2);
    }
    $respuesta3 = '';
    if (isset($_POST['3'])) {
        $respuesta3 = $_POST['3'];
        array_push($respuestas, $respuesta3);
        array_push($preguntas, 3);
    }

    $id_usuario = '';
    if (isset($_POST['id_usuario'])) {
        $id_usuario = $_POST['id_usuario'];
    }

    if (sizeof($respuestas) > 0) {
        for ($i = 0; $i < sizeof($respuestas); ++$i) {
            $registro = $resultado->insertResultado($id_usuario, $preguntas[$i], $respuestas[$i]);
        }
    }

    if (strlen($registro) > 0) {
        header('Location:../index.php?accion=resultados');
    } else {
        header('Location:../index.php?accion=ko');
    }
}
