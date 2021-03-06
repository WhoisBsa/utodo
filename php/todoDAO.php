<?php 
	require_once("conf.php");
	
	class BD extends PDO {
		private $conn;
		
		// CONSTRUTOR
		public function __construct() {
			$this->conn = new PDO(
				"mysql:host=" . get_config_vars()->{'ip'} . ";dbname=". get_config_vars()->{'db'},
				get_config_vars()->{'user'},
				get_config_vars()->{'password'}
			);
		}

		// RETORNA TODOS OS ToDo DO USUÁRIO
		public function buscarToDos($idUsuario) {
			$stmt = $this->conn->prepare(
				"select u.name, p.id, p.id_todo, t.content, t.status from usuario as u
					join participam as p 
						on u.id = p.id_login and u.id = :IDUSUARIO
					join todo as t
						on t.id = p.id_todo;"
			);

			$stmt->bindParam(":IDUSUARIO", $idUsuario);

			$stmt->execute();
			return $stmt->fetchALL(PDO::FETCH_ASSOC);
		}
		// RETORNA TODOS OS USUÁRIOS PARTICIPANTES DO ToDo
		public function buscarTodosUsuariosDoToDo($idToDo){
			$stmt = $this->conn->prepare(
				"select u.name from usuario as u
					join participam as p
						on u.id = p.id_login and p.id_todo = :IDTODO ;"
			);
			
			$stmt->bindParam(":IDTODO", $idToDo);	
			$stmt->execute();
			return $stmt->fetchALL(PDO::FETCH_ASSOC);
		}
		// RETORNA TODOS OS USUÁRIOS DO SISTEMA
		public function buscarTodosUsuarios(){
			$stmt = $this->conn->prepare(
				"select id, name from usuario;"
			);

			$stmt->execute();
			return $stmt->fetchALL(PDO::FETCH_ASSOC);
		}
		// INSERE UM ToDo
		public function inserirToDo($participantes, $content) {
			$status = 0;
			$stmt = $this->conn->prepare("INSERT INTO todo(content, status) VALUES (:CONTENT, :STATUS)");
			$stmt->bindParam(":CONTENT", $content);	
			$stmt->bindParam(":STATUS", $status);

			if ($stmt->execute()){
				$ultimoToDoInserido = $this->conn->lastInsertId();
				// AQUI TERÁ UM FOREACH QUE RECEBERÁ O ARRAY COM TODOS OS PARTICIPANTES
				foreach($participantes as $key => $value){
					$this->inserirParticipam($value, $ultimoToDoInserido);
				}				
			}
		}
		// INSERE O RELACIONAMENTO USUÁRIO/ToDo
		public function inserirParticipam($idUsuario,$idToDo){
			$stmt = $this->conn->prepare("INSERT INTO participam(id_login, id_todo) VALUES(:IDLOGIN, :IDTODO)");
			$stmt->bindParam(":IDLOGIN", $idUsuario);
			$stmt->bindParam(":IDTODO", $idToDo);
			$stmt->execute();
		}
		// FUNÇÂO PARA LOGIN DE USUÁRIO
		public function login($name, $pass){
			$stmt = $this->conn->prepare("select id, name, pass from usuario where name = :NAME and pass = :PASS;");
			$stmt->bindParam(":NAME", $name);	
			$stmt->bindParam(":PASS", $pass);	

			$stmt->execute();
			return $stmt->fetchALL(PDO::FETCH_ASSOC);
		}
		// FUNÇÂO PARA CADASTRO DE USUÁRIO
		public function cadastroUsuario($name, $pass){
			$stmt = $this->conn->prepare("select name from usuario where name = :NAME;");
			$stmt->bindParam(":NAME", $name);	
			$stmt->execute();

			// var_dump(count($stmt->fetchALL(PDO::FETCH_ASSOC)));
			
			if(count($stmt->fetchALL(PDO::FETCH_ASSOC)) > 0){
				return false;
			} else {
				$stmt = $this->conn->prepare("insert into usuario (name, pass) values (:NAME, :PASS);");
				$stmt->bindParam(":NAME", $name);
				$stmt->bindParam(":PASS", $pass);
				if ($stmt->execute()){
					return true;
				}
			}			
			return false;
		}
		// FUNÇÃO PARA EXCLUIR ToDo
		public function excluirToDo($idToDo){
			$stmt = $this->conn->prepare("DELETE FROM todo WHERE id = :IDTODO");
			$stmt->bindParam(":IDTODO", $idToDo);
			return $stmt->execute();
		}
		// FUNÇÃO PARA EDITAR ToDo
		public function editarToDo($id, $content, $status) {
			$stmt = $this->conn->prepare("UPDATE todo SET content=:CONTENT, status=:STATUS WHERE id=:IDTODO");
			$stmt->bindParam(":IDTODO", $id);
			$stmt->bindParam(":CONTENT", $content);
			$stmt->bindParam(":STATUS", $status);
			if ($stmt->execute()){
				return true;
			} else {
				return false;
			}
		}

		// FUNÇÃO PARA CONFIRMAR ToDo
		public function marcarToDoFeito($id) {
			$stmt = $this->conn->prepare("UPDATE todo SET status=:STATUS WHERE id=:IDTODO");
			$status_atual = $this->statusToDo($id);

			if($status_atual[0]['status']){
				$status = 0;
			} else {
				$status = 1;
			}
			
			$stmt->bindParam(":IDTODO", $id);
			$stmt->bindParam(":STATUS", $status);
			if ($stmt->execute()){
				return true;
			} else {
				return false;
			}
		}

		public function statusToDo($id){
			$stmt = $this->conn->prepare("select status from todo where id=:IDTODO;");
			$stmt->bindParam(":IDTODO", $id);
			$stmt->execute();
			return $stmt->fetchALL(PDO::FETCH_ASSOC);
		}
	}
 ?>















