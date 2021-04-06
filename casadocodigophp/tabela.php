<html>
<head>
	<title>Gerenciador de Tarefas</Title>
	<link rel="stylesheet" href="css.css">
</head>
<body>
		<table>
			<tr>
			<th>Tarefa</th>
			<th>Descrição</th>
			<th>Prazo</th>
			<th>Prioridade</th>
			<th>Concluída</th>
			<th>Opções</th>
			</tr>
			<?php foreach ($lista_tarefas as $tarefa) : ?>
			<tr>
				<td>
				<!--aqui estou iniciando um atalho para o arquivo onde faremos upload dos arquivos -->
					<a href="tarefa.php?id=<?php echo $tarefa['id']; ?>">
						<?php echo $tarefa['nome']; ?>
					</a>
				</td>
				<td><?php echo $tarefa['descricao']; ?> </td>
				<td><?php echo traduz_data_para_exibir($tarefa['prazo']); ?> </td>
				<td><?php echo traduz_prioridade($tarefa['prioridade']); ?> </td>
				<td><?php echo traduz_concluida($tarefa['concluida']); ?> </td>
				<td>
					<a href="editar.php?id=<?php echo $tarefa['id']; ?>">					
						Editar
					</a>
					<a href="remover.php?id=<?php echo $tarefa['id']; ?>">
						Remover
					</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
		
		
</body>
</html>