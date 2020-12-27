<?php
//error_reporting(0);
$connect = mysqli_connect("localhost","root","") OR DIE("falha na conexão ao banco de dados");
$db = mysqli_select_db($connect,"sistemarket_login") OR DIE("falha na autenticação do banco de dados");
?>