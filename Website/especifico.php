<?php
include("db.php");
    if(isset($_COOKIE['login'])){
    }
    else{
      header("location: login.php");
    }

$tarefa = $_COOKIE['tarefa'];
$login = $_COOKIE['login'];
$especifico = mysqli_query($connect,"SELECT * FROM tarefas WHERE id ='$tarefa'");
$especific = $especifico -> fetch_array();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Tarefas</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/princ.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

</head>


<body> 
 <!-- Corpo do site-->
<?php include("header.php");?>

<main>
    <div class="caixa-esquerda">
    <div class="card grey lighten-5">
    <div class="card-panel grey lighten-5">

    <h2><?php echo $especific['titulo']?></h2>

    <h5><?php echo $especific['descricao']?></h5>

    </div>
    </div>
    </div>

</main>




 <!-- Fim do corpo do site-->

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script>

  </script>
  </body>
</html>
