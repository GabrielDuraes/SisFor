<?php
	class Usuario{
		private $id_usuario;
		private $nome;
		private $genero;
		private $data_nasc;
		private $matricula;
		private $email;
		private $curso;
		private $periodo;
		private $senha;

		//setters
		public function SetValues($id_usuario, $nome, $genero, $data_nasc, $matricula, $email, $curso, $periodo, $senha){
			$this->id_usuario = $id_usuario;
			$this->nome = $nome;
			$this->genero = $genero;
			$this->data_nasc = $data_nasc;
			$this->matricula = $matricula;
			$this->email = $email;
			$this->curso = $curso;
			$this->periodo = $periodo;
			$this->senha = $senha;
		}

		public function Create(){
			$sql = "
				INSERT INTO usuario
					(
						id_usuario,
						nome,
						genero,
						data_nasc,
						matricula,
						email,
						curso,
						periodo,
						senha,
						created_at
					)
				VALUES
					(
						'$this->id_usuario',
						'$this->nome',
						'$this->genero',
						'$this->data_nasc',
						'$this->matricula',
						'$this->email',
						'$this->curso',
						'$this->periodo',
						'$this->senha',
						now()
					);
				";

			$DB = new DB();
			$DB->open();
			// $result = $DB->query($sql);
			// $DB->close();
			// return $result;
			$result['result'] = $DB->query($sql);
			$result['lastId'] = $DB->lastId();
			$DB->close();
			return json_encode($result);
		}

		//Funcao que retorna uma Instancia especifica da classe no bd
		public function Read($id){
			$sql = "
				SELECT *
				FROM
					usuario AS t1
				WHERE
					t1.id_usuario = '$id'
				";

			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$DB->close();
			return $Data[0];
		}

		public function ReadAll(){
			$sql = "
				SELECT *
				FROM
					usuario
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

		public function ReadByMatricula($matricula){
			$sql = "
				SELECT *
				FROM
					usuario AS t1
				WHERE t1.matricula = '$matricula'
				";

			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data[0];
		}

		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT *
				FROM
					usuario AS t1

				LIMIT $inicio, $registros;
			";

			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);

			$DB->close();
			return $Data;
		}

		public function Update(){
			$sql = "
				UPDATE usuario SET

					nome = '$this->nome',
					genero = '$this->genero'

				WHERE id_usuario = '$this->id_usuario'
				";

			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		public function UpdateSenha($email){
			$sql = "
				UPDATE usuario SET

					senha = '$this->senha'

				WHERE email = '$email'
				";

			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		public function Delete(){
			$sql = "
				DELETE FROM usuario	WHERE id_usuario = '$this->id_usuario'
				";

			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		function __construct(){
			$this->id_usuario;
			$this->nome;
			$this->genero;
			$this->data_nasc;
			$this->matricula;
			$this->email;
			$this->curso;
			$this->periodo;
			$this->senha;
		}

		function __destruct(){
			$this->id_usuario;
			$this->nome;
			$this->genero;
			$this->data_nasc;
			$this->matricula;
			$this->email;
			$this->curso;
			$this->periodo;
			$this->senha;
		}
	};
?>
