function redirecionar() {
    window.location.href = './agradecimento.php';
  } 

  const checkboxes = document.querySelectorAll('input[type="checkbox"]');

  let checkedCount = 0;
  
  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
      if (this.checked) {
        checkedCount++;
      } else {
        checkedCount--;
      }
  
      if (checkedCount > 5) {
        this.checked = false; // Desmarca o checkbox selecionado
        checkedCount--;
        alert('Selecione apenas 5 características.'); // Exibe o alerta
      }
    });
  });
  

  