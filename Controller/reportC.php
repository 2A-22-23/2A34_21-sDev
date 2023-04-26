<?php
    require_once '../../config.php';
    require_once '../../Model/report.php';
    class reportC{
        
        public function delete(int $idReport){
            $sql = 'DELETE FROM `reports` WHERE idReport = '.$idReport.'';
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

        public function deleteR(int $idOfTheQuestion){
            $sql = 'DELETE FROM `reports` WHERE id_question = '.$idOfTheQuestion.'';
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

        public function createReport($report){
            try {
                $pdo = config::getConnexion();
                $sql = 'INSERT INTO `reports`(`idQuestion`, `id_auteur`, `cause`, `description`)VALUES (?, ?, ?, ?)';
                $list = $pdo->prepare($sql);
                $id_question=$report->getIdQuestion();
                $list->bindParam(1,$id_question);
                $id_auteur = $report->getId_auteur();
                $list->bindParam(2,$id_auteur);
                $cause=$report->getCause();
                $list->bindParam(3,$cause);
                $description = $report->getDescription();
                $description1 = nl2br(htmlspecialchars($description));
                $list->bindParam(4,$description1);
                $list->execute();
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }
    }
?>