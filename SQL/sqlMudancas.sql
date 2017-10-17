
alter table usuario add user_status varchar(150) 
alter table usuario add perguntas_respondidas int
alter table usuario add perguntas_feitas int
alter table usuario add especialidade varchar(15)

update usuario set user_status = 'allahu a kibar' where username = 'JohnnyKaparrala'

select * from usuario

alter table usuario alter column user_status ntext
alter table usuario alter column especialidade ntext