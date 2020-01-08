//validacion de existencia de nombres de usuario
$('#nick').change(function(){
    $.post('ajax_validacion_nick.php',{
     nick:$('#nick').val(),
     beforeSend: function(){
         $('.validacion').html("Espere un momento..");
     }
    },function(respuesta){
     $('.validacion').html(respuesta);
    });
  });
 
 
  //validacion de coincidencia de contraseñas
   $('#pass2').change(function(event){
    if($('#pass1').val()!=$('#pass2').val()){
     swal('Oppss..','Las contraseñas no Coinciden', 'error');
    }else{
        $('#btn_guardar').show
    }
   });
 
   //Desactivar tecla enter para evitar envio de formulario vacio
   $('.form').keypress(function(e){
     if(e.which ==13){
         return false;
     }
 
   });