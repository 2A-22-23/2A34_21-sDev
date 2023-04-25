<?php

    require_once '../Assets/Utils/config.php';
    require_once '../Model/salle.php';


    Class salleC {

        function affichersalle()
        {
            $requete = "select * from salle";
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
        function getsallebyID($idsalle)
        {
            $requete = "select * from salle where idsalle=:idsalle";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'idsalle'=>$idsalle
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ajoutersalle($salle)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO salle 
                (idsalle,bloc,numero,etage,idclub)
                VALUES
                (:idsalle,:bloc,:numero,:etage,:idclub)
                ');
                $querry->execute([
                    'idsalle'=>$salle->getidsalle(),
                    'bloc'=>$salle->getbloc(),
                    'numero'=>$salle->getnumero(),
                    'etage'=>$salle->getetage(),
                    'idclub'=>$salle->getidclub(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifiersalle($salle)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE salle SET
                bloc=:bloc ,
                numero=:numero ,
                etage=:etage ,
                idclub=:idclub 
                where idsalle=:idsalle
                ');
                $querry->execute([
                    'bloc'=>$salle->getbloc(),
                    'numero'=>$salle->getnumero(),
                    'etage'=>$salle->getetage(),
                    'idclub'=>$salle->getidclub(),
                    'idsalle'=>$salle->getidsalle()


                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimersalle($idsalle)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM salle WHERE idsalle =:idsalle
                ');
                $querry->execute([
                    'idsalle'=>$idsalle
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function triSalle()
        {
            $sql = "SELECT * FROM salle order by bloc";
            $db = config::getConnexion();
            try {
                $list = $db->query($sql);
                return $list;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        function rechercheSalle($rech)
        {
            $sql = "SELECT * FROM salle where salle.bloc like '%$rech%' or salle.numero like '%$rech%' or salle.etage like '%$rech%'";
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