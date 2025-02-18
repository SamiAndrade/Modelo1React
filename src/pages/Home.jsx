import React, { useEffect, useState } from "react";

const Home = () => {
  const [user, setUser] = useState(null);

  useEffect(() => {
    // Puxa o email do localStorage
    const userEmail = localStorage.getItem("email");
    if (userEmail) {
      setUser(userEmail);
    }
  }, []);

  const handleLogout = () => {
    // Remover o email do localStorage
    localStorage.removeItem("email");

    // Redirecionar para a página de login
    window.location.href = "/login";
  };

  if (!user) {
    return <p>Você não está logado. Faça login para acessar a página.</p>;
  }

  return (
    <section>
      <div className="conteudo__home">
        <h2 className="conteudo__titulo">Bem-vindo, {user}</h2>
      </div>
      <button onClick={handleLogout} className="botao">
        <p className="botao__conteudo">Sair</p>
      </button>
    </section>
  );
};

export default Home;
