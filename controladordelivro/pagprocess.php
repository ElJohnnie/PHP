<!doctype html>
<html>
<head>
<?php
//primeiro, as variaveis no head!! (detalhe)
$book = $_POST['livro'];
$pagina = $_POST['pag'];
 ?>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>
<body>
<?php
if (isset($_POST['submit'])){}
//segundo, php, nos aprsente a data:
	$date = date('H:i jS F');
	echo '<p>Estudando às: ';
	echo $date;
	echo '</p>';

	switch($book){
		case'a';
		echo '<p>PHP e mysql desenvolvimento web</p>';
		break;
		case'b';
		echo '<p>Html5 e css3 domine a web do futuro - Casa do Codigo</p>';
		break;
		case'c';
		echo '<p>Desenvolvimento web com PHP e MySQL - Casa do Codigo</p>';
		break;
		}

//quarto, caso não for posto nenhuma pagina, deve-se voltar ao link anterior
if($pagina == 0)
	{echo '<strong><red>Volte à pagina anterior e diga-me a página onde paraste!</red></strong>';
	echo "<br><BR><a href='index.html'>BACK</a></body></html>";
	exit;
	}
	//quinto, nos mostrar a pagina
echo 'Página: '. $pagina;
//sexto, como vai ser gravado no arquivo
if($book == a)
{$saidastring = $date . "\t" . 'PHP e mysql desenvolvimento web' . "\t" . $pagina . " é sua página.\r\n";}
elseif($book == b)
{$saidastring = $date . "\t" . 'Html5 e css3 domine a web do futuro - Casa do Codigo' . "\t" . $pagina . " é sua página.\r\n";}
elseif($book == c)
{$saidastring = $date . "\t" . 'Desenvolvimento web com PHP e MySQL - Casa do Codigo' . "\t"  . $pagina . " é sua página.\r\n";}
//sétimo, criando o arquivo
$txt = fopen("marcapag.txt", 'ab');
//oitavo pondo pra marcar
fwrite($txt, $saidastring, strlen($saidastring));
//finalizando
fclose($txt);
echo '<br><br><br><strong>Página salva, Jonathan!</strong>';
exit;

?>
    
</body>
</html>