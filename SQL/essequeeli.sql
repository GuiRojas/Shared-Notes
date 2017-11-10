select * from comentario
select * from pergunta
select * from projComentario
select * from projeto
select * from usuario

delete from projComentario

drop table comentario
create table resposta(
codComentario int primary key identity(1,1),
tituloPerg varchar(30) not null,
username varchar(25) not null,
texto ntext not null,
data datetime not null
constraint fktitprg foreign key (tituloPerg) references pergunta(titulo),
constraint fkcccrrr foreign key (username  ) references usuario (username)
)

drop table pergunta
create table pergunta(
titulo varchar(30) primary key,
texto ntext not null,
categoria varchar(30) not null,
criador varchar(25) not null,
data datetime not null
constraint fkccrr foreign key (criador) references usuario(username)
)


insert into projComentario values('xd','nodoya','blz',GETDATE())
insert into Comentario values('xd','nodoya','mais um',GETDATE())
