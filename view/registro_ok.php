<?php

require './model/Pregunta.php';

$pregunta = new Pregunta();
$preguntas_base_datos = $pregunta->readAllPregunta();
while ($row = $preguntas_base_datos->fetch()) {
    $id_pregunta[] = $row['id_pregunta'];
}
if (isset($id_pregunta)) {
    if (sizeof($id_pregunta) <= 0) {
        $pregunta->insertPregunta('Futbolista italiano que falló el último penal de la final del mundial de 1994', 'Baggio');
        $pregunta->insertPregunta('Año que acabó la 2da Guerra Mundial', '1945');
        $pregunta->insertPregunta('Creador de la Teoría de la Relatividad', 'Einstein');
    }
}

$respuestas = [
    ['Donadoni', 'Baggio', 'Berti', 'Maldini', 'Signori'],
    [1940, 1942, 1948, 1945, 1946],
    ['Newton', 'Da Vinci', 'Curie', 'Planck', 'Einstein'],
];

?>


<div class="alert alert-success text-center display-4" role="alert">
 <strong> Ha completado el Registro Satisfactoriamente, ahora podrá responder el siguiente cuestionario.</strong>
</div>

<?php include 'cuestionario.php'; ?>