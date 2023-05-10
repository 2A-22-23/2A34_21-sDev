<?php
require_once '../../config.php';
require '../../Controller/questionC.php';
$questionC = new questionC();

if (isset($_GET['idQuestion']) && !empty($_GET['idQuestion'])) {
    $idOfTheQuestion = $_GET['idQuestion'];
    $sql = 'SELECT * FROM `questions` WHERE idQuestion = :id';
    $pdo = config::getConnexion();

    try {
        $list = $pdo->prepare($sql);
        $list->bindParam(':id', $idOfTheQuestion, PDO::PARAM_INT);
        $list->execute();

        if ($list->rowCount() > 0) {
            $questionsInfos = $list->fetch();
            $titre = $questionC->censorBadWords($questionsInfos['titre']);
            $contenu = $questionC->censorBadWords($questionsInfos['contenu']);
            $id_auteur = $questionC->censorBadWords($questionsInfos['id_auteur']);
            $date_publication = $questionC->censorBadWords($questionsInfos['date_publication']); 
        }            
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}
if (isset($_GET['idQuestion']) && !empty($_GET['idQuestion'])) {
    $idOfTheQuestion = $_GET['idQuestion'];
    $pdo = config::getConnexion();
    $list = $pdo->prepare("SELECT COUNT(*) FROM votes WHERE idQuestion = :id AND type = -1");
    $list->bindValue(':id', $idOfTheQuestion, PDO::PARAM_INT);
    $list->execute();
    $dislikesCount1 = $list->fetchColumn();
 }

 if (isset($_GET['idQuestion']) && !empty($_GET['idQuestion'])) {
    $idOfTheQuestion = $_GET['idQuestion'];
    $pdo = config::getConnexion();
    $list = $pdo->prepare("SELECT COUNT(*) FROM votes WHERE idQuestion = :id AND type = 1");
    $list->bindValue(':id', $idOfTheQuestion, PDO::PARAM_INT);
    $list->execute();
    $likesCount1 = $list->fetchColumn();
 }

?>
