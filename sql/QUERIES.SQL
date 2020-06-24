-- ---
-- SELECT DE TODOS TODO'S DO USUÁRIO
-- ---

select u.name, p.id, t.content from usuario as u
	join participam as p 
		on u.id = p.id_login and u.id = -- {aqui vai a variável com o id do usuário}
	join todo as t
		on t.id = p.id_todo;