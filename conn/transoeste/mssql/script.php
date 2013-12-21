<?php
function ms_conecta_banco($server=NULL,$user=NULL,$pass=NULL){
	$server = $server ? $server : '192.168.1.3\CIGAM'; //endereço do servidor
	$user = $user ? $user : 'sa';
	$pass = $pass ? $pass : 'B2x9a7i2x2';
	$link = mssql_connect($server, $user, $pass); // servidor, usuario, senha
	if (!$link) {
		die ('<br/><br/>Something went wrong while connecting to MSSQL');
	}
	return $link;
}
function ms_seleciona_tabela($dbname,$link){
	$selected = mssql_select_db($dbname, $link) or die("Couldn’t open database databasename");
	return $selected;
}