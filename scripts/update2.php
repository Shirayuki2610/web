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
      <form class="navbar-form navbar-left" id="searchForm">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/agenda/proyecto/scripts/agregar2.php">Agregar Contacto</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container">
  <h2>Actualizar Contacto:</h2>
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
              echo "<td><input type='text' class='form-control' id='idInput' value='" . $row["id"] . "' readonly></td>";
              echo "<td><input type='text' class='form-control' id='textNom' value='" . $row["nombre"] . "'></td>";
              echo "<td><input type='email' class='form-control' id='textMail' value='" . $row["email"] . "' required></td>";
              echo "<td><input type='text' class='form-control' id='textTel' value='" . $row["telefono"] . "'></td>";
              echo "<td><input type='text' class='form-control' id='textDir' value='" . $row["dirección"] . "'></td>";
              echo '<td>
                      <button type="button" class="btn btn-primary" id="updateButton">Actualizar</button>
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

<script>
$(document).ready(function() {
    // Función para enviar la solicitud de actualizar contacto
    $("#updateButton").click(function() {
        // Obtener los valores de los campos de texto
        var id = $("#idInput").val();
        var nombre = $("#textNom").val();
        var email = $("#textMail").val();
        var telefono = $("#textTel").val();
        var direccion = $("#textDir").val();
        
        // Realizar una solicitud AJAX para actualizar el contacto
        $.ajax({
            type: "POST",
            url: "/agenda/proyecto/scripts/update.php",
            data: {
                id: id,
                textNom: nombre,
                textMail: email,
                textTel: telefono,
                textDir: direccion
            },
            success: function(response) {
                alert(response);
                // Redireccionar después de 3 segundos
                setTimeout(function() {
                    window.location.href = "/agenda/proyecto/prue.php";
                }, 2000);
            },
            error: function() {
                alert("Error al actualizar el contacto");
            }
        });
    });
});
</script>
</body>
</html>


