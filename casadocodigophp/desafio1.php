<?php session_start();

//Uma sessão serve para mantermos uma variável especial que irá existir em todas as nossas requisições.
?>
<html>
<head>
	<title>Gerenciador de Tarefas</Title>
	<link rel="stylesheet" href="css.css">
</head>
<body>
	<div class="englo">
		<h1>Gerenciador de usuários</h1>
		<form class="2">
			
				<legend>Usuário</legend>
					<label>
					Nome:
					<br>
					<input type="text" name="nome" />
					</label>
					<br>
					
					<label>
					Email:
					<br>
					<input type="text" name="email" />
					</label>
					<br>
					
					<label>
					Telefone:
					<br>
					<input type="text" name="telfo" />
					</label>
					
					<br>
				<input type="submit" value="Cadastrar" />
			
			
		</form>
	
	<?php
	//isset verifica se a variavel existe
	//get, variavel global, pega da url o que foi recebido do formulário
	
	//lista de tarefas será um array
	if(isset($_GET['nome'])) {
		
		$_SESSION['lista_usuario'][] = $_GET['nome'];
	}
	
	if(isset($_GET['email']))
	{ $_SESSION['lista_usuario'][] = $_GET['email']; }

if(isset($_GET['telfo']))
	{ $_SESSION['lista_usuario'][] = $_GET['telfo']; }


	$lista_usuario[] = array();
	
	if(isset($_SESSION['lista_usuario']))
	{$lista_usuario = $_SESSION['lista_usuario'];}
	
	//os nomes serão em arranjos, então...
	/* resumindo de acima: a variavel lista_tarefas será um array, logo a baixo lista_tarefa em indice vai receber os nomes */ 
	
	
	
	
	?>
		<table>
			<tr>
				<th>Usuário</th>
			</tr>
			<?php foreach ($lista_usuario as $usuario) : ?>
			<tr>
				<td><?php echo "$usuario . <br>"; ?> </td>
			</tr>
			<?php endforeach; ?>
			
			
		</table>
	</div>
</body>	
</html>
