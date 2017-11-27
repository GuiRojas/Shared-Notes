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
insert into usuario values(@usuario,@email,@nome,@senha,'Sem status','Nada','null.png')

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
begin
declare @data datetime
declare @pergs int
set @data = getDate()
set @pergs = (select perguntas_feitas from usuario where username = @criador)
set @pergs = @pergs + 1
insert into pergunta values(@titulo,@text,@cat,@criador,@data)
update usuario set perguntas_feitas = @pergs where username = @criador
end

create proc pesqPerg_sp
@palavra varchar(30) = null
as
select titulo from pergunta where titulo = @palavra

create proc mudarEmail_sp
@user  varchar(25)  = null,
@email varchar(100) = null
as
begin
	UPDATE usuario SET email = @email WHERE username= @user
end

create proc mudarSenha_sp
@user  varchar(25) = null,
@senha varchar(60) = null
as
begin
	UPDATE usuario SET senha = @senha WHERE  username = @user
end

create proc consultaPergunta_sp
@titulo varchar(30) = null
as
begin
	SELECT titulo, texto, categoria, criador, data FROM pergunta WHERE titulo = @titulo
end

create proc getUserPhoto_sp
@user varchar(25) = null
as
begin
	SELECT foto FROM usuario WHERE username = @user
end

create proc getProjData_sp
@titulo varchar(50) = null
as
begin
	SELECT * FROM projeto WHERE titulo = @titulo
end

create proc getRespData_sp
@titPerg varchar(30) = null
as
begin
	SELECT username,texto FROM resposta WHERE tituloPerg = @titPerg ORDER BY data
end

create proc getUserData_sp
@user varchar(25) = null
as
begin
SELECT nome,email,username,user_status,especialidade,foto 
	FROM usuario WHERE username = @user
end

create proc countProj_sp
@user varchar(25) = null
as
begin
	SELECT count(titulo) AS projPost FROM projeto WHERE criador = @user
end

create proc countPerg_sp
@user varchar(25) = null
as
begin
	SELECT count(titulo) AS pergPost FROM pergunta WHERE criador = @user
end

create proc selectProj_sp
@nome varchar(25) = null
as
begin
	SELECT * FROM projeto WHERE criador = @nome
end

create proc selectPerg_sp
@nome varchar(25) = null
as
begin
	SELECT * FROM pergunta WHERE criador = @nome
end

create proc selectUser_sp
@nome varchar(25) = null
as
begin
	SELECT * FROM usuario WHERE username like '%@nome%'
end

create proc updatePerfilFoto_sp
@status ntext = null,
@esp varchar(15) = null,
@foto ntext = null,
@user varchar(25) = null
as
begin
	update usuario set user_status = @status,especialidade = @esp,
		foto = @foto where username = @user
end

create proc updatePerfilSemFoto_sp
@status ntext = null,
@esp varchar(15) = null,
@user varchar(25) = null
as
begin
	update usuario set user_status = @status,especialidade = @esp
		where username = @user
end

create proc deletePerg_sp
@titulo varchar(30) = null
as
begin
	DELETE FROM resposta WHERE tituloPerg = @titulo
	DELETE FROM pergunta WHERE titulo = @titulo
end

create proc getComentario_sp
@titulo varchar(30) = null
as
begin
	SELECT username,texto FROM resposta WHERE tituloPerg = @titulo ORDER BY data
end

create proc searchPerg_sp
@query nvarchar = null
as
begin
	SELECT * FROM pergunta WHERE titulo like '%@query%'
end

create proc deleteProj_sp
@titulo varchar(50) = null
as
begin
	DELETE FROM projComentario WHERE Projeto = @titulo
	DELETE FROM projeto WHERE titulo = @titulo
end

create proc commentProj_sp
@proj varchar(50) = null,
@user varchar(25) = null,
@texto ntext      = null
as
begin
	insert into projComentario values(@proj,@user,@texto,GETDATE())
end

create proc selectComProj_sp
@titulo varchar(50) = null
as
begin
	SELECT * FROM projComentario WHERE projeto = @titulo ORDER BY data
end

create proc searchProj_sp
@query nvarchar = null
as
begin
	SELECT * FROM projeto WHERE titulo like '%@query%'
end

create proc insertProj_sp
@titulo varchar(50)  = null,
@desc   ntext        = null,
@nota   ntext        = null,
@criador varchar(25) = null,
@proj   ntext        = null
as
begin
	INSERT INTO projeto VALUES 
		(@titulo,@desc,@nota,@criador,@proj)
end

create proc comentar_sp
@titulo varchar(30) = null,
@user   varchar(25) = null,
@texto  ntext       = null
as
begin
	insert into resposta values(@titulo,@user,@texto,GETDATE())
end

