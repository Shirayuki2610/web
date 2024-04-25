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
      <a class="navbar-brand" href="/agenda/proyecto/prue.php">Agenda</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <form class="navbar-form navbar-left" action="/agenda/proyecto/scripts/buscar2.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Ingresa el ID del contacto a buscar" name="id">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/agenda/proyecto/scripts/agregar2.php">Agregar Contacto</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container">
  <h2>Resultados de la búsqueda:</h2>
  <table class="table">
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
      <?php
      $servidor= "localhost";
      $user = "root";
      $psw = "";
      $bd = "agenda";
      $conex = mysqli_connect($servidor,$user,$psw,$bd) or die ("temporalmente el servidor no esta disponible");
      if ($conex){
    $id = $_REQUEST['id'];
    //el $id es una variable, el que esta dentro de corchetes es el de nombre de el archivo html en donde dice nombre
$sql = "SELECT * from usuario Where id ='$id'";
          $resultado = mysqli_query($conex, $sql);

          if($resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row["id"]."</td>";
              echo "<td>".$row["nombre"]."</td>";
              echo "<td>".$row["email"]."</td>";
              echo "<td>".$row["telefono"]."</td>";
              echo "<td>".$row["dirección"]."</td>";
              echo '<td>
                      <form action="/agenda/proyecto/scripts/update2.php" method="post">
                        <input type="hidden" name="id" value="'.$row["id"].'">
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                      </form>
                      <form action="/agenda/proyecto/scripts/borrarusuario.php" method="post">
                        <input type="hidden" name="id" value="'.$row["id"].'">
                        <input type="submit" class="btn btn-danger" value="Borrar">
                      </form>
                    </td>';
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='6'>No se encontraron resultados</td></tr>";
          }

          mysqli_close($conex);
      }
      ?>
    </tbody>
  </table>
</div>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
