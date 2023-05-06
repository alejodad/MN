$(document).ready(function() {
  $('#metodo').change(function() {
    var seleccion = $(this).val();
    var contenedorInputs = $('#contenedorInputs');
    contenedorInputs.empty(); // Limpiar cualquier input previamente generado

    if (seleccion == 1) {
      // Generar 3 inputs con nombres y etiquetas personalizadas
      contenedorInputs.append('<label for="input1">x0: </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input1" id="input1" ><br>');
//comentario
      contenedorInputs.append('<label for="input2">Tolerancia: </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input2" id="input2" ><br>');

      contenedorInputs.append('<label for="input3">N(veces): </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input3" id="input3" ><br>');
    } else if (seleccion >= 2 && seleccion <= 4) {
      // Generar 4 inputs con nombres y etiquetas personalizadas
      contenedorInputs.append('<label for="input1">Punto A: </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input1" id="input1" ><br>');

      contenedorInputs.append('<label for="input2">Punto B: </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input2" id="input2" ><br>');

      contenedorInputs.append('<label for="input3">Tolerancia: </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input3" id="input3" ><br>');

      contenedorInputs.append('<label for="input4">N(veces): </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input4" id="input4" ><br>');
    }
  });
});

function validarMetodo(){
  var miSelect = $('#metodo');
  if (miSelect.val() === '') {
    alert('Seleccione metodo');
    return;
  }else{
    $.post("procesaResultado.php", $("#data").serialize(), function(data){
         $('#divEspecifico').html(data);
     });
  }
}







