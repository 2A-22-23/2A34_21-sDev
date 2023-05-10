<?php
    require_once '../../config.php';
    require_once '../../Model/answer.php';
    class answerC{
        public function listAnswers($idOfTheQuestion){
            $sql = 'SELECT * FROM `answers` WHERE id_question = '.$idOfTheQuestion.' ORDER BY idAnswer DESC';
            $pdo = config::getConnexion();
            try{
                $list = $pdo->prepare($sql);
                $list->execute();
                $result = $list->fetchAll();
                return $result;
            }
            catch(Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        public function getIdQuestion1($idAnswer) {    
            $sql = 'SELECT id_question FROM answers WHERE idAnswer = '.$idAnswer.' ';
            $pdo = config::getConnexion();
            try {
                $list = $pdo->prepare($sql);
                $list->execute();
                $result = $list->fetchAll();
                if (count($result) > 0) { 
                    $id_question = $result[0]['id_question']; 
                    return $id_question;
                } else {
                    return null;
                }
            } catch(Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        
        
        
        public function findAnswer(int $idAnswer){
            $pdo = config::getConnexion();
            $sql = 'SELECT * FROM `answers` WHERE idAnswer = '.$idAnswer.'';
            $list = $pdo->prepare($sql);
            try{
                $list = $pdo->prepare($sql);
                $list->execute();
                return $list->fetch();
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }

        public function delete(int $idAnswer){
            $sql = 'DELETE FROM `answers` WHERE idAnswer = '.$idAnswer.'';
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

        public function deleteQ(int $idOfTheQuestion){
            $sql = 'DELETE FROM `answers` WHERE id_question = '.$idOfTheQuestion.'';
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

        public function createAnswer($answer){
            try {
                $pdo = config::getConnexion();
                $sql = 'INSERT INTO `answers`(`contenu`, `id_auteur`, `date_publication`, `id_question`) VALUES (?, ?, ?, ?)';
                $list = $pdo->prepare($sql);
                $contenu=$answer->getContenu();
                $contenue = nl2br(htmlspecialchars($contenu));
                $list->bindParam(1,$contenue);
                $id_auteur = $answer->getId_auteur();
                $list->bindParam(2,$id_auteur);
                $date_publication = $answer->getDate_publication();
                $list->bindParam(3,$date_publication);
                $id_question=$answer->getIdQuestion();
                $list->bindParam(4,$id_question);
                $list->execute();
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }


        public function updateAnswer($answer,$idAnswer){
            try{
            $pdo = config::getConnexion();
            $sql = 'UPDATE `answers` SET `contenu`=:contenu,`id_auteur`=:id_auteur,`date_publication`=:date_publication, `id_question`= :id_question WHERE idAnswer=:idAnswer';
            $list = $pdo->prepare($sql);
            $contenu=$answer->getContenu();
            $id_auteur=$answer->getId_auteur();
            $date_publication=$answer->getDate_publication();
            $id_question= $answer->getIdQuestion();
            $list->execute([
                'contenu' => $contenu,
                'id_auteur' => $id_auteur,
                'date_publication' => $date_publication,
                'id_question' => $id_question,
                'idAnswer'=>$idAnswer
            ]);
            echo $list->rowCount()."records Updated successfully";
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }
    }
?>