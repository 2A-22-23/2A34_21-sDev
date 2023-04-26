<?php
    require_once '../../config.php';
    require_once '../../Model/vote.php';
    class voteC{
        
        public function addLike($idQuestion, $id_auteur) {
            // On définit le type de vote comme étant un like (1)
            $type = 1;
            $date_vote = date('Y-m-d H:i:s'); // On définit la date du vote comme étant maintenant
            $pdo = config::getConnexion();
            // Vérification si un vote existe déjà pour la question et l'auteur spécifiés
            $query = "SELECT * FROM votes WHERE idQuestion = :idQuestion AND id_auteur = :id_auteur";
            $list = $pdo->prepare($query);
            $list->bindParam(":idQuestion", $idQuestion);
            $list->bindParam(":id_auteur", $id_auteur);
            $list->execute();
        
            if ($list->rowCount() > 0) {
              // Si le vote existe déjà, on vérifie son type
              $row = $list->fetch(PDO::FETCH_ASSOC);
              $existingType = $row['type'];
        
              if ($type == 1) { // Si le type du vote à ajouter est un like
                if ($existingType == 1) { // Si un vote de type like existe déjà pour la question et l'auteur spécifiés
                  // On supprime le vote existant
                  $query = "DELETE FROM votes WHERE idQuestion = :idQuestion AND id_auteur = :id_auteur";
                  $list = $pdo->prepare($query);
                  $list->bindParam(":idQuestion", $idQuestion);
                  $list->bindParam(":id_auteur", $id_auteur);
                  $list->execute();
                }
                else if ($existingType == -1) { // Si un vote de type dislike existe déjà pour la question et l'auteur spécifiés
                  // On modifie le type du vote existant en like
                  $query = "UPDATE votes SET type = 1 WHERE idQuestion = :idQuestion AND id_auteur = :id_auteur";
                  $list = $pdo->prepare($query);
                  $list->bindParam(":idQuestion", $idQuestion);
                  $list->bindParam(":id_auteur", $id_auteur);
                  $list->execute();
                }
                else { // Sinon, on ajoute le vote de type like
                  $query = "INSERT INTO votes(idQuestion, id_auteur, type, date_vote) VALUES (:idQuestion, :id_auteur, 1, :date_vote)";
                  $list = $pdo->prepare($query);
                  $list->bindParam(":idQuestion", $idQuestion);
                  $list->bindParam(":id_auteur", $id_auteur);
                  $list->bindParam(":date_vote", $date_vote);
                  $list->execute();
                }
              }
            }
            else { // Sinon, aucun vote n'existe encore pour la question et l'auteur spécifiés, on ajoute simplement le vote
              $query = "INSERT INTO votes(idQuestion, id_auteur, type, date_vote) VALUES (:idQuestion, :id_auteur, 1, :date_vote)";
              $list = $pdo->prepare($query);
              $list->bindParam(":idQuestion", $idQuestion);
              $list->bindParam(":id_auteur", $id_auteur);
              $list->bindParam(":date_vote", $date_vote);
              $list->execute();
            }
        }

        public function addDislike($idQuestion, $id_auteur) {
        // On définit le type de vote comme étant un dislike (-1)
            $type = -1;
            $date_vote = date('Y-m-d H:i:s'); // On définit la date du vote comme étant maintenant
            $pdo = config::getConnexion();
            // Vérification si un vote existe déjà pour la question et l'auteur spécifiés
            $query = "SELECT * FROM votes WHERE idQuestion = :idQuestion AND id_auteur = :id_auteur";
            $list = $pdo->prepare($query);
            $list->bindParam(":idQuestion", $idQuestion);
            $list->bindParam(":id_auteur", $id_auteur);
            $list->execute();

            if ($list->rowCount() > 0) {
                // Si le vote existe déjà, on vérifie son type
                $row = $list->fetch(PDO::FETCH_ASSOC);
                $existingType = $row['type'];

                if ($type == -1) { // Si le type du vote à ajouter est un dislike
                    if ($existingType == -1) { // Si un vote de type dislike existe déjà pour la question et l'auteur spécifiés
                    // On supprime le vote existant
                    $query = "DELETE FROM votes WHERE idQuestion = :idQuestion AND id_auteur = :id_auteur";
                    $list = $pdo->prepare($query);
                    $list->bindParam(":idQuestion", $idQuestion);
                    $list->bindParam(":id_auteur", $id_auteur);
                    $list->execute();
                    }
                    else if ($existingType == 1) { // Si un vote de type like existe déjà pour la question et l'auteur spécifiés
                    // On modifie le type du vote existant en dislike
                    $query = "UPDATE votes SET type = -1 WHERE idQuestion = :idQuestion AND id_auteur = :id_auteur";
                    $list = $pdo->prepare($query);
                    $list->bindParam(":idQuestion", $idQuestion);
                    $list->bindParam(":id_auteur", $id_auteur);
                    $list->execute();
                    }
                    else { // Sinon, on ajoute le vote de type dislike
                    $query = "INSERT INTO votes(idQuestion, id_auteur, type, date_vote) VALUES (:idQuestion, :id_auteur, -1, :date_vote)";
                    $list = $pdo->prepare($query);
                    $list->bindParam(":idQuestion", $idQuestion);
                    $list->bindParam(":id_auteur", $id_auteur);
                    $list->bindParam(":date_vote", $date_vote);
                    $list->execute();
                    }
                }
            }
            else { // Sinon, aucun vote n'existe encore pour la question et l'auteur spécifiés, on ajoute simplement le vote
            $query = "INSERT INTO votes(idQuestion, id_auteur, type, date_vote) VALUES (:idQuestion, :id_auteur, -1, :date_vote)";
            $list = $pdo->prepare($query);
            $list->bindParam(":idQuestion", $idQuestion);
            $list->bindParam(":id_auteur", $id_auteur);
            $list->bindParam(":date_vote", $date_vote);
            $list->execute();
            }
        }

        public function likesCount($idQuestion){
          if (isset($_GET['idQuestion']) && !empty($_GET['idQuestion'])) {
            $idQuestion = $_GET['idQuestion'];
            $pdo = config::getConnexion();
            $list = $pdo->prepare("SELECT COUNT(*) FROM votes WHERE idQuestion = :id AND type = 1");
            $list->bindValue(':id', $idQuestion, PDO::PARAM_INT);
            $list->execute();
            $likesCount = $list->fetchColumn();
            echo $likesCount;
            }
        }


        public function dislikesCount($idQuestion){
          if (isset($_GET['idQuestion']) && !empty($_GET['idQuestion'])) {
            $idQuestion = $_GET['idQuestion'];
            $pdo = config::getConnexion();
            $list = $pdo->prepare("SELECT COUNT(*) FROM votes WHERE idQuestion = :id AND type = -1");
            $list->bindValue(':id', $idQuestion, PDO::PARAM_INT);
            $list->execute();
            $dislikesCount = $list->fetchColumn();
            echo $dislikesCount;
            }
        }


        public function deleteV(int $idOfTheQuestion){
          $sql = 'DELETE FROM `votes` WHERE idQuestion = '.$idOfTheQuestion.'';
          $pdo = config::getConnexion();
          try{
              $list = $pdo->prepare($sql);
              $list->execute();
              echo $list->rowCount() ."records deleted successfully";
          }
          catch(PDOException $e){
              $e->getMessage();
          }
      }
}

?>