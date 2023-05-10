<?php

    require_once     '../../Controller/salleC.php';
    require_once '../../Model/salle.php' ;
    require 'adminHeader.php';
    require 'sidebar.php';
   
  

    if ( isset($_POST['bloc'] )&& isset($_POST['numero'] )&& isset($_POST['etage'] )&& isset($_POST['idclub'] )) 
    {
            $salle = new salle(NULL, $_POST['bloc'], $_POST['numero'], $_POST['etage'], $_POST['idclub'] );
            $salleC = new salleC();
            $salleC->ajoutersalle($salle);
            header('Location:affichersalleadmin.php');
    }


  
?>
    
<style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
		form {
        max-width: 500px;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
		color:black;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
		color:black;
    }

    input[type="submit"], input[type="reset"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #2E8B57;
    }

    .error {
        color: red;
        font-weight: bold;
    }

    </style>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="creat.js"></script>
  <link rel="stylesheet" href="creat.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
  <title>Document</title>
</head>
<br>
<br>
<br>

<body>
<form action="" method="POST" onsubmit="return verif1();">
	<h2 style="color:black;">Ajouter un salle</h2>
        <div class="form-group">
            <label for="bloc">bloc:</label>
            <input type="text" name="bloc" id="bloc" maxlength="20" required>
        </div>
        <div class="form-group">
            <label for="numero">numero:</label>
            <input type="text" name="numero" id="numero" maxlength="20" required>
        </div>
        <div class="form-group">
            <label for="etage">etage:</label>
            <input type="text" name="etage" id="etage" maxlength="20" required>
        </div>


        <?php 
                      include '../../Controller/clubC.php';
                      $clubC = new clubC();
                      $resultats = $clubC->afficherclub();
                      ?>
 <div class="form-group">
                        <label for="idclub">club</label>
                        <br>
    <select name="idclub" id="idclub" required>
        <option value="">--Please choose an option--</option>
        <?php foreach ($resultats as $value) { ?>
            <option value="<?php echo $value['idclub']; ?>"><?php echo $value['titre']; ?></option>
        <?php } ?>
    </select>         </div>
</td>
        <div class="form-group">
            <input onclick="verif1()" type="submit" value="Envoyer">
            
        </div><input type="reset" value="Annuler">
    </form>

    <script src="jscodes.js"></script>

  <script>
    function validateInput(inputId, regex) {
      const input = document.getElementById(inputId);
      const span = document.getElementById(`${inputId}_span`);

      if (regex.test(input.value)) {
        span.innerText = 'Correct';
        span.style.color = 'green';
      } else {
        span.innerText = 'Incorrect';
        span.style.color = 'red';
      }
    }
  </script>
      <br><br><br>

<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
