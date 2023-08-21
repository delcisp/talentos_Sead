$('#telefone').mask('(00) 00000-0000');
$('#data').mask('00/00/0000');

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
  //

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

  document.addEventListener("DOMContentLoaded", function() {

    const ratingInputs = document.querySelectorAll('input[name="ratingq"]');

    const justificationTextarea = document.createElement("textarea");
    justificationTextarea.setAttribute("id", "justification");
    justificationTextarea.setAttribute("name", "justification");
    justificationTextarea.setAttribute("placeholder", "Pode justificar a sua resposta?");
    justificationTextarea.style.display = "none";


    const formInputWide = document.getElementById("cid_7");
    formInputWide.appendChild(justificationTextarea);


    function handleRatingChange() {
      justificationTextarea.style.width = "100%";
    justificationTextarea.style.height = "100px"; 

      const selectedRating = parseInt(document.querySelector('input[name="ratingq"]:checked').value);


      if (selectedRating <= 5) {
        justificationTextarea.style.display = "block";
      } else {
        justificationTextarea.style.display = "none";
      }z
    }

  
    ratingInputs.forEach(input => {
      input.addEventListener("change", handleRatingChange);
    });
  });

  