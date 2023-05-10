<?php

require_once     '../../Controller/salleC.php';
    require_once '../../Model/salle.php' ;
    require 'adminHeader.php';
    require 'sidebar.php';
    $salleC = new salleC();
    

    if (isset($_POST['idsalle'] ) && isset($_POST['bloc']  )&& isset($_POST['numero']  )&& isset($_POST['etage']  )&& isset($_POST['idclub']  )) 
    {
        echo $_POST['idsalle'] ;
            $salle = new salle($_POST['idsalle'] , $_POST['bloc'] , $_POST['numero'], $_POST['etage'], $_POST['idclub']);
            $salleC->modifiersalle($salle);
            header('Location:affichersalleadmin.php');
    }else
    {
        $a = $salleC->getsallebyID($_GET['id']) ;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="create.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
</head>
<body>
<form action="" method="POST">
            <table class="table">
                <tr>
                    <td>
                        <label for="idsalle">idsalle:</label>
                    </td>
                    <td>
                        <input type="number" name="idsalle" id="idsalle" maxlength="20" value="<?php echo $a['idsalle'];?>"  readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="bloc">bloc:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $a['bloc'];?>" name="bloc" id="bloc" maxlength="20">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="numero">numero:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $a['numero'];?>" name="numero" id="numero" maxlength="20" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="etage">etage:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $a['etage'];?>" name="etage" id="etage" maxlength="20" required>
                    </td>
                </tr>
                <tr><td>
                      <?php 
                      include '../../Controller/clubC.php';
                      $clubC = new clubC();
                      $resultats = $clubC->afficherclub();
                      ?>
                         <label for="idclub">club</label>
                        <br>
                        <td> <select name="idclub" id="idclub" required>
        
        <?php foreach ($resultats as $value) { ?>
            <option value="<?php echo $value['idclub']; ?>"><?php echo $value['titre']; ?></option>
        <?php } ?>
    </select> </td>  </td>
                </tr>  
                <tr>
                    <td>
                        <input type="submit" value="Modifier">
                    </td>
                    <td>
                        <input type="reset" value="Annuler">
                    </td>
                </tr>
            </table>
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

  

<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>