import React, { useState } from "react";
import axios from "axios";

const Cadastro = () => {
  const [email, setEmail] = useState("");
  const [senha, setSenha] = useState("");
  const [erro, setErro] = useState("");
  const [sucesso, setSucesso] = useState("");

  const handleSubmit = async (e) => {
    e.preventDefault();

    if (!email || !senha) {
      setErro("Por favor, preencha todos os campos.");
      return;
    }

    // Preparar os dados para enviar no formato correto
    const formData = new URLSearchParams();
    formData.append("email", email);
    formData.append("senha", senha);

    try {
      // Enviar dados para o backend usando axios
      const response = await axios.post(
        "http://localhost/Modelo1/frontend/backend/cadastro.php", // URL do seu backend
        formData,
        {
          headers: {
            "Content-Type": "application/x-www-form-urlencoded", // Tipo de conteúdo que o PHP espera
          },
        }
      );

      // Verificar a resposta do servidor
      if (response.data.sucesso) {
        setSucesso("Cadastro realizado com sucesso! Verifique seu e-mail.");
        setErro(""); // Limpar erro caso a requisição tenha sido bem-sucedida
      } else {
        setErro(response.data.erro);
        setSucesso("");
      }
    } catch (error) {
      setErro("Erro ao cadastrar. Tente novamente mais tarde.");
      setSucesso("");
    }
  };

  return (
    <div className="conteudo__form">
      <h2>Cadastro</h2>
      <form onSubmit={handleSubmit} className="conteudo__inputs">
        <div>
          <label>Email</label>
          <input
            type="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
          />
        </div>
        <div>
          <label>Senha</label>
          <input
            type="password"
            value={senha}
            onChange={(e) => setSenha(e.target.value)}
          />
        </div>
        {erro && <p style={{ color: "red" }}>{erro}</p>}
        {sucesso && <p style={{ color: "green" }}>{sucesso}</p>}
        <section className="botoes__login">
        <button type="submit">Cadastrar</button>
        <a href="/">Login</a>
        </section>
      </form>
    </div>
  );
};

export default Cadastro;
