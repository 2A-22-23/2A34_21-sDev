<?php
    require '../../Controller/voteC.php';
    $voteC = new voteC();
    if (isset ($_GET["idQuestion"])&&!empty($_GET["idQuestion"])){
        $list = $voteC->addLike($_GET["idQuestion"],1);
        header('location:listQuestions.php');
    }
    else {
        echo "Error";
    }
?>