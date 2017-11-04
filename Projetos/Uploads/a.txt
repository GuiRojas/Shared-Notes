Agr dá pra entrar no perfil de outra pessoa. o sistema de busca tá rudimentar (tem que escrever identico ao que está na tabela, mas a steam é assim tbm, então n sei se precisa perder tempo nisso, mas, RORRAZ, se vc estiver lendo isso na aula de  POO e está com tédio, pode tentar dar umas mudadas. E tbm a pagina atualiza quando vc clica no botao do form e apaga oq vc escreveu -no cadastro tbm-, seria top se fosse dinamico e salvasse a busca, igual no google, sabe) mas tá funfando direitinho! Quando vc entra no seu perfil aparece o botao de editar. a pagina editar.php está criada na pasta de perfis, mas n tá feita, se for mudar alguma coisa muda pelo sql. n esquece de mudar o sql da escola tbm. todos os dados que a tabela precisa estão num arquivo chamado 'getUserData.inc.php' nos parametros do vetor $linha. os que estão setados manuelmente n devem ser colocados na tabela. o status pode ser null e os projetos postados e etc. precisam comecar com 0.
OBS: Não esquece de mudar o server se estiver na escola.
PS: assista rick and morty




fiz umas mudanças no banco de dados

username varchar(25)
email varchar(100)
nome varchar(50)
senha varchar(60)
user_status varchar(150)
perguntas_respondidas int
perguntas_feitas int
especialidade varchar(15)

agora, na tabela de usuario existem os campos acima ( esqueci de salvar então muda manualmente). ainda não é possivel alterar os dados do perfil e precisa de mais algumas coisas. só to comitando por segurança msm