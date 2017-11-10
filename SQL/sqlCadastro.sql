create table usuario(
	username varchar(25) primary key,
	email varchar(100) not null,
	nome varchar(50) not null,
	senha varchar(60) not null
)

create table pergunta(
	codPergunta int identity(1,1) primary key,
	titulo varchar(30) not null,
	texto ntext,
	categoria varchar(30) not null,
	criador varchar(25) not null,
	data datetime not null,
	constraint fkUUUsername foreign key (criador) references usuario (username)
)

create table comentario(
	codComentario int identity(1,1) primary key,
	codPergunta int not null,
	username varchar(25) not null,
	data datetime not null,
	texto ntext not null
	constraint fkURL foreign key (codPergunta) references pergunta (codPergunta),
	constraint fkUsername foreign key (username) references usuario (username)
)
/*
create table seguir(
	codSeguidor int identity(1,1) primary key,
	uSeguidor varchar(25) not null,
	uSeguindo varchar(25) not null,
	constraint fkUsgr foreign key (uSeguidor) references usuario(username),
	constraint fkUsgn foreign key (uSeguindo) references usuario(username)	
)
*/
create table projeto(
	titulo varchar(50) primary key,
	descricao ntext not null,
	nota ntext not null,
	criador varchar(25) not null,
	constraint fkCri foreign key(criador) references usuario(username)
)


create table projComentario(
	codProjComentario int identity(1,1) primary key,
	Projeto varchar(50) not null,
	codPergunta int not null, --não é chave estrangeira
	criador varchar(25) not null,
	texto ntext not null,
	data datetime not null
	constraint fkPrj foreign key (Projeto) references projeto (titulo),
	constraint fkCrid foreign key (criador) references usuario (username)
)

select * from comentario
select * from pergunta
select * from usuario
select * from seguir
select * from projeto
select * from projComentario


insert into projComentario values('xd',1,'nodoya','xddddd',GETDATE())

use BDPPI17182