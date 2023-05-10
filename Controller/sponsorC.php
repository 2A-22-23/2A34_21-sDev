<?php
require_once '../../config.php';
    require_once '../../model/sponsor.php';
    class sponsorC{
        public function listsponsor(){
            $sql = 'SELECT * FROM `sponsor`';
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
        public function delete_sponsor(int $id){
            $sql = 'DELETE FROM `sponsor` WHERE id = '.$id.'';
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
        public function createSponsor($sponsor){
            try {
                $pdo = config::getConnexion();
                $sql = 'INSERT INTO `sponsor`(`id`, `nom`, `secteur_activite`, `date_debut`, `date_fin`, `montant_sponsoring`, `description_sponsorship`, `logo_sponsor`, `id_event`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
                $list = $pdo->prepare($sql);
                
                $id = $sponsor->getId();
                $nom = $sponsor->getNom();
                $secteur_activite = $sponsor->getSecteurActivite();
                $date_debut = $sponsor->getDateDebut();
                $date_fin = $sponsor->getDateFin();
                $montant_sponsoring = $sponsor->getMontantSponsoring();
                $description_sponsorship = $sponsor->getDescriptionSponsorship();
                $logo_sponsor = $sponsor->getLogoSponsor();
                $id_event = $sponsor->getIdEvent();
                
                $list->bindParam(1, $id);
                $list->bindParam(2, $nom);
                $list->bindParam(3, $secteur_activite);
                $list->bindParam(4, $date_debut);
                $list->bindParam(5, $date_fin);
                $list->bindParam(6, $montant_sponsoring);
                $list->bindParam(7, $description_sponsorship);
                $list->bindParam(8, $logo_sponsor);
                $list->bindParam(9, $id_event);
                
                $list->execute();
                
                if ($list->rowCount() > 0) {
                    echo "Sponsor created successfully!";
                } else {
                    echo "Error: Sponsor not created.";
                }
                
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        
        
        
        
                
        
        public function findsponsor($id)
        {
            $sql="SELECT * FROM `sponsor` WHERE id = ".$id." ";
            $db = config::getConnexion();
            try{
                $sponsor = $db->query($sql);
                if (!$sponsor) {
                    throw new Exception("Query failed: ".$db->error);
                }
                $row = $sponsor->fetch(PDO::FETCH_ASSOC);
                if (!$row) {
                    throw new Exception("No sponsor found with ID ".$id);
                }
                $keys = array('id', 'nom', 'secteur_activite', 'date_debut', 'date_fin', 'montant_sponsoring', 'description_sponsorship', 'id_event', 'logo_sponsor');
                foreach ($keys as $key) {
                    if (!array_key_exists($key, $row)) {
                        throw new Exception("Missing key '".$key."' in sponsor record");
                    }
                }
                $sponsor = new sponsor($row['id'], $row['nom'], $row['secteur_activite'], $row['date_debut'], $row['date_fin'], $row['montant_sponsoring'], $row['description_sponsorship'], $row['id_event'], $row['logo_sponsor']);           
                return $sponsor;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        
        public function trisponsor($id)
        {
            $sql="SELECT * FROM `sponsor` WHERE id = ".$id." ";
            $db = config::getConnexion();
            try{
                $sponsor = $db->query($sql);
                if (!$sponsor) {
                    throw new Exception("Query failed: ".$db->error);
                }
                $row = $sponsor->fetch(PDO::FETCH_ASSOC);
                if (!$row) {
                    throw new Exception("No sponsor found with ID ".$id);
                }
                $keys = array('id', 'nom', 'secteur_activite', 'date_debut', 'date_fin', 'montant_sponsoring', 'description_sponsorship', 'id_event', 'logo_sponsor');
                foreach ($keys as $key) {
                    if (!array_key_exists($key, $row)) {
                        throw new Exception("Missing key '".$key."' in sponsor record");
                    }
                }
                $sponsor = new sponsor($row['id'], $row['nom'], $row['secteur_activite'], $row['date_debut'], $row['date_fin'], $row['montant_sponsoring'], $row['description_sponsorship'], $row['id_event'], $row['logo_sponsor']);           
                return $sponsor;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        


         
        public function updatesponsor($sponsor, $id) {
            try {
                $pdo = config::getConnexion();
                $sql = 'UPDATE `sponsor` SET `id`=:id, `nom`=:nom, `secteur_activite`=:secteur_activite, `date_debut`=:date_debut, `date_fin`=:date_fin, `montant_sponsoring`=:montant_sponsoring, `description_sponsorship`=:description_sponsorship, `logo_sponsor`=:logo_sponsor, `id_event`=:id_event WHERE id=:id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $sponsor->getId());
                $stmt->bindParam(':nom', $sponsor->getNom());
                $stmt->bindParam(':secteur_activite', $sponsor->getSecteurActivite());
                $stmt->bindParam(':date_debut', $sponsor->getDateDebut());
                $stmt->bindParam(':date_fin', $sponsor->getDateFin());
                $stmt->bindParam(':montant_sponsoring', $sponsor->getMontantSponsoring());
                $stmt->bindParam(':description_sponsorship', $sponsor->getDescriptionSponsorship());
                $stmt->bindParam(':logo_sponsor', $sponsor->getLogoSponsor());
                $stmt->bindParam(':id_event', $sponsor->getIdEvent());
                $stmt->execute();
                echo $stmt->rowCount() ."records updated successfully";
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        
        

        
        
        
        
        
    }
?>