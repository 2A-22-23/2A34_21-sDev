<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
       <script src="cs.js"></script>
  </head>
</head>
<body >

<?php
    require_once '../../Model/question.php';
    require_once '../../Controller/questionC.php';
    include "./adminHeader.php";
    include "./sidebar.php";
    if (isset ($_POST ["titre"]) && isset ($_POST ["contenu"]) && isset ($_POST ["id_auteur"])){
        if (!empty ($_POST ["titre"]) && !empty ($_POST ["contenu"]) && !empty($_POST ["id_auteur"])){
            $question1 = new question(NULL, $_POST ["titre"], $_POST ["contenu"], $_POST ["id_auteur"], date('Y-m-d H:i:s'));
            $questionC = new questionC();
            $questionC->createQuestion($question1);
            header('location:viewForum.php');
        }
    }
?>
<form action="" method="POST">
    
        <label for="titre"> Title </label> 
        <input type="text" name="titre" id="titre" >
        <br>
        <label for="contenu"> Contenu </label>
        <textarea name="contenu" id="contenu"></textarea>
        <br>
        <label for="id_auteur"> Id auteur </label>
        <input type="number" name="id_auteur" id="id_auteur" oninput="validateInput('id_auteur', /^\d+$/)">
        <span id="id_auteur_span"></span>
        <br>
        <br>
        <input type="submit" value="Submit" >
        <input type="reset" value="Reset">
        <br>
        <br>
</form>

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

<br>
<br>
    <br><br><br>

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>