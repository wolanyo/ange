<?php
    class Connexion {
        public function seConnecter() {
            try{
                $pdoOptions[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                return $bdd = new PDO('mysql:host=localhost;dbname=ange', 'root', 'root', $pdoOptions );
            }
            catch( Exception $e ){
                die('Erreur : ' . $e->getMessage());
            }
        }
    }
?>
