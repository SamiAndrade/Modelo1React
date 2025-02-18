## Tecnologias Utilizadas

- **Frontend:** React, Axios  
- **Backend:** PHP, PostgreSQL  
- **Banco de Dados:** PostgreSQL  
- **Ambiente de Desenvolvimento:** XAMPP  

---

## Configuração

### 1. XAMPP

- **Instale o XAMPP** no seu computador.
- **Inicie os serviços** do Apache e do MySQL no painel de controle do XAMPP.

---

### 2. Banco de Dados PostgreSQL

- **Instale o PostgreSQL**.
- **Crie o banco de dados** chamado `sami`. 
  - Para facilitar, pode-se usar a interface do **PgAdmin** para realizar essa tarefa.
- **Configure a conexão** com o banco de dados no arquivo `backend/config.php`.
- **Verifique a tabela** `usuarios` no banco de dados, certificando-se de que ela tenha as colunas `email` e `senha`.

---

### 3. Backend

- Coloque a pasta **backend** dentro da pasta `htdocs` do XAMPP (geralmente em `C:\xampp\htdocs`).

---

### 4. Frontend

- **Instale as dependências** do projeto:
1. Instale as dependências do projeto:
2.  Inicie o servidor de desenvolvimento: `npm start`
  ```bash
  npm install
  npm start
