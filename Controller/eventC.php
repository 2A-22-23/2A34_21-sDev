<?php
require_once '../../config.php';
    require_once '../../model/event.php';
    class eventC{
        public function listevent(){
            $sql = 'SELECT * FROM `evenement`';
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
        public function listevent_2(int $id){
            $sql = 'SELECT * FROM `evenement`where id_event=:id';
            $pdo = config::getConnexion();
            try{
                $list = $pdo->prepare($sql);
                $list->bindParam(':id', $id, PDO::PARAM_INT);

                $list->execute();
                $result = $list->fetchAll();
                return $result;
            }
            catch(Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        public function delete_event(int $id) {
            $sql = 'DELETE FROM `evenement` WHERE id_event = :id';
            $pdo = config::getConnexion();
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->rowCount();
            } catch(PDOException $e) {
                throw new Exception('Failed to delete event: '.$e->getMessage());
            }
        }
        public function createEvent($event){
            try {
                $pdo = config::getConnexion();
                $sql = 'INSERT INTO `evenement` (`id_event`, `nom`, `date_debut`, `date_fin`, `prix`,`description`,`id_organ`,`image`) VALUES (?, ?, ?, ?, ?, ?, ?,?)';
                $list = $pdo->prepare($sql);
                $idd=$event->getid();
                $list->bindParam(1,$idd);
                $nom=$event->get_name_event();
                $list->bindParam(2,$nom);
                $date_debut=$event->getdate_debut();
                $list->bindParam(3,$date_debut);
                $date_fin = $event->getdate_fin();
                $list->bindParam(4,$date_fin);
                $prix=$event->getprix();
                $list->bindParam(5,$prix);
                $description=$event->getdescrip();
                $list->bindParam(6,$description);
                $id_org=$event->getorganizer();
                $list->bindParam(7,$id_org);
                $img=$event->getImage();
                $list->bindParam(8,$img);
                $list->execute();
                
                if ($list->rowCount() > 0) {
                    echo "Event created successfully!";
                } else {
                    echo "Error: Event not created.";
                }
                
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        
        
        
        
        public function findEvent($id)
{
    $sql="SELECT * FROM `evenement` WHERE id_event = ".$id." ";
    $db = config::getConnexion();
    try{
        $event = $db->query($sql);
       // var_dump($sql);
            $row = $event->fetch();
            $event = new event($row['id_organ'], $row['id_event'], $row['nom'], $row['date_debut'], $row['date_fin'], $row['prix'], $row['description'],$row['image']);
            return $event;
       
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
public function triEvent()
{
    $sql = "SELECT * FROM `evenement` ORDER BY `prix` ASC ";
    $db = config::getConnexion();
    try {
        $event = $db->query($sql);
        $rows = $event->fetchAll();
        $events = array();
        foreach ($rows as $row) {
            $event = new event(
                $row['id_organ'],
                $row['id_event'],
                $row['nom'],
                $row['date_debut'],
                $row['date_fin'],
                $row['prix'],
                $row['description'],
                $row['image']
            );
            $events[] = $event;
        }
        return $events;
    } catch (Exception $e) {
        die('Erreur: '.$e->getMessage());
    }
}
public function findEvent_array($id)
{
    $sql="SELECT * FROM `evenement` WHERE id_event = ".$id." ";
    $db = config::getConnexion();
    try{
        $event = $db->query($sql);
       // var_dump($sql);
            $rows = $event->fetchAll();
            $events = array();
            foreach ($rows as $row) {
                $event = new event(
                    $row['id_organ'],
                    $row['id_event'],
                    $row['nom'],
                    $row['date_debut'],
                    $row['date_fin'],
                    $row['prix'],
                    $row['description'],
                    $row['image']
                );
                $events[] = $event;
            }
            return $events;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

    
         

        
        
        
        
        
    


public function updateEvent($event,$id)
{
    $db = config::getConnexion();
    try {
        $query = "UPDATE evenement SET `nom`=:nom,`date_debut`=:date_debut,`date_fin`=:date_fin,`prix`=:prix,`description`=:description,`id_organ`=:id_organ,`image`=:image WHERE `id_event`=:id_event";
    
        $stmt = $db->prepare($query);

        $stmt->bindValue(":id_organ", $event->getorganizer());
        $stmt->bindValue(":id_event",$id);
        $stmt->bindValue(":nom", $event->get_name_event());
        $stmt->bindValue(":date_debut", $event->getdate_debut());
        $stmt->bindValue(":date_fin", $event->getdate_fin());
        $stmt->bindValue(":prix", $event->getprix());
        $stmt->bindValue(":description", $event->getDescrip());
        $stmt->bindValue(":image", $event->getImage());

        $stmt->execute();
        echo "Event updated successfully.";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}




        
        
}    
        
        
    
?>