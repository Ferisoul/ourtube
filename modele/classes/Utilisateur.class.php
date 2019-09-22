<?php

class Utilisateur 
{
	private $nomUtilisateur = "AAA111";
	private $mdp = "";
	private $id = "";

	public function __construct($n="XXX000")
	{
		$this->nomUtilisateur = $n;
	}	
	
	public function getNomUtilisateur()
	{
		return $this->nomUtilisateur;
	}
	
	public function setNomUtilisateur($value)
	{
		$this->nomUtilisateur = $value;
	}
        
	public function getMdp()
	{
		return $this->mdp;
	}
	
	public function setMdp($value)
	{
		$this->mdp = $value;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($value){
		$this->id = $value;
	}

	public function __toString()
	{
		return $this->nomUtilisateur;
	}
	
	public function affiche()
	{
		echo $this->__toString();
	}
	
	public function loadFromRecord($ligne)
	{
		$this->nomUtilisateur = $ligne["nomUtilisateur"];
		$this->mdp = $ligne["mdp"];
	}	
}
?>