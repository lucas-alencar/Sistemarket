<?php
include("db.php");
$error = "";

if(isset($_POST['enviar'])){
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
$teste = mysqli_query($connect, "SELECT cpf FROM login WHERE cpf = '$cpf' ");

if(mysqli_num_rows($teste) >0){
  mysqli_query($connect,"UPDATE `login` SET `senha` = '$senha' WHERE `login`.`cpf` = '$cpf'");
  setcookie("tipoConf","<h3 class = 'regiss'>Senha alterada com sucesso!</h3>");
  header("location: confirma.php");
}
else{
  $error = "<h6 class='reclama'>CPF inválido!</h6>";
}
} 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>recuperar senha</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/log_cad.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>


<body>
 <!-- Corpo do site-->
 <div class = "login">
  <div class = "card-panel grey darken-4">

  <h5 class="regiss">Recuperar sua senha:</h5>
  <?php echo $error?>
  <form class="col s12 " method="POST">

    <div class="row">
      <div class="input-field col s12">
      <input type="tel" name="cpf" id="cpf">
      <label for="txttelefone">Insira seu CPF</label>
      </div>


      <div class="input-field col s12">
        <input name="senha" id="password" type="password" class="validate">
        <label for="password">Insira sua nova senha</label>
      </div>

    <div class="input-field col s12">
      <button class="btn waves-effect waves-light btn-large light-blue darken-4" type="submit" name="enviar">Entrar</button>
    </div>
    <a href="login.php">Esqueci a senha</a>
    <br>
    <a href="registro.php">Registrar-se</a>
  </form>
  </div>
  </div>
</div>

  
 <!-- Fim do corpo do site-->

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">$("#cpf").mask("000.000.000-00");</script>
  </body>
</html>
