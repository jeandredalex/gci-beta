<?php 
function tipo($tipo){
	switch (strtoupper($tipo)) {
		case 'TELEFONE':
			$tipos[]='RESIDENCIAL';
			$tipos[]='COMERCIAL';
			$tipos[]='MOVEL';
			$tipos[]='RECADOS';
			$tipos[]='OUTRO';
			break;
		case 'EMAIL':
			$tipos[]='PESSOAL';
			$tipos[]='CORPORATIVO';
			$tipos[]='OUTRO';
			break;
		case 'WEBSITE':
			$tipos[]='PESSOAL';
			$tipos[]='CORPORATIVO';
			$tipos[]='OUTRO';
			break;
		case 'ENDERECO':
			$tipos[]='RESIDENCIAL';
			$tipos[]='COMERCIAL';
			$tipos[]='OUTRO';
			break;
		case 'REDESOCIAL':
			$tipos[]='LINKEDIN';
			$tipos[]='FACEBOOK';
			$tipos[]='TWITTER';
			$tipos[]='OUTRO';
			break;
		case 'ESTADOCIVIL':
			$tipos[]='SOLTEIRO(A)';
			$tipos[]='CASADO(A)';
			$tipos[]='DIVORCIADO(A)';
			$tipos[]='VIÚVO(A)';
			$tipos[]='UNIÃO ESTÁVEL';
		default:
			$tipos[]='TIPO INVALIDO';
			break;
	}
	return json_encode($tipos);
}
?>