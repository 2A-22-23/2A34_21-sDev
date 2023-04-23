<?php
    require '../../Controller/questionC.php';
    require_once '../../Controller/answerC.php';
    $answerC = new answerC();
    $questionC = new questionC();
    if (isset ($_GET["idQuestion"])&&!empty($_GET["idQuestion"])){
        $list = $questionC->delete($_GET["idQuestion"]);
        $list = $answerC->deleteQ($_GET["idQuestion"]);
        header('location:listQuestions.php');
    }
    else {
        echo "undefined id";
    }
?>
