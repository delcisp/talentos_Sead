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

  function mostrarCampoPersonalizado(selectElement) {
    var campoPersonalizado = document.getElementById('campoPersonalizado');
    var textoPersonalizado = document.getElementById('textoPersonalizado');

    if (selectElement.value === 'outros') {
      campoPersonalizado.style.display = 'block';
      textoPersonalizado.required = true;
    } else {
      campoPersonalizado.style.display = 'none';
      textoPersonalizado.required = false;
    }
  }

  function atualizarOpcaoPersonalizada(valor) {
    var selectElement = document.getElementById('input_4');
    var opcaoPersonalizada = selectElement.querySelector('option[value="outros"]');

    if (opcaoPersonalizada) {
      opcaoPersonalizada.innerHTML = valor;
      opcaoPersonalizada.value = valor;
    }
  }

  