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
handleCheckboxGroup('checkseven');
handleCheckboxGroup('checkeight');
handleCheckboxGroup('checknine');
handleCheckboxGroup('checkten');
handleCheckboxGroup('checkeleven');
handleCheckboxGroup('checktwelve');
handleCheckboxGroup('checkthirteen');
handleCheckboxGroup('checkfourteen');




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

  function limitarSelecoes(checkboxes, contadorLimite, campo) {
    let checkedCount = 0;
  
    checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener('change', function () {
        if (this.checked) {
          checkedCount++;
        } else {
          checkedCount--;
        }
  
        if (checkedCount > contadorLimite) {
          this.checked = false;
          checkedCount--;
          alert('Selecione apenas ' + contadorLimite +  campo);
        }
      });
    });
  }
  
  const checkboxesPergunta1 = document.querySelectorAll('input[name="hardcompetencia[]"]');
  const checkboxesPergunta2 = document.querySelectorAll('input[name="competencia[]"]');
  const checkboxesAtividades = document.querySelectorAll('input[name="atividadesp[]"');
  const checkboxesSetores = document.querySelectorAll('input[name = "setorop[]"]');
  const checkboxesHabsace = document.querySelectorAll('input[name = "habsace[]"]');

  limitarSelecoes(checkboxesAtividades, 5, ' atividades');
  limitarSelecoes(checkboxesPergunta1, 5, ' competências técnicas');
  limitarSelecoes(checkboxesPergunta2, 5, ' competências socioemocionais');
  limitarSelecoes(checkboxesSetores, 3, ' setores');
  limitarSelecoes(checkboxesHabsace, 3, ' habilidades')
  

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
    const degreeTextarea = document.getElementById("degreeTextarea");
  
    selectElement.addEventListener("change", function() {
      const selectedOption = selectElement.options[selectElement.selectedIndex].value;
  
      if (selectedOption === "Graduação" || selectedOption === "Especialização" || selectedOption === "Mestrado" || selectedOption === "Doutorado") {
        degreeTextareaDiv.style.display = "block";
        degreeTextareaDiv.style.marginTop = "10px";
        degreeTextarea.style.width = "100%";
        degreeTextarea.style.height = "60px"; 
        degreeTextarea.style.resize = "none";
      } else {
        degreeTextareaDiv.style.display = "none"; 
      }
    });
  });
  
  document.addEventListener("DOMContentLoaded", function() {
    const selectedElement = document.getElementById("input_7");
    const gratificationTextareaDiv = document.getElementById("gratificationTextareaDiv");
    const gratificationTextarea = document.getElementById("gratificationTextarea");
      
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
    });
  });
  