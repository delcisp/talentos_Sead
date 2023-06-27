document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Evita o envio padrão do formulário
  
  // Simulação de autenticação
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  // Verifique as credenciais do usuário
  if (username === 'delci' && password === '123') {
    // Redirecione para a página do documento LGPD após o login bem-sucedido
    window.location.href = 'lgpd.php';
  } else {
    alert('Usuário ou senha inválidos');
  }
});

document.getElementById("login-form").addEventListener("submit", function(event) {
  event.preventDefault(); // Impede o envio do formulário padrão

  // Obtenha os valores do usuário e da senha
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  // Verifique se a senha está correta
  if (password === "senha_correta") {
    // Senha correta, redirecione para a página desejada
    window.location.href = "lgpd.php";
  } else {
    // Senha incorreta, exiba uma mensagem de erro
    var errorMessage = document.getElementById("error-message");
    errorMessage.style.display = "block";
    errorMessage.textContent = "Usuário ou senha incorretos. Por favor, tente novamente.";
  }
});