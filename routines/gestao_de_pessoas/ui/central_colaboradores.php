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
<!-- central_colaboradores -->
<link type="text/css" href="routines/gestao_de_pessoas/css/central_colaboradores/central_colaboradores.css" rel="stylesheet" />

<!-- listagem -->
<link type="text/css" href="routines/gestao_de_pessoas/css/central_colaboradores/listagem.css" rel="stylesheet" />

<!-- topo da tela de gerenciamento de colaboradores (central de colaboradores) -->
<div class="topo_modular">
<div class="delimitador">
	
	<div id="central_colaboradores" class=" hide">
	
		<div class="label_tipo1 marginTop10">
			<p class="formInput">
			<label for="campo1">NOME</label>
			<input type="text" id="campo1" name="campo1" class="tipo1 formIdle tam220 floatLeft font18 bariol uppercase" value="" />
			</p>
		
			<p class="formInput">
			<label for="campo2">CPF</label>
			<input type="text" id="campo2" name="campo2" class="tipo1 formIdle tam130 floatLeft font18 bariol uppercase" value="" />
			</p>
		
			<p class="formInput">
			<label for="campo3">RG</label>
			<input type="text" id="campo3" name="campo3" class="tipo1 formIdle tam130 floatLeft font18 bariol uppercase" value="" />
			</p>
		
			<p class="formInput">
			<label for="campo4">FUNÇÃO</label>
			<input type="text" id="campo4" name="campo4" class="tipo1 formIdle tam220 floatLeft font18 bariol uppercase" value="" />
			</p>
		</div><!-- .label_tipo1 -->
	
		<div class="botoesRight">
			<img class="pointer" src="routines/gestao_de_pessoas/images/central_colaboradores/topo/admissao.png" />
		</div><!-- .botoesRight -->
		
	</div><!-- #central_colaboradores -->
	
	<div id="admissao" class="marginTop10">
		<div class="label_tipo1">
			<p class="formInput">
			<label for="c_cpf_importacao">CPF</label>
			<input type="text" id="c_cpf_importacao" name="c_cpf_importacao" class="tipo1 formIdle tam155 floatLeft font18 bariol uppercase" value="" />
			</p>
		</div><!-- .label_tipo1 -->
		
		<div class="botoesLeft">
			<img class="pointer" id="importar_funcionario" src="routines/gestao_de_pessoas/images/central_colaboradores/topo/importar.png" />
		</div><!-- .botoesRight -->
		
		<script type="text/javascript">
		$('#importar_funcionario').live('click', function(){
			$.ajax({
				url : 'routines/gestao_de_pessoas/php/importa_funcionarios.php',
				type : 'POST',
				data : 'c_cpf_importacao=' + $('#c_cpf_importacao').val(),
				dataType : 'json',
				success : function(importa_funcionario){
					// retorno quando cpf não for encontrado
					
					// retorno quando houver cpf
					$('#c_nome_completo').val(importa_funcionario.c_nome_completo_valor).blur();
					$('#c_data_nascimento').val(importa_funcionario.c_data_nascimento_valor).blur();
					$('#c_cpf').val(importa_funcionario.c_cpf_valor).blur();
					$('#c_rg').val(importa_funcionario.c_rg_valor).blur();
					$('#c_rg_uf').val(importa_funcionario.c_rg_uf_valor).blur();
					$('#c_nome_pai').val(importa_funcionario.c_nome_pai_valor).blur();
					$('#c_nome_mae').val(importa_funcionario.c_nome_mae_valor).blur();
					$('#c_ctps_numero').val(importa_funcionario.c_ctps_numero_valor).blur();
					$('#c_ctps_serie').val(importa_funcionario.c_ctps_serie_valor).blur();
					$('#c_pis').val(importa_funcionario.c_pis_valor).blur();
					$('#c_cnh_numero').val(importa_funcionario.c_cnh_numero_valor).blur();
					$('#c_cnh_categoria').val(importa_funcionario.c_cnh_categoria_valor).blur();
					$('#c_cnh_uf').val(importa_funcionario.c_cnh_uf_valor).blur();
					$('#c_titulo_numero').val(importa_funcionario.c_titulo_numero_valor).blur();
					$('#c_titulo_zona').val(importa_funcionario.c_titulo_zona_valor).blur();
					$('#c_titulo_secao').val(importa_funcionario.c_titulo_secao_valor).blur();
				}	
			});
		});
		</script>
		
	</div><!-- #admissao -->
	
</div>
</div><!-- .topo_modular -->

<!-- início da tela de solicitação de compras -->
<div class="modulo">
	<div class="moduloContent">
		<div class="espaco_maximo">
		
			<script type="text/javascript">	pegaEspacoMaximo(1170); </script> <!-- chama função de taskBar.js informando a quantidade máxima da tela a ser usada, incluindo 75px da barra de navegação -->
			<?php include '../../../mod/taskBar/taskBar.php'; ?>
			
			<div class="espaco_permitido floatLeft marginTop15">
		
				<div class="listagem t1085 floatLeft font13 hide">

					<div class="cabecalho font15">
						<div class="secao campo1"><img src="routines/gestao_de_pessoas/images/central_colaboradores/listagem/status.png" /></div><!-- .secao -->
						<div class="secao campo2">Matrícula</div><!-- .secao -->
						<div class="secao campo3">Nome</div><!-- .secao -->
						<div class="secao campo4">CPF</div><!-- .secao -->
						<div class="secao campo5">RG</div><!-- .secao -->
						<div class="secao campo6">Função</div><!-- .secao -->
						<div class="secao campo7">Ações</div><!-- .secao -->
					</div><!-- .cabecalho -->
			
					<div class="item" id="father2">
						<div class="info campo1"><a class="tooltip" title="Pendente"><img src="routines/gestao_de_pessoas/images/central_colaboradores/listagem/pendente.png" /></a></div>
						<div class="info bold campo2">
							<div class="textoPuro">000465</div>
						</div>
						<div class="info bold campo3">
							<div class="textoPuro"><?php echo limitar("JEANDRÉ LUCAS DALEXANDRE E SILVA", 40); ?></div>
							<img class="img marginLeft5" src="routines/gestao_de_pessoas/images/central_colaboradores/listagem/foto.png" />
						</div>
						<div class="info bold campo4">
							<div class="textoPuro">733.021.391-87</div>
						</div>
						<div class="info bold campo5">
							<div class="textoPuro"><?php echo limitar("1566186515661", 13); ?> / MT</div>
						</div>
						<div class="info bold campo6"><div class="textoPuro"><?php echo limitar("GERENTE DE RECURSOS HUMANOS", 25); ?></div></div>
						<div class="info campo7">
							<img class="img pointer" src="routines/gestao_de_pessoas/images/central_colaboradores/listagem/button1.png" />
							<img class="img pointer" src="routines/gestao_de_pessoas/images/central_colaboradores/listagem/button2.png" />
							<img class="img pointer" src="routines/gestao_de_pessoas/images/central_colaboradores/listagem/button4.png" />
							<img class="img pointer" src="routines/gestao_de_pessoas/images/central_colaboradores/listagem/button3.png" />
						</div>
					</div><!-- .item -->
			
				</div><!-- .listagem -->
				
				<div class="bloco t1085 floatLeft marginTop15">
					
					<div class="identificador bold">Dados e informações pessoais</div><!-- .identificador -->
				
					<div class="content_box t1085">
						<div class="content">
							
							<div class="label_tipo1">
							<div class="form">
							
								<div class="foto"> <img src="storage/pessoas_fotos/foto200.png" /> <img src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/botao_upload_foto.png" /> </div><!-- .foto -->
							
								<p class="formInput">
								<label for="c_nome_completo">NOME COMPLETO</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle w370 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_data_nascimento">DATA DE NASCIMENTO</label>
								<input type="text" id="c_data_nascimento" name="c_data_nascimento" class="tipo1 formIdle w170 floatLeft font16 uppercase" value="" />
								</p>
								
								<div class="space w250"></div>
								
								<p class="formInput">
								<label for="c_cpf">CPF</label>
								<input type="text" id="c_cpf" name="c_cpf" class="tipo1 formIdle w140 floatLeft font16 uppercase" value="" />
								</p>
								
								<p class="formInput">
								<label for="c_rg">RG</label>
								<input type="text" id="c_rg" name="c_rg" class="tipo1 formIdle w140 floatLeft font16 uppercase" value="" />
								</p>
							
								<div class="formSelect w240">
									<p>
										<label for="c_rg_uf" id="label_rg_uf">UF EMISSOR DO RG</label>
										<input type="text" id="c_rg_uf" name="c_rg_uf" class="w200 font16 uppercase" value="" /> 
										<img class="icon hide" id="icon_rg_uf" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado w240 maxHeight160 hide" id="resultado_rg_uf">
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#c_rg_uf').live('focus', function(){
										$('#icon_rg_uf').show();
										$('#resultado_rg_uf').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#c_rg_uf').live('click', function(){
										$('#icon_rg_uf').show();
										$('#resultado_rg_uf').show();										
									});
									
									$('#c_rg_uf').live('focusout', function(){
										$('#resultado_rg_uf').hide();
										$('#icon_rg_uf').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box_rg_uf = $('#resultado_rg_uf');
										$(document.body).click(function(){
											if (!$box_rg_uf.has(this).length) {
											$box_rg_uf.hide();
											$('#icon_rg_uf').hide();
										}
									});
									</script>
								</div>
								
								<div class="space w250"></div>
								
								<div class="formSelect tam300">
									<p>
										<label for="c_escolaridade" id="label_escolaridade">GRAU DE ESCOLARIDADE</label>
										<input type="text" id="c_escolaridade" name="c_escolaridade" class="tam260 font16 uppercase" value="" /> 
										<img class="icon hide" id="icon_escolaridade" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado tam300 maxHeight160 hide" id="resultado_escolaridade">
											<div class="item tam280 pointer" id="">ENSINO FUNDAMENTAL INCOMPLETO</div>
											<div class="item tam280 pointer" id="">ENSINO FUNDAMENTAL COMPLETO</div>
											<div class="item tam280 pointer" id="">ENSINO MÉDIO INCOMPLETO</div>
											<div class="item tam280 pointer" id="">ENSINO MÉDIO COMPLETO</div>
											<div class="item tam280 pointer" id="">ENSINO SUPERIOR INCOMPLETO</div>
											<div class="item tam280 pointer" id="">ENSINO SUPERIOR COMPLETO</div>
											<div class="item tam280 pointer" id="">PÓS GRADUAÇÃO</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#c_escolaridade').live('focus', function(){
										$('#icon_escolaridade').show();
										$('#resultado_escolaridade').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#c_escolaridade').live('click', function(){
										$('#icon_escolaridade').show();
										$('#resultado_escolaridade').show();										
									});
									
									$('#c_escolaridade').live('focusout', function(){
										$('#resultado_escolaridade').hide();
										$('#icon_escolaridade').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box3 = $('#resultado_escolaridade');
										$(document.body).click(function(){
											if (!$box3.has(this).length) {
											$box3.hide();
											$('#icon_escolaridade').hide();
										}
									});
									</script>
								</div>
								
								<div class="space w530"></div>
								
								<div class="formSelect w180">
									<p>
										<label for="c_estado_civil" id="label_estado_civil">ESTADO CIVIL</label>
										<input type="text" id="c_estado_civil" name="c_estado_civil" class="w140 font16 uppercase" value="" /> 
										<img class="icon hide" id="icon_estado_civil" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado w180 maxHeight160 hide" id="resultado_estado_civil">
											<div class="item w160 pointer" id="">SOLTEIRO(A)</div>
											<div class="item w160 pointer">CASADO(A)</div>
											<div class="item w160 pointer">DIVORCIADO(A)</div>
											<div class="item w160 pointer">VIÚVO(A)</div>
											<div class="item w160 pointer">UNIÃO ESTÁVEL</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#c_estado_civil').live('focus', function(){
										$('#icon_estado_civil').show();			
									});
									
									$('#c_estado_civil').live('focusout', function(){
										$('#icon_estado_civil').hide();
									});
									
									// exibe lista de resultados ao clicar
									$('#c_estado_civil').live('click', function(){
										$('#resultado_estado_civil').show();
									});
									
									// esconde resultado quando for clicado fora
									var $box2 = $('#resultado_estado_civil');
										$(document.body).click(function(){
											if (!$box2.has(this).length) {
											$box2.hide();
										}
									});
									</script>
								</div>
														
								
								<p class="formInput">
								<label for="c_nome_conjuge">NOME DO CONJUGE</label>
								<input type="text" id="c_nome_conjuge" name="c_nome_conjuge" class="tipo1 formIdle w370 floatLeft font16 uppercase" value="" />
								</p>
								
								<p class="formInput">
								<label for="c_nome_mae">NOME DA MÃE</label>
								<input type="text" id="c_nome_mae" name="c_nome_mae" class="tipo1 formIdle w270 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_nome_pai">NOME DO PAI</label>
								<input type="text" id="c_nome_pai" name="c_nome_pai" class="tipo1 formIdle w270 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								
							</div><!-- .form -->
							</div><!-- .label_tipo1 -->
														
						</div><!-- .content -->
					</div><!-- .content_box -->
				</div><!-- .bloco -->
				
				
				<div class="bloco t1085 floatLeft">
					
					<div class="identificador bold">Documentação</div><!-- .identificador -->
				
					<div class="content_box t1085">
						<div class="content">
							
							<div class="label_tipo1">
							<div class="form">
							
								<p class="formInput">
								<label for="c_ctps_numero">NÚMERO DA CTPS</label>
								<input type="text" id="c_ctps_numero" name="c_ctps_numero" class="tipo1 formIdle w320 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_ctps_serie">SÉRIE DA CTPS</label>
								<input type="text" id="c_ctps_serie" name="c_ctps_serie" class="tipo1 formIdle w200 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_pis">PIS</label>
								<input type="text" id="c_pis" name="c_pis" class="tipo1 formIdle w140 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<div class="space tam300"></div>
								
								<p class="formInput">
								<label for="c_cnh_numero">NÚMERO DA CNH</label>
								<input type="text" id="c_cnh_numero" name="c_cnh_numero" class="tipo1 formIdle w320 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_cnh_categoria">CATEGORIA</label>
								<input type="text" id="c_cnh_categoria" name="c_cnh_categoria" class="tipo1 formIdle w110 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
		
								<div class="formSelect w240">
									<p>
										<label for="c_cnh_uf" id="label_cnh_uf">UF EMISSOR DA CNH</label>
										<input type="text" id="c_cnh_uf" name="c_cnh_uf" class="w200 font16 uppercase" value="" /> 
										<img class="icon hide" id="icon_cnh_uf" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado w240 maxHeight160 hide" id="resultado_cnh_uf">
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w220 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#c_cnh_uf').live('focus', function(){
										$('#icon_cnh_uf').show();
										$('#resultado_cnh_uf').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#c_cnh_uf').live('click', function(){
										$('#icon_cnh_uf').show();
										$('#resultado_cnh_uf').show();										
									});
									
									$('#c_cnh_uf').live('focusout', function(){
										$('#resultado_cnh_uf').hide();
										$('#icon_cnh_uf').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box_cnh_uf = $('#resultado_cnh_uf');
										$(document.body).click(function(){
											if (!$box_cnh_uf.has(this).length) {
											$box_cnh_uf.hide();
											$('#icon_cnh_uf').hide();
										}
									});
									</script>
								</div>
								
								<p class="formInput">
								<label for="c_titulo_numero">NÚMERO DO TÍTULO ELEITORAL</label>
								<input type="text" id="c_titulo_numero" name="c_titulo_numero" class="tipo1 formIdle w320 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_titulo_zona">ZONA ELEITORAL</label>
								<input type="text" id="c_titulo_zona" name="c_titulo_zona" class="tipo1 formIdle w170 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_titulo_secao">SEÇÃO ELEITORAL</label>
								<input type="text" id="c_titulo_secao" name="c_titulo_secao" class="tipo1 formIdle w170 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
							
								
							</div><!-- .form -->
							</div><!-- .label_tipo1 -->
														
						</div><!-- .content -->
					</div><!-- .content_box -->
				</div><!-- .bloco -->
				
				
				<div class="bloco t1085 floatLeft">
					
					<div class="identificador bold">Lotação</div><!-- .identificador -->
				
					<div class="content_box t1085">
						<div class="content">
							
							<div class="label_tipo1">
							<div class="form">
							
								<div class="formSelect w330">
									<p>
										<label for="c_departamento" id="label_departamento">DEPARTAMENTO</label>
										<input type="text" id="c_departamento" name="c_departamento" class="w290 font16 uppercase" value="" /> 
										<img class="icon hide" id="icon_departamento" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado w330 maxHeight160 hide" id="resultado_departamento">
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#c_departamento').live('focus', function(){
										$('#icon_departamento').show();
										$('#resultado_departamento').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#c_departamento').live('click', function(){
										$('#icon_departamento').show();
										$('#resultado_departamento').show();										
									});
									
									$('#c_departamento').live('focusout', function(){
										$('#resultado_departamento').hide();
										$('#icon_departamento').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box_departamento = $('#resultado_departamento');
										$(document.body).click(function(){
											if (!$box_departamento.has(this).length) {
											$box_departamento.hide();
											$('#icon_departamento').hide();
										}
									});
									</script>
								</div>
								
								<div class="formSelect w330">
									<p>
										<label for="c_setor" id="label_setor">SETOR</label>
										<input type="text" id="c_setor" name="c_setor" class="w290 font16 uppercase" value="" /> 
										<img class="icon hide" id="icon_setor" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado w330 maxHeight160 hide" id="resultado_setor">
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#c_setor').live('focus', function(){
										$('#icon_setor').show();
										$('#resultado_setor').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#c_setor').live('click', function(){
										$('#icon_setor').show();
										$('#resultado_setor').show();										
									});
									
									$('#c_setor').live('focusout', function(){
										$('#resultado_setor').hide();
										$('#icon_setor').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box_setor = $('#resultado_setor');
										$(document.body).click(function(){
											if (!$box_setor.has(this).length) {
											$box_setor.hide();
											$('#icon_setor').hide();
										}
									});
									</script>
								</div>
								
								
							<div class="formSelect w330">
									<p>
										<label for="c_funcao" id="label_funcao">FUNÇÃO</label>
										<input type="text" id="c_funcao" name="c_funcao" class="w290 font16 uppercase" value="" /> 
										<img class="icon hide" id="icon_funcao" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado w330 maxHeight160 hide" id="resultado_funcao">
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
											<div class="item w310 pointer" id="">RIO GRANDE DO NORTE (RN)</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#c_funcao').live('focus', function(){
										$('#icon_funcao').show();
										$('#resultado_funcao').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#c_funcao').live('click', function(){
										$('#icon_funcao').show();
										$('#resultado_funcao').show();										
									});
									
									$('#c_funcao').live('focusout', function(){
										$('#resultado_funcao').hide();
										$('#icon_funcao').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box_funcao = $('#resultado_funcao');
										$(document.body).click(function(){
											if (!$box_funcao.has(this).length) {
											$box_funcao.hide();
											$('#icon_funcao').hide();
										}
									});
									</script>
								</div>
								
								<div class="formInput">
								<div class="submit"> <img src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/botao_admitir.png" /> </div>
								</div>
								
							</div><!-- .form -->
							</div><!-- .label_tipo1 -->
														
						</div><!-- .content -->
					</div><!-- .content_box -->
				</div><!-- .bloco -->
				
				
				<div class="bloco t1085 floatLeft marginTop25">
					
					<div class="identificador bold">Informações socioeconômicas</div><!-- .identificador -->
				
					<div class="content_box t1085">
						<div class="content">
							
							<div class="label_tipo1">
							<div class="form">
							
								<div class="formSelect w220">
									<p>
										<label for="cad_casaPropria" id="label_casaPropria">POSSUI CASA PRÓPRIA?</label>
										<input type="text" id="cad_casaPropria" name="cad_casaPropria" class="w180 font16 uppercase" value="" /> 
										<img class="icon" id="icon_casaPropria1" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/seta_baixo.png" /> 
										<img class="icon hide" id="icon_casaPropria2" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado w220 maxHeight160 hide" id="resultado_casaPropria">
											<div class="item w200 pointer" id="">SIM</div>
											<div class="item w200 pointer" id="">NÃO</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#cad_casaPropria').live('focus', function(){
										$('#icon_casaPropria1').hide();
										$('#icon_casaPropria2').show();
										$('#resultado_casaPropria').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#cad_casaPropria').live('click', function(){
										$('#icon_casaPropria1').hide();
										$('#icon_casaPropria2').show();
										$('#resultado_casaPropria').show();										
									});
									
									$('#cad_casaPropria').live('focusout', function(){
										$('#resultado_casaPropria').hide();
										$('#icon_casaPropria1').show();
										$('#icon_casaPropria2').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box5 = $('#resultado_casaPropria');
										$(document.body).click(function(){
											if (!$box5.has(this).length) {
											$box5.hide();
											$('#icon_casaPropria1').show();
											$('#icon_casaPropria2').hide();
										}
									});
									</script>
								</div>
								
								<div class="space w750"></div>
								
								<div class="divisor w1055"></div>
								
								<div class="formSelect w220">
									<p>
										<label for="cad_casaPropria" id="label_casaPropria">POSSUI VEÍCULOS?</label>
										<input type="text" id="cad_casaPropria" name="cad_casaPropria" class="w180 font16 uppercase" value="" /> 
										<img class="icon" id="icon_casaPropria1" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/seta_baixo.png" /> 
										<img class="icon hide" id="icon_casaPropria2" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado tam220 maxHeight160 hide" id="resultado_casaPropria">
											<div class="item tam200 pointer" id="">SIM</div>
											<div class="item tam200 pointer" id="">NÃO</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#cad_casaPropria').live('focus', function(){
										$('#icon_casaPropria1').hide();
										$('#icon_casaPropria2').show();
										$('#resultado_casaPropria').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#cad_casaPropria').live('click', function(){
										$('#icon_casaPropria1').hide();
										$('#icon_casaPropria2').show();
										$('#resultado_casaPropria').show();										
									});
									
									$('#cad_casaPropria').live('focusout', function(){
										$('#resultado_casaPropria').hide();
										$('#icon_casaPropria1').show();
										$('#icon_casaPropria2').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box5 = $('#resultado_casaPropria');
										$(document.body).click(function(){
											if (!$box5.has(this).length) {
											$box5.hide();
											$('#icon_casaPropria1').show();
											$('#icon_casaPropria2').hide();
										}
									});
									</script>
								</div>
								
								<div class="space tam750"></div>
								
								<p class="formInput">
								<label for="c_nome_completo">TIPO</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle tam140 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_nome_completo">ANO</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle tam60 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_nome_completo">MARCA E MODELO</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle tam200 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_nome_completo">PLACA</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle tam100 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<div class="formInput">
								<div class="submit"> <img src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/botao_mais.png" /> </div>
								</div>
								
								<div class="space w290"></div>

								
							</div><!-- .form -->
							</div><!-- .label_tipo1 -->
														
						</div><!-- .content -->
					</div><!-- .content_box -->
				</div><!-- .bloco -->
				
				
				<div class="bloco t1085 floatLeft marginTop25">
					
					<div class="identificador bold">Informações de contato</div><!-- .identificador -->
				
					<div class="content_box t1085">
						<div class="content">
							
							<div class="label_tipo1">
							<div class="form">
							
								<div class="formSelect tam160">
									<p>
										<label for="cad_contatoTipo" id="label_contatoTipo">TIPO</label>
										<input type="text" id="cad_contatoTipo" name="cad_contatoTipo" class="tam115 font16 uppercase" value="" /> 
										<img class="icon" id="icon_contatoTipo1" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/seta_baixo.png" /> 
										<img class="icon hide" id="icon_contatoTipo2" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado tam160 maxHeight160 hide" id="resultado_contatoTipo">
											<div class="item tam140 pointer" id="">RESIDENCIAL</div>
											<div class="item tam140 pointer" id="">EMAIL</div>
											<div class="item tam140 pointer" id="">WEBSITE</div>
											<div class="item tam140 pointer" id="">REDE SOCIAL</div>
											<div class="item tam140 pointer" id="">OUTRO</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('focus', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('click', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									
									$('#cad_contatoTipo').live('focusout', function(){
										$('#resultado_contatoTipo').hide();
										$('#icon_contatoTipo1').show();
										$('#icon_contatoTipo2').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box6 = $('#resultado_contatoTipo');
										$(document.body).click(function(){
											if (!$box6.has(this).length) {
											$box6.hide();
											$('#icon_contatoTipo1').show();
											$('#icon_contatoTipo2').hide();
										}
									});
									</script>
								</div>
								
								
								<div class="formSelect tam160">
									<p>
										<label for="cad_contatoTipo" id="label_contatoTipo">DESCRIÇÃO</label>
										<input type="text" id="cad_contatoTipo" name="cad_contatoTipo" class="tam115 font16 uppercase" value="" /> 
										<img class="icon" id="icon_contatoTipo1" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/seta_baixo.png" /> 
										<img class="icon hide" id="icon_contatoTipo2" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado tam160 maxHeight160 hide" id="resultado_contatoTipo">
											<div class="item tam140 pointer" id="">RESIDENCIAL</div>
											<div class="item tam140 pointer" id="">CORPORATIVO</div>
											<div class="item tam140 pointer" id="">WEBSITE</div>
											<div class="item tam140 pointer" id="">REDE SOCIAL</div>
											<div class="item tam140 pointer" id="">OUTRO</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('focus', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('click', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									
									$('#cad_contatoTipo').live('focusout', function(){
										$('#resultado_contatoTipo').hide();
										$('#icon_contatoTipo1').show();
										$('#icon_contatoTipo2').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box6 = $('#resultado_contatoTipo');
										$(document.body).click(function(){
											if (!$box6.has(this).length) {
											$box6.hide();
											$('#icon_contatoTipo1').show();
											$('#icon_contatoTipo2').hide();
										}
									});
									</script>
								</div>
								
								<p class="formInput">
								<label for="c_nome_completo">CONTATO</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle w230 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<div class="formInput">
								<div class="submit"> <img src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/botao_mais.png" /> </div>
								</div>

								
							</div><!-- .form -->
							</div><!-- .label_tipo1 -->
														
						</div><!-- .content -->
					</div><!-- .content_box -->
				</div><!-- .bloco -->
				
				
						<div class="bloco t1085 floatLeft marginTop25">
					
					<div class="identificador bold">Informações de endereços</div><!-- .identificador -->
				
					<div class="content_box t1085">
						<div class="content">
							
							<div class="label_tipo1">
							<div class="form">
							
								<div class="formSelect tam160">
									<p>
										<label for="cad_contatoTipo" id="label_contatoTipo">TIPO</label>
										<input type="text" id="cad_contatoTipo" name="cad_contatoTipo" class="tam115 font16 uppercase" value="" /> 
										<img class="icon" id="icon_contatoTipo1" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/seta_baixo.png" /> 
										<img class="icon hide" id="icon_contatoTipo2" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado tam160 maxHeight160 hide" id="resultado_contatoTipo">
											<div class="item tam140 pointer" id="">RESIDENCIAL</div>
											<div class="item tam140 pointer" id="">EMAIL</div>
											<div class="item tam140 pointer" id="">WEBSITE</div>
											<div class="item tam140 pointer" id="">REDE SOCIAL</div>
											<div class="item tam140 pointer" id="">OUTRO</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('focus', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('click', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									
									$('#cad_contatoTipo').live('focusout', function(){
										$('#resultado_contatoTipo').hide();
										$('#icon_contatoTipo1').show();
										$('#icon_contatoTipo2').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box6 = $('#resultado_contatoTipo');
										$(document.body).click(function(){
											if (!$box6.has(this).length) {
											$box6.hide();
											$('#icon_contatoTipo1').show();
											$('#icon_contatoTipo2').hide();
										}
									});
									</script>
								</div>
								
								
								<div class="formSelect tam160">
									<p>
										<label for="cad_contatoTipo" id="label_contatoTipo">DESCRIÇÃO</label>
										<input type="text" id="cad_contatoTipo" name="cad_contatoTipo" class="tam115 font16 uppercase" value="" /> 
										<img class="icon" id="icon_contatoTipo1" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/seta_baixo.png" /> 
										<img class="icon hide" id="icon_contatoTipo2" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado tam160 maxHeight160 hide" id="resultado_contatoTipo">
											<div class="item tam140 pointer" id="">RESIDENCIAL</div>
											<div class="item tam140 pointer" id="">CORPORATIVO</div>
											<div class="item tam140 pointer" id="">WEBSITE</div>
											<div class="item tam140 pointer" id="">REDE SOCIAL</div>
											<div class="item tam140 pointer" id="">OUTRO</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('focus', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('click', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									
									$('#cad_contatoTipo').live('focusout', function(){
										$('#resultado_contatoTipo').hide();
										$('#icon_contatoTipo1').show();
										$('#icon_contatoTipo2').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box6 = $('#resultado_contatoTipo');
										$(document.body).click(function(){
											if (!$box6.has(this).length) {
											$box6.hide();
											$('#icon_contatoTipo1').show();
											$('#icon_contatoTipo2').hide();
										}
									});
									</script>
								</div>
								
								<p class="formInput">
								<label for="c_nome_completo">ANO</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle tam60 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_nome_completo">MODELO</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle tam200 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_nome_completo">PLACA</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle tam100 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<div class="formInput">
								<div class="submit"> <img src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/botao_mais.png" /> </div>
								</div>

								
							</div><!-- .form -->
							</div><!-- .label_tipo1 -->
														
						</div><!-- .content -->
					</div><!-- .content_box -->
				</div><!-- .bloco -->
				
				
				<div class="bloco t1085 floatLeft marginTop25">
					
					<div class="identificador bold">Cadastro de dependentes</div><!-- .identificador -->
				
					<div class="content_box t1085">
						<div class="content">
							
							<div class="label_tipo1">
							<div class="form">
							
								<div class="formSelect tam160">
									<p>
										<label for="cad_contatoTipo" id="label_contatoTipo">TIPO</label>
										<input type="text" id="cad_contatoTipo" name="cad_contatoTipo" class="tam115 font16 uppercase" value="" /> 
										<img class="icon" id="icon_contatoTipo1" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/seta_baixo.png" /> 
										<img class="icon hide" id="icon_contatoTipo2" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado tam160 maxHeight160 hide" id="resultado_contatoTipo">
											<div class="item tam140 pointer" id="">RESIDENCIAL</div>
											<div class="item tam140 pointer" id="">EMAIL</div>
											<div class="item tam140 pointer" id="">WEBSITE</div>
											<div class="item tam140 pointer" id="">REDE SOCIAL</div>
											<div class="item tam140 pointer" id="">OUTRO</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('focus', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('click', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									
									$('#cad_contatoTipo').live('focusout', function(){
										$('#resultado_contatoTipo').hide();
										$('#icon_contatoTipo1').show();
										$('#icon_contatoTipo2').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box6 = $('#resultado_contatoTipo');
										$(document.body).click(function(){
											if (!$box6.has(this).length) {
											$box6.hide();
											$('#icon_contatoTipo1').show();
											$('#icon_contatoTipo2').hide();
										}
									});
									</script>
								</div>
								
								
								<div class="formSelect tam160">
									<p>
										<label for="cad_contatoTipo" id="label_contatoTipo">DESCRIÇÃO</label>
										<input type="text" id="cad_contatoTipo" name="cad_contatoTipo" class="tam115 font16 uppercase" value="" /> 
										<img class="icon" id="icon_contatoTipo1" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/seta_baixo.png" /> 
										<img class="icon hide" id="icon_contatoTipo2" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/buscar.png" /> 
									
										<div class="resultado tam160 maxHeight160 hide" id="resultado_contatoTipo">
											<div class="item tam140 pointer" id="">RESIDENCIAL</div>
											<div class="item tam140 pointer" id="">CORPORATIVO</div>
											<div class="item tam140 pointer" id="">WEBSITE</div>
											<div class="item tam140 pointer" id="">REDE SOCIAL</div>
											<div class="item tam140 pointer" id="">OUTRO</div>
										</div><!-- .resultado -->
									</p>
									
									<script type="text/javascript">
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('focus', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									// faz exibir e esconder o icone de busca
									$('#cad_contatoTipo').live('click', function(){
										$('#icon_contatoTipo1').hide();
										$('#icon_contatoTipo2').show();
										$('#resultado_contatoTipo').show();										
									});
									
									$('#cad_contatoTipo').live('focusout', function(){
										$('#resultado_contatoTipo').hide();
										$('#icon_contatoTipo1').show();
										$('#icon_contatoTipo2').hide();
									});
									
									// esconde resultado quando for clicado fora
									var $box6 = $('#resultado_contatoTipo');
										$(document.body).click(function(){
											if (!$box6.has(this).length) {
											$box6.hide();
											$('#icon_contatoTipo1').show();
											$('#icon_contatoTipo2').hide();
										}
									});
									</script>
								</div>
								
								<p class="formInput">
								<label for="c_nome_completo">ANO</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle tam60 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_nome_completo">MODELO</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle tam200 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<p class="formInput">
								<label for="c_nome_completo">PLACA</label>
								<input type="text" id="c_nome_completo" name="c_nome_completo" class="tipo1 formIdle tam100 floatLeft font16 uppercase" value="" />
								<img class="aviso_erro hide" src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/aviso_erro.png" />
								</p>
								
								<div class="formInput">
								<div class="submit"> <img src="routines/gestao_de_pessoas/images/central_colaboradores/formulario/botao_mais.png" /> </div>
								</div>

								
							</div><!-- .form -->
							</div><!-- .label_tipo1 -->
														
						</div><!-- .content -->
					</div><!-- .content_box -->
				</div><!-- .bloco -->
				
				<div class="ficha_cadastral t1085 floatLeft hide">
				</div><!-- .ficha_cadastral -->
		
		</div><!-- .espaco_permitido -->
		
		</div><!-- .espaco_maximo -->
		
	</div><!-- .moduloContent -->
</div><!-- .modulo -->