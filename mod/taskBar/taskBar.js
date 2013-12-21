/*
	ROTEIRO PARA DEFINIR POSICIONAMENTO DA BARRA DE NAVEGAÇÃO PARA EDIÇÃO E CRIAÇÃO DE NOVA TELA
	Esse método permite manter a centralização da tela incluindo a barra de navegação na centralização.
		
	1 - Aplicar cor de fundo em .espaco_permitido (css). Isso irá destacar o espaço onde pode haver conteúdo.
	2 - Definir o valor da variável espacoMaximo (javascript) para o tamanho necessário, sempre respeitando o limite da resolução do cliente - 20px.
*/

	function pegaEspacoMaximo(areaTotal){
		var espacoMaximo = areaTotal; // tamanho máximo de conteúdo (largura) que poderá ter na tela. nesse tamanho está incluído 75px de largura da barra de navegação.
		var espacoPermitido = espacoMaximo - 75; // tamanho máximo de conteúdo (largura) que poderá ter na tela. nesse valor está desconsiderada a barra de navegação. valor real de conteúdo dinâmico.
		var resolucaoCliente = $(window).width();  // pega a resolução de tela do cliente
	
		var posicao = ( resolucaoCliente - espacoMaximo ) / 2; // calcula o espaço em branco de cada lado da tela
		var posicaoFinal = Math.round(posicao); // arredonda o resultado para poder ser aplicado em pixels
	
		$('.barra_navegacao').css('right', posicaoFinal); // define a posicao da barra de navegacao
		$('.espaco_maximo').css('width', espacoMaximo); // atribui o espaço máximo na variável espacoMaximo (javascript) ao elemento .espacoMaximo (css)
		$('.espaco_permitido').css('width', espacoPermitido); // atribui o espaço permitido para conteúdo dinâmico obtido pela variável espacoPermitido (javascript) ao elemento .espaco_permitido (css)
		$('.topo_modular .delimitador').css('width', espacoMaximo); // delimita o espaço para conteúdo no topo modular
	}