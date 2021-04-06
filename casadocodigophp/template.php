<html>
<head>
	<title>Gerenciador de Tarefas</Title>
	<link rel="stylesheet" href="css.css">
</head>
<body>
	<div class="englo">
		<h1>Gerenciador de tarefas</h1>
		<?php include('formulario.php');?>
		<?php if ($exibir_tabela) : ?>
			<?php include('tabela.php'); ?>
		<?php endif; ?>
		
</body>
</html>