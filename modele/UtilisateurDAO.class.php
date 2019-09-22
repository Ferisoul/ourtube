<?php
include_once('/modele/classes/Database.class.php'); 
include_once('/modele/classes/Utilisateur.class.php'); 

class UtilisateurDAO
{	
	public static function trouverNom($nom)
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM utilisateurs WHERE nomUtilisateur = :x");
		$pstmt->execute(array(':x' => $nom));
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$u = new Utilisateur();
		if ($result)
		{
			$u->setNomUtilisateur($result->nomUtilisateur);
			$u->setMdp($result->mdp);
			$u->setId($result->id);
			$pstmt->closeCursor();
			return $u;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	public static function trouver($id)
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("SELECT * FROM utilisateurs WHERE id = :x");
		$pstmt->execute(array(':x' => $id));
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$u = new Utilisateur();
		if ($result)
		{
			$u->setNomUtilisateur($result->nomUtilisateur);
			$u->setMdp($result->mdp);
			$u->setId($result->id);
			$pstmt->closeCursor();
			return $u;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	public static function mdp($mdp, $id)
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("update utilisateurs set mdp = :x where id = :y");
		$pstmt->execute(array(':x' => $mdp, ':y' => $id));
		$pstmt->closeCursor();
	}
	
	public static function pseudo($pseudo, $id)
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("update utilisateurs set nomUtilisateur = :x where id = :y");
		$pstmt->execute(array(':x' => $pseudo, ':y' => $id));
		$pstmt->closeCursor();
	}

	public static function ajouter($nom, $mdp)
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("insert into utilisateurs (nomUtilisateur, mdp) values (:x, :y)");
		$pstmt->execute(array(':x' => $nom, ':y' => $mdp));
		$pstmt->closeCursor();
	}
}
?>