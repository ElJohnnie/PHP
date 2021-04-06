<html>
<head>
	<title>Gerenciador de Tarefas</Title>
	<link rel="stylesheet" href="css.css">
</head>
<body>
	<div class="englo">
		<?php //aqui comecei a usar o metodo post ?>
		<form method="POST">
			<input type="hidden" name="id"
			value="<?php echo $tarefa['id']; ?>" />
			<fieldset>
				<legend>Nova tarefa</legend>
					Tarefa:<br>
					<?php if ($tem_erros && isset($erros_validacao['nome'])) : ?>
						<span class="erro">
							<?php echo $erros_validacao['nome']; ?>
						</span>
						<?php endif; ?>
					<input type="text" name="nome" value="<?php echo $tarefa['nome']; ?>" /><br>
					Descrição(opcional):
					<br><input type="text" name="descricao" value="<?php echo $tarefa['descricao']; ?>"><br>
					<?php // prestar atenção em como inicia os erros de validações aqui no formulário ?>
					Prazo(opcional):
					<br>
					<?php if ($tem_erros && isset($erros_validacao['prazo'])) :  ?>
						<span class="erro">
							<?php echo $erros_validacao['prazo']; ?>
						</span>
					<?php endif; ?>
					<input type="text" name="prazo" value="<?php echo traduz_data_para_exibir($tarefa['prazo']); ?>"><br>
					<br>
				<fieldset>
				
				<label>
					<legend>Prioridade</legend>					
					<input type="radio" value="1" name="prioridade" <?php echo ($tarefa['prioridade'] == 1)
					? 'checked'
					: ''; 
					?>
					/>
					Baixa
					<input type="radio" value="2" name="prioridade" <?php echo ($tarefa['prioridade'] == 2)
					? 'checked'
					: ''; 
					?>>
					Media
					<input type="radio" value="3" name="prioridade" <?php echo ($tarefa['prioridade'] == 3)
					? 'checked'
					: ''; 
					?>>
					Alta
				</label>
				</fieldset>
				<br>
				<br>Tarefa concluída:
				<input type="checkbox" name="concluida" value="1">
				<p><input type="submit" value="<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>" /></p>
			</fieldset>
			
		</form>
</body>
</html>