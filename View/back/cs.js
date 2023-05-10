const id_auteur = document.getElementById('id_auteur');

document.querySelector('form').addEventListener('submit', function(e) {
  e.preventDefault();

  if (isNaN(id_auteur.value)) {
    alert('Nom d\'evenement ne doit contenir que des lettres alphabétiques');
    return;
  }

  this.submit();
});
