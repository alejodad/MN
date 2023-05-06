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
$valorX_puntoA=$_POST["input1"];
$tol=$_POST["input2"];
$nVeces=$_POST["input3"];

  



  switch ($metodo) {
  case 1:
    $file= dirname(__FILE__).'/MetodoNewton.py';
    
$cmd = "python";
$args = [
    "$file",
    "$valorX_puntoA",
    "$tol",
    "$nVeces",
    "$expresion"
];
  $escaped_args = implode(" ", array_map("escapeshellarg", $args));
$command = "python '/home/runner/MN/MetodoNewton.py' '3.1416' '0.0000001' '10' '0*x**3+10*x**2-3*x+2'";
$output = "";
exec($command, $output);
echo implode("\n", $output);
    break;
  case 2:
    $resultado = shell_exec('whoami');
    echo "<pre>$resultado</pre>";
    break;
  case 3:
    $resultado = shell_exec('uptime');
    echo "<pre>$resultado</pre>";
    break;
  case 4:
    $resultado = shell_exec('df -h');
    echo "<pre>$resultado</pre>";
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

?>