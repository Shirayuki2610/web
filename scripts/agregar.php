<?php
$servidor= "localhost";
$user = "root";
$psw = "";
$bd = "agenda";
$conex = mysqli_connect($servidor,$user,$psw,$bd) or die ("temporalmente el servidor no esta disponible");
if ($conex){
$n = $_REQUEST['textNom'];
$d = $_REQUEST['textDir'];
$t = $_REQUEST['textTel'];
$m = $_REQUEST['textMail'];
$sql= "insert into usuario values (NULL, '$n','$d','$t','$m')";
$resultado=mysqli_query($conex,$sql);

if($resultado)
echo"se agregaron correctamente los datos";
//poner enlaces al menu, a la pagina principal, etc.


mysqli_close ($conex);
}
?>