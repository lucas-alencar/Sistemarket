<?php
include("db.php");
$login = $_COOKIE['login'];
$assina = mysqli_query($connect,"SELECT id FROM tarefas WHERE assinatura = '$login' AND ativo = '1'");
$assinatura = $assina -> fetch_array();
  
if(!(isset($_COOKIE['tarefa']))){
    header("location:index.php");
}
$atividade =$_COOKIE['tarefa'];

mysqli_query($connect,"UPDATE tarefas SET assinatura = '$login' WHERE id = '$atividade'");
mysqli_query($connect,"UPDATE tarefas SET ativo = '1' WHERE id = $atividade");

if(isset($_COOKIE['login'])){
  $id = $_COOKIE['tarefa'];
  $tarefa = mysqli_query($connect,"SELECT * FROM tarefas WHERE id = '$id'");
  $proc_tarefa = $tarefa -> fetch_array();
}
else{
  header("location: login.php");
}





if(isset($_POST['conclui'])){    
  mysqli_query($connect,"UPDATE tarefas SET ativo = '2' WHERE id = $atividade");
  unset($_COOKIE['tarefa']);
  header("location: index.php");
}


if(isset($_POST['cancela'])){
  mysqli_query($connect,"UPDATE tarefas SET assinatura = NULL WHERE id = '$atividade'");
  mysqli_query($connect,"UPDATE tarefas SET ativo = '0' WHERE id = '$atividade'");
  unset($_COOKIE['tarefa']);
  header("location: index.php");
}


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

<h3><?php echo $proc_tarefa['titulo'];?></h3>

<h5><?php echo $proc_tarefa['descricao'];?></h5>

<br>

<p>
    <hr/>
    <form method="POST">

        <button class="btn orange darken-3 waves-effect" name = "cancela">Cancelar tarefa</button>

            <button style= "float: right;" class="btn waves-effect waves-light" type="submit" name= "conclui">Concluir tarefa
                <i class="material-icons right">send</i>
            </button>
            </form>

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
