<?php

require "./bibliotecas/PHPMailer/Exception.php";
require "./bibliotecas/PHPMailer/OAuth.php";
require "./bibliotecas/PHPMailer/PHPMailer.php";
require "./bibliotecas/PHPMailer/POP3.php";
require "./bibliotecas/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//print_r($_POST);

//header("Refresh: 5, index.php");

class Mensagem{

	//atributos
	private $para = null;
	private $assunto = null;
	private $mensagem = null;

	//métodos
	public function __get($atributo){

		return $this->$atributo;

	}

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}

	public function mensagemValida(){

		if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){

			return false;
		}

		return true;
	}


}

//atribuindo a classe
$mensagem = new Mensagem();

//e os atributos recebendo os valores do front-end.
$mensagem->__set('para', $_POST['para']);
$mensagem->__set('assunto', $_POST['assunto']);
$mensagem->__set('mensagem', $_POST['mensagem']);
	
	if(!$mensagem->mensagemValida()) {

		echo 'Mensagem não é válida.';
		die();
	} 

	$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = '';  					  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                         // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('', '');
    $mail->addAddress("$mensagem->__set('para', $_POST['para']);", '');     // Add a recipient
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Assunto';
    $mail->Body    = 'This is the HTML message body <b>Assunto</b>';
    $mail->AltBody = 'This is the HTML message body';

    $mail->send();
    echo 'Mensagem foi enviada com sucesso';
} catch (Exception $e) {
    echo 'Não foi possível enviar a mensagem, por favor, tente mais tarde. ';
    echo 'Detalhes do erro: ' . $mail->ErrorInfo;
}
	

 ?>