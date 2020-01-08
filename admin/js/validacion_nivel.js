//validacion de existencia de nombres de usuario
$('#nivelu').change(function(){
    $.post('ajax_validacion_nivel.php',{
     nivelu:$('#nivelu').val(),
     beforeSend: function(){
         $('.validacionnivel').html("Espere un momento..");
     }
    },function(respuesta){
     $('.validacionnivel').html(respuesta);
    });
  });

  //Desactivar tecla enter para evitar envio de formulario vacio
  $('.form').keypress(function(e){
    if(e.which ==13){
        return false;
    }

  });