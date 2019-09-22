<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/UtilisateurDAO.class.php');

class PseudoAction implements Action 
{
	//modifie un pseudonyme
	public function execute()
	{
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["idUtilisateur"])) return "default";
		if (!$this->valide()) return "compte";
		$udao = new UtilisateurDAO();
		$user = $udao->pseudo($_REQUEST["nouveauPseudo"], $_SESSION["idUtilisateur"]);
		$_SESSION["nom"]=$_REQUEST["nouveauPseudo"];
		return "compte";
	}
	
	public function valide()
	{
		$result = true;
		if ($_REQUEST['nouveauPseudo'] == "")
		{
			$_REQUEST["field_messages"]["nouveauPseudo"] = "Entrez votre nouveau pseudo";
			$result = false;
		}
		$udao = new UtilisateurDAO();
		if ($udao->trouverNom($_REQUEST["nouveauPseudo"]) != null)
		{
			$_REQUEST["field_messages"]["nouveauPseudo"] = "Ce pseudo est déjà pris";
			$result = false;
		}
		return $result;
	}
}
?>