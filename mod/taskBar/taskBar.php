<script type="text/javascript">
	/* define o comportamento de expansão da barra de navegação */
	
	$('#barra_navegacao_expandir').live('click', function(){
		$('.barra_navegacao').removeClass('t45').addClass('t220');	
		$('.option').removeClass('t45').addClass('t220');	
		$('.optionSelected').removeClass('t45').addClass('t220');						
		$('.nome').removeClass('hide');
		$('#barra_navegacao_expandir').addClass('hide');
		$('#barra_navegacao_esconder').removeClass('hide');
	});
	
	$('#barra_navegacao_esconder').live('click', function(){
		$('.barra_navegacao').addClass('t45').removeClass('t220');	
		$('.option').addClass('t45').removeClass('t220');	
		$('.optionSelected').addClass('t45').removeClass('t220');						
		$('.nome').addClass('hide');
		$('#barra_navegacao_expandir').removeClass('hide');
		$('#barra_navegacao_esconder').addClass('hide');
	});
</script>
		
<div class="barra_navegacao t45 floatRight font17">
		
	<div class="borderLeft_outside">
	</div><!-- borderLeft -->
		
	<div class="borderLeft">
	</div><!-- borderLeft -->
	
		<img id="barra_navegacao_expandir" class="expandir pointer" src="mod/taskBar/images/expandir.png" />
		<img id="barra_navegacao_esconder" class="expandir hide pointer" src="mod/taskBar/images/esconder.png" />
		
		<div class="optionSelected t45 marginTop20">
		
			<img class="icon" src="mod/taskBar/images/icons/3.png" />
			<div class="nome c000000 hide">Suprimentos</div>
			
			<div class="borderBottom">
			</div><!-- .borderBottom -->
			<div class="sideMark">
			</div><!-- .sideMark -->
			
		</div><!-- .option -->
		
		<div class="option t45 floatLeft marginTop5">
		
			<img class="icon" src="mod/taskBar/images/icons/1.png" />
			<div class="nome c4183C4 hide">Contabilidade</div>
			
		</div><!-- .option -->
		
		<div class="option t45 floatLeft marginTop5">
		
			<img class="icon" src="mod/taskBar/images/icons/2.png" />
			<div class="nome c4183C4 hide">Financeiro</div>
			
		</div><!-- .option -->
		
		<div class="option t45 floatLeft marginTop5">
		
			<img class="icon" src="mod/taskBar/images/icons/5.png" />
			<div class="nome c4183C4 hide">Recursos Humanos</div>
			
		</div><!-- .option -->
		
		<div class="option t45 floatLeft marginTop5">
		
			<img class="icon" src="mod/taskBar/images/icons/4.png" />
			<div class="nome c4183C4 hide">Diretrizes</div>
			
		</div><!-- .option -->
		
		<div class="separador"></div><!-- .separador -->
		
		<div class="option t45 floatLeft marginTop5">
		
			<img class="icon" src="mod/taskBar/images/icons/e1.png" />
			<div class="nome c4183C4 hide">Rastreamento</div>
		
		</div><!-- .option -->
	
</div><!-- .barra_navegacao -->