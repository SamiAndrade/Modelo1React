import React, { useState } from "react";
import axios from "axios";

const Login = () => {
  const [email, setEmail] = useState("");
  const [senha, setSenha] = useState("");
  const [erro, setErro] = useState("");
  const [sucesso, setSucesso] = useState("");

  const handleSubmit = async (e) => {
    e.preventDefault();
    setErro(""); // Limpa mensagens de erro anteriores
    setSucesso(""); // Limpa mensagens de sucesso anteriores

    try {
      const response = await axios.post(
        "http://localhost/Modelo1/backend/login.php",
        {
          email: email,
          senha: senha,
        }
      );

      if (response.data.success) {
        // Salva o email no localStorage
        localStorage.setItem("email", email);

  
        setSucesso("Login realizado com sucesso!");

        // Redireciona após o login
        setTimeout(() => {
          window.location.href = "/home";
        }, 1500);
      } else {
        setErro(response.data.message || "E-mail ou senha inválidos.");
      }
    } catch (error) {
      setErro("Erro ao comunicar com o servidor.");
      console.error("Erro na requisição:", error);
    }
  };

  return (
    <div>
      <h2>Login</h2>
      <form onSubmit={handleSubmit}>
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
        <button type="submit">Entrar</button>
      </form>
    </div>
  );
};

export default Login;
