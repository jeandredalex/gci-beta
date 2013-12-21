<!-- PLUGINS -->
<!-- label -->
<script src="plugin/label/label.js"></script>

<!-- tooltip -->
<script src="plugin/tooltip/tooltip.js"></script>
<link  href="plugin/tooltip/tooltip.css" type="text/css" rel="stylesheet" />

<!-- reveal -->
<script src="plugin/reveal/reveal.js"></script>
<link  href="plugin/reveal/reveal.css" type="text/css" rel="stylesheet" />

<!-- MÓDULES -->
<!-- taskBar -->
<script src="mod/taskBar/taskBar.js"></script>
<link  href="mod/taskBar/taskBar.css" type="text/css" rel="stylesheet" />

<!-- PHP -->
<!-- limitador_caracteres -->
<?php include '../../../php/limitador_caracteres.php'; ?>

<!-- ESPECÍFICO DA UI -->
<!-- listagem -->
<link type="text/css" href="routines/suprimentos_compras_estoque/css/solicitacao_compras/listagem.css" rel="stylesheet" />

<!-- topo da tela -->
<div class="topo_modular">
</div><!-- .topo_modular -->

<!-- início da tela de solicitação de compras -->
<div class="modulo">
	<div class="moduloContent">
		<div class="espaco_maximo">
		
			<script type="text/javascript">	pegaEspacoMaximo(1170); </script> <!-- chama função de taskBar.js informando a quantidade máxima da tela a ser usada, incluindo 75px da barra de navegação -->
			<?php include '../../../mod/taskBar/taskBar.php'; ?>
			
			<div class="espaco_permitido floatLeft marginTop15">
		
				<div class="listagem t1085 floatLeft font13">

					<div class="cabecalho font15">
						<div class="secao status"><img src="routines/suprimentos_compras_estoque/images/solicitacao_compras/listagem/status.png" /></div><!-- .secao -->
						<div class="secao qtde">Qtde.</div><!-- .secao -->
						<div class="secao produto">Produto</div><!-- .secao -->
						<div class="secao nome_comprador">Comprador</div><!-- .secao -->
						<div class="secao ultima_alteracao">Última alteração</div><!-- .secao -->
						<div class="secao acoes">Ações</div><!-- .secao -->
					</div><!-- .cabecalho -->
			
					<div class="item" id="father2">
						<div class="info status"><a class="tooltip" title="Pendente"><img src="routines/suprimentos_compras_estoque/images/solicitacao_compras/listagem/pendente.png" /></a></div>
						<div class="info bold qtde"><div class="textoPuro">3579 UN</div></div>
						<div class="info bold produto">
							<div class="textoPuro"><?php echo limitar("ROLAMENTO DIFERENCIAL 124 6x4 TRACADO PINHAO GRANDE R660TRAS", 60); ?></div>
							<img class="img marginLeft5" src="routines/suprimentos_compras_estoque/images/solicitacao_compras/listagem/codigo_fabricante.png" />
							<img class="img" src="routines/suprimentos_compras_estoque/images/solicitacao_compras/listagem/codigo_paralelo.png" />
							<a class="tooltip" title="Urgente"><img class="img" src="routines/suprimentos_compras_estoque/images/solicitacao_compras/listagem/urgente.png" /></a>
						</div>
						<div class="info bold nome_comprador">
							<div class="textoPuro"><?php echo limitar("JEANDRE.DALEXANDRE", 25); ?></div>
						</div>
						<div class="info bold ultima_alteracao"><div class="textoPuro"><?php echo limitar("19/11/2013 16:36", 20); ?></div></div>
						<div class="info acoes">
							<img class="img pointer" src="routines/suprimentos_compras_estoque/images/solicitacao_compras/listagem/button1.png" />
							<img class="img pointer" src="routines/suprimentos_compras_estoque/images/solicitacao_compras/listagem/button2.png" />
							<img class="img pointer" src="routines/suprimentos_compras_estoque/images/solicitacao_compras/listagem/button3.png" />
						</div>
					</div><!-- .item -->
			
				</div><!-- .listagem -->
		
		</div><!-- .espaco_permitido -->
		
		</div><!-- .espaco_maximo -->
		
	</div><!-- .moduloContent -->
</div><!-- .modulo -->