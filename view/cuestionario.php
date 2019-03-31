<div class="container">
<?php session_start(); ?>
<form method="post" action="controller/registrar_respuesta.php" onsubmit="return validar_respuestas()">
    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
    <div id="cuestionario_preguntas">
    <?php
        $contador = 0;
        if ($preguntas_base_datos = $pregunta->readAllPregunta()) {
            while ($row = $preguntas_base_datos->fetch()) {
                ?>
                    <div class="col-md-12 mt-4" id="cuestiones">
                        <div class="alert alert-info" role="alert">
                            <div class="pregunta">
                                <?=$row['pregunta']; ?>
                            </div>
                            <hr>
                            <div class="respuestas">
                                <?php for ($i = 0; $i < sizeof($respuestas[$contador]); ++$i):?>
                                    <div class="col-md-2 form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="<?=($contador + 1); ?>" id="<?=($contador + 1); ?>" value="<?=$respuestas[$contador][$i]; ?>">
                                        <label class="form-check-label" for="inlineRadio1"><?=$respuestas[$contador][$i]; ?></label>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        <?php ++$contador; ?>
                        </div>
                    </div>
                <?php
            }
        }

    ?>
    </div>


    <div class="row d-flex flex-row-reverse mt-3 mb-3">
            <div class="col-md-3 ">
                <button type="submit" class="btn btn-secondary" id="boton_guardar_respuesta">Responder</button>
            </div>
            <div class="col-md-9 text-center" id="mensaje_error">
                <div class="alert alert-danger" role="alert">
                    Debe Responder al menos una pregunta
                </div>
            </div>
            
        </div>

</form>
<!-- <button type="button" class="btn btn-secondary" id="button_prueba">PRueba</button> -->


</div>