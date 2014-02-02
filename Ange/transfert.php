<?php
    include_once("connexion.php") ;
    include_once("fonctions.php");
    
    class Transfert {
        private $idTransfert ;
        private $idCourrier ;
        private $dateTransfert ;
        private $receveur ;
        private $objet ;
        private $dateRetourFixer ;
        private $dateRetour ;
        private $suiteDonnee ;
        private $idExpediteur ;
        private $idReceveur ;
        
        public function getIdTransfert() { return $this->idTransfert ; }
        public function getIdCourrier() { return $this->idCourrier ; }
        public function getDateTransfert() { return $this->dateTransfert ; }
        public function getReceveur() { return $this->receveur ; }
        public function getObjet() { return $this->objet ; }
        public function getDateRetourFixer(){ return $this->dateRetourFixer ; }
        public function getDateRetour() { return $this->dateRetour ; }
        public function getSuiteDonnee() { return $this->suiteDonnee ; }
        public function getIdExpediteur() { return $this->idExpediteur ; }
        public function getIdReceveur() { return $this->idReceveur ; }
        
        public function setIdTransfert($value) { $this->idTransfert = $value ; }
        public function setIdCourrier($value) { $this->idCourrier = $value ; }
        public function setDateTransfert($value) { $this->dateTransfert = $value ; }
        public function setReceveur($value) { $this->receveur = $value ; }
        public function setObjet($value) { $this->objet = $value ; }
        public function setDateRetourFixer($value){ $this->dateRetourFixer = $value; }
        public function setDateRetour($value) { $this->dateRetour = $value ; }
        public function setSuiteDonnee($value) { $this->suiteDonnee = $value ; }
        public function setIdExpediteur($value) { $this->idExpediteur = $value ; }
        public function setIdReceveur($value) { $this->idReceveur = $value ; }
        
        public function save() {
            $connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("INSERT INTO transfert VALUES( :id, :idc, :dateTr, :receveur, :objet, :drf, :dateRet, :suiteDon, 0 )") ;
            $requete->bindValue(":id",$this->idTransfert ,PDO::PARAM_INT) ;
            $requete->bindValue(":idc",$this->idCourrier ,PDO::PARAM_STR) ;
            $requete->bindValue(":dateTr",$this->dateTransfert ,PDO::PARAM_STR) ;
            $requete->bindValue(":receveur",$this->receveur ,PDO::PARAM_STR) ;
            $requete->bindValue(":objet",$this->objet ,PDO::PARAM_STR) ;
            $requete->bindValue(":drf",$this->dateRetourFixer ,PDO::PARAM_STR) ;
            $requete->bindValue(":dateRet",$this->dateRetour ,PDO::PARAM_STR) ;
            $requete->bindValue(":suiteDon",$this->suiteDonnee ,PDO::PARAM_STR) ;
            $requete->bindValue(":idexpediteur",$this->idExpediteur ,PDO::PARAM_INT) ;
            $requete->bindValue(":idreceveur",$this->idReceveur ,PDO::PARAM_INT) ;
            $requete->execute() ;
            $requete->closeCursor() ;
        }
        public function update() {
            $connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("UPDATE transfert SET datetransfert=:dateTr, receveur=:receveur, objet=:objet, dateretourfixer=:drf WHERE idtransfert=:id ") ;
            $requete->bindValue(":id",$this->idTransfert ,PDO::PARAM_INT) ;
            $requete->bindValue(":dateTr",$this->dateTransfert ,PDO::PARAM_STR) ;
            $requete->bindValue(":receveur",$this->receveur ,PDO::PARAM_STR) ;
            $requete->bindValue(":objet",$this->objet ,PDO::PARAM_STR) ;
            $requete->bindValue(":drf",$this->dateRetourFixer ,PDO::PARAM_STR) ;
            $requete->execute() ;
            $requete->closeCursor() ;
        }
        
        public function supprimer(){
			$connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("UPDATE transfert SET supprimer=1 WHERE idtransfert=:id ") ;
            $requete->bindValue(":id",$this->idTransfert ,PDO::PARAM_INT) ;
            $requete->execute() ;
            $requete->closeCursor() ;
        }
        
        public function updateSuiteDonnee() {
            $connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("UPDATE transfert SET dateretour=:dateRet, suitedonnee=:suiteDon WHERE idtransfert=:id") ;
            $requete->bindValue(":id",$this->idTransfert ,PDO::PARAM_INT) ;
            $requete->bindValue(":dateRet",$this->dateRetour ,PDO::PARAM_STR) ;
            $requete->bindValue(":suiteDon",$this->suiteDonnee ,PDO::PARAM_STR) ;
            $requete->execute() ;
            $requete->closeCursor() ;
        }
        
        public function chargerTransfert() {
            $connect = new Connexion ;
            $bd = $connect->seConnecter() ;
            $requete = $bd->prepare("SELECT * FROM transfert WHERE idtransfert = :idt") ;
            $requete->bindValue(":idt",$this->idTransfert ,PDO::PARAM_STR) ;
            $requete->execute() ;
            if ( $donnees = $requete->fetch() ){
                $this->idTransfert = $donnees['idtransfert'] ;
                $this->idCourrier = $donnees['idcourrier'] ;
                $this->dateTransfert = reverseDate( $donnees['datetransfert'],"-","-" ) ;
                $this->receveur = $donnees['receveur'] ;
                $this->objet = $donnees['objet'] ;
                $this->dateRetourFixer = reverseDate( $donnees['dateretourfixer'] ) ;
                $this->dateRetour = reverseDate( $donnees['dateretour'],"-","-" ) ;
                $this->suiteDonnee = $donnees['suitedonnee'] ;
                $this->idExpediteur = reverseDate( $donnees['idexpediteur'],"-","-" ) ;
                $this->idReceveur = $donnees['idreceveur'] ;
            }
            $requete->closeCursor() ;
        }
    }
?>
