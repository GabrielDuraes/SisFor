<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Comentarios {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_comentario;
		private $fk_forum;
		private $fk_usuario;
		private $comentario;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_comentario, $fk_forum, $fk_usuario, $comentario) { 
			$this->id_comentario = $id_comentario;
			$this->fk_forum = $fk_forum;
			$this->fk_usuario = $fk_usuario;
			$this->comentario = $comentario;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO comentarios 
						  (
				 			id_comentario,
				 			fk_forum,
				 			fk_usuario,
				 			comentario
						  )  
				VALUES 
					(
				 			'$this->id_comentario',
				 			'$this->fk_forum',
				 			'$this->fk_usuario',
				 			'$this->comentario'
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
					comentarios AS t1
				WHERE
					t1.id_comentario  = '$id'

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
					comentarios AS t1
				

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
		
		public function Read_FK($forum) {
			$sql = "
				SELECT *
				FROM
					comentarios AS t1
				WHERE t1.fk_forum = '$forum'
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
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					 t1.id_comentario,
					 t1.fk_forum,
					 t1.fk_usuario,
					 t1.comentario
				FROM
					comentarios AS t1
					
					
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
				UPDATE comentarios SET
				
				  fk_forum = '$this->fk_forum',
				  fk_usuario = '$this->fk_usuario',
				  comentario = '$this->comentario'
				
				WHERE id_comentario = '$this->id_comentario';
				
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
				DELETE FROM comentarios
				WHERE id_comentario = '$this->id_comentario';
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
			$this->id_comentario;
			$this->fk_forum;
			$this->fk_usuario;
			$this->comentario;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_comentario;
			$this->fk_forum;
			$this->fk_usuario;
			$this->comentario;
			
			
		}
			
	};

?>
