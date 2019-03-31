function validar_formulario(){
    var nombre = document.getElementById('nombre_usuario').value;
    var email  = document.getElementById('email_usuario').value;
    
    console.log(nombre);
    
    var continuar = true;
    
    if(nombre==""){
        continuar = false;
        $('#nombre_usuario').css('border','1px solid red');
        $('#mensaje_error').show();
    }
    
    if(email==""){
        continuar = false;
        $('#email_usuario').css('border','1px solid red');
        $('#mensaje_error').show();
    }
    
    return continuar; 
    
}
    
function  validar_respuestas(){
    var pregunta_1 = $('input:radio[name=1]:checked').val();
    var pregunta_2 = $('input:radio[name=2]:checked').val();
    var pregunta_3 = $('input:radio[name=3]:checked').val();
    var todo=pregunta_1+pregunta_2+pregunta_3;


    var continuar = true;
    
    if(todo.length==undefined){
        continuar = false;
        $('#cuestionario_preguntas').css('border','1px solid red');
        $('#mensaje_error').show();
    }

    return continuar;
}

$(document).ready(function(){
    $('#resultado_general').click(function(){

        var ruta_busqueda = "./controller/mostrar_resultados.php"

        $.ajax({
            data: {},
            type: "POST",
            url: ruta_busqueda,
        })
         .done(function( datos ) {
             $('#respuesta_solicitud').html(datos);
         })
         .fail(function( datos ) {
            $('#respuesta_solicitud').html("Error en la consulta");

        });

    })


    $('#ganador').click(function(){
        var ruta_busqueda = "./controller/mostrar_ganador.php"

        $.ajax({
            data: {},
            type: "POST",
            url: ruta_busqueda,
        })
         .done(function( datos ) {
            $('#respuesta_solicitud').html(datos);
         })
         .fail(function( datos ) {
            $('#respuesta_solicitud').html("Error en la consulta");
        });
    })
});

    