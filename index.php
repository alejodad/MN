<?php
  session_start();
?>
  
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <meta name="viewport" content="width=device-width">
    <title>PIF Metodos Numericos</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="funciones.js"></script>
    
  </head>
  <body>
    <div class="container">
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Bienvenido</h1>
<p class="lead">En este pequeño sistema podrás ingresar ejercicios usando los métodos: Newton, Falsa Posición, Secante y Bisección.</p>
<div class="container">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="lead">Primero debes ingresar la ecuación sobre la que se trabajará.</p>
        <p class="lead">Si tienes una fracción, deberás poner su valor en decimal usando el punto (".") como separador y utilizar 4 o más decimales para obtener mayor precisión. Por ejemplo, 1/3 = 0.3333 o 1/2 = 0.5000.</p>
        <p>Ingrese los términos según su ecuación:</p>
        <br/><p>Ejemplo: 6x³ - 5x² + 4x - 3</p></br>
        <p>Tendrás la opción de ingresar cada expresión de x. Si no tienes un valor para x³, ingresa 0.</p>
         </div>
          
    </div>
      <div class="col">
        <form action="welcome.php" method="post" id="data">
          
               
               <div class="input-group">
                  <div class="col">
                     <div class="input-group">
                        <input type="number" name="expresionA" class="form-control" step="0.0001" required>
                        <div class="input-group-append">
                           <span class="input-group-text" >x³</span>
                        </div>
                     </div>
                  </div>
                  <div class="col">
                     <div class="input-group">
                        <input type="number" name="expresionB" class="form-control" step="0.0001" required>
                        <div class="input-group-append">
                           <span class="input-group-text" >x²</span>
                        </div>
                     </div>
                  </div>
                  <div class="col">
                     <div class="input-group">
                        <input type="number" name="expresionC" class="form-control" step="0.0001"  required>
                        <div class="input-group-append">
                           <span class="input-group-text" >x</span>
                        </div>
                     </div>
                  </div>
                  <div class="col">
                     <div class="input-group">
                        <input type="number" name="expresionD" class="form-control" required>
                        <div class="input-group-append">
                           <span class="input-group-text" >termino independiente</span>
                        </div>
                     </div>
                  </div>
               </div>

    <p>Ahora debes seleccionar el metodo que deseas y pasar los parametros que este necesite. Adelante!</p>
  <div class="mb-3">
<select class="form-select" aria-label="Default select example" id="metodo" name ="metodo">
  <option selected value="">Seleccione metodo</option>
  <option value="1">Newton</option>
  <option value="2">Biseccion</option>
  <option value="3">Secante</option>
  <option value="4">Falsa Pocicion</option>
</select>
   <!--<input type="text" name="expresion" class="form-control"> -->
  </div>
          <div id="contenedorInputs">
            
          </div>
          <div class="mb-3">
    <button type="button" class="btn btn-success form-control" value="Iniciar"onclick="validarMetodo()" >Enviar formulario</button>
          </div>
    </form>
      </div>
    </div>
   <?php 

  ?> 
      <div id="divEspecifico"></div>
  </body>
</html>