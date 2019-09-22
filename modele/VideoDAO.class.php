<?php
include_once('/modele/classes/Database.class.php'); 
include_once('/modele/classes/Video.class.php');
include_once('/modele/classes/Liste.class.php'); 

class VideoDAO
{
	public static function ajouter($chemin, $idu, $titre, $description)
	{
		$db = Database::getInstance();
		$pstmt = $db->prepare("insert into videos (addresseVid, idUtilisateur, titre, description) values (:a, :x, :y, :z)");
		$pstmt->execute(array(':a' => $chemin, ':x' => $idu, ':y' => $titre, ':z' => $description));
		$pstmt->closeCursor();
	}

	public static function findAll()
	{
		try {
			$liste = new Liste();	
			$requete = "SELECT * FROM videos";
			$cnx = Database::getInstance();
			$res = $cnx->query($requete);
			foreach($res as $row) 
			{
				$v = new Video();
				$v->loadFromRecord($row);
				$liste->ajouter($v);
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
	
	public static function trouver($id)
	{
		try {
			$requete = "SELECT * FROM videos where id = ".$id;
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
			foreach($res as $row) 
			{
				$v = new Video();
				$v->loadFromRecord($row);
			}
			$res->closeCursor();
		    $cnx = null;
			return $v;
		} catch (PDOException $e) 
		{
		    print "Error!: " . $e->getMessage() . "<br/>";
		    return $v;
		}
	}
	
	public static function recherche($critere)
	{
		try {
			$liste = new Liste();
			$requete = "SELECT * FROM videos where titre like '%".$critere."%'";
			$cnx = Database::getInstance();	
			$res = $cnx->query($requete);
			foreach($res as $row) 
			{
				$v = new Video();
				$v->loadFromRecord($row);
				$liste->ajouter($v);
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
	
	public static function trouverPublic()
	{
		try {
			$liste = new Liste();
		
			$requete = 'SELECT * FROM videos where partage = 1';
			$cnx = Database::getInstance();	
			$res = $cnx->query($requete);
			foreach($res as $row) 
			{
				$i = new Image();
				$i->loadFromRecord($row);
				$liste->ajouter($i);
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
	
	public static function trouverPrive($idUtilisateur)
	{
		try {
			$liste = new Liste();
			$requete = "SELECT * FROM videos where idUtilisateur = ".$idUtilisateur;
			$cnx = Database::getInstance();
			$res = $cnx->query($requete);
			foreach($res as $row) 
			{
				$v = new Video();
				$v->loadFromRecord($row);
				$liste->ajouter($v);
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
			$requete = "DELETE FROM videos WHERE id = ".$id;
			$cnx = Database::getInstance();
			$res = $cnx->query($requete);
			$res->closeCursor();
		    $cnx = null;
		} catch(PDOException $e)
		{
			print "Error!: " . $e->getMessage() . "<br/>";
		}
	}
	
	public static function partager($id)
	{
		try
		{
			$requete = "UPDATE videos SET partage = 1 WHERE ID = ".$id;
			$cnx = Database::getInstance();
			$res = $cnx->query($requete);
			$res->closeCursor();
		    $cnx = null;
		} catch(PDOException $e)
		{
			print "Error!: " . $e->getMessage() . "<br/>";
		}
	}
	
	public static function priver($id)
	{
		try
		{
			$requete = "UPDATE videos SET partage = 0 WHERE ID = ".$id;
			$cnx = Database::getInstance();
			$res = $cnx->query($requete);
			$res->closeCursor();
		    $cnx = null;
		} catch(PDOException $e)
		{
			print "Error!: " . $e->getMessage() . "<br/>";
		}
	}
}
?>