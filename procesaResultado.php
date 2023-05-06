<?php 
if(!empty($_POST)){
  $expresion="";
  
  //armando la cadena para la funcion
  $expresion .= (trim($_POST['expresionA']))."*x**3";
  $expresion .= mostrar_signo(trim($_POST['expresionB']))."*x**2";
  $expresion .= mostrar_signo(trim($_POST['expresionC']))."*x";
  $expresion .= mostrar_signo(trim($_POST['expresionD']));

  //imprimiendo expresion 
  //print_r($expresion).'</br>';
//imprimiendo metodo

  //guardando los valores de los inputs
$metodo=$_POST["metodo"];

  


//dependiendo del metodo seleccionado tomara el file  y llamara el comando
  switch ($metodo) {
  case 1:
    $file= dirname(__FILE__).'/MetodoNewton.py';
    exec(returnComand($metodo,$file,$expresion), $output);
    echo implode("\n", $output);
    break;
  case 2:
    $file= dirname(__FILE__).'/MetodoBiseccion.py';
    exec(returnComand($metodo,$file,$expresion), $output);
    echo implode("\n", $output);
    break;
  case 3:
    $file= dirname(__FILE__).'/MetodoDeLaSecante.py';
    exec(returnComand($metodo,$file,$expresion), $output);
    echo implode("\n", $output);
    break;
  case 4:
    $file= dirname(__FILE__).'/MetodoFalsaPosicion.py';
    exec(returnComand($metodo,$file,$expresion), $output);
    echo implode("\n", $output);
    break;
  default:
    echo "Opción no válida";
  }
   
  

}

//metodo que retornara el numero antecedido de un + o un -
  function mostrar_signo($numero) {
  if ($numero >= 0) {
    return "+$numero";
  } else {
    return "$numero";
  }
}

//metodo para retornar el comando de shell
function returnComand($metodo,$file,$expresion){
  $command="";
  if($metodo==1){
    //guardando inputs
    $valorX_puntoA=$_POST["input1"];
    $tol=$_POST["input2"];
    $nVeces=$_POST["input3"];
    $cmd = "python";
    //creando argumentos del comando
    $args = [
    "$file",
    "$valorX_puntoA",
    "$tol",
    "$nVeces",
    "$expresion"
    ];
    $escaped_args = implode(" ", array_map("escapeshellarg", $args));
    //armando comando
    $command = "$cmd $escaped_args";
    return $command;
  }else{
    $valorX_puntoA=$_POST["input1"];
    $puntoB=$_POST["input2"];
    $tol=$_POST["input3"];
    $nVeces=$_POST["input4"];
    $cmd = "python";
    $args = [
    "$file",
    "$valorX_puntoA",
    "$puntoB",
    "$tol",
    "$nVeces",
    "$expresion"
    ];
    $escaped_args = implode(" ", array_map("escapeshellarg", $args));
    $command = "$cmd $escaped_args";
    return $command;
    
  }
}

?>