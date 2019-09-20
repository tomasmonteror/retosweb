
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Acceso web</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Inicio</a></li>
            <li role="presentation"><a href="login.php">Acceso</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Reto Web</h3>
      </div>

      <div class="jumbotron">
        <h1>Area privada.</h1>
        <br />
       <?php


 if(!empty($_POST['user']) && !empty($_POST['password'])) {

 $dbhost = "172.18.0.2";
 $dbname = "ejercicio3";
 $dbuser = "ejercicio3";
 $dbpass = "contrasenia";

 $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
 if (mysqli_connect_errno())
{
		     echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


 $user = mysqli_real_escape_string($conn, $_POST['user']);

 $password = $_POST['password'];

 $attack = "0";

if ($attack == 0) {

 $checklogin = mysqli_query($conn,"SELECT * FROM users WHERE user = '".$user."' and Password ='".$password."'");
}
    if(mysqli_num_rows($checklogin) == 1)
    {
        //$row = mysql_fetch_array($checklogin);
        echo "<h2>Bienvenido</h2>\n";
        echo "Prueba superada<br/>\n";
        echo "Token: a77124b012fcccc3f4756e0760833681\n";
    }
    else
    {
        echo "<h2>Error</h2>";
        echo mysqli_error($conn);
        echo "Error de usuario y/o contraseña\n";
    }

}  else {

        ?>

<div class="bs-example">
        <form action="login.php" method="POST">
        <div class="form-group">
            <label for="inputUser">Usuario</label>
            <input type="text" class="form-control" id="inputUser" name="user" placeholder="usuario">
        </div>
        <div class="form-group">
            <label for="inputPassword">Contraseña</label>
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="contraseña">
        </div>
       <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
<?php } ?>

      </div>

      <footer class="footer">
        <p>&copy; Reto login</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


