<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Landing EveryOne PLUS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
    <script src="assets/js/main.js"></script>
</head>
<body>
    <div class="cabecera">
        <img src="assets/images/imagen-home.jpg" style="width:100%">
    </div>
    <div class="container">
        <p><strong>Para participar solo tienes que responder a estas sencillas preguntas y pulsar el botón enviar.</strong> El nombre de los dos ganadores se comunicará en la cena patrocinada por Schindler el día 27 de mayoen la Finca Las Calabacicas</p>

        <h3><strong>Participa</strong> </h3>
        <form action="" method="POST">
            <p>¿A cuántas comunidades de vecinos das servicios?</p>
            <input type="number" name="comunidades" id="comunidades" value="2">
            <p class="mt-3"><strong>Si ya trabajas con Schindler en el sector residencial:</strong></p>
            <label>¿Estas dado de alta en la Comunidad Schindler?</label>
            <div class="row">
                <div class="form-check ml-3">
                    <input class="form-check-input" type="radio" name="com_schi" id="com_schi" value="si">
                    <label class="form-check-label" for="exampleRadios1">
                        Si
                    </label>
                </div>
                <div class="form-check ml-3">
                    <input class="form-check-input" type="radio" name="com_schi" id="com_schi" value="no">
                    <label class="form-check-label" for="exampleRadios1">
                        No
                    </label>
                </div>
            </div>
            <label class="mt-1">¿Te gustaría?</label>
            <div class="row">
                <div class="form-check ml-3">
                    <input class="form-check-input" type="radio" name="gusto" id="gusto" value="si">
                    <label class="form-check-label" for="exampleRadios1">
                        Si
                    </label>
                </div>
                <div class="form-check ml-3">
                    <input class="form-check-input" type="radio" name="gusto" id="gusto" value="no">
                    <label class="form-check-label" for="exampleRadios1">
                        No
                    </label>
                </div>
            </div>
            <br>
            <p>¿Quieres recibir publicidad sobre los descuentos y ventajas de nuestra comunidad?</p>
            <div class="row">
                <div class="form-check ml-3">
                    <input class="form-check-input" type="radio" name="gusto" id="gusto" value="si">
                    <label class="form-check-label" for="exampleRadios1">
                        Si
                    </label>
                </div>
                <div class="form-check ml-3">
                    <input class="form-check-input" type="radio" name="gusto" id="gusto" value="no">
                    <label class="form-check-label" for="exampleRadios1">
                        No
                    </label>
                </div>
            </div>
            <div class="aceptacion">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="acepto" id="acepto" value="si">
                        <label class="form-check-label bases_legales" for="exampleRadios1">
                            He leido y aceptro las bases legales
                        </label>
                    </div>
                    <div>
                        <button type="button">ENVIAR</button>
                    </div>
                    <br>
                    <br>
                    <div class="pie">
                         <p>© Schindler 2017</p>
                    </div>
            
            </div>
        </form>
    </div>

    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>