
<?php session_start(); 
//Uma sessão serve para mantermos uma variável especial que irá existir em todas as nossas requisições.

include 'banco.php';
include 'ajudantes.php';




//aqui fiz uma conexao com o arquivo do banco de dados, sem isso, a função nao iria funcionar
?>

	
	<?php
	//isset verifica se a variavel existe
	//get, variavel global, pega da url o que foi recebido do formulário
	
	//lista de tarefas será um array
	$exibir_tabela = true;
	
	$tem_erros = false;
	$erros_validacao = array();
	
	if (tem_post()) {
		//oberseve que todo o conteudo do terefas está dentro do if nome
		$tarefa = array();
		//tarefa será um array, que por sinal é um conjunto de coisas
		if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
			$tarefa['nome'] = $_POST['nome'];
		}
		else { 
			$tem_erros = true;
			   $erros_validacao['nome'] = 'O nome da tarefa é obrigatório!';
		}
		if (isset($_POST['descricao'])) {
		$tarefa['descricao'] = $_POST['descricao'];
		} else {
		$tarefa['descricao'] = '';
		}
		if (isset($_POST['prazo']) && strlen($_POST['prazo']) >0) {
			if(validar_data($_POST['prazo'])) {				
			$tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
			} else {
				$tem_erros = true;
				$erros_validacao['prazo'] = 'O prazo não é uma data válida!';
			}
		}	else {
			$tarefa['prazo'] = '';
		}
				
			
		$tarefa['prioridade'] = $_POST['prioridade'];
		if (isset($_POST['concluida'])) {
		$tarefa['concluida'] = 1;
		} else {
		$tarefa['concluida'] = 0;
		}
		//coloquei a função de gravar a tarefa dentro de um if com um "!" que inverte o valor dentro, seria tipo: sem erros
		if (! $tem_erros) {
		gravar_tarefa($conexao, $tarefa);
		//header é uma função que leva ações para o http do navegador, location é onde o header está nos levando a cada gravar tarefas
		header('Location: tarefas.php');
		die();
		}
		//die é para parar tudo de vez após uma tarefa concluida
		
	
}	

//aqui disse para minha lista de tarefas que ele será uma função que está presente no banco.php
	$lista_tarefas = buscar_tarefas($conexao);
	
	
	
	
	//aqui está servindo para definir um array para o editar, que estou usando o mesmo arquivo, e para não apagar tudo
	//	se não acontecer uma validação
	$tarefa = array(
	'id' => 0,
	'nome' => (isset($_POST['nome'])) ? $_POST['nome'] : '',
	'descricao' => (isset($_POST['descricao'])) ? $_POST['descricao'] : '',
	'prazo' => (isset($_POST['prazo'])) ? traduz_data_para_banco($_POST['prazo']) : '',
	'prioridade' => (isset($_POST['prioridade'])) ? $_POST['prioridade'] : 1,
	'concluida' => (isset($_POST['concluida'])) ? $_POST['concluida'] : ''
	);

	//aqui fica o template
	include "template.php";
	include 'template_tarefas.php';
	
	
	
	?>
		
			
	
</body>	
</html>
