<?php
    include_once("connexion.php") ;
    
    class User {
        private $idUser ;
        private $nom ;
        private $sexe ;
        private $prenom ;
        private $pseudo ;
        private $passwd ;
        private $photo ;
        private $droit ;
        private $droitNotification ;
        
        public function getIdUser() { return $this->idUser ; }
        public function getNom() { return $this->nom ; }
        public function getPrenom() { return $this->prenom ; }
        public function getSexe() { return $this->sexe ; }
        public function getPseudo() { return $this->pseudo ; }
        public function getPassword() { return $this->passwd ; }
        public function getPhoto() { return $this->photo ; }
        public function getDroit() { return $this->droit ; }
        public function getDroitNotification(){ return $this->droitNotification ; }
        
        public function setIdUser($value) { $this->idUser = $value ; }
        public function setNom($value) { $this->nom = $value ; }
        public function setPrenom($value) { $this->prenom = $value ; }
        public function setSexe($value) { $this->sexe = $value ; }
        public function setPseudo($value) { $this->pseudo = $value ; }
        public function setPassword($value) { $this->passwd = $value ; }
        public function setPhoto($value) { $this->photo = $value ; }
        public function setDroit($value) { $this->droit = $value ; }
        public function setDroitNotification($value){ $this->droitNotification = $value; }
        
        public function verifierPseudo() {
            $connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("SELECT * FROM user WHERE pseudo = :pseu") ;
            $requete->bindValue(":pseu",$this->pseudo ,PDO::PARAM_STR) ;
            $requete->execute() ;
            if( $requete->fetch() ){
                $requete->closeCursor() ;
                return true ;
            }
            else{
                $requete->closeCursor() ;
                return false ;
            }
        }
        
        public function save() {
            $connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("INSERT INTO user VALUES('', :nom, :prenom, :sexe, :pseudo, :passwd, :droit, :droitNotif, '', 1 )") ;
            //$requete->bindValue("id",$this->idUser ,PDO::PARAM_STR) ;
            $requete->bindValue("nom",$this->nom ,PDO::PARAM_STR) ;
            $requete->bindValue(":prenom",$this->prenom ,PDO::PARAM_STR) ;
            $requete->bindValue(":sexe",$this->sexe ,PDO::PARAM_STR) ;
            $requete->bindValue(":pseudo",$this->pseudo ,PDO::PARAM_STR) ;
            $requete->bindValue(":passwd",$this->passwd ,PDO::PARAM_STR) ;
            $requete->bindValue(":droit",$this->droit ,PDO::PARAM_STR) ;
            //$requete->bindValue(":photo",$this->photo ,PDO::PARAM_STR) ;
            $requete->bindValue(":droitNotif",$this->droitNotification ,PDO::PARAM_STR) ;
            if( $requete->execute() ){
                $requete->closeCursor() ;
                return true ;
            }
            else{
                return false ;
                $requete->closeCursor() ;
            }
        }
            
        public function update() {
            $connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("UPDATE user SET nom=:nom, prenom=:prenom, sexe=:sexe, pseudo=:pseudo, droit=:droit, droitnotification=:dn WHERE iduser=:idu ") ;
            $requete->bindValue("idu",$this->idUser ,PDO::PARAM_STR) ;
            $requete->bindValue(":nom",$this->nom ,PDO::PARAM_STR) ;
            $requete->bindValue(":idu",$this->idUser ,PDO::PARAM_STR) ;
            $requete->bindValue(":prenom",$this->prenom ,PDO::PARAM_STR) ;
            $requete->bindValue(":sexe",$this->sexe ,PDO::PARAM_STR) ;
            $requete->bindValue(":pseudo",$this->pseudo ,PDO::PARAM_STR) ;
            $requete->bindValue(":droit",$this->droit ,PDO::PARAM_STR) ;
            $requete->bindValue(":dn",$this->droitNotification ,PDO::PARAM_STR) ;
            if( $requete->execute() ){
                $requete->closeCursor() ;
                return true ;
            }
            else{
                return false ;
                $requete->closeCursor() ;
            }
        }
        
        public function desactiver(){
			$connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("UPDATE user SET etat=0 WHERE iduser=:idu ") ;
            $requete->bindValue("idu",$this->idUser ,PDO::PARAM_INT) ;
            if( $requete->execute() ){
                $requete->closeCursor() ;
                return true ;
            }
            else{
                return false ;
                $requete->closeCursor() ;
            }
        }
        
        public function activer(){
			$connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("UPDATE user SET etat=1 WHERE iduser=:idu ") ;
            $requete->bindValue("idu",$this->idUser ,PDO::PARAM_INT) ;
            if( $requete->execute() ){
                $requete->closeCursor() ;
                return true ;
            }
            else{
                return false ;
                $requete->closeCursor() ;
            }
        }
        
        public function updatePassword() {
            $connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("UPDATE user SET passwd=:passwd WHERE iduser=:idu ") ;
            $requete->bindValue(":passwd",$this->passwd ,PDO::PARAM_STR) ;
            $requete->bindValue(":idu",$this->idUser ,PDO::PARAM_INT) ;
            if( $requete->execute() ){
                $requete->closeCursor() ;
                return true ;
            }
            else{
                return false ;
                $requete->closeCursor() ;
            }
        }
        
        public function updatePhoto(){
			$connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("UPDATE user SET photo=:photo WHERE iduser=:idu ") ;
            $requete->bindValue(":photo",$this->photo ,PDO::PARAM_STR) ;
            $requete->bindValue(":idu",$this->idUser ,PDO::PARAM_INT) ;
            if( $requete->execute() ){
                $requete->closeCursor() ;
                return true ;
            }
            else{
                return false ;
                $requete->closeCursor() ;
            }
        }
        
        public function chargerUser(){
            $connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("SELECT * FROM user WHERE iduser = :idu") ;
            $requete->bindValue(":idu",$this->idUser ,PDO::PARAM_INT) ;
            $requete->execute() ;
            if ( $donnees = $requete->fetch() ){
                $this->idUser = $donnees['iduser'] ;
                $this->nom = $donnees['nom'] ;
                $this->prenom = $donnees['prenom'] ;
                $this->sexe = $donnees['sexe'] ;
                $this->pseudo = $donnees['pseudo'] ;
                $this->passwd = $donnees['passwd'] ;
                $this->droit = $donnees['droit'] ;
                $this->droitNotification = $donnees['droitnotification'] ;
            }
            $requete->closeCursor() ;
        }
    }
?>
