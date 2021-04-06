
<?php session_start(); 

include"banco.php";
include "ajudantes.php";

$exibir_tabela = false;
$tem_erros = false;
$erros_validacao = array();

if (tem_post()){
	
	$tarefa['id'] = $_POST['id'];
	
	if (isset($_POST['nome']) && strlen($_POST['nome']) >0) {
		$tarefa['nome'] = $_POST['nome'];
	} else {
		$tem_erros = true;
		$erros_validacao['nome'] = 'O nome da tarefa é obrigatório!';
	}
	
	if(isset($_POST['descricao'])) {
	$tarefa['descricao'] = $_POST['descricao'];}
	else {
		$tarefa['descricao'] = '';
	}
	
	if(isset($_POST['prazo']) && strlen($_POST['prazo']) > 0) {
		if (validar_data($_POST['prazo'])){
			$tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
		} else {
			$tem_erros = true;
			$erros_validacao['prazo'] = 'O prazo não é uma data valida!';
		}
	}
	
	$tarefa['prioridade'] = $_POST['prioridade'];
	
	if(isset($_POST['concluida'])) {
	$tarefa['concluida'] = 1;}
	else { $tarefa['concluida'] = 0; }
	
	if (! $tem_erros){
	editar_tarefa($conexao, $tarefa);
		header('Location: tarefas.php');
		die();
	}
}
//esse trecho serve para quando editarmos, o que está digitado no campo fica em braco e não retorna o que está no banco de dados
//usando ternários, o mesmo trecho poderia muito bem ser usado um if
$tarefa = buscar_tarefa($conexao, $_GET['id']);
$tarefa['nome'] = (isset($_POST['nome'])) ?
	$_POST['nome'] : $tarefa['nome'];
	
$tarefa['descricao'] = (isset($_POST['descricao'])) ?
	$_POST['descricao'] : $tarefa['descricao'];
	
$tarefa['prazo'] = (isset($_POST['prazo'])) ?
	$_POST['prazo'] : $tarefa['prazo'];

$tarefa['prioridade'] = (isset($_POST['prioridade'])) ?
	$_POST['prioridade'] : $tarefa['prioridade'];
	
$tarefa['concluida'] = (isset($_POST['concluida'])) ?
	$_POST['concluida'] : $tarefa['concluida'];


include "template.php";
	
	



	?>
		

