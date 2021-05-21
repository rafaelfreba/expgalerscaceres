<?php
	/*Classe de conexão com o banco de dados PostgreSQL*/
	class Conexao {

		//métodod para conexão
		public function conectar(){
			//parâmetros
			$servidor = '';
		    $instancia = 'SQLEXPRESS';
		    $porta = 1433;
		    $database = '';
		    $usuario = '';
		    $senha = '';
			
			try{

				$conn = new \PDO("sqlsrv:Server={$servidor}\\{$instancia},{$porta};Database={$database}", $usuario, $senha);
				$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				//retorna a conexão
				return $conn;

			}catch(\PDOException $e){
				//msg de erro
				echo 'Erro de conexão com o BD!';
				// echo 'Msg: ' . $e->getMessage();
			}
		}

	}

?>