<?php
include("db.php");
$error = "";

if(isset($_POST['enviar'])){
$email = $_POST['email'];
$senha = $_POST['senha'];
$teste = mysqli_query($connect, "SELECT email FROM login WHERE email = '$email' AND senha = '$senha'");


if(mysqli_num_rows($teste) >0){
  $reqcpf = mysqli_query($connect,"SELECT cpf FROM login WHERE email = '$email' AND senha = '$senha'");
  $cpf = $reqcpf -> fetch_row();
  setcookie("login",$cpf[0]);
  header("location: index.php");
}
else{
  $error = "<h6 class='reclama'>Usuário ou senha inválido!</h6>";
}
} 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Login</title>

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

  <h5 class="regiss">Login:</h5>
  <?php echo $error?>
  <form class="col s12 " method="POST">

    <div class="row">
      <div class="input-field col s12">
        <input name="email" id="email" type="email" class="validate">
        <label for="email">Email</label>
      </div>


      <div class="input-field col s12">
        <input name="senha" id="password" type="password" class="validate">
        <label for="password">Senha</label>
      </div>

    <div class="input-field col s12">
      <button class="btn waves-effect waves-light btn-large light-blue darken-4" type="submit" name="enviar">Entrar</button>
    </div>
    <a href="recupera.php">Esqueci a senha</a>
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

  </body>
</html>
