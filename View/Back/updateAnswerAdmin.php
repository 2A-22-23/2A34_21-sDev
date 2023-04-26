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
    include "./adminHeader.php";
    include "./sidebar.php";
    require_once '../../Controller/answerC.php';
    require_once '../../Model/answer.php';
    $idAnswer = $_GET['idAnswer'];
    $answerC = new answerC();
    $list = $answerC->findAnswer($_GET['idAnswer']);
    if (isset ($_POST ["contenu"]) && isset ($_POST ["id_auteur"])){
      if (!empty ($_POST ["contenu"]) && !empty($_POST ["id_auteur"])){
        $idQuestion = $answerC->getIdQuestion1($_GET["idAnswer"]);
        $answer = new answer(NULL, $_POST ["contenu"], $_POST ["id_auteur"], date('Y-m-d H:i:s'), $idQuestion);
        $r=$answerC->updateAnswer($answer,$_GET["idAnswer"]);
        header('location:viewAnswers.php?idQuestion=' . $idQuestion);
        }
        else{
          echo "champ invalid";
        }
      }
?>
  <form action="" method="POST" >
        <?php
          $contenue = $list ['contenu'];
          $contenue = str_replace('<br />', '', $contenue);
        ?>
        <label for="contenu"> Contenu </label>
        <textarea name="contenu" id="contenu"> <?php echo $contenue ?> </textarea>
        <br>
        <label for="id_auteur"> Id auteur </label>
        <input type="number" name="id_auteur" id="id_auteur" value='<?php echo $list ['id_auteur']; ?>' oninput="validateInput('id_auteur', /^\d+$/)">
        <span id="id_auteur_span"></span>
        <br>
        <br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
        <br>
    </form>
    <div id="alerte"> </div>
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