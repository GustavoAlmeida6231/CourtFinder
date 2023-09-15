create database courtfinder;

use courtfinder;
 
create table courtfinder.cadastro_usuario(
id int not null auto_increment primary key,
login varchar(255) not null,
email varchar(255) not null,
regiao varchar(5) not null,
celular char(15) not null,
dataNascimento varchar(10) not null,
password varchar(100) not null,
nivel int,
dono int(1)
);


CREATE TABLE courtfinder.quadra(
id_espaco int not null auto_increment primary key,
nome_espaco varchar(255) not null,
descricao_espaco varchar(255) not null,
valor_espaco varchar(20) not null,
avaliacao_espaco int(1) not null,
img_nome varchar(255) not null,
img_conteudo LONGBLOB not null,
estado varchar(255)not null,
cidade varchar(255) not null
);

