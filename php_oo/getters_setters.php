<?php 

	class Funcionario {
		
		//atributos
		
		public $nome = null;
		public $telefone = null;
		public $numFilhos = null;
		
		//metodos
		
		//setters
		
		//aqui usamos o set para modificação, isso podendo ser efetuado modificando o objeto
		
		//usar sempre $this-> para trabalhar com os atributos dentro da classe/objeto
		function setNome($nome){
			
			$this->nome = $nome;
			
		}
		
		function setNumFilhos($numFilhos){
			
			$this->numFilhos = $numFilhos;
			
		}
		
		//getters
		
		//aqui pegamos o que foi feito no set
		
		function getNome(){
			
			return $this->nome;
			
		}
		
		function getNumFilhos(){
			
			return $this->numFilhos;
			
		}
		
		function resumirCadFunc(){
			return "$this->nome possui $this->numFilhos filho(s).";
				
		}
		
		function modificarNumFilhos($numFilhos){
			
			$this->numFilhos = $numFilhos;
			
		}
	}
	
	$y = new Funcionario();
	$y->setNome('Jonathan Follmer');
	$y->setNumFilhos(0);
	//echo $y->resumirCadFunc();
	
	//trabalhando com os gets
	
	echo $y->getNome() . ' possui ' . $y->getNumFilhos() . ' filho(s)';
	
	

?>