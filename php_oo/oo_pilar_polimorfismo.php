<?php 

//extends recebem os atributos veículos
class Carro extends Veiculo{

//definindo os atributos

public $tetoSolar = true;

//definindo os métodos

function __construct($placa, $cor){

	$this->placa = $placa;
	$this->cor = $cor;
}



function abrirTetoSolar(){

	echo 'Abrir teto-solar';
}

function alterarPosicaoVolante(){

	echo 'Alterar posição do volante';
}
}





class Moto extends Veiculo {


public $contraPesoGuidon = true;


function __construct($placa, $cor){

	$this->placa = $placa;
	$this->cor = $cor;
}

function empinar(){
	echo 'Empinar';
}

function trocarMarcha(){

	echo 'Desencatar embreagem com a mão, e trocar marcha com ao pé';

}

}



class Veiculo{
public $placa = null;
public $cor = null;

function acelerar(){
	echo 'Acelerar';
}

//como carro puxa os metodos do veiculo, por extend, adicionarei só mais um recurso aqui mesmo
// n precisa ser em ambos (carro e moto)
function freiar(){

	echo 'Freiar';

}

function trocarMarcha(){

	echo 'Desencatar embreagem com o pé, e trocar marcha com a mão';

}

}

$carro = new Carro('ABC-1234', 'BRANCO');
$moto = new Moto('ABC-1234', 'BRANCO');

$carro->trocarMarcha();
echo '<br>';
$moto->trocarMarcha();
