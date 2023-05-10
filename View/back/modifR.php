
<?php

   session_start (); 
   ?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
  </head>
</head>
<body >
    
        <?php
            include_once     "./adminHeader.php";
            include_once "./sidebar.php";
            ?>
    <script>
 function validateForm() {
     var roles = document.forms["myForm"]["roles"].value;
     
     var errorMessages = document.getElementsByClassName("error-message");
     while (errorMessages.length > 0) {
         errorMessages[0].parentNode.removeChild(errorMessages[0]);
     }
     
     if (roles == "") {
         var errorMessage = document.createElement("div");
         errorMessage.className = "error-message";
         errorMessage.innerHTML = "Le champ role est obligatoire.";
         document.getElementsByName("roles")[0].parentNode.appendChild(errorMessage);
         return false;
     } else if (!/^[a-zA-Z]+$/.test(roles)) {
         var errorMessage = document.createElement("div");
         errorMessage.className = "error-message";
         errorMessage.innerHTML = "Le champ role ne doit contenir que des lettres.";
         document.getElementsByName("roles")[0].parentNode.appendChild(errorMessage);
         return false;
     }
 }
 </script>
<?PHP
include_once "../../Model/Role.php";
include_once "../../Controller/RoleC.php";
if (isset($_GET['id'])){
    $RoleC = new RoleC();
    $result=$RoleC->recupererole($_GET['id']);
    foreach($result as $row){
        $roles=$row['roles'];
      

        
    
?>
    <div id="wrapper">
        <h2 id="titleRegistration">Modifier Role</h2>
        <form method="POST" action="updateR.php" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
            <fieldset id="userInformation">
                <legend>Role  Information</legend>

                <div class="divInformation">
                    <label class="label" for="username">Role:</label>
                    <input type="text" id="roles" name="roles" value="<?PHP echo $roles ?>" class="input" placeholder="From 3 to 20 letters " autocomplete="off" autofocus="autofocus"
                    />
                   
                </div>
                

              

            </fieldset>

            <fieldset id="nextStep">
                <button type="submit" name="modifier" value="modifier">Modifier</button>
                <input type="hidden" name="id" value="<?PHP echo $_GET['id'];?>">
            </fieldset> 
        </form>
    </div>
    <?PHP
    }
}


?>
<style>
    form {
        margin: 0 auto;
        width: 50%;
        text-align: center; /* Ajout d'un alignement centré pour les boutons */
    }
    label {
        display: inline-block;
        width: 20%;
        margin-bottom: 5px;
        text-align: right; /* Ajout d'un alignement à droite pour les labels */
    }
    input[type="text"], textarea, input[type="number"] {
        display: inline-block;
        width: 75%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }
    #alerte {
        display: inline-block;
        color: red;
        margin-bottom: 10px;
        text-align: center;
    }
    .btn-container {
        margin-top: 10px; /* Ajout d'une marge supérieure pour le conteneur */
        text-align: center; /* Ajout d'un alignement centré pour le conteneur */
    }
    input[type="submit"], input[type="reset"] {
        background-color: #3b3131;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 10px;
    }
    label[for="contenu"], #contenu {
        display: inline-block;
        vertical-align: top;
    }
</style>

  <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
