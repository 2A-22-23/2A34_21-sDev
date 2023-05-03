<?php
    require '../../Controller/voteC.php';
    $voteC = new voteC();
    if (isset ($_GET["idQuestion"])&&!empty($_GET["idQuestion"])){
        $list = $voteC->addLike($_GET["idQuestion"],1);
        require_once '../../config.php';
        if (isset($row['idQuestion']) && !empty($row['idQuestion'])) {
        $idQuestion = $row['idQuestion'];
        $pdo = config::getConnexion();
        $res = $pdo->prepare("SELECT COUNT(*) FROM votes WHERE idQuestion = :id AND type = 1");
        $res->bindValue(':id', $idQuestion, PDO::PARAM_INT);
        $res->execute();
        $likesCount = $res->fetchColumn();
        }
    }
    else {
        echo "Error";
    }
?>