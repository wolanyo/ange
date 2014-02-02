<?php
    include_once("connexion.php") ;
    include_once("fonctions.php") ;
    
    class Courrier {
		private $idCourrier ;
		private $idUser ;
		private $dateArriver ;
		private $expediteur ;
		private $objet ;
		private $suite ;
		private $dateRetourFixer ;
		private $chemin ;
		private $classer ;	
		
		
		public function setIdCourrier($value){ $this->idCourrier = $value; }
		public function setIdUser($value){ $this->idUser = $value; }
		public function setDateArriver($value){ $this->dateArriver = $value; }
		public function setExpediteur($value){ $this->expediteur = $value; }
		public function setObjet($value){ $this->objet = $value; }
		public function setSuite($value){ $this->suite = $value; }
		public function setDateRetourFixer($value){ $this->dateRetourFixer = $value; }
		public function setChemin($value){ $this->chemin = $value; }
		public function setClasser($value){ $this->classer = $value; }
		
		
		public function getIdCourrier(){ return $this->idCourrier ; }
		public function getIdUser(){ return $this->idUser ; }
		public function getDateArriver(){ return $this->dateArriver ; }
		public function getExpediteur(){ return $this->expediteur ; }
		public function getObjet(){ return $this->objet ; }
		public function getSuite(){ return $this->suite ; }
		public function getDateRetourFixer(){ return $this->dateRetourFixer ; }
		public function getDroitNotification(){ return $this->droitNotification ; }
		public function getChemin(){ return $this->chemin ; }
		public function getClasser(){ return $this->classer ; }
		
		public function verifierCode() {
		    $connect = new Connexion ;
		    $bd = $connect->seConnecter() ;
		    $requete = $bd->prepare("SELECT * FROM courrier WHERE idcourrier = :idc AND supprimer = 0") ;
		    $requete->bindValue(":idc",$this->idCourrier ,PDO::PARAM_STR) ;
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
		    $requete = $bd->prepare("INSERT INTO courrier VALUES( :id, :iduser, :datearr, :exp, :objet, :dateretour, :suite, 0, 0 )") ;
		    $requete->bindValue(":id",$this->idCourrier ,PDO::PARAM_STR) ;
		    $requete->bindValue(":iduser",$this->idUser,PDO::PARAM_INT) ;
		    $requete->bindValue(":datearr",$this->dateArriver ,PDO::PARAM_STR) ;
		    $requete->bindValue(":exp",$this->expediteur ,PDO::PARAM_STR) ;
		    $requete->bindValue(":objet",$this->objet ,PDO::PARAM_STR) ;
		    $requete->bindValue(":dateretour",$this->dateRetourFixer ,PDO::PARAM_STR) ;
		    $requete->bindValue(":suite",$this->suite ,PDO::PARAM_STR) ;
		    //$requete->bindValue(":chemin",$this->suite ,PDO::PARAM_STR) ;
		    //$requete->bindValue(":classer",$this->suite ,PDO::PARAM_STR) ;
		    $requete->execute() ;
		    $requete->closeCursor() ;
		}
		public function update( $idc ) {
		    $connect = new Connexion ;
		    $bd = $connect->seConnecter() ;
		    $requete = $bd->prepare("UPDATE courrier SET idcourrier=:idc, datearrive=:datearr, expediteur=:exp, objet=:obj, dateretourfixer=:drf WHERE idcourrier=:idc2") ;
		    $requete->bindValue(":idc",$this->idCourrier ,PDO::PARAM_STR) ;
		    $requete->bindValue(":idc2", $idc, PDO::PARAM_STR) ;
		    $requete->bindValue(":datearr",$this->dateArriver ,PDO::PARAM_STR) ;
		    $requete->bindValue(":exp",$this->expediteur ,PDO::PARAM_STR) ;
		    $requete->bindValue(":obj",$this->objet ,PDO::PARAM_STR) ;
		    $requete->bindValue(":drf",$this->dateRetourFixer ,PDO::PARAM_STR) ;
		    //$requete->bindValue(":chemin",$this->suite ,PDO::PARAM_STR) ;
		    //$requete->bindValue(":classer",$this->suite ,PDO::PARAM_STR) ;
		    $requete->execute() ;
		    $requete->closeCursor() ;
		}
		
		public function supprimer() {
			$connect = new Connexion ;
		    $bd = $connect->seConnecter() ;
		    $requete = $bd->prepare("UPDATE courrier SET supprimer=1 WHERE idcourrier = :idc") ;
		    $requete->bindValue(":idc",$this->idCourrier ,PDO::PARAM_STR) ;
		    $requete->execute() ;
		    $requete->closeCursor() ;
		}
		
		public function updateSuite() {
		    $connect = new Connexion ;
		    $bd = $connect->seConnecter() ;
		    $requete = $bd->prepare("UPDATE courrier SET suite=:suite WHERE idcourrier = :idc") ;
		    $requete->bindValue(":idc",$this->idCourrier ,PDO::PARAM_STR) ;
		    $requete->bindValue(":suite",$this->suite ,PDO::PARAM_STR) ;
		    $requete->execute() ;
		    $requete->closeCursor() ;
		}
		
		public function chargerCourrier() {
		    $connect = new Connexion ;
		    $bd = $connect->seConnecter() ;
		    $requete = $bd->prepare("SELECT * FROM courrier WHERE idcourrier = :idc") ;
		    $requete->bindValue(":idc",$this->idCourrier ,PDO::PARAM_STR) ;
		    $requete->execute() ;
		    if ( $donnees = $requete->fetch() ){
				$this->idCourrier = $donnees['idcourrier'] ;
				$this->idUser = $donnees['iduser'] ;
				$this->dateArriver = reverseDate( $donnees['datearrive']) ;
				$this->expediteur = $donnees['expediteur'] ;
				$this->objet = $donnees['objet'] ;
				$this->dateRetourFixer = reverseDate($donnees['dateretourfixer'] ) ;
				$this->suite = $donnees['suite'] ;
				$this->chemin = $donnees['chemin'] ;
				$this->classer = $donnees['classer'] ;
		    }
		    $requete->closeCursor() ;
		}
    }
?>
