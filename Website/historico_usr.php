<?php
include("db.php");
    if(isset($_COOKIE['login'])){
    }
    else{
      header("location: login.php");
    }

$login = $_COOKIE['login'];
$historico = $_COOKIE['historico'];
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

    <h2>Histórico</h2>


    <ul class="collection">
    <?php 
      $reqconteudo = mysqli_query($connect,"SELECT * FROM tarefas WHERE assinatura = '$historico'");
      if(mysqli_num_rows($reqconteudo)<1){
        echo "<h2>Infelizmente, você ainda não possui tarefas concluídas</h2>";
      }
      while($conteudo = $reqconteudo ->fetch_array()){
      ?>     


      <li class="collection-item" onclick = "especifico(<?php echo $conteudo['id']; ?>)"><a><?php echo $conteudo["titulo"];?></a></li>

          <?php } ?>
          </ul>



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


