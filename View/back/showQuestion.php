<?php
require_once '../../config.php';

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
            $titre = $questionsInfos['titre'];
            $contenu = $questionsInfos['contenu'];
            $id_auteur = $questionsInfos['id_auteur'];
            $date_publication = $questionsInfos['date_publication'];   
        }            
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>
