<?php
include("db.php");
    if(isset($_COOKIE['login'])){
    }
    else{
      header("location: login.php");
    }

$login = $_COOKIE['login'];
$acesso = $login;

if(isset($_POST['usr_hist'])){
$acesso = $_POST['usr_hist'];
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


    <?php 
      $reqconteudo = mysqli_query($connect,"SELECT * FROM tarefas WHERE assinatura = '$acesso' AND ativo = '2'");
      if(mysqli_num_rows($reqconteudo)<1){
        echo "<h2>Infelizmente, você ainda não possui tarefas concluídas😢</h2>";
      }
      else{
        echo "<h2>Histórico</h2>";
      }
        ?>

      <ul class="collection">
      <form method="POST" action="tarefa.php">
      <?php

      while($conteudo = $reqconteudo ->fetch_array()){
      ?>     
        <label>
          <li class="collection-item"><a href="#">
          <input name="titulo_pesq" type="radio" value = "<?php echo $conteudo['id']; ?>"/>
          <span><?php echo $conteudo["titulo"];?></span>
        </label>
      </a></li>

          <?php } ?>
          <br>
          <button class="btn waves-effect waves-light btn-large light-blue darken-4" style ="width:100%;" type="submit" name="pesquisar">Pesquisar</button>
          </form>
          </ul>
        <?php
          
          if(isset($_POST['usr_hist'])){
          echo "<a href ='gerente.php'><button class='btn waves-effect waves-light' type='submit'>retornar";
          echo "<i class='material-icons left'>chevron_left</i>";
          echo "</button></a>";}
        ?>
        
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
      function especifico(id){
        document.cookie = "tarefa = "+id;
        window.location.replace("especifico.php");
      }
  </script>
  </body>
</html>


