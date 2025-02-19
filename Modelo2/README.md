# Login com Validação e Sessões em PHP

## Tecnologias Utilizadas

- **PHP** para o backend e controle de sessões.
- **PostgreSQL** como banco de dados.
- **PgAdmin** como interface gráfica para gerenciar o banco de dados PostgreSQL.
- **XAMPP** para iniciar o servidor e hospedar o aplicativo PHP.
- **HTML** como linguagem de marcação para a estrutura do frontend.
- **Bootstrap 5** para o design responsivo e estilo do formulário.

## Como Configurar o Ambiente

### 1. Instalar o XAMPP

- **XAMPP** inclui o Apache (servidor web), MySQL e PHP, facilitando o desenvolvimento local.
- Faça o download e instale o XAMPP a partir de [aqui](https://www.apachefriends.org/index.html).
- Após a instalação, abra o painel de controle do XAMPP e inicie os serviços **Apache**.

### 2. Configurar o Banco de Dados PostgreSQL

- Utilize o **PgAdmin** ou outro cliente para configurar o banco de dados PostgreSQL.
- Crie um banco de dados e uma tabela para armazenar os usuários, com pelo menos os campos **email** e **senha**.
- Para armazenar a senha de maneira segura, utilize a função `password_hash()` no PHP para criptografar as senhas.

### 3. Subir os Arquivos PHP

- Coloque os arquivos PHP dentro da pasta **`htdocs`** do XAMPP. Normalmente, essa pasta está localizada em `C:\xampp\htdocs\`.

### 4. Testar o Servidor

- Abra o navegador e acesse `http://localhost/` para verificar se o formulário de login está funcionando corretamente.

## Banco de Dados

- **Estrutura da Tabela:** A tabela `usuarios` deve conter ao menos os campos `email` e `senha`.
