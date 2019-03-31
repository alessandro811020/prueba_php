<?php 
require './model/Relacional.php';

session_start();

$relacional = new Relacional($_SESSION['id_usuario']);
$contador = 0;

$resultado = $relacional->getConsulta();
while ($row = $resultado->fetch()) {
    $preguntas[] = $row['pregunta'];
    $respuestas[] = $row['respuesta'];
    $respuesta_correcta[] = $row['respuesta_correcta'];
}

?>


<div class="alert alert-info text-center" role="alert">
    <h3><strong> Sus respuestas han sido registradas.</strong></h3>
</div>

<div class="border border-primary resultado_respuesta" id="resultado_respuesta">
    <div class="alert alert-dark row" role="alert">
        <div class="ml-3">
            Preguntas Respondidas: <span class="badge badge-primary"><?php echo sizeof($preguntas); ?></span>
        </div>
        <div class="ml-3">
            Preguntas Sin Responder: <span class="badge badge-danger"><?php echo 3 - sizeof($preguntas); ?></span>
        </div>
    </div>

<table class="table">
  <thead class="thead-light">
    <tr>
        <th scope="col">Número</th>
        <th scope="col">Pregunta</th>
        <th scope="col">Respuesta</th>
        <th scope="col">Correcto</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < sizeof($preguntas); ++$i):?>
        <tr>
            <th scope="row"><?php echo $i + 1; ?></th>
            <td><?php echo $preguntas[$i]; ?></td>
            <td><?php echo $respuestas[$i]; ?></td>
            <td><?php if ($respuestas[$i] == $respuesta_correcta[$i]) {
    echo '<p style="color:green"><strong>Correcto</strong></p>';
} else {
    echo '<p style="color:red"><strong>Incorrecto</strong></p>';
} ?></td>
        </tr>
<?php endfor; ?>
  </tbody>
</table>

</div>

<div class="d-flex justify-content-center row mt-4 mb-4">
    <button type="button" class="btn btn-primary ml-3 mr-3" id="resultado_general">Tabla Resultados</button>
    <button type="button" class="btn btn-primary ml-3 mr-3" id="ganador">Ganador</button>
</div>

<div class="container" id="respuesta_solicitud">

</div>