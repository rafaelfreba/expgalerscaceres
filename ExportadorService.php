<?php

class ExportadorService{

		private $conexao;
		private $exp;

		public function __construct(Conexao $conexao, ExportadorModel $exp){

			$this->conexao = $conexao->conectar();
			$this->exp = $exp;

		}

		public function getDados(){
			
			$sql = "SELECT 
						Codigo_Requisicao AS co_requisicao, 
						IBGE AS ibge, 
						Municipio_Residencia AS no_municipio_residencia, 
						UF_Residencia AS sg_uf_residencia, 
						Nome_Exame AS no_exame, 
						Nome_Metodo AS no_metodo, 
						CONVERT(NVARCHAR(10), Data_Cadastro,103) AS dt_cadastro, 
						Status_Resultado AS ds_status, 
						Resultado_Geral AS rs_geral
					FROM GAL_Indica_ERS
					WHERE Data_Cadastro BETWEEN :data_inicial AND :data_final
					ORDER BY Codigo_Requisicao ASC";
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindValue(':data_inicial', $this->exp->__get('data_inicial'));
			$stmt->bindValue(':data_final', $this->exp->__get('data_final'));
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getUltimaImportacao(){

			$sql = "SELECT 
						CONVERT(NVARCHAR(10), MAX(DT_importacao),103) AS dt_cadastro 
					FROM GAL_Indica_ERS";
			$stmt = $this->conexao->prepare($sql);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);

		}

	}

?>