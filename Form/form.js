// Função para lidar com a seleção exclusiva de checkboxes em um grupo
function handleCheckboxGroup(groupId) {
  const checkboxes = document.querySelectorAll(`#${groupId} input[type="checkbox"]`);
  
  checkboxes.forEach(checkbox => {
      checkbox.addEventListener('click', () => {
          checkboxes.forEach(otherCheckbox => {
              if (otherCheckbox !== checkbox) {
                  otherCheckbox.checked = false;
              }
          });
      });
  });
}

// Chama a função para cada grupo de checkboxes usando os ids
handleCheckboxGroup('checkone');
handleCheckboxGroup('checktwo');
handleCheckboxGroup('checkthree');
handleCheckboxGroup('checkfour');
handleCheckboxGroup("checkfive");
handleCheckboxGroup('checksix');


$("#cep").blur(function(){
  // Remove tudo o que não é número para fazer a pesquisa
  var cep = this.value.replace(/[^0-9]/, "");
  
  // Validação do CEP; caso o CEP não possua 8 números, então cancela
  // a consulta
  if(cep.length != 8){
    return false;
  }
  
  // A url de pesquisa consiste no endereço do webservice + o cep que
  // o usuário informou + o tipo de retorno desejado (entre "json",
  // "jsonp", "xml", "piped" ou "querty")
  var url = "https://viacep.com.br/ws/"+cep+"/json/";
  
  // Faz a pesquisa do CEP, tratando o retorno com try/catch para que
  // caso ocorra algum erro (o cep pode não existir, por exemplo) a
  // usabilidade não seja afetada, assim o usuário pode continuar//
  // preenchendo os campos normalmente
  $.getJSON(url, function(dadosRetorno){
    try{
      // Preenche os campos de acordo com o retorno da pesquisa
      $("#endereco").val(dadosRetorno.logradouro);
      $("#bairro").val(dadosRetorno.bairro);
      $("#cidade").val(dadosRetorno.localidade);
      $("#uf").val(dadosRetorno.uf);
    }catch(ex){}
  });
});



//colocando mascara nos inputs
$('#telefone').mask('(00) 00000-0000');
$('#data').mask('00/00/0000');
//$('#cep').mask('00000-000')

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

  // QUANDO O USUARIO SELECIONAR "OUTROS"
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
      justificationTextarea.style.width = "97%";
    justificationTextarea.style.height = "100px";
    justificationTextarea.style.resize = "none"; 
  
  
      const selectedRating = parseInt(document.querySelector('input[name="ratingq"]:checked').value);


      if (selectedRating <= 5) {
        justificationTextarea.style.display = "block";
      } else {
        justificationTextarea.style.display = "none";
      }
    }

  
    ratingInputs.forEach(input => {
      input.addEventListener("change", handleRatingChange);
    });
  });
  
  document.addEventListener("DOMContentLoaded", function() {
  
    const selectElement = document.getElementById("input_4");
    const degreeTextareaDiv = document.getElementById("degreeTextareaDiv");

    selectElement.addEventListener("change", function() {
      const selectedOption = selectElement.options[selectElement.selectedIndex].value;

      if (selectedOption === "Graduação" || selectedOption === "Especialização" || selectedOption === "Mestrado" || selectedOption === "Doutorado") {
        degreeTextareaDiv.style.display = "block";
        degreeTextareaDiv.style.marginTop = "10px";
        degreeTextarea.style.width = "100%"; 
        degreeTextarea.style.height = "60px"; 
        degreeTextarea.style.resize = "none";//textarea normalmente vem com o resize habilitado, o que é ruim pq permite q o usuario mexa no tamanho da caixa e bagunce o layout
      } else {
        degreeTextareaDiv.style.display = "none"; 
      }
    });
  });

document.addEventListener("DOMContentLoaded", function() {
  const selectedElement = document.getElementById("input_7");
  const gratificationTextareaDiv = document.getElementById("gratificationTextareaDiv");
    
  selectedElement.addEventListener("change", function() {
    const selectedOption = selectedElement.options[selectedElement.selectedIndex].value;
    if (selectedOption === "Sim") {
      gratificationTextareaDiv.style.display = "block";
      gratificationTextareaDiv.style.marginTop = "10px";
      gratificationTextarea.style.width = "100%";
      gratificationTextarea.style.height = "60px"; 
      gratificationTextarea.style.resize = "none";
    } else {
      gratificationTextareaDiv.style.display= "none";
    }
  })

});