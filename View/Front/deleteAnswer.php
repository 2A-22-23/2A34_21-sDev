<?php
require_once '../../Controller/answerC.php';
$answerC = new answerC();

if (isset($_GET["idAnswer"]) && !empty($_GET["idAnswer"])) {
    $idQuestion = $answerC->getIdQuestion1($_GET["idAnswer"]);
    $list = $answerC->delete($_GET["idAnswer"]);
    header('location:showOnce.php?idQuestion=' . $idQuestion);
} else {
    echo "Undefined ID";
}
?>