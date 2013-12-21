<?php
require 'campos_valida_tmp.php';
class Validar extends Validation{
    
    
	public static function titulo($te=null){
		$te = str_pad(preg_replace('[^0-9]', '', $te), 12, '0', STR_PAD_LEFT);
		$uf = intval(substr($te, 8, 2));

		if (strlen($te) != 12 || $uf < 1 || $uf > 28) {
			return false;
		} else {
			$d = 0;

			for ($i = 0; $i < 8; $i++) {
				$d += $te{$i} * (9 - $i);
			}

			$d %= 11;

			if ($d < 2) {
				if ($uf < 3) {
					$d = 1 - $d;
				} else {
					$d = 0;
				}
			} else {
				$d = 11 - $d;
			}

			if ($te{10} != $d) {
				return false;
			}

			$d *= 2;

			for ($i = 8; $i < 10; $i++) {
				$d += $te{$i} * (12 - $i);
			}

			$d %= 11;

			if ($d < 2) {
				if ($uf < 3) {
					$d = 1 - $d;
				} else {
					$d = 0;
				}
			} else {
				$d = 11 - $d;
			}

			if ($te{11} != $d) {
				return false;
			}

			return true;
		}
	}

    /**
    *	Valida um PIS (Programa de Integração Social)
    *	
    *	@version:   0.3  18/05/2009
    *	            1.0  23/05/2011 - Importado do ValidationComponent.
    *	                            - Agora retorna true or false
    *	                            - Método static
     *	@param $pis Número do PIS
     *	@return	boolean True se for um número válido
    */
    public static function pis($pis){
            #permite pontos e traços, mas não deve permitir outras coisas
            $pis = str_pad(preg_replace("([^0-9]+)", '', $pis), 10, '0', STR_PAD_LEFT);
            #DV informado
            $dv = substr($pis,-1,1);
            #sequencia de números a serem calculados
            $seqcalc = "3298765432";
            
            $soma = 0;

            for($i = 0; $i < 10; $i++){
                $soma += $pis[$i] * $seqcalc[$i];
            }

            $dv1 = (($soma % 11) < 2) ? 0 : (11 - ($soma % 11));

            return ($dv1 != $dv);
    }
    
    /**
     *	function cpf()
     * Valida um CPF verificando seus algarismos e seus dígitos verificadores. 
     *	Para fins de validação, cpf() não leva em consideração as presenças de pontos e 
     *	traços ao número informado.
     *	
     *	@version:	0.3 18/05/2009 Initial
     *	                1.0 23/05/2011 - Método agora é static
     *	                               - Retorna true se for válido
     *	                               - Importado do ValidationComponent.
     *	                               
     *	@param $value CPF a ser verificado
     *	@return	$this
     */
    public static function cpf($value) {
        #permite pontos e traços, mas não deve permitir outras coisas
        $value = str_pad(preg_replace("([^0-9]+)", '', $value), 11, '0', STR_PAD_LEFT);

        $cpf = substr($value, 0, 9);
        $dv = substr($value,9,2);
        
        $soma = $soma2 = 0;
        for($i = 0; $i <= 9; $i++){
            $ignore_list[] = str_repeat($i, 11); //gerando ignore list
            @$soma += $cpf[$i] * (10 - $i);
            @$soma2 += $cpf[$i] * (11 - $i);
        }
        
        if(in_array($value, $ignore_list)){
                return false;
        }
        
        $dv1   = (($soma % 11) <= 1) ? 0 : (11 - ($soma % 11));
        $soma2 = ($soma2 + $dv[0] * 2) % 11;
        $dv2   = (($soma2 % 11) <= 1) ? 0 : (11 - ($soma2 % 11));
        //pr($dv1.$dv2);
        if($dv1 . $dv2 != $dv[0] . $dv[1]){
                return false;
        }
        return true;
    }
    
    /**
      * Valida uma CNH (Carteira nacional de habilitação)
      *
      * @version 0.1 Initial. Retirado da internet
      *          0.2 23/05/2011 - Transformado em static
      *                         - Algumas adaptações
      *                         - Importado do ValidationComponent.
      * 
      */
    public static function cnh($cnh) {
        $ret = false;
    
        if((strlen($cnh = preg_replace('/[^\d]/' , '' , $cnh)) == 11 )){
            $dsc = 0;

            for ( $i = 0 , $j = 9 , $v = 0 ; $i < 9 ; ++$i , --$j ){
                $v += (int) $cnh{ $i } * $j;
            }

            if ( ( $vl1 = $v % 11 ) >= 10 ) {
                $vl1 = 0;
                $dsc = 2;
            }

            for ( $i = 0 , $j = 1 , $v = 0 ; $i < 9 ; ++$i , ++$j ){
                $v += (int) $cnh{ $i } * $j;
            }

            $vl2 = ( $x = ( $v % 11 ) ) >= 10 ? 0 : $x - $dsc;
            $ret = sprintf( '%d%d' , $vl1 , $vl2 ) == substr( $cnh , -2 );
        }
        
        return $ret;
    }

    /**
     *	function cnpj()
     *	Valida um CNPJ.
     *	cnpj() não considera pontos, traços e barras.
     *	
     *	@version:	0.2 18/05/2009 
     *	                0.3 23/05/2011 - Agora retorna True se for um cnpj válido
     *                                 - Importado do ValidationComponent.
     *	                0.4 27/05/2011 Método transformado em  static
     *	                0.5 27/05/2011 Mudança do algoritmo
     *
     *	@param $cnpj CNPJ a ser verificado
     *	@return	boolean
     */
    public static function cnpj($cnpj = null){
        // Canonicalize input
        $cnpj = sprintf('%014s', preg_replace('{\D}', '', $cnpj));

        // Validate length and CNPJ order
        if ((strlen($cnpj) != 14)
                || (intval(substr($cnpj, -4)) == 0)) {
            return false;
        }

        // Validate check digits using a modulus 11 algorithm
        for ($t = 11; $t < 13;) {
            for ($d = 0, $p = 2, $c = $t; $c >= 0; $c--, ($p < 9) ? $p++
                                                                  : $p = 2) {
                $d += $cnpj[$c] * $p;
            }

            if ($cnpj[++$t] != ($d = ((10 * $d) % 11) % 10)) {
                return false;
            }
        }

        return true;
        
    }

  public static function numero($numero = null,$pos = null){
    	$numero = preg_replace('/[\W]+/', '', $numero); //remove pontuação
    	if(is_numeric($numero)){ //verifica se o campo é numerico
    		if(isset($pos)){
    			if(strlen($numero)!=$pos){
    				return false;
    			}
    		}
    		return  true;
    	}
    	else{
    		return false;
    	}
    }
    
    public static function string($string = null,$pos = null){
    	if(strlen($string)==$pos){
    		return is_string($string);
    	}else{
    		return false;
    	}
    }
    
    
    public static function nome_completo($nome_completo = null){
    	$nome_completo=explode(' ',$nome_completo);
    	if((count($nome_completo)>1) AND (strlen($nome_completo[1])>1)){
    		return  true;
    	}
    	else{
    		return false;
    	}
    }
    
    public static function data($data = null){
    	date_default_timezone_set("Brazil/East");
    	//$data = explode("/",date_format(date_create($data),'m/d/Y'));
    	$data = explode("/",$data);
    	$d=$data[0];
    	$m=$data[1];
    	$y=$data[2];
    	
    	if(checkdate($m,$d,$y)){
    		return true;
    	}else{
    		return false;
    	}
    }
    
    public static function grau_parentesco($grau_parentesco = null){
    	
    	switch ($grau_parentesco) {
    		case 'filho':
    		case 'filha':
    		case 'esposa':
    		case 'marido':
    			return  true ;
    			break;
    		
    		default:
    			return  false;
    			break;
    	}
    }
    
}