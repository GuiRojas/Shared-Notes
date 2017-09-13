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
	username varchar(30) not null,
	constraint fkURL foreign key (url) references pagina (url),
	constraint fkUsername foreign key (username) references usuario (username)
)
select * from usuario;