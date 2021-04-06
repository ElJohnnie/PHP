<?php 
include "banco.php";
remover_tarefa($conexao, $_GET['id']);

header('Location: tarefas.php');

//dando um include com o arquivo dos bancos, função básica para remoção de arquivos pela id
?>