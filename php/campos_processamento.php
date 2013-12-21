<?php
include_once 'campos_formata.php';
include_once 'campos_valida.php';

function processa_dados($row,$columns,$valida=false){
	if($valida){
		return json_encode(valida_objeto(criar_objeto($row,$columns)));
	}else{
		return json_encode(criar_objeto($row,$columns));
	}
}

function criar_objeto($row,$columns){ // cria um objeto com array associativo passando a row e as colunas
	$i=0;
	foreach ($row as $item){
		$objeto[$columns[$i].'_valor'] = $item;
		$objeto[$columns[$i].'_validado'] = 'false';
		$objeto[$columns[$i].'_msg'] = '';
		$i++;
	}
	return $objeto;
}

function valida_objeto($o){

	if(isset($o['c_rg_uf_valor']) AND $o['c_rg_uf_valor']!=''){
		if(Validar::string($o['c_rg_uf_valor'],2)){ //valor e quantos caracteres o campo deve ter
			$o['c_rg_uf_validado']='true';
			$o['c_rg_uf_valor']=Formatar::sigla2nome($o['c_rg_uf_valor']);
		}else{
			$o['c_rg_uf_msg']='UF RG invalido';
		}
	}
/*	
	if(isset($o['NOME_valor']) AND $o['NOME_valor']!=''){
		if(Validar::nome_completo($o['NOME_valor'])){
			$o['NOME_validado']='true';
		}else{
			$o['NOME_msg']='Informe o nome completo!';
		}
	}
	if(isset($o['NASCIMENTO_valor']) AND $o['NASCIMENTO_valor']!=''){
		if(Validar::data($o['NASCIMENTO_valor'])){
			$o['NASCIMENTO_validado']='true';
		}else{
			$o['NASCIMENTO_msg']='Data de Nascimento inválida!';
		}
	}
	
	if(isset($o['ADMISSAO_valor']) AND $o['ADMISSAO_valor']!=''){
		if(Validar::data($o['NASCIMENTO_valor'])){
			$o['ADMISSAO_validado']='true';
		}else{
			$o['ADMISSAO_msg']='Data de ADMISSAO inválida!';
		}
	}
	
	if(isset($o['PAI_valor']) AND $o['PAI_valor']!=''){
		if(Validar::nome_completo($o['PAI_valor'])){
			$o['PAI_validado']='true';
		}else{
			$o['PAI_msg']='Informe o nome completo!';
		}
	}
	
	if(isset($o['MAE_valor']) AND $o['MAE_valor']!=''){
		if(Validar::nome_completo($o['MAE_valor'])){
			$o['MAE_validado']='true';
		}else{
			$o['MAE_msg']='Informe o nome completo!';
		}
	}
	
	if(isset($o['CPF_valor']) AND $o['CPF_valor']!=''){
		if(Validar::cpf($o['CPF_valor'])){
			$o['CPF_validado']='true';
			$o['CPF_valor']=Formatar::apenas_alfanumerico($o['CPF_valor']);
		}else{
			$o['CPF_msg']='CPF invalido';
		}
	}
	if(isset($o['TITULOELEITORAL_valor']) AND $o['TITULOELEITORAL_valor']!=''){
		if(Validar::titulo($o['TITULOELEITORAL_valor'])){
			$o['TITULOELEITORAL_validado']='true';
		}else{
			$o['TITULOELEITORAL_msg']='TITULO ELEITORAL invalido';
		}
	}
	
	if(isset($o['IDENTIDADE_valor']) AND $o['IDENTIDADE_valor']!=''){
			$o['IDENTIDADE_validado']='true';
			$o['IDENTIDADE_valor']=Formatar::apenas_alfanumerico($o['IDENTIDADE_valor']);
	}
	
	if(isset($o['NROCARTTRAB_valor']) AND $o['NROCARTTRAB_valor']!=''){
		if(Validar::numero($o['NROCARTTRAB_valor'])){
			$o['NROCARTTRAB_validado']='true';
		}else{
			$o['NROCARTTRAB_msg']='Verifique o valor informado!';
		}
	}
	
	if(isset($o['SERIECARTTRAB_valor']) AND $o['SERIECARTTRAB_valor']!=''){
		if(Validar::numero($o['SERIECARTTRAB_valor'])){
			$o['SERIECARTTRAB_validado']='true';
		}else{
			$o['SERIECARTTRAB_msg']='Verifique o valor informado!';
		}
	}
	
	if(isset($o['HABILITACAOPROFISSIONAL_valor']) AND $o['HABILITACAOPROFISSIONAL_valor']!=''){
		if(Validar::numero($o['HABILITACAOPROFISSIONAL_valor'])){
			$o['HABILITACAOPROFISSIONAL_validado']='true';
		}else{
			$o['HABILITACAOPROFISSIONAL_msg']='Verifique o valor informado!';
		}
	}
	
	if(isset($o['CATEGORIAHABILITACAO_valor']) AND $o['CATEGORIAHABILITACAO_valor']!=''){
		if(Validar::string($o['CATEGORIAHABILITACAO_valor'])){
			$o['CATEGORIAHABILITACAO_validado']='true';
		}else{
			$o['CATEGORIAHABILITACAO_msg']='Verifique o valor informado!';
		}
	}
	
	if(isset($o['EXPEDICAOHABILITACAO_valor']) AND $o['EXPEDICAOHABILITACAO_valor']!=''){
		if(Validar::data($o['EXPEDICAOHABILITACAO_valor'])){
			$o['EXPEDICAOHABILITACAO_validado']='true';
		}else{
			$o['EXPEDICAOHABILITACAO_msg']='Data inválida!';
		}
	}
	
	if(isset($o['UFIDENTIDADE_valor']) AND $o['UFIDENTIDADE_valor']!=''){
		if(Validar::string($o['UFIDENTIDADE_valor'],2)){ //valor e quantos caracteres o campo deve ter
			$o['UFIDENTIDADE_validado']='true';
		}else{
			$o['UFIDENTIDADE_msg']='UF RG invalido';
		}
	}
	
	if(isset($o['PIS_valor']) AND $o['PIS_valor']!=''){
		if(Validar::numero($o['PIS_valor'],11)){  //valor e quantos caracteres o campo deve ter
			$o['PIS_validado']='true';
		}else{
			$o['PIS_msg']='Verifique o valor informado!';
		}
	}
	
	if(isset($o['TITULOELEITORAL_valor']) AND $o['TITULOELEITORAL_valor']!=''){
		if(Validar::numero($o['TITULOELEITORAL_valor'])){
			$o['TITULOELEITORAL_validado']='true';
		}else{
			$o['TITULOELEITORAL_msg']='Verifique o valor informado!';
		}
	}
	
	if(isset($o['ZONAELEITORAL_valor']) AND $o['ZONAELEITORAL_valor']!=''){
		if(Validar::numero($o['ZONAELEITORAL_valor'],4)){
			$o['ZONAELEITORAL_validado']='true';
		}else{
			$o['ZONAELEITORAL_msg']='Verifique o valor informado!';
		}
	}
	
	if(isset($o['SECAOELEITORAL_valor']) AND $o['SECAOELEITORAL_valor']!=''){
		if(Validar::numero($o['SECAOELEITORAL_valor'],4)){
			$o['SECAOELEITORAL_validado']='true';
		}else{
			$o['SECAOELEITORAL_msg']='Verifique o valor informado!';
		}
	}
	*/
	return $o;
}