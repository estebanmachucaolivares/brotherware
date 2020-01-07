 

function eliminar(id,mant) {
    swal({
        title: 'Eliminar Registro',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar',
      }).then(function() {
          swal(
              location.href='../extend/eliminar.php?id='+id+'&mant='+mant
          )
      });
}


