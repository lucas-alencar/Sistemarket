<?php
include("db.php");
$login = $_COOKIE['login'];
if(isset($_POST['adicionar'])){
    $titulo = $_POST['titulo'];
    $descricao = "";
    $descricao =$_POST['descricao'];
    $descricao = $descricao.". ".$login;
    if(strlen($descricao)>20 && strlen($titulo)>8){
mysqli_query($connect,"INSERT INTO `tarefas` (`titulo`, `descricao`, `empresa`,`ativo`) VALUES ('$titulo', '$descricao', '1','0')");
header("location: index.php");
}
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

    <h2>Adicionar tarefa</h2>

    <form class="col s12" method = "POST" style="text-align:center;">

<div class="input-field col s6">
  <input id="nome" type="text" class="nome" name = "titulo">
  <label for="nome">Título</label>
</div>

<div class="input-field col s6">


<input type="tel" name="descricao" id="cpf">
<label for="txttelefone">Descrição detalhada</label>

</div>

<div class="input-field col s12">
  <button class="btn waves-effect waves-light btn-large light-blue darken-4" type="submit" name="adicionar">Adicionar</button>
</div>
</form>

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
