<?php
/**
 * 
 * IMPORTADOR
 * importa os dados da base Microsoft Sql para o MySql
 * 
 * Altere o banco de dados em $dbname e a consulta em $query
 * 
 * @author Itamar Eduardo Gonçalves de Oliveira
 * @since v0.1
 */
 
 //habilida o debug, mostrando os erros INICIO
ini_set('display_errors', 1);
error_reporting(E_ALL);
 
$c_cpf_recebido = $_POST['c_cpf_importacao'];
 
$dbname="METADADOS";
//$query="select TOP 1

$query="
select TOP 1
PESSOAS.NOME[c_nome_completo],
PESSOAS.CPF[c_cpf],
PESSOAS.IDENTIDADE[c_rg],
PESSOAS.UFIDENTIDADE[c_rg_uf],
CONVERT(VARCHAR(10), PESSOAS.NASCIMENTO, 103)[c_data_nascimento],
PESSOAS.PAI[c_nome_pai],
PESSOAS.MAE[c_nome_mae],
PESSOAS.ESTADOCIVIL[c_estado_civil],
PESSOAS.NROCARTTRAB[c_ctps_numero],
PESSOAS.SERIECARTTRAB[c_ctps_serie],
PESSOAS.PIS[c_pis],
PESSOAS.HABILITACAOPROFISSIONAL[c_cnh_numero],
PESSOAS.CATEGORIAHABILITACAO[c_cnh_categoria],
PESSOAS.HABILITACAOPROFISSIONAL[c_cnh_uf],
PESSOAS.TITULOELEITORAL[c_titulo_numero],
PESSOAS.ZONAELEITORAL[c_titulo_zona],
PESSOAS.SECAOELEITORAL[c_titulo_secao]
from RHCONTRATOS
inner join RHPESSOAS [PESSOAS]
on RHCONTRATOS.CONTRATO = PESSOAS.PESSOA
inner join RHCARGOS [CARGO]
on RHCONTRATOS.CARGO = CARGO.CARGO
where PESSOAS.EMPRESA = 002
and PESSOAS.CPF = '$c_cpf_recebido'
";

////****---- não alterar daqui para baixo ----****\\\\

include_once '../../../conn/transoeste/mssql/script.php';
include_once '../../../php/campos_processamento.php';

$link = ms_conecta_banco(); //conectar no banco de dados, se nao passar nada, usa os valores padrao
ms_seleciona_tabela($dbname, $link); // seleciona o banco de dados

$result = mssql_query($query); // executa a query informada no banco selecionado

$columns = array();

for ($i = 0; $i < mssql_num_fields($result); ++$i) {
	$columns[]=mssql_field_name($result, $i); //captura o nome das colunas em um vetor
}

while($row = mssql_fetch_array($result,1)){ //o parametro 1 tras apenas o array associativo

	echo processa_dados($row,$columns,true); //faz varias chamadas

}



///fim do script
mssql_close($link);

?>
