<?php 

include "banco.php";
include "ajudantes.php";

$tem_erros = false;
$erros_validacao = array();

if (tem_post()) {	
	// upload dos anexos
	$tarefa_id = $_POST['tarefa_id'];
	
	if (! isset($_files['anexo'])) {
		$tem_erros = true;
		$erros_validacao['anexo'] =
		 'Você deve selecionar um arquivo para anexar' ;
	}else{
		if (tratar_anexo($_FILES['anexo'])) {
			$anexo = array();
			$anexo['tarefa_id'] = $tarefa_id;
			$anexo['nome'] = $_FILES['anexos']['name'];
			$anexo['arquivo'] = $_FILES['anexos']['name'];
		}else{
			$tem_erros = true;
			$erros_validacao['anexo'] =
			 'Envie apenas anexos nos formatos zip ou pdf';
		}
	}	
			 
}

$tarefa = buscar_tarefa($conexao, $_GET['id']);

include "template_tarefas.php";