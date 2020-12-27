<?php 
include("db.php");
if(isset($_COOKIE['login'])){
    $teste_login = $_COOKIE['login'];
    $teste = mysqli_query($connect,"SELECT * FROM login WHERE cpf = '$teste_login'");
    if(mysqli_num_rows($teste)<1){
        header("location: login.php");    
    }
}
else{
    header("location: login.php");
}

$testin = 0;
$teste_gerente = mysqli_query($connect,"SELECT * FROM login WHERE tipo = 'g'");

while($nome_gerente = $teste_gerente -> fetch_array()){
  if($nome_gerente['cpf'] ==$teste_login){
    $testin = 1;
  }
}


?>

<nav>
    <div class="nav-wrapper blue darken-3">
      <a href="index.php" class="brand-logo center">SISTEMARKET</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
      <?php if($testin == 1){
    echo "<li><a href='gerente.php'>gerente</a></li>";
}?>    
      <li><a href="ad_tarefa.php">Adicionar tarefa</a></li>
        <li><a href="historico.php">Histórico</a></li>
        <li><a><div onclick = "sair()">Sair</div></a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
  <?php
  if($testin == 1){
    echo "<li><a href='gerente.php'>gerente</a></li>";
}?>    
  <li><a href="ad_tarefa.php">Adicionar tarefa</a></li>
        <li><a href="historico.php">Histórico</a></li>
        <li><a><div onclick = "sair()">Sair</div></a></li>
  </ul>



<script>

function sair(){
    document.cookie = "tarefa = ";
    document.cookie = "login =";
    location.reload();
}
</script>