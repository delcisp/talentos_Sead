  function redirectLogin() {
    window.location.href = "index.php";
  }
// Obtém o parâmetro "nome" da URL
const urlParams = new URLSearchParams(window.location.search);
const nome = urlParams.get('nome');

// Verifica se o nome foi fornecido e atualiza o conteúdo do <h1>
if (nome !== null && nome !== "") {
  document.getElementById('nome').textContent = "Obrigado, " + nome + "!";
}


