<?php

   session_start (); 
   ?>
   <!-- <link href="./hii.css" rel="stylesheet" /> -->
  <head>
    <meta charset="UTF-8">
    
    <title>Inscription utilisateur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-NW5k5fh1FnsJL9XGvNEm6ptzAk/cP3q6x4Q6bgYn6PzU6hqAyUkNHBQlT0MHjKVLhe0uH7xTltTJLkDpTHtgEA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

h1 {
  font-size: 2.5rem;
  text-align: center;
}

form {
  margin: auto;
  width: 50%;
  padding: 20px;
  border-radius: 10px;
  background-color: #f7f7f7;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

label {
  display: inline-block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
select,
textarea {
  padding: 10px;
  margin-bottom: 20px;
  width: 100%;
  border-radius: 5px;
  border: none;
  background-color: #f2f2f2;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

.error {
  color: red;
  font-weight: bold;
}

    </style>
  </head>
  <?PHP
include "../../controller/RoleC.php";
$Role2C=new RoleC();
$listeRole=$Role2C->AfficherRoles() ;
?>
  <body>
  <h1>Inscription utilisateur</h1>
  <p>Veuillez remplir le formulaire ci-dessous pour créer un compte utilisateur :</p>
  <form action="adduc.php" method="post">
    <label for="nom">Nom * :</label>
    <input type="text" id="nom" name="nom" pattern="[A-Za-z]+" required><br><br>
    
    <label for="prenom">Prénom * :</label>
    <input type="text" id="prenom" name="prenom" pattern="[A-Za-z]+" required><br><br>
    
    <label for="age">Âge * :</label>
    <input type="number" id="age" name="age"  required><br><br>
    
    <label>Sexe * :</label>
    <label for="homme">Homme</label>
    <input type="radio" id="homme" name="sexe" value="homme" required>
    <label for="femme">Femme</label>
    <input type="radio" id="femme" name="sexe" value="femme" required><br><br>
    
    <label for="email">Email * :</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="mdp">Mot de passe * :</label>
    <input type="password" id="mdp" name="mdp" minlength="8" required><br><br>
    
    <label for="roleu">Rôle :</label>
    <select id="roleu" name="roleu">
    <?php foreach ($listeRole as $row) {
        if ($row['roles'] !== 'admin') {
            ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['roles']; ?></option>
        <?php
        }
    } ?>
</select>
<br><br>
    
    <!-- <label for="mdp-confirm">Confirmez le mot de passe * :</label>
    <input type="password" id="mdp-confirm" name="mdp-confirm" minlength="8" required><br><br> -->
    
    <input type="submit" value="S'inscrire">
  </form>
</body>

