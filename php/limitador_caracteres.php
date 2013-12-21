<?php
	function limitar($string, $tamanho, $encode = 'UTF-8') {
	
		if( strlen($string) > $tamanho ){
			$string1 = mb_substr($string, 0, $tamanho - 2, $encode);
			$ultimo_caracter = substr($string1, -1);
				if( $ultimo_caracter == " "){
					$string = mb_substr($string, 0, $tamanho - 3, $encode).'..';
				}else {
					$string = mb_substr($string, 0, $tamanho - 2, $encode).'..';
				}
		}else{
			$string = mb_substr($string, 0, $tamanho, $encode);
		}
 
    return $string;
}
?>