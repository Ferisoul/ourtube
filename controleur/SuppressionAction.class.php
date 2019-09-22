<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/VideoDAO.class.php');

class SuppressionAction implements Action 
{
	//supprime une vidéo
	public function execute()
	{
		if (!ISSET($_SESSION)) session_start();
		$vdao = new VideoDAO();
		$video = $vdao->trouver($_REQUEST["idVideo"]);
		if ($video->getIdUtilisateur() != $_SESSION["idUtilisateur"]) return "compte";
		$vdao->supprimer($_REQUEST["idVideo"]);
		return "compte";
	}
}
?>