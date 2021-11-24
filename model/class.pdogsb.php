<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=gsb';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}
/**
 * Test : retourne les informations d'un visiteur par son id
 
 * @param $id 
 * @return le nom et le prénom sous la forme d'un tableau associatif 
*/
	public function getInfosVisiteur($id){
		$req = "select visiteur.nom as nom, visiteur.prenom as prenom from visiteur 
		where visiteur.id = '$id' ";
		$rs = PdoGsb::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}


	// public function getMois()
	// {
	// 	$requete ="select distinct mois from fichefrais order by mois ";
	// 	$rs = PdoGsb::$monPdo->query($requete);
	// 	$donnees = $rs->fetchall();
	// 	// foreach($donnees as $ligne)
	// 	// {
	// 	// 	var_dump($ligne);
	// 	// }
	// 	return $donnees;

	// } 
	
	public function getMois()
	{
		$requete =PdoGsb::$monPdo->prepare("select distinct mois from fichefrais order by mois ");
		$requete->execute();
		$donnees = $requete->fetchall();
		// foreach($donnees as $ligne)
		// {
		// 	var_dump($ligne);
		// }
		return $donnees;

	} 

	// public function getEtape($date)
	// {
	// 	$requete = PdoGsb::$monPdo->query("select sum(quantite) as montant from lignefraisforfait where mois = '$date' AND idFraisForfait ='ETP' ");
	// 	$donnees = $requete->fetchall();
	// 	// foreach($donnees as $ligne)
	// 	// {
	// 	// 	var_dump($ligne);
	// 	// }
	// 	return $donnees;

	// }

	// public function getEtape($date)
	// {
	// 	$requete = PdoGsb::$monPdo->prepare("select sum(quantite) as montant from lignefraisforfait where mois = :date AND idFraisForfait ='ETP' ");
	// 	$requete->bindParam(":date", $date);
	// 	$requete->execute();
	// 	$donnees = $requete->fetchall();
	// 	// foreach($donnees as $ligne)
	// 	// {
	// 	// 	var_dump($ligne);
	// 	// }
	// 	return $donnees;

	// }

	// public function getKm($date)
	// {
	// 	$requete = PdoGsb::$monPdo->query("select sum(quantite) as montant from lignefraisforfait where mois = '$date' AND idFraisForfait ='KM' ");
	// 	$donnees = $requete->fetchall();
	// 	// foreach($donnees as $ligne)
	// 	// {
	// 	// 	var_dump($ligne);
	// 	// }
	// 	return $donnees;

	// }


	// public function getKm($date)
	// {
	// 	$requete = PdoGsb::$monPdo->prepare("select sum(quantite) as montant from lignefraisforfait where mois = :date AND idFraisForfait ='KM' ");
	// 	$requete->bindParam(":date", $date);
	// 	$requete->execute();
	// 	$donnees = $requete->fetchall();
	// 	// foreach($donnees as $ligne)
	// 	// {
	// 	// 	var_dump($ligne);
	// 	// }
	// 	return $donnees;

	// }

	// public function getNui($date)
	// {
	// 	$requete = PdoGsb::$monPdo->query("select sum(quantite) as montant from lignefraisforfait where mois = '$date' AND idFraisForfait ='NUI' ");
	// 	$donnees = $requete->fetchall();
	// 	// foreach($donnees as $ligne)
	// 	// {
	// 	// 	var_dump($ligne);
	// 	// }
	
	// 	return $donnees;

	// }


	public function getFrais($date, $idF)
	{
		$requete = PdoGsb::$monPdo->prepare("select sum(quantite) as montant from lignefraisforfait where mois = :date AND idFraisForfait =:idF ");
		$requete->bindParam(":date", $date);
		$requete->bindParam(":idF", $idF);
		$requete->execute();
		$donnees = $requete->fetchall();
		// foreach($donnees as $ligne)
		// {
		// 	var_dump($ligne);
		// }
	
		return $donnees;

	}

	// public function getRep($date)
	// {
	// 	$requete = PdoGsb::$monPdo->query("select sum(quantite) as montant from lignefraisforfait where mois = '$date' AND idFraisForfait ='REP' ");
	// 	$donnees = $requete->fetchall();
	//     // foreach($donnees as $ligne)
	// 	// {
	// 	// 	var_dump($ligne);
	// 	// }
	
	// 	return $donnees;
	// }

	// public function getRep($date)
	// {
	// 	$requete = PdoGsb::$monPdo->prepare("select sum(quantite) as montant from lignefraisforfait where mois =:date AND idFraisForfait ='REP' ");
	// 	$requete->bindParam(":date", $date);
	// 	$requete->execute();
	// 	$donnees = $requete->fetchall();
	//     // foreach($donnees as $ligne)
	// 	// {
	// 	// 	var_dump($ligne);
	// 	// }
	
	// 	return $donnees;
	// }
	
}

?>