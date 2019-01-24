<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Foruns {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_forum;
		private $titulo_forum;
		private $descricao;
		private $fk_usuario;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_forum, $titulo_forum, $descricao, $fk_usuario) { 
			$this->id_forum = $id_forum;
			$this->titulo_forum = $titulo_forum;
			$this->descricao = $descricao;
			$this->fk_usuario = $fk_usuario;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO foruns 
						  (
				 			id_forum,
				 			titulo_forum,
				 			descricao,
				 			fk_usuario,
				 			created_at
						  )  
				VALUES 
					(
				 			'$this->id_forum',
				 			'$this->titulo_forum',
				 			'$this->descricao',
				 			'$this->fk_usuario',
				 			now()
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que retorna uma Instancia especifica da classe no bd
		public function Read($id) {
			$sql = "
				SELECT *
				FROM
					foruns AS t1
				WHERE
					t1.id_forum  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAll() {
			$sql = "
				SELECT *
				FROM
					foruns AS t1
				

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}
		
		
		public function Read_FK($id) {
			$sql = "
				SELECT *
				FROM
					foruns AS t1
				WHERE t1.fk_usuario = '$id'
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}

		public function Read_pesq($pesq) {
			$sql = "
				SELECT *
				FROM
					foruns AS t1
				WHERE t1.titulo_forum LIKE '%$pesq%'
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function Read_FK_paginacao($id, $inicio, $registros) {
			$sql = "
				SELECT *
				FROM
					foruns AS t1
				WHERE t1.fk_usuario = '$id'
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}

		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAll_paginacao($inicio, $registros) {
			$sql = "
				SELECT *
				FROM
					foruns AS t1
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}

		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAll_paginacao_pesq($pesq, $inicio, $registros) {
			$sql = "
				SELECT *
				FROM
					foruns AS t1
				WHERE t1.titulo_forum LIKE '%$pesq%'
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
		
		//Funcao que atualiza uma instancia no BD
		public function Update() {
			$sql = "
				UPDATE foruns SET
				
				  titulo_forum = '$this->titulo_forum',
				  descricao = '$this->descricao',
				  fk_usuario = '$this->fk_usuario'
				
				WHERE id_forum = '$this->id_forum';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que deleta uma instancia no BD
		public function Delete() {
			$sql = "
				DELETE FROM foruns
				WHERE id_forum = '$this->id_forum';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- begin 
			--------------------------------------------------
		
		*/
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- end 
			--------------------------------------------------
		
		*/
		
		
		//constructor 
		
		function __construct() { 
			$this->id_forum;
			$this->titulo_forum;
			$this->descricao;
			$this->fk_usuario;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_forum;
			$this->titulo_forum;
			$this->descricao;
			$this->fk_usuario;
			
			
		}
			
	};

?>
