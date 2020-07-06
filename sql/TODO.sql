-- ---
-- Database 'todo'
-- ---

DROP DATABASE IF EXISTS `todo`;
CREATE DATABASE todo;
USE todo;

-- ---
-- Table 'usuario'
-- ---

DROP TABLE IF EXISTS `usuario`;
		
CREATE TABLE `usuario` (
  `id` INTEGER AUTO_INCREMENT,
  `name` VARCHAR(100) NULL DEFAULT NULL,
  `pass` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'todo'
-- ---

DROP TABLE IF EXISTS `todo`;
		
CREATE TABLE `todo` (
  `id` INTEGER AUTO_INCREMENT,
  `content` VARCHAR(200) NOT NULL,
  `status` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'participam'
-- ---

DROP TABLE IF EXISTS `participam`;
		
CREATE TABLE `participam` (
  `id` INTEGER AUTO_INCREMENT,
  `id_login` INTEGER NOT NULL,
  `id_todo` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `participam` ADD FOREIGN KEY (id_login) REFERENCES `usuario` (`id`)
  ON DELETE CASCADE 
  ON UPDATE CASCADE;
ALTER TABLE `participam` ADD FOREIGN KEY (id_todo) REFERENCES `todo` (`id`) 
  ON DELETE CASCADE 
  ON UPDATE CASCADE;


-- ---
-- Test Data
-- ---

INSERT INTO `usuario` (`id`,`name`,`pass`) VALUES
 (1,'matheus','matheus'), (2,'hemilio','hemilio'), (3,'alfredo','alfredo'), (4,'rafael','rafael');
INSERT INTO `todo` (`id`,`content`,`status`) VALUES
(1,'capar o bode!',false), (2,'catar coquinho!', true), (3,'jogar jokenpô', false);
INSERT INTO `participam` (`id`,`id_login`,`id_todo`) VALUES
(1,1,1),(2,2,2), (3,1,3), (4,2,3), (5,3,1), (6,4,2);
