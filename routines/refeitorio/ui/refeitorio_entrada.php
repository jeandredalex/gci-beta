<!-- PLUGINS -->
<!-- label -->
<script src="plugin/label/label.js"></script>

<!-- tooltip -->
<script src="plugin/tooltip/tooltip.js"></script>
<link  href="plugin/tooltip/tooltip.css" type="text/css" rel="stylesheet" />

<!-- reveal -->
<script src="plugin/shortcut/shortcut.js"></script>

<!-- shrotcut -->
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
<!-- refeitorio_entrada -->
<link type="text/css" href="routines/refeitorio/css/refeitorio_entrada/refeitorio_entrada.css" rel="stylesheet" />

<!-- topo adicional: de acordo com a necessidade da tela -->
<div class="topo_modular">
	<img class="logo" src="routines/refeitorio/images/refeitorio_entrada/refeitorio_logo.png" />
</div><!-- .topo_modular -->

<!-- início da tela de registro de acesso ao refeitório -->
<div class="modulo">
	<div class="moduloContent">
		<div class="refeitorio t800">
		
			<div class="matriculaBox font24 marginTop25">
			DIGITE O NÚMERO DA MATRÍCULA
			<input type="text" class="matricula marginTop10" id="matricula" />
			</div>
					
			<div class="resultado marginTop35">
				<div class="foto"><img id="pessoa_foto" src="storage/pessoas_fotos/foto300.png" /></div>
				<div class="nome font30 marginTop10" id="pessoa_nome">AGUARDANDO ACESSO</div>
				<div class="data_hora font24 marginTop10" id="acesso_data"></div>
				<div class="mensagem font24 marginTop15" id="acesso_resultado"></div>
			</div><!-- .resultado -->
		
		</div><!-- .t800 -->
	</div><!-- .moduloContent -->
</div><!-- .modulo -->

<!-- início do código javascript da tela -->
<script type="text/javascript">
shortcut.add("Enter",function(){

	$.ajax({
		url : 'routines/refeitorio/php/refeitorio_entrada/refeitorio_entrada_processamento.php',
		type : 'POST',
			data : 'matricula=' + $('#matricula').val(),
			dataType : 'json',
			success: function(refeitorioEntrada){
				if(refeitorioEntrada.resp == true){
				
					// atribui resultado
				//	$('#pessoa_foto').attr('src', '');
					$('#pessoa_nome').html(refeitorioEntrada.nome);
					$('#acesso_data').html(refeitorioEntrada.data);
					$('#acesso_resultado').html(refeitorioEntrada.msg).addClass('auth');

					
				
				}else{
					$('#acesso_resultado').html(refeitorioEntrada.msg).addClass('denied');
				}
				
				setTimeout(function() {
					$('#pessoa_nome').html('AGUARDANDO ACESSO');
					$('#acesso_data').empty();
					$('#acesso_resultado').empty().removeClass('auth').removeClass('denied');
					$('#matricula').val('');
				}, 2000);
				
		}
	});
	
});

$('#matricula').focus();
</script>