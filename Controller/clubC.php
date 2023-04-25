<?php

    require_once '../Assets/Utils/config.php';
    require_once '../Model/club.php';


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

        function triClub()
        {
            $sql = "SELECT * FROM club order by titre";
            $db = config::getConnexion();
            try {
                $list = $db->query($sql);
                return $list;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        function rechercheClub($rech)
        {
            $sql = "SELECT * FROM club where club.titre like '%$rech%' or club.type like '%$rech%' or club.fondateur like '%$rech%'";
            $db = config::getConnexion();
            try {
                $list = $db->query($sql);
                return $list;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
    }

?>