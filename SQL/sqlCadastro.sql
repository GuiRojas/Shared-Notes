create table usuario(
	username varchar(25) primary key,
	email varchar(100) not null,
	nome varchar(50) not null,
	senha varchar(60) not null
)

create table pagina(
	url varchar(100) primary key,
	titulo varchar(30) not null,
	descricao ntext,
	categoria varchar(30) not null,
	criador varchar(25) not null
	constraint fkUUUsername foreign key (criador) references usuario (username)
)

create table comentario(
	codComentario int identity(1,1) primary key,
	url varchar(100) not null,
	username varchar(25) not null,
	texto ntext not null
	constraint fkURL foreign key (url) references pagina (url),
	constraint fkUsername foreign key (username) references usuario (username)
)

create table pagUsuario(
	username varchar(25) primary key,
	descricao ntext,
	especialidade ntext,
	qtdResp int not null,
	qtdPerg int not null,
	img varchar(50) not null,
	projPostados int not null
	constraint fkUUsername foreign key (username) references usuario(username)
)

select * from comentario
select * from pagina
select * from pagUsuario
select * from usuario


/*
drop table comentario
drop table pagina
drop table pagUsuario
drop table usuario
*/

insert into usuario values ('user','email','nome','espec');
INSERT INTO pagUsuario values ('user','Sem status','null.png');


--deleta toda a info da tabela + reseta identity
       --   \/       \/
/*
delete from usuario
delete from pagUsuario
*/


create proc pesquisaUsu_sp
@palavra varchar(30) = null
as
select username, nome from usuario where
  username like '%'+@palavra+'%';

create proc login_sp
@usuario varchar(30) = null
as
select * from usuario where
  username = @usuario;

create proc criarUsu_sp
@username varchar(30) = null,
@email varchar(100) = null,
@nome varchar(50) = null,
@senha varchar(60) = null
as
insert into usuario values(@username, @email, @nome, @senha);
insert into pagUsuario values(@username, 'sem status', 'nada', 0, 0, 'null.png', 0);



select * from usuario
select * from pagUsuario