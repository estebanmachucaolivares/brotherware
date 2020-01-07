</main>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script src="../js/materialize.min.js"></script>
  <script src="../js/sweetalert2.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>     
  <link rel="stylesheet" href="../css/sweetalert2.css"> 

 

  <script>
  $('.button-collpase').sideNav();
</script>
  <script>
  $('select').material_select();

  function may(obj, id){
    obj= obj.toUpperCase();
    document.getElementById(id).value=obj;
  }

  $('#buscar').keyup(function(event) {
    var contenido = new RegExp($(this).val(), 'i');
    $('tr').hide();
    $('tr').filter(function() {
       return contenido.test($(this).text());
    }).show();
    $('.cabecera').attr('style','');
  });
  </script>             