<?php
	
	/*Classe de modelo com métodos acessores set e get*/
	class ExportadorModel{
		
		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}

	}//class

?>