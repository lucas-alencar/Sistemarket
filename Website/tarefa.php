<?php 
  include("db.php");
  $login = $_COOKIE['login'];

  if(!(isset($_COOKIE['login']))){
    header("location: login.php");
  }

  if(!(isset($_COOKIE['tarefa'])) && !(isset($_POST['titulo_pesq'])) ){
    header("location:index.php");  
  }

  $titulo_tarefa = $_POST['titulo_pesq'];
  $tarefas_encontradas = mysqli_query($connect,"SELECT * FROM tarefas WHERE titulo = '$titulo_tarefa' AND assinatura = '$login ' AND ativo = '2'");
  $tarefa_unica = $tarefas_encontradas -> fetch_array();


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
  <link rel="stylesheet" href="css/tarefa.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>


<body> 
 <!-- Corpo do site-->
 <?php include("header.php");?>

<main>
  <div class="caixa-esquerda">
  <div class="card grey lighten-5">
  <div class="card-panel centro grey lighten-5">

<h3><?php echo $tarefa_unica['titulo'];?></h3>

<h5><?php echo $tarefa_unica['descricao'];?></h5>

<br>

<p>
<hr/>
<a href='index.php'>
<button class='btn orange darken-3 waves-effect' type='submit' name='action'>retornar</button>
</a>
  <?php
    if(!(isset($_POST['titulo_pesq']))){
      echo "";


      echo "<a href='tarefa_andamento.php'>";
              echo "<button style= 'float: right;' class='btn waves-effect waves-light' type='submit'>Aceitar tarefa";
                  echo "<i class='material-icons right'>send</i>";
              echo "</button>";
      echo "</a>";
    }
  ?>

</p>

    </div>
    </div>
    </div>

</main>




 <!-- Fim do corpo do site-->

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  </body>
</html>
