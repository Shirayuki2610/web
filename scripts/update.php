<?php
$servidor= "localhost";
$user = "root";
$psw = "";
$bd = "agenda";
$conex = mysqli_connect($servidor,$user,$psw,$bd) or die ("temporalmente el servidor no esta disponible");

if ($conex) {
    $id = $_REQUEST['id']; // Obtener el ID del usuario a actualizar
    $n = $_REQUEST['textNom'];
    $d = $_REQUEST['textDir'];
    $t = $_REQUEST['textTel'];
    $m = $_REQUEST['textMail'];
    
    $sql= "UPDATE usuario SET nombre='$n', dirección='$d', telefono='$t', email='$m' WHERE id=$id";
    
    $resultado=mysqli_query($conex,$sql);

    if ($resultado) {
        echo "Se actualizaron correctamente los datos";
        // Aquí puedes agregar enlaces al menú, a la página principal, etc.
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($conex);
    }

    mysqli_close($conex);
}
?>
