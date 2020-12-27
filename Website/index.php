<?php
include("db.php");
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

<?php include("header.php");?>
<!-- Corpo do site-->

<main>
  <div class="caixa-esquerda">
  <div class="card grey lighten-5">
  <div class="card-panel grey lighten-5">

  <?php 
      $reqconteudo = mysqli_query($connect,"SELECT * FROM tarefas WHERE ativo = '0'");
      $qual_botao = 0;
      if(mysqli_num_rows($reqconteudo)<1){
        echo "<h2>Sem tarefas por enquanto</h2>";
        echo "<h2>😊</h2>";
      }


    while($conteudo = $reqconteudo ->fetch_array()){
      $qual_botao++;
      ?>     
      <a href="#">
        <div class="card tarefaa grey lighten-3" onclick="clicou(<?php echo $conteudo['id']; ?>)">
          <h5 class="truncate"><?php echo $conteudo["titulo"];?></h6>
            <p class="truncate">
                <?php echo $conteudo["descricao"]; ?>
            </p>
          </div>
    </a>
          <?php } ?>

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

    function clicou(botao){
        document.cookie = "tarefa = "+botao;
        window.location.replace("tarefa.php");

    }

  </script>
  </body>
</html>
