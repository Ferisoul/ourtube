<?php

class Commentaire 
{
	private $id = "";
	private $idUtilisateur = "";
	private $idVideo = "";
	private $commentaire = "";
	private $nomUtilisateur = "";

	public function __construct($c="XXX000")
	{
		$this->commentaire = $c;
	}	

	public function getId()
	{
		return $this->id;
	}
	
	public function setId($value)
	{
		$this->id = $value;
	}
	
	public function getIdUtilisateur()
	{
		return $this->idUtilisateur;
	}
	
	public function setIdUtilisateur($value)
	{
		$this->idUtilisateur = $value;
	}
	
	public function getIdVideo()
	{
		return $this->idVideo;
	}
	
	public function setIdVideo($value)
	{
		$this->idVideo = $value;
	}
	
	public function getCommentaire()
	{
		return $this->commentaire;
	}

	public function setCommentaire($value)
	{
		$this->commentaire = $value;
	}
	
	public function getNomUtilisateur()
	{
		return $this->nomUtilisateur;
	}
	
	public function setNomUtilisateur($value)
	{
		$this->nomUtilisateur = $value;
	}
	
	public function __toString()
	{
		$string = $this->commentaire." -".$this->nomUtilisateur;
		return $string;
	}
	
	public function affiche()
	{
		$string = $this->__toString()." -".$this->nomUtilisateur;
		echo $string;
	}
	
	public function loadFromRecord($ligne)
	{
		$this->id = $ligne["id"];
		$this->idUtilisateur = $ligne["idUtilisateur"];
		$this->idImage = $ligne["idVideo"];
		$this->commentaire = $ligne["commentaire"];
		$this->nomUtilisateur = $ligne["nomUtilisateur"];
	}
}
?>