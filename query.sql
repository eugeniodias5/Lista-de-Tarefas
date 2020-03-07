CREATE DATABASE IF NOT EXISTS app_lista_tarefas CHARACTER SET utf8 COLLATE utf8_general_ci;

USE app_lista_tarefas;

CREATE TABLE IF NOT EXISTS tb_usuarios(idUsuario INT PRIMARY KEY AUTO_INCREMENT, login VARCHAR(255) NOT NULL, senha VARCHAR(255) NOT NULL);

CREATE TABLE IF NOT EXISTS tb_tarefas(idTarefa INT primary key auto_increment, idUsuario INT NOT NULL, descricaoTarefa VARCHAR(75) NOT NULL, concluida TINYINT(1) NOT NULL, FOREIGN KEY(idUsuario) REFERENCES tb_usuarios(idUsuario));
