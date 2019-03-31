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

$mostrar = "<table class='table'>
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
for ($i = 0; $i < sizeof($id_usuarios); ++$i) {
    $mostrar .= "<tr>
        <th scope='row'>".$id_usuarios[$i].'</th>';
    $relacional = new SolicitudRelacional($id_usuarios[$i]);

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
    $nombre = null;
    $email = null;
    $respuestas_usuario = null;
    $respuestas_correctas_usuario = null;
}
$mostrar .= '</tbody>
</table>';

echo $mostrar;
