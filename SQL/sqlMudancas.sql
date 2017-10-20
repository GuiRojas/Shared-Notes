
alter table usuario add user_status varchar(150) 
alter table usuario add perguntas_respondidas int
alter table usuario add perguntas_feitas int
alter table usuario add especialidade varchar(15)

select * from usuario

alter table usuario alter column user_status ntext
alter table usuario alter column especialidade ntext

-----------------------PROCEDURES---------------------------

create proc login_sp
@usuario varchar(20) = null
as
select * from usuario where username = @usuario

create proc cadastro_sp
@usuario varchar(25) = null,
@email varchar(100) = null,
@nome varchar(50)= null,
@senha varchar(60) = null
as
insert into usuario values(@usuario,@email,@nome,@senha,'Sem status','',0,0)


create proc pesquisaUsu_sp
@palavra varchar(30) = null
as
select username from usuario where username = @palavra

create proc addPerg_sp
@titulo varchar(30) = null,
@text ntext = null,
@cat varchar(30) = null,
@criador varchar(25) = null
as
insert into pergunta values(@titulo,@text,@cat,@criador)



select * from pergunta