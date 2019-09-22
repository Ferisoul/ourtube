<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/UtilisateurDAO.class.php');

class MdpAction implements Action 
{
	//modifie un mot de passe
	public function execute()
	{
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["idUtilisateur"])) return "default";
		if (!$this->valide()) return "compte";
		$udao = new UtilisateurDAO();
		$user = $udao->mdp($_REQUEST["nouveauMdp"], $_SESSION["idUtilisateur"]);
		return "compte";
	}
	
	public function valide()
	{
		$result = true;
		if ($_REQUEST['ancienMdp'] == "")
		{
			$_REQUEST["field_messages"]["ancienMdp"] = "Entrez votre mot de passe actuel";
			$result = false;
		}	
		if ($_REQUEST['nouveauMdp'] == "")
		{
			$_REQUEST["field_messages"]["nouveauMdp"] = "Entrez votre nouveau mot de passe";
			$result = false;
		}		
		return $result;
	}
}
?>