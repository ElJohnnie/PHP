<?php

//primeira coisa, definir o modelo
class Funcionario {

	//métodos e atributos estão presentes aqui dentro

	//na parte superior da classe nos definimos os atributos
	//atributos
	public $nome = 'Jonathan Follmer';
	public $telefone = '051 995277818';
	public $numFilhos = null; 

	//na parte inferior, os metodos

	//metodos

	function resumirCadFunc(){

		return "$this->nome, número: $this->telefone, número de filhos: $this->numFilhos";

	}
	function modificarNumFilhos($numFilhos){

		//dentro da função eu pus uma variável do contexto do método

		$this->numFilhos = 	$numFilhos;	

		//com o this, peguei o atributo e para fazer a modificação, o atributo vai receber a variável que será
		//modificada chamando o metodo s
	}
}

//aqui a baixo, exemplo prático de como trabalhar com os métodos!

$y = new Funcionario();
echo $y->resumirCadFunc();
echo '<br>';
$y->modificarNumFilhos(200);
echo $y->resumirCadFunc();



?>