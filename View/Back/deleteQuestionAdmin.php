<?php
    require_once '../../Controller/questionC.php';
    require_once '../../Controller/answerC.php';
    require_once '../../Controller/voteC.php';
    $answerC = new answerC();
    $questionC = new questionC();
    $voteC = new voteC();
    if (isset ($_GET["idQuestion"])&&!empty($_GET["idQuestion"])){
        $list = $questionC->delete($_GET["idQuestion"]);
        $list = $answerC->deleteQ($_GET["idQuestion"]);
        $list = $voteC->deleteV($_GET["idQuestion"]);
        header('location:viewForum.php');
    }
    else {
        echo "undefined id";
    }
?>
