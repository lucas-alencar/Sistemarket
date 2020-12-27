

<?php
include("db.php");
$error = "";

if(isset($_POST['action'])){

  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $funcionario = $_POST['grupo1'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  
  $teste_email = mysqli_query($connect,"SELECT * FROM login WHERE email = '$email'");
  $teste_cpf= mysqli_query($connect,"SELECT * FROM login WHERE cpf = '$cpf'");

if(strlen($nome) < 3){
  $error = "<h6 class='reclama'>Nome muito pequeno!</h6>";
}
else if(strlen($cpf) < 14){
  $error = "<h6 class='reclama'>CPF inválido!</h6>";
}
else if(strlen($funcionario) == ""){
  $error = "<h6 class='reclama'>Precisa-se marcar um tipo de funcionário!</h6>";
}
else if(mysqli_num_rows($teste_email) > 0){
  $error = "<h6 class='reclama'>Email já registrado!</h6>";
}
else if(mysqli_num_rows($teste_cpf) > 0){
  $error = "<h6 class='reclama'>CPF já registrado!</h6>";
}
else{
  mysqli_query($connect,"INSERT INTO login VALUE ('$nome', '$cpf', '$funcionario', '$email', '$senha')");
  setcookie("tipoConf","<h2 class = 'regiss'>Cadastro efetuado com sucesso!</h2>");
  header('Location: confirma.php');
}

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Registro</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/log_cad.css">  
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>


<body>
  <!-- Corpo do site-->
  <div class = "registro">
    <div class = "tudo">
    <div class = "card-panel grey darken-4">
  
    <h5 class="regiss">Registre-se:</h5>
    <?php echo $error;?>
    <form class="col s12" method = "POST">

      <div class="input-field col s6">
        <input id="nome" type="text" class="nome" name = "nome">
        <label for="nome">Nome</label>
      </div>
 
      <div class="input-field col s6">


      <input type="tel" name="cpf" id="cpf">
      <label for="txttelefone">CPF</label>

      </div>
      
        <p>
        Sou um:
    
          <label>
            <input name="grupo1" type="radio" value = "f"/>
            <span>Funcionário</span>
          </label>

          <label>
            <input name="grupo1" type="radio" value = "g"/>
            <span>Gerente</span>
          </label>

        
  
      </p>
  
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" name ="email">
          <label for="email">Email</label>
        </div>
  
  
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="senha">
          <label for="password">Senha</label>
        </div>
  
      <div class="input-field col s12">
        <button class="btn waves-effect waves-light btn-large light-blue darken-4" type="submit" name="action">Entrar</button>
      </div>
      <a href="login.php">Ir para login</a>
    </form>
    </div>
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
