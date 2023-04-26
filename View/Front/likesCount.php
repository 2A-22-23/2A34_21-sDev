<?php
   require_once '../../config.php';
      if (isset($row['idQuestion']) && !empty($row['idQuestion'])) {
      $idQuestion = $row['idQuestion'];
      $pdo = config::getConnexion();
      $list = $pdo->prepare("SELECT COUNT(*) FROM votes WHERE idQuestion = :id AND type = 1");
      $list->bindValue(':id', $idQuestion, PDO::PARAM_INT);
      $list->execute();
      $likesCount = $list->fetchColumn();
   }
?>