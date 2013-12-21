<?php
// inclui conexão com o banco de dados
include '../../../../conn/transoeste/mysql/script.php';

// pega a hora atual do servidor
$dataAgora = date('Y-m-d H:i:s');

// se a matrícula do funcionário foi enviada
if(isset($_POST['matricula'])){
  
	// atribui dados as variáveis
	$matricula = $_POST['matricula'];
	
	// busca a ID inserida
	if ($verificaUsuario = $mysqli->prepare("SELECT
												pessoas.pf_nome_completo,
												pessoas.pf_foto,
												usuarios.ativo
											 FROM pessoas

											 INNER JOIN usuarios
												ON pessoas.id = usuarios.id_relacao
											 INNER JOIN p_funcionarios
												ON pessoas.id = p_funcionarios.id_pessoa

											 WHERE usuarios.id = ?")){
	
		$verificaUsuario->bind_param('i', $matricula);
		$verificaUsuario->execute();
		$verificaUsuario->store_result();
		
		$existeUsuario = $verificaUsuario->num_rows();
		
		$verificaUsuario->bind_result($nome_completo, $foto, $ativo);
		$verificaUsuario->fetch();
		$verificaUsuario->close();
	}
	
	
	if ($existeUsuario == 1) {
	
		if ($ativo == 1){
		
			// registra acesso ao refeitório
			$registraAcesso = $mysqli->prepare("INSERT INTO refeitorio_entrada (id_usuario, data_registro) VALUES (?, ?)");
			$registraAcesso->bind_param('is', $matricula, $dataAgora);
			$registraAcesso->execute();
			
			// pega o ID do registro inserido
			$ultimoRegistroInserido = $registraAcesso->insert_id;
			
			// verifica se o registro foi inserido com sucesso
			if ($ultimoRegistroInserido > 0){
			
				$refeitorio['resp'] = true; // true or false
				$refeitorio['msg']  = "ACESSO AUTORIZADO"; // mensagem de retorno exibida ao usuário
				$refeitorio['nome'] = $nome_completo; // nome da pessoa
				$refeitorio['foto'] = $foto; // foto da pessoa
				$refeitorio['data'] = date('d/m/Y - H:i', strtotime($dataAgora)); // data e hora do momento da solicitação
			
				echo json_encode($refeitorio);
			
			}else{
				
				$refeitorio['resp'] = false; // true or false
				$refeitorio['msg']  = "ERRO AO REGISTRAR ACESSO (Errno: 1)"; // mensagem de retorno exibida ao usuário
				$refeitorio['nome'] = $nome_completo; // nome da pessoa
				$refeitorio['foto'] = $foto; // foto da pessoa
				$refeitorio['data'] = date('d/m/Y - H:i', strtotime($dataAgora)); // data e hora do momento da solicitação
			
				// prepara registro do erro
				$erro = $refeitorio['msg'];
				$errno = '1';
			
				echo json_encode($refeitorio);
			
				// registraerro
				$registraErro = $mysqli->prepare("INSERT INTO log_erros (id_usuario, erro, errno, data_registro) VALUES (?, ?, ?, ?)");
				$registraErro->bind_param('isss', $matricula, $erro, $errno, $dataAgora);
				$registraErro->execute();
			
			}
			
		}else{
			
			$refeitorio['resp'] = false;
			$refeitorio['msg']  = "MATRÍCULA INATIVA. CONTATAR DEPARTAMENTO PESSOAL";
			$refeitorio['nome'] = $nome_completo;
			$refeitorio['foto'] = $foto;
			$refeitorio['data'] = date('d/m/Y - H:i', strtotime($dataAgora));
			
			echo json_encode($refeitorio);
			
		}
		
	}else{
	
			$refeitorio['resp'] = false;
			$refeitorio['msg']  = "MATRÍCULA NÃO ENCONTRADA";
			$refeitorio['nome'] = $nome_completo;
			$refeitorio['foto'] = $foto;
			$refeitorio['data'] = date('d/m/Y - H:i', strtotime($dataAgora));
			
			echo json_encode($refeitorio);
	}
	
	
	
	
	

}

?>