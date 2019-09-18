<?php
session_start();
error_reporting( error_reporting() & ~E_NOTICE );


$names = Array(
        'Samuel',
        'Alejandro',
        'Andres',
        'Susana',
        'Elena',
        'Carmen',
        'Manuel',
        'Alberto'
);
$surnames = Array(
            'Ibañez',
            'Perez',
            'Gonzalez',
            'Lucas',
            'Silva'
);
if (!isset($_SESSION['full_name'])) {
  $_SESSION['full_name'] =
    $names[array_rand($names)] .
    ' ' .
    $surnames[array_rand($surnames)];
}
$full_name = $_SESSION['full_name'];

header('X-XSS-Protection: 0');

$db = new PDO('sqlite:/tmp/Gr33tings.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec("CREATE TABLE IF NOT EXISTS greetings
  (author VARCHAR(100), message TEXT)");
if (isset($_POST['greeting'])) {
  $greeting = $_POST['greeting'];
  $pstmt = $db->prepare("INSERT INTO greetings VALUES (:full_name, :greeting)");
  
  $pstmt->execute(array(':full_name' => $full_name, ':greeting' => $greeting));
}
$result = $db->query("SELECT author, message FROM greetings")->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Cookies</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

  <style type="text/css">
    .Table {
        display: table;
    }
    .Heading {
        display: table-row;
        font-weight: bold;
        text-align: center;
    }
    .Row {
        display: table-row;
    }
    .Cell {
        display: table-cell;
        border: solid;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
    }
    .Praetorian {
      font-family: sans-serif;
      font-size: 14pt;
      position: fixed;
      bottom: 1%;
      right: 1%;
      color: black;
      text-decoration: none;
    }
  </style>

    <link href="css/jumbotron-narrow.css" rel="stylesheet">
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
          </ul>
        </nav>
      </div>
      <div class="jumbotron">
	<h1>Deja un mensaje al administrador del foro</h1><br /><br /><br />
	Bienvenido/a: <?php echo " <b>$full_name</b><br/><br />"; ?>
  <form action="index.php" method="POST">
    <label for="greeting">Saluda:</label>
    <input id="greeting" name="greeting" type="text">
    <input type="submit" value="Enviar">
  </form>
<br/>
<br/>
  <?php if (count($result) > 0) { ?>
  <center>
  <div class="Table">
    <div class="Heading">
      <div class="Cell">Autor</div>
      <div class="Cell">Mensaje</div>
    </div>
    <?php foreach ($result as $row) { ?>
    <div class="Row">
      <div class="Cell"><?php echo $row['author'] ?></div>
      <div class="Cell"><?php echo $row['message'] ?></div>
    </div>
	<?php } ?>
  </div>
  </center>
  <?php
  }
  $db = null;
  ?>

	<?php 
if (isset($_COOKIE['PHPSESSID'])) {  
	if ($_COOKIE['PHPSESSID'] == "j8rlefcprdaqgv8a794un2u0q0") { 
	   echo "<br /><br/>Token: d7c6281786db7623d3f6f9f239bb4497<br />";  
	}

}
?>


<br />
<br />
<a href="FluhDB.php">Borrar todo</a>
<br />
<br />
      </div>
      <footer class="footer">
        <p>&copy; javascript(tm)</p>
      </footer>

    </div> 


    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


