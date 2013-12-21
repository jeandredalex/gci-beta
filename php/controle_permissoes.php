<?php
$telaStart = 'routines/suprimentos_compras_estoque/ui/solicitacao_compras.php'; // tela inicial do sistema
$telaUnauthorized = 'routines/suprimentos_compras_estoque/ui/solicitacao_compras.php'; // tela exibida quando o usuário não possui acesso a tela pedida
$telaNaoExiste = 'routines/suprimentos_compras_estoque/ui/solicitacao_compras.php'; // tela exibida quando a tela solicitada não existe

$tela = $telaStart;

if ( isset($_GET['r']) ) {

	$telaRequisicao = $_GET['r'];
		
	if ( $telaRequisicao == 'refeitorio_entrada' ) { 
		 $tela = 'routines/refeitorio/ui/refeitorio_entrada.php'; // Grupo 2 - RAF: Registro de Entrada ao Refeitório. "Rotina que registra a frequência dos funcionários e dependentes ao refeitório da Transoeste"
		 $top = 'mod/top/top_ns.php'; // versão NR do topo. NR means "No Resources", ou seja, é uma versão do topo sem os rescurso de midia, chat e upload.
		 $permissoes = '';
	}else
	if ( $telaRequisicao == 'solicitacao_compras' ) {
		 $tela = 'routines/suprimentos_compras_estoque/ui/solicitacao_compras.php'; // Grupo 1 - SC: Solicitação de Compras. "Tela apresentada ao funcionário da empresa para solicitar compras de todo e qualquer tipo"
		 $permissoes = '';
	}else
	if ( $telaRequisicao == 'central_colaboradores' ) {
		 $tela = 'routines/gestao_de_pessoas/ui/central_colaboradores.php'; // Central de gerenciamento de colaboradores do módulo de gestão de pessoas (recursos humanos)
		 $permissoes = '';
	}else
	{
		 $tela = $telaNaoExiste;
		 // registra no log de erros da base de dados. "tela solicitada não encontrada"
	}
	
}else
{
	$tela = $telaNaoExiste;
	// registra no log de erros da base de dados. "solicitação de tela não enviada!
}

// faz a verificação das permissoes da tela com as permissoes do usuario, se permitir, continua, senao $tela = $telaUnauthorized
	
	
	
?>
<script>

$(document).ready(function(){
	$('#top').load('mod/top/top.php');
	$('#flow').load('<?php echo $tela; ?>');
	$('#bottom').load('mod/bottom/bottom.php');
});
</script>

<div id="top"></div>
<div id="flow"></div>
<div id="bottom"></div>