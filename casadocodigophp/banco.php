<html>
	<head>
	
	</head>
	<?php
	//aqui estou fazendo uma conexao com o banco de dados do meu localhost, por enquanto
	$bdServidor = '127.0.0.1';
	$bdUsuario = 'root';
	$bdSenha = '';
	$bdBanco = 'tarefas';
	//a conexao será isso abaixo
	$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
	//se a conexão apresentar erro =
	if (mysqli_connect_errno($conexao)) {
	echo "Problemas para conectar no banco. Verifique os dados!";
	die();
	}
// aqui está minha function q se inicia no tarefas.php
//prestar atenção nisso, é como fazer funções
	function buscar_tarefas($conexao)
		{
		$sqlBusca = 'SELECT * FROM tarefas';
		//Nesta função foi criada uma variável com o comando SQL que irá buscar os dados no banco, no caso o comando SELECT * FROM tarefas.
		$resultado = mysqli_query($conexao, $sqlBusca);
		//Logo depois, a função mysqli_query() usa a variável como conexão e a variável como comando
        //para ir ao banco, executar o comando e trazer o resultado.
		$tarefas = array();
		while ($tarefa = mysqli_fetch_assoc($resultado)) {
		$tarefas[] = $tarefa;
		}
		return $tarefas;
		}

	function gravar_tarefa($conexao, $tarefa){
		
		$sqlGravar = "
			INSERT INTO tarefas (nome, descricao, prioridade, prazo, concluida)
			VALUES( '{$tarefa['nome']}',
					'{$tarefa['descricao']}',
					{$tarefa['prioridade']},
					'{$tarefa['prazo']}',
					{$tarefa['concluida']}
					)		
		";
		
				mysqli_query($conexao, $sqlGravar);
	}
		//sempre usar o campo id da tabela tarefas para nos referenciarmos a uma tarefa como unica 
	function buscar_tarefa ($conexao, $id){		
		$sqlBusca = 'SELECT * FROM tarefas WHERE id = ' . $id;
		$resultado = mysqli_query($conexao, $sqlBusca);
		return mysqli_fetch_assoc($resultado);
	}
	
	function editar_tarefa($conexao, $tarefa)
	{
		
		
		$sqlEditar = "
		UPDATE tarefas SET
		nome = '{$tarefa['nome']}',
		descricao = '{$tarefa['descricao']}',
		prioridade = {$tarefa['prioridade']},
		prazo = '{$tarefa['prazo']}',
		concluida = {$tarefa['concluida']}
		WHERE id = {$tarefa['id']} 
		";
		
		mysqli_query($conexao, $sqlEditar);
	
		//editar_tarefa($conexao, $tarefa);
		//header('Location: tarefas.php');
		//die();	
		
	}
	
	function remover_tarefa($conexao, $id)
	{
		$sqlRemover = "DELETE FROM tarefas WHERE id = {$id}";
		
		mysqli_query($conexao, $sqlRemover);
	}		
	
	?>
	
	<!-- ^^ Nesta função foi criada uma variável com o comando SQL que irá buscar os
dados no banco, no caso o comando SELECT * FROM tarefas. Logo depois, a
função mysqli_query() usa a variável coma conexão e a variável como comando
para ir ao banco, executar o comando e trazer o resultado. Este resultado fica armazenado
na variável $resultado. Na sequência, é criada a variável $tarefas, que
é apenas um array vazio. O próximo bloco é o while, que é executado até que a
função mysqli_fetch_assoc() tenha passado por todas as linhas do resultado,
sendo que cada linha do resultado é armazenada na variável $tarefa, no singular,
para diferenciar do array $tarefas. E então temos, finalmente, o return que
devolve os dados para quem chamou a função. -->
	
	<body></body>

</html>