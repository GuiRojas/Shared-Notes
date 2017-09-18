create table usuario(
	username varchar(15) primary key,
	email varchar(100) not null,
	nome varchar(50) not null,
	senha varchar(60) not null
)

create table categoria(
	codCategoria int identity(1,1) primary key,
	tipo varchar(20) not null,
	linguagem varchar(10) not null
)

create table pagina(
	url varchar(100) primary key,
	titulo varchar(30) not null,
	descricao ntext,
	categoria int not null,
	constraint fkCategoria foreign key (categoria) references categoria (codCategoria)
)

create table comentario(
	codComentario int identity(1,1) primary key,
	url varchar(100) not null,
	username varchar(15) not null,
	constraint fkURL foreign key (url) references pagina (url),
	constraint fkUsername foreign key (username) references usuario (username)
)
create table respComentario(
	codResp int primary key,
	url varchar(100) not null,
	username varchar(15) not null,
	constraint fkUURL foreign key (url) references pagina (url),
	constraint fkUUsername foreign key (username) references usuario (username)
)
create table pagUsuario(
	id int identity(1,1) primary key,
	username varchar(15) not null,
	descricao ntext,
	img varchar(50) not null,
	projPostados varchar(100)
	constraint fkUUUsername foreign key (username) references usuario(username),
	constraint fkPrjP foreign key (projPostados) references pagina (url),
)
create table pergPerg(
	pergId int primary key,
	username varchar(15) not null,
	url varchar(100) not null
	constraint fkPP foreign key (pergId) references comentario (codComentario),
	constraint fkUUUUsername foreign key (username) references usuario(username),
	constraint fkUUURL foreign key (url) references pagina (url)
)
create table pergResp(
	RespId int primary key,
	username varchar(15) not null,
	url varchar(100) not null
	constraint fkPR foreign key (RespId) references comentario (codComentario),
	constraint fkUUUUUsername foreign key (username) references usuario(username),
	constraint fkUUUURL foreign key (url) references pagina (url)
)
create table projUsu(
	projId int primary key,
	username varchar(15) not null,
	url varchar(100) not null
	constraint fkPJ foreign key (projId) references comentario (codComentario),
	constraint fkUUUUUUsername foreign key (username) references usuario(username),
	constraint fkUUUUURL foreign key (url) references pagina (url)
)

select * from categoria;
select * from comentario;
select * from respComentario;
select * from pagina;
select * from pagUsuario;
select * from usuario;
select * from pergPerg;
select * from pergResp;
select * from projUsu;

insert into usuario values ('user','email','nome','espec');
INSERT INTO pagUsuario values ('user','Sem status','null.png');

--deleta toda a info da tabela + reseta identity
          --   \/       \/
delete from pagUsuario;
DBCC CHECKIDENT (pagUsuario,reseed,0);