// Função para lidar com a seleção exclusiva de checkboxes em um grupo
function handleCheckboxGroup(groupClass) {
    const checkboxes = document.querySelectorAll(`.${groupClass} input[type="checkbox"]`);
    
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

handleCheckboxGroup('gender');
handleCheckboxGroup('realizacaodetrabalho');
handleCheckboxGroup('teletrabalho');
handleCheckboxGroup('realizacaodetrabalho');
handleCheckboxGroup('reuniaodetrabalho');
handleCheckboxGroup('deadlines');

//FUNÇÃO PARA APARECER UM CAMPO ESCONDIDO

document.addEventListener("DOMContentLoaded", function() {
    const selectedElement = document.getElementById("funcaogratificada");
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
        gratificationTextarea.style.borderRadius = "5px";
      } else {
        gratificationTextareaDiv.style.display= "none";
      }
    });
  });

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

const checkboxesCompetenciaTecnica = document.querySelectorAll('input[name="hardcompetencia[]"]');
const checkboxesSetorOpcional = document.querySelectorAll('input[name="setorop[]"]');
const checkboxesCompetenciaSocioemocional = document.querySelectorAll('input[name="competencia[]"]');
const checkboxesAtividades = document.querySelectorAll('input[name="atividadesp[]"]');
const checkboxesHabilidades = document.querySelectorAll('input[name="habsace[]"]');


limitarSelecoes(checkboxesHabilidades, 3, ' habilidades');
limitarSelecoes(checkboxesAtividades, 5, ' atividades');
limitarSelecoes(checkboxesCompetenciaSocioemocional, 5, ' competências socioemocionais');
limitarSelecoes(checkboxesCompetenciaTecnica, 5, ' competências técnicas');
limitarSelecoes(checkboxesSetorOpcional, 3, ' setores opcionais' );


document.addEventListener("DOMContentLoaded", function() {

const selectElement = document.getElementById("firstquestion");
const degreeTextareaDiv = document.getElementById("degreeTextareaDiv");
const secondDegreeTextareaDiv = document.getElementById("secondDegreeTextareaDiv");
const degreeTextarea = document.getElementById("degreeTextarea");
const secondDegreeTextarea = document.getElementById("secondDegreeTextarea");

selectElement.addEventListener("change", function(){
  const selectedOption = selectElement.options[selectElement.selectedIndex].value;

if (selectedOption === "Graduação" || selectedOption === "Pós-graduação" || selectedOption === "Especialização" || selectedOption === "Mestrado" || selectedOption === "Doutorado") {

  degreeTextareaDiv.style.display = "block";
  degreeTextareaDiv.style.marginTop = "10px";
  secondDegreeTextareaDiv.style.display = "block";
} else {
  degreeTextareaDiv.style.display = "none";
  secondDegreeTextareaDiv.style.display = "none";
}

} )

});