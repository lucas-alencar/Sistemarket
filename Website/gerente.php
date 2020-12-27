<?php
include("db.php");
$login = $_COOKIE['login'];


if(isset($_POST['delete_usr'])){
  $del_usr = $_POST['delete_usr'];
  mysqli_query($connect,"DELETE FROM login WHERE cpf = '$del_usr'");
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

        <h2>Opções de gerenciamento</h2>

        <ul class="collection">
          <li class="collection-item"><a>histórico do usuário

            <form method ="POST" action="historico.php">
              <select class="browser-default" name = 'usr_hist'>
                <?php
                    $usuarios = mysqli_query($connect,"SELECT * FROM login WHERE tipo = 'f'");
                    while($nomes = $usuarios ->fetch_array()){
                        $funcionario = $nomes['nome'];
                        $valor = $nomes['cpf'];
                        echo "<option value='$valor'>$funcionario</option>";
                    }
                ?>
              </select>
                <button class="btn waves-effect waves-light btn-large light-blue darken-4" type="submit" name="historico">acessar</button>
                </a>
            </form>

          </li>

            <br>

          <li class="collection-item"><a>apagar uma conta de usuário
            <form method ="POST">
              <select class="browser-default" name="delete_usr">
                <?php
                  $usuarios = mysqli_query($connect,"SELECT * FROM login WHERE tipo = 'f'");
                  while($nomes = $usuarios ->fetch_array()){
                      $funcionario = $nomes['nome'];
                      $cpf_funcionario = $nomes['cpf'];
                      echo "<option value='$cpf_funcionario'>$funcionario</option>";
                  }
                ?>
              </select>
              <button class="btn waves-effect waves-light btn-large light-blue darken-4" type="submit" name="apagar">apagar</button>
              </a>
            </form>
          </li>

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
  </body>
</html>
