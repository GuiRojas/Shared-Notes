create proc login_sp
@usuario varchar(20) = null
as
select * from usuario where username = @usuario

alter proc cadastro_sp
@usuario varchar(25) = null,
@email varchar(100) = null,
@nome varchar(50)= null,
@senha varchar(60) = null
as
insert into usuario values(@usuario,@email,@nome,@senha,'Sem status',0,0,'Nada','null.png',0)

create proc pesquisaUsu_sp
@palavra varchar(30) = null
as
select username from usuario where username = @palavra

alter proc addPerg_sp
@titulo varchar(30) = null,
@text ntext = null,
@cat varchar(30) = null,
@criador varchar(25) = null
as
begin
declare @data datetime
declare @pergs int
set @data = getDate()
set @pergs = (select perguntas_feitas from usuario where username = @criador)
set @pergs = @pergs + 1
insert into pergunta values(@titulo,@text,@cat,@criador,@data)
update usuario set perguntas_feitas = @pergs where username = @criador
end

select * from pergunta

create proc pesqPerg_sp
@palavra varchar(30) = null
as
select titulo from pergunta where titulo = @palavra