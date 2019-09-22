<?php

class Video {
	private $id = "AAA";
	private $chemin = "";
	private $idUtilisateur = "";
	private $titre = "";
	private $description = "";
	private $partage = "";

	public function __construct($i="XXX000")
	{
		$this->chemin = $i;
	}	

	public function getId()
	{
		return $this->id;
	}
	
	public function setId($value)
	{
		$this->id = $value;
	}
	
		public function getChemin()
	{
		return $this->chemin;
	}
	
	public function setChemin($value)
	{
		$this->chemin = $value;
	}
	
	public function getIdUtilisateur()
	{
		return $this->idUtilisateur;
	}
	
	public function setIdUtilisateur($value)
	{
		$this->idUtilisateur = $value;
	}
	
	public function getTitre()
	{
		return $this->titre;
	}
	
	public function setTitre($value)
	{
		$this->titre = $value;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function setDescription($value)
	{
		$this->description = $value;
	}
	
	public function getPartage()
	{
		return $this->partage;
	}

	public function setPartage($value)
	{
		$this->partage = $value;
	}
	
	public function __toString()
	{
		return "Image[".$this->id.",".$this->chemin.",".$this->idUtilisateur.",".$this->partage."]";
	}
	
	public function affiche()
	{
		echo $this->__toString();
	}
	
	public function loadFromRecord($ligne)
	{
		$this->id = $ligne["id"];
		$this->chemin = $ligne["addresseVid"];
		$this->idUtilisateur = $ligne["idUtilisateur"];
		$this->titre = $ligne["titre"];
		$this->description = $ligne["description"];
		$this->partage = $ligne["partage"];
	}	
}
?>