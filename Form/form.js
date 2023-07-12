function redirecionar() {
    window.location.href = './agradecimento.php';
  } 

  const checkboxesPergunta1 = document.querySelectorAll('input[name="hardcompetencia[]"]');
  const checkboxesPergunta2 = document.querySelectorAll('input[name="competencia[]"]');
  
  let checkedCountPergunta1 = 0;
  let checkedCountPergunta2 = 0;
  
  checkboxesPergunta1.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
      if (this.checked) {
        checkedCountPergunta1++;
      } else {
        checkedCountPergunta1--;
      }
  
      if (checkedCountPergunta1 > 5) {
        this.checked = false; 
        checkedCountPergunta1--;
        alert('Selecione apenas 5 características.'); 
      }
    });
  });
  
  checkboxesPergunta2.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
      if (this.checked) {
        checkedCountPergunta2++;
      } else {
        checkedCountPergunta2--;
      }
  
      if (checkedCountPergunta2 > 5) {
        this.checked = false; 
        checkedCountPergunta2--;
        alert('Selecione apenas 5 características.'); 
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

  