<?php

include("db.php");
$id = $_GET["id"];
$carrinho = $_GET["carrinho"];
$descricao = "me ferrei";
$titulo ="a";
    switch ($id) {
        case 0:
            $titulo = "Ajuda no carrinho";
            $descricao = "O carrinho número ".$carrinho." necessita de ajuda";
            mysqli_query($connect,"INSERT INTO `tarefas` (`titulo`, `descricao`, `empresa`,`ativo`) VALUES ('$titulo', '$descricao', '1','0')");
            break;
        case 1:
            $descricao = "O carrinho número ".$carrinho." necessita de ajuda";
            mysqli_query($connect,"UPDATE tarefas SET ativo = '2' WHERE descricao = '$descricao'");
            $descricao = "1 do carrinho".$carrinho;
            break;
        case 2:
            $titulo = "carrinho abandonado";
            $descricao = "O carrinho ".$carrinho." foi potencialmente abandonado, verifique-o";
            mysqli_query($connect,"INSERT INTO `tarefas` (`titulo`, `descricao`, `empresa`,`ativo`) VALUES ('$titulo', '$descricao', '1','0')");

            break;


        case 3:
            mysqli_query($connect,"INSERT INTO `tarefas` (`titulo`, `descricao`, `empresa`,`ativo`) VALUES ('Limpeza', 'O corredor 5 necessita de manutenção', '1','0')");
            mysqli_query($connect,"INSERT INTO `tarefas` (`titulo`, `descricao`, `empresa`,`ativo`) VALUES ('Saúde', 'Uma senhorinha está passando mal no corredor 5, precisamos de ajuda', '1','0')");
            mysqli_query($connect,"INSERT INTO `tarefas` (`titulo`, `descricao`, `empresa`,`ativo`) VALUES ('trava-linguas', 'socorram-me subi no onibus em marrocos', '1','0')");
            mysqli_query($connect,"INSERT INTO `tarefas` (`titulo`, `descricao`, `empresa`,`ativo`) VALUES ('Estoque', 'carne tipo patinho está em falta no corredor de frutas', '1','0')");
            mysqli_query($connect,"INSERT INTO `tarefas` (`titulo`, `descricao`, `empresa`,`ativo`) VALUES ('Troco', 'Necessito de troco para 500 bolivares no caixa 2', '1','0')");
            
            break;
    }





?>