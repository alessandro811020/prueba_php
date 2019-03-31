<?php

require '../model/Usuario.php';
require '../model/SolicitudRelacional.php';

$usuario = new Usuario();

if ($usuarios = $usuario->readAllUsuario()) {
    while ($row = $usuarios->fetch()) {
        $id_usuarios[] = $row['id_usuario'];
    }
}
// var_dump($id_usuarios);

$mostrar = "<div class='alert alert-success text-center' role='alert'>
<h3>El ganador es:</h3>
</div><table class='table'>
<thead class='thead-light'>
  <tr>
      <th scope='col'>Número</th>
      <th scope=col'>Nombre</th>
      <th scope='col'>Email</th>
      <th scope='col'>Respondidos</th>
      <th scope='col'>Correctos</th>
  </tr>
</thead>
<tbody>";

$ganador = rand($id_usuarios[0], $id_usuarios[sizeof($id_usuarios) - 1]);
$mostrar .= "<tr>
        <th scope='row'>".$ganador.'</th>';

    $relacional = new SolicitudRelacional($ganador);

    if ($resultados = $relacional->getConsulta()) {
        while ($row = $resultados->fetch()) {
            $nombre[] = $row['nombre'];
            $email[] = $row['email'];
            $respuestas_usuario[] = $row['respuesta'];
            $respuestas_correctas_usuario[] = $row['respuesta_correcta'];
        }
    }
    $mostrar .= '<td>'.$nombre[0].'</td><td>'.$email[0].'</td><td>'.sizeof($respuestas_usuario).'</td><td>';
    $contador_correctas = 0;
    for ($j = 0; $j < sizeof($respuestas_usuario); ++$j) {
        if ($respuestas_usuario[$j] == $respuestas_correctas_usuario[$j]) {
            ++$contador_correctas;
        }
    }
    $mostrar .= $contador_correctas.'</td></tr>';

$mostrar .= '</tbody>
</table>';

echo $mostrar;
