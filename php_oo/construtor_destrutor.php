<?php

class Pessoa{

public $nome = null;


//a function construct, inicia automaticamente, sem a necessidade de chamar um objeto e sua instância 
//no construct, eu chamo o atributo
function __construct($nome) {
echo 'Objeto iniciado.';
$this->nome = $nome;
}

function __destruct(){

	echo '<br> Objeto removido';
}

function __get($atributo){

	return $this->$atributo;
}

function correr(){

	return $this->__get('nome') . ' está correndo.';
}

	
}

//o pessoa já recebe um parâmetro, e o construct lança o bisu automaticamente, sem echo
$pessoa = new Pessoa('Jonathan');


echo '<br /> Nome:' . $pessoa->__get('nome');
echo  '<br>' . $pessoa->correr();

//o destruct trampa com o unset
//unset($pessoa);
 ?>