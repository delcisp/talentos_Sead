const concordoCheck = document.getElementById('concordo');
const continueButton = document.getElementById('continue-button');

concordoCheck.addEventListener('change', function() {
  continueButton.disabled = !concordoCheck.checked;
});

continueButton.addEventListener('click', function() {
  window.location.href = "form";
});