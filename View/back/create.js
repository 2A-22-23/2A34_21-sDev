// Selecting input fields
const idOrgInput = document.getElementById('id_org');
const idEventInput = document.getElementById('id_event');
const nomInput = document.getElementById('nom');
const prixInput = document.getElementById('prix');

// Validating input fields on form submit
document.querySelector('form').addEventListener('submit', function(e) {
  // Preventing form submission
  e.preventDefault();

  // Validating id_org input
  if (!/^\d+$/.test(idOrgInput.value)) {
    alert('Identifiant d\'organisateur doit être un nombre');
    return;
  }

  // Validating id_event input
  if (idEventInput.value.length !== idOrgInput.value.length) {
    alert('Identifiant d\'evenement doit avoir la même longueur que l\'identifiant d\'organisateur');
    return;
  }

  // Validating nom input
  if (!/^[a-zA-Z]+$/.test(nomInput.value)) {
    alert('Nom d\'evenement ne doit contenir que des lettres alphabétiques');
    return;
  }

  // Validating prix input
  if (!/^\d+(\.\d{1,2})?$/.test(prixInput.value)) {
    alert('Prix doit être un nombre décimal avec 2 chiffres après la virgule');
    return;
  }

  // If all input fields are valid, submit the form
  this.submit();
});
