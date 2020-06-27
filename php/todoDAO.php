<?php 
	require_once("conf.php");
	
	class BD extends PDO {
		private $conn;

		public function __construct() {
			$this->conn = new PDO(
				"mysql:host=" . get_config_vars()->{'ip'} . ";dbname=". get_config_vars()->{'db'},
				get_config_vars()->{'user'},
				get_config_vars()->{'password'}
			);
		}


		public function buscarToDos($id) {
			$stmt = $this->conn->prepare("select u.name, p.id, t.content from usuario as u
											join participam as p 
												on u.id = p.id_login and u.id = ". $id ."
											join todo as t
												on t.id = p.id_todo;"
										);
			$stmt->execute();
			return $stmt->fetchALL(PDO::FETCH_ASSOC);
		}


		public function buscarTodosUsuariosDoToDo($idToDo){
			$stmt = $this->conn->prepare(
				"select u.name from usuario as u
					join participam as p
						on u.id = p.id_login and p.id_todo = " . $idToDo . ";"
			);
			
			$stmt->execute();
			return $stmt->fetchALL(PDO::FETCH_ASSOC);
		}

		public function buscarTodosUsuarios(){
			$stmt = $this->conn->prepare(
				"select id, name from usuario;"
			);

			$stmt->execute();
			return $stmt->fetchALL(PDO::FETCH_ASSOC);
		}

		public function inserirToDo($idUsuario, $content) {
			$status = 0;
			// INSERINDO DADOS NA TABELA TODO
			$stmt = $this->conn->prepare("INSERT INTO todo(content, status) VALUES (:CONTENT, :STATUS)");
			$stmt->bindParam(":CONTENT", $content);	
			$stmt->bindParam(":STATUS", $status);
			if ($stmt->execute()){
				$ultimoToDoInserido = $this->conn->lastInsertId();
				echo $ultimoToDoInserido;
				$this->inserirParticipam($idUsuario, $ultimoToDoInserido);
			}

			echo "funcionou!";
		}

		public function inserirParticipam($idUsuario,$idToDo){
			$stmt = $this->conn->prepare("INSERT INTO participam(id_login, id_todo) VALUES(:IDLOGIN, :IDTODO)");
			$stmt->bindParam(":IDLOGIN", $idUsuario);
			$stmt->bindParam(":IDTODO", $idToDo);
			$stmt->execute();
		}

		
	}


 ?>















