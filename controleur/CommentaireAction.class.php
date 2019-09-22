<?php
require_once('./controleur/Action.interface.php');
require_once('/modele/CommentaireDAO.class.php');

class CommentaireAction implements Action 
{
	//ajoute ou supprime un commentaire de la base de données
	public function execute()
	{
		if (!ISSET($_SESSION)) session_start();
		$cdao = new CommentaireDAO();
		switch ($_REQUEST["actionCommentaire"])
		{
			case "ajouter" :
				$cdao->ajouter($_REQUEST["idUtilisateur"],$_REQUEST["idVid"] , $_REQUEST["commentaire"]);
				return "afficher";
				break;
			case "supprimer" :
				$comm = $cdao->find($_REQUEST["idCommentaire"]);
				if ($comm->getIdUtilisateur() != $_SESSION["idUtilisateur"]) return "compte";
				$cdao->supprimer($_REQUEST["idCommentaire"]);
				return "compte";
				break;
		}
	}
}
?>