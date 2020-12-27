<?php
include("db.php");
$mensagem = $_COOKIE['tipoConf'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>confirma</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/confirma.css">
</head>


<body>
 <!-- Corpo do site-->
 <div class = "confirma">
  <div class = "card-panel grey darken-4">
<?php echo $mensagem; ?>
  <div><img src ="img/check.png" width = "90vw" heigh = "90vh" ></div>
  </div>
  </div>
  </div>
  <meta http-equiv="refresh" content="1; URL='login.php' "/>
  
 <!-- Fim do corpo do site-->

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>