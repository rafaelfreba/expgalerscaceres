<?php

	require_once "Conexao.php";
	require_once "ExportadorModel.php";
	require_once "ExportadorService.php";

	if( isset($_POST) && !empty($_POST['data_inicial']) && !empty($_POST['data_final']) ){

		$data_inicial = $_POST['data_inicial'];
		$data_final = $_POST['data_final'];

		$diferenca = strtotime($data_final) - strtotime($data_inicial);
		$dias = floor($diferenca / (60 * 60 * 24)) + 1;

		if( $dias > 0 && $dias <= 31 ){

			$conn = new Conexao();

			$em  = new ExportadorModel();			     

			$em->__set('data_inicial',$data_inicial);
			$em->__set('data_final',$data_final);

			$es = new ExportadorService($conn,$em);

			$resultado = $es->getDados();

			if( !empty($resultado) ){	

				$a = json_encode($resultado);

				print_r($a);

			}else{

				$erro = json_encode(['erro' => 'registroNaoEncontrado']);
				
				print_r($erro);

			}			

		}else{

			$erro = json_encode(['erro' => 'periodoInvalido']);
			
			print_r($erro);

		}

	}else{

		$erro = json_encode(['erro' => 'periodoInvalido']);
		
		print_r($erro);
		
	}

?>