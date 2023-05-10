<?php

require_once '../../config.php';
    require_once '../../Model/club.php';
    require_once '../vendor/autoload.php';



    Class clubC {

        function afficherclub()
        {
            $requete = "select * from club";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function getclubbyID($idclub)
        {
            $requete = "select * from club where idclub=:idclub";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'idclub'=>$idclub
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ajouterclub($club)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO club 
                (idclub,titre,type,fondateur,date)
                VALUES
                (:idclub,:titre,:type,:fondateur,:date)
                ');
                $querry->execute([
                    'idclub'=>$club->getidclub(),
                    'titre'=>$club->gettitre(),
                    'type'=>$club->gettype(),
                    'fondateur'=>$club->getfondateur(),
                    'date'=>$club->getdate(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierclub($club)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE club SET
                titre=:titre ,
                type=:type ,
                fondateur=:fondateur ,
                date=:date 
                where idclub=:idclub
                ');
                $querry->execute([
                    'idclub'=>$club->getidclub(),
                    'titre'=>$club->gettitre(),
                    'type'=>$club->gettype(),
                    'fondateur'=>$club->getfondateur(),
                    'date'=>$club->getdate(),

                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimerclub($idclub)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM club WHERE idclub =:idclub
                ');
                $querry->execute([
                    'idclub'=>$idclub
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        public function trierClubParNom() {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('SELECT * FROM club ORDER BY titre ASC');
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
                
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
    
        function rechercheClub($rech)
        {
            $sql = "SELECT * FROM club where titre like '%$rech%' or type like '%$rech%' or fondateur like '%$rech%'";
            $db = config::getConnexion();
            try {
                $list = $db->query($sql);
                return $list;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }


        function sendSMS(){
            $accountSid = 'ACb6e280cdf230a03207f6b9775a276f95';
            $authToken = '6dec859129f2c2799d078d48c020155f';
            $twilioClient = new Twilio\Rest\Client($accountSid, $authToken);

            // Send an SMS
            $twilioClient->messages->create(
                '+21698731405',
                array(
                    'from' => '+16205298677',
                    'body' => 'Un club a été ajouté.'
                )
            );
        }
        
    }

?>