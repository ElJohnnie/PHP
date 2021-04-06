<?php
	
	//iniciando uma conexao com banco de dados com pdo
	$dsn = 'mysql:host=localhost;dbname=php_com_pdo';
	$user = 'root';
	$pass = '';

	try{

		$conexao = new PDO($dsn, $user, $pass);

		$query = '
			select * from tb_usuarios
		';

		$stmt = $conexao->query($query);
		$lista = $stmt->fetchAll();

		echo '<pre>';
		print_r($lista);
		echo '</pre>';
	}
	//o que n funcionou no try, ele automaticamente inicia um catch com os parâmetros dentro
	catch(PDOException $e){

		//aqui eu pedi o código de erro e a mensagem dele
		echo 'Erro:'. $e->getCode(). ' Mensagem: '. $e->getMessage();

	}
	



 ?>