<?php
class Formatar{
	public static function apenas_alfanumerico($string){
		$string = preg_replace('/[\W]+/', '', $string); //remove pontuação
		return $string;
	}
	public static function formato ($string, $tipo = "")
	{
		$string = preg_replace("[^0-9]", "", $string);
		if (!$tipo)
		{
			switch (strlen($string))
			{
				case 10: 	$tipo = 'fone'; 	break;
				case 8: 	$tipo = 'cep'; 		break;
				case 11: 	$tipo = 'cpf'; 		break;
				case 14: 	$tipo = 'cnpj'; 	break;
			}
		}
		switch ($tipo)
		{
			case 'fone':
				$string = '(' . substr($string, 0, 2) . ') ' . substr($string, 2, 4) . '-' . substr($string, 6);
				break;
			case 'cep':
				$string = substr($string, 0, 5) . '-' . substr($string, 5, 3);
				break;
			case 'cpf':
				$string = substr($string, 0, 3) . '.' . substr($string, 3, 3) . '.' . substr($string, 6, 3) . '-' . substr($string, 9, 2);
				break;
			case 'cnpj':
				$string = substr($string, 0, 2) . '.' . substr($string, 2, 3) . '.' . substr($string, 5, 3) . '/' . substr($string, 8, 4) . '-' . substr($string, 12, 2);
				break;
			case 'rg':
				$string = substr($string, 0, 2) . '.' . substr($string, 2, 3) . '.' . substr($string, 5, 3);
				break;
		}
		return $string;
	}
	
	public static function sigla2nome($sigla){
		
		$siglas['AC']='ACRE (AC)';
		$siglas['AL']='ALAGOAS (AL)';
		$siglas['AP']='AMAPA (AP)';
		$siglas['AM']='AMAZONAS (AM)';
		$siglas['BA']='BAHIA (BA)';
		$siglas['CE']='CEARA (CE)';
		$siglas['DF']='DISTRITO FEDERAL (DF)';
		$siglas['ES']='ESPIRITO SANTO (ES)';
		$siglas['GO']='GOIAS (GO)';
		$siglas['MA']='MARANHAO (MA)';
		$siglas['MT']='MATO GROSSO (MT)';
		$siglas['MS']='MATO GROSSO DO SUL (MS)';
		$siglas['MG']='MINAS GERAIS (MG)';
		$siglas['PA']='PARA (PA)';
		$siglas['PB']='PARAIBA (PB)';
		$siglas['PR']='PARANA (PR)';
		$siglas['PE']='PERNAMBUCO (PE)';
		$siglas['PI']='PIAUI (PI)';
		$siglas['RJ']='RIO DE JANEIRO (RJ)';
		$siglas['RN']='RIO GRANDE DO NORTE (RN)';
		$siglas['RS']='RIO GRANDE DO SUL (RS)';
		$siglas['RO']='RONDONIA (RO)';
		$siglas['RR']='RORAIMA (RR)';
		$siglas['SC']='SANTA CATARINA (SC)';
		$siglas['SP']='SAO PAULO (SP)';
		$siglas['SE']='SERGIPE (SE)';
		$siglas['TO']='TOCANTINS (TO)';
				
		return $siglas[strtoupper($sigla)];
	}
}
