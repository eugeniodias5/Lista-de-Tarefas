# Lista de Tarefas
Aplicação WEB que guarda tarefas dos usuários.

---
# Sobre
A ideia da aplicação foi retirada do curso online: "Desenvolvimento Web Completo 2020", do site udemy.com. Foram adicionadas novas funcionalidades como arquitetura MVC e o cadastro de usuários.  
Na tela inicial, é possível cadastrar um novo usuário ou fazer login. Na tela de cadastro, são informados login e senha do novo usuário. Não é possível cadastrar um login já cadastrado anteriormente, nem manter os campos de login ou senha vazios. Ao logar, o usuário verá suas tarefas, poderá adicionar novas, exclui-las ou marca-las como concluídas. O usuário também poderá se deslogar, encerrando sua sessão e retornando para a tela inicial. Caso o usuário não encerre sua sessão, ao acessar a tela inicial novamente, será redirecionado para o menu que exibe suas tarefas. 

---
# Tecnologias
Desenvolvido com Bootstrap e jQuery no front-end, com ícones Font Awesome. O back-end foi escrito com PHP. O servidor HTTP utilizado foi o Apache com o MySQL para gerenciamento do banco de dados.

---
# Utilização
Para rodar a aplicação é preciso, primeiramente, executar as instruções contidas no arquivo "query.sql" no banco de dados. Após isso, é preciso configurar a conexão com o banco de dados no arquivo "Model/BD.php", alterando usuário, senha, host e o SGBD (caso não seja utilizado o MySQL). Essas informações podem ser vistas e alteradas no construct da classe "BD". Por último, basta mover os arquivos para a pasta pública do servidor WEB.
  
