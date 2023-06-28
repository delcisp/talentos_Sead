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
