<?php
include_once('/modele/classes/Database.class.php'); 
include_once('/modele/classes/Commentaire.class.php'); 
include_once('/modele/classes/Liste.class.php'); 

class CommentaireDAO
{	
	public static function ajouter($idu, $idv, $comm)
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("insert into commentaires (idUtilisateur, idVideo, commentaire) values (:x, :y, :z)");
		$pstmt->execute(array(':x' => $idu, ':y' => $idv, ':z' => $comm));
		$pstmt->closeCursor();
	}

	public static function trouverTout()
	{
		try {
			$liste = new Liste();
			$requete = 'SELECT * FROM commentaires';
			$cnx = Database::getInstance();
			$res = $cnx->query($requete);
			foreach($res as $row) 
			{
				$c = new Commentaire();
				$c->loadFromRecord($row);
				$liste->ajouter($c);
			}
			$res->closeCursor();
		    $cnx = null;
			return $liste;
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $liste;
		}	
	}

	public static function find($id)
	{
		try
		{
			$requete = "SELECT commentaires.*, utilisateurs.nomUtilisateur FROM commentaires RIGHT JOIN utilisateurs ON commentaires.idUtilisateur = utilisateurs.id where commentaires.id = ".$id;
			$cnx = Database::getInstance();
			$res = $cnx->query($requete);
			foreach($res as $row) 
			{
				$c = new Commentaire();
				$c->loadFromRecord($row);
			}
			$res->closeCursor();
		    $cnx = null;
			return $c;
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $c;
		}
	}

	public static function trouver($idVideo)
	{
		try 
		{
			$liste = new Liste();
			$requete = "SELECT commentaires.*, utilisateurs.nomUtilisateur FROM commentaires RIGHT JOIN utilisateurs ON commentaires.idUtilisateur = utilisateurs.id where idVideo = ".$idVideo;
			$cnx = Database::getInstance();
			$res = $cnx->query($requete);
			foreach($res as $row) 
			{
				$c = new Commentaire();
				$c->loadFromRecord($row);
				$liste->ajouter($c);
			}
			$res->closeCursor();
		    $cnx = null;
			return $liste;
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $liste;
		}	
	}
	
	public static function trouverPerso($idUtilisateur)
	{
		try {
			$liste = new Liste();
		
			$requete = "SELECT commentaires.*, utilisateurs.nomUtilisateur FROM commentaires RIGHT JOIN utilisateurs ON commentaires.idUtilisateur = utilisateurs.id where idUtilisateur = ".$idUtilisateur;
			$cnx = Database::getInstance();
			$res = $cnx->query($requete);
			foreach($res as $row) 
			{
				$c = new Commentaire();
				$c->loadFromRecord($row);
				$liste->ajouter($c);
			}
			$res->closeCursor();
		    $cnx = null;
			return $liste;
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $liste;
		}	
	}
	
	public static function supprimer($id) {
		try
		{
			$requete = "DELETE FROM commentaires WHERE id = ".$id;
			$cnx = Database::getInstance();
			$res = $cnx->query($requete);
			$res->closeCursor();
		    $cnx = null;
		}catch(PDOException $e)
		{
			print "Error!: " . $e->getMessage() . "<br/>";
		}
	}
}
?>