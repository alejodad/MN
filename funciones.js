$(document).ready(function() {
  $('#metodo').change(function() {
    var seleccion = $(this).val();
    var contenedorInputs = $('#contenedorInputs');
    contenedorInputs.empty(); // Limpiar cualquier input previamente generado

    if (seleccion == 1) {
      // Generar 3 inputs con nombres y etiquetas personalizadas
      contenedorInputs.append('<label for="input1">x0: </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input1" id="input1" required ><br>');
//comentario
      contenedorInputs.append('<label for="input2">Tolerancia: </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input2" id="input2" required ><br>');

      contenedorInputs.append('<label for="input3">N(veces): </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input3" id="input3" required ><br>');
    } else if (seleccion >= 2 && seleccion <= 4) {
      // Generar 4 inputs con nombres y etiquetas personalizadas
      contenedorInputs.append('<label for="input1">Punto A: </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input1" id="input1" required ><br>');

      contenedorInputs.append('<label for="input2">Punto B: </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input2" id="input2" required ><br>');

      contenedorInputs.append('<label for="input3">Tolerancia: </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input3" id="input3" required ><br>');

      contenedorInputs.append('<label for="input4">N(veces): </label>');
      contenedorInputs.append('<input type="text" class="form-control" name="input4" id="input4" required><br>');
    }
  });
});

function validarMetodo(){
  var miSelect = $('#metodo');
  if (miSelect.val() === '') {
    alert('Seleccione metodo');
    return;
  }else if (verificarInputs()){
    $.post("procesaResultado.php", $("#data").serialize(), function(data){
      Swal.fire(data);
         //$('#divEspecifico').html(data);
     });
  }
}

function verificarInputs() {
  // Obtener todos los inputs de la página
  const inputs = document.querySelectorAll('input');
  
  // Verificar si todos los inputs tienen un valor
  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].value === '') {
      alert('Debe completar todos los campos antes de continuar');
      return false;
    }
  }
  
  // Si todos los inputs tienen un valor, continuar con la ejecución
  return true;
}








