<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/byron/proyecto/prue.php">Agenda</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <form class="navbar-form navbar-left" id="searchForm">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/byron/proyecto/scripts/agregar.php">Agregar Contacto</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container">
  <h2>Agregar Contacto:</h2>
  <table class="table" id="resultsTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

<?php
$servidor= "localhost";
$user = "root";
$psw = "";
$bd = "agenda";
$conex = mysqli_connect($servidor,$user,$psw,$bd) or die ("temporalmente el servidor no esta disponible");

// Verificar conexión
if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

// Obtener el ID del usuario a borrar
$id = $_POST['id'];

// Consulta SQL para borrar el usuario
$sql = "DELETE FROM usuario WHERE id = $id";
if ($conex){
    
    //el $id es una variable, el que esta dentro de corchetes es el de nombre de el archivo html en donde dice nombre

$resultado=mysqli_query($conex,$sql);
echo "se eliminó el usuario correctamente";

// Cerrar conexión
$conex->close();
}
?>

<!-- Redireccionamiento con JavaScript -->
<script>
    // Función para redireccionar a la página deseada después de 3 segundos
    function redirect() {
        let countdown = 3;
        setInterval(() => {
            countdown--;
            if (countdown <= 0) {
                window.location.href = "/agenda/proyecto/prue.php"; // Cambiar la URL según sea necesario
            }
        }, 1000); // Se ejecuta cada segundo
    }

    // Llamar a la función de redireccionamiento
    redirect();
</script>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
