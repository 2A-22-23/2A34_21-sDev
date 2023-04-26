<?php
   require_once '../../config.php';
      if (isset($row['idQuestion']) && !empty($row['idQuestion'])) {
      $idQuestion = $row['idQuestion'];
      $pdo = config::getConnexion();
      $list = $pdo->prepare("SELECT COUNT(r.idReport) FROM questions q LEFT JOIN reports r ON q.idQuestion = r.idQuestion WHERE q.idQuestion = :id;");
      $list->bindValue(':id', $idQuestion, PDO::PARAM_INT);
      $list->execute();
      $reportsCount = $list->fetchColumn();
   }
?>