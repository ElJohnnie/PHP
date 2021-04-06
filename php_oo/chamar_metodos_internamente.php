<?php 

	class Funcionario {
		
		//atributos
		
		public $nome = null;
		public $telefone = null;
		public $numFilhos = null;
		public $cargo = null;
		public $salario = null;
		
		//metodos
		
		//getters setters (overloading / sobrecarga)
		
		//usando dois metodos dentro da função set, o atributo à escolher e o valor que colocarei
		function __set($atributos , $valor){

			$this->$atributos = $valor;

		}

		//aqui ele apronta o atributo
		function __get($atributo){

			return $this->$atributo;

		}

		function resumirCadFunc(){

			return $this->__get('nome') . ' tem o número de ' . $this->__get('numFilhos') . ' de filhos.';

					}	
		
		
	}
	
	$y = new Funcionario();
	$y->__set('nome' ,'Jonathan Follmer');
	$y->__set('numFilhos' , 2);
	
	//trabalhando com os gets
	
	echo $y->resumirCadFunc();
	
	

?>