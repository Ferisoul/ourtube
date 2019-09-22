<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/UtilisateurDAO.class.php');

class ConnexionAction implements Action 
{
	//connecte un utilisateur
	public function execute()
	{
		if (!ISSET($_REQUEST["username"])) return "default";
		if (!$this->valide()) return "default";
		$udao = new UtilisateurDAO();
		$user = $udao->trouverNom($_REQUEST["username"]);
		if ($user == null)
			{
				$_REQUEST["field_messages"]["username"] = "Utilisateur inexistant.";	
				return "Utilisateur inexistant";
			}
		else if ($user->getMdp() != $_REQUEST["mdp"])
			{
				$_REQUEST["field_messages"]["mdp"] = "Mot de passe incorrect.";	
				return "default";
			}
		if (!ISSET($_SESSION)) session_start();
		$_SESSION["nom"] = $_REQUEST["username"];
		$_SESSION["idUtilisateur"] = $user->getId();
		return "default";
	}
	
	public function valide()
	{
		$result = true;
		if ($_REQUEST['username'] == "")
		{
			$_REQUEST["field_messages"]["username"] = "Veuillez entrer votre nom d'utilisateur";
			$result = false;
		}	
		if ($_REQUEST['mdp'] == "")
		{
			$_REQUEST["field_messages"]["mdp"] = "Veuillez entrer votre mot de passe";
			$result = false;
		}	
		return $result;
	}
}
?>