<?php 
// conecta ao banco de dados
$mysqli = new mysqli('localhost', 'root', 'gciBETA1', 'gci'); // endereço do servidor, usuario, senha, base de dados

// define caracteres de saída
$mysqli->set_charset('utf8');

// verifica se ocorreu algum erro na conexão com o banco de dados
if (mysqli_connect_errno()) {
    die('Banco de dados fora do ar.
		 <br />
		 Código de erro: ' . mysqli_connect_error() . '
		 <br />
		 Entre em contato com o suporte.');
    exit();
}
?>