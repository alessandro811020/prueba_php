<form action="controller/registro_usuario.php" method="post" onsubmit="return validar_formulario()">
    <div class="col-md-5 mt-4 ml-4 rounded border border-secondary">
        <div class="form-group">
            <div class="row mt-3">
                <div class="col-md-2">
                    <label for="exampleFormControlInput1">Nombre:</label>
                </div>
                <div class="col-md-10">
                    <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" placeholder="Nombre">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row mt-3">
                <div class="col-md-2">
                    <label for="exampleFormControlInput1">Email:</label>
                </div>
                <div class="col-md-10">
                    <input type="email" name="email_usuario" class="form-control" id="email_usuario" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="row d-flex flex-row-reverse mt-3 mb-3">
            <div class="col-md-3 ">
                <button type="submit" class="btn btn-secondary" id="button_registrar">Registrar</button>
            </div>
            <div class="col-md-9 text-center" id="mensaje_error">
                <div class="alert alert-danger" role="alert">
                    Tiene Campos sin Completar
                </div>
            </div>
            
        </div>
    </div>
</form>