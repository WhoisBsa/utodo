CREATE DATABASE userlogin;

USE userlogin;

CREATE TABLE login (
  id      int auto_increment primary key,
  name    varchar(50),
  pass    varchar(50)
);

SELECT * FROM login WHERE name = 'matheus' AND pass = 'suehtam';

SELECT * FROM login;
SELECT * FROM login WHERE name = 'matheus';

INSERT INTO login(name, pass) VALUES
	('hemilio', 'hlam'),	
	('matheus', 'suehtam'),
    ('rafael', 'rafael123'),
    ('gustavo', 'gustavao'),
    ('joao', 'joao123'),
    ('maria', 'maria123');