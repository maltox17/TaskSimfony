CREATE DATABASE IF NOT EXISTS symfony_master;

USE symfony_master;

CREATE TABLE IF NOT EXISTS users(
id          int(255) AUTO_INCREMENT not null,
role        varchar(50),
name        varchar(200),
surname     varchar(255),
email       varchar(255),
password    varchar(255),
created_At  datetime,
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO users VALUES(NULL, 'Role_USER', 'Victor', 'Robles', 'victor@victor.com', 'password', CURTIME());
INSERT INTO users VALUES(NULL, 'Role_USER', 'Ismael', 'Gonzalez', 'ismael@mail.com', 'password', CURTIME());
INSERT INTO users VALUES(NULL, 'Role_USER', 'Marco', 'Romero', 'marco@mail.com', 'password', CURTIME());

CREATE TABLE IF NOT EXISTS tasks(
id          int(255) auto_increment not null,
user_id     int(255) not null,
title       varchar(255),
content     text,
priority    varchar(20),
hours       int(100),
created_at  datetime,
CONSTRAINT pk_tasks PRIMARY KEY(id),
CONSTRAINT fk_task_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

INSERT INTO tasks VALUES(NULL, 1, 'tarea 1', 'contenido de prueba 1', 'high', 40, CURTIME());
INSERT INTO tasks VALUES(NULL, 2, 'tarea 2', 'contenido de prueba 2', 'high', 10, CURTIME());
INSERT INTO tasks VALUES(NULL, 2, 'tarea 3', 'contenido de prueba 3', 'high', 5, CURTIME());
INSERT INTO tasks VALUES(NULL, 3, 'tarea 4', 'contenido de prueba 4', 'high', 20, CURTIME());