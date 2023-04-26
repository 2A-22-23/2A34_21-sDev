<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="./assets/css/style.css"></link>
  </head>
</head>
<body >
    
        <?php
            include "./adminHeader.php";
            include "./sidebar.php";
            require_once '../../Controller/answerC.php';
            require_once '../../Model/answer.php';
            $idOfTheQuestion = $_GET['idQuestion'];
            $answerC = new answerC();
            $list = $answerC->listAnswers($idOfTheQuestion);
        ?>

    <h2 style="text-align: center;">Forum</h2>
    <br>
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">ID Answer</th>
                <th class="text-center">Contenu</th>
                <th class="text-center">Id Auteur</th>
                <th class="text-center">Date Publication</th>
                <th class="text-center">ID Question</th>
                <th class="text-center" colspan="3">Action</th>
            </tr>
        </thead>
        <?php foreach ($list as $row){ ?>
            <tr>
                <td><?=$row["idAnswer"]?></td>
                <td><?=$row["contenu"]?></td>  
                <td><?=$row["id_auteur"]?></td>  
                <td><?=$row["date_publication"]?></td>     
                <td><?=$row["id_question"]?></td>      
                <td><a href="updateAnswerAdmin.php?idAnswer=<?= $row['idAnswer'] ?>"><button class="btn btn-primary" style="height:40px" >Edit</button></a></td>
                <td><a href="deleteAnswerAdmin.php?idAnswer=<?= $row['idAnswer'] ?>"><button class="btn btn-danger" style="height:40px" >Delete</button></a></td>
            </tr>
        <?php } ?>

    </table>
    <br><br><br>
    <div class="d-flex justify-content-center align-items-center">
        <a href="addAnswerAdmin.php?idQuestion=<?= $_GET['idQuestion'] ?>">
            <button type="button" class="btn btn-secondary" style="height:40px;" data-toggle="modal" data-target="#myModal">
                Add Reply
            </button>
        </a>
    </div>
    <br><br><br>

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>