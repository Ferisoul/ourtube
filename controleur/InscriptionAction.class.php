<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/UtilisateurDAO.class.php');

class InscriptionAction implements Action 
{
	//ajoute un utlisateur dans la base de données
	public function execute()
	{
		if (!ISSET($_REQUEST["username"])) return "default";
		if (!$this->valide()) return "default";
		$udao = new UtilisateurDAO();
		$user = $udao->trouverNom($_REQUEST["username"]);
		if ($user != null)
			{
				$_REQUEST["field_messages"]["username"] = "Ce nom est déjà pris.";	
				return "default";
			}
		$user = $udao->ajouter($_REQUEST["username"], $_REQUEST["mdp"]);
		if (!ISSET($_SESSION)) session_start();
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