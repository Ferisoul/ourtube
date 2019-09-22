<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/VideoDAO.class.php');

class UploadAction implements Action 
{
	//téléverse une vidéo sur le serveur et l'ajoute à la base de données
	public function execute()
	{
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_FILES["fichier"])) return "default";
		$vdao = new VideoDAO();
		$dossier = "./uploads/".$_SESSION["nom"];
		$temps = strval(time());
		$nomFichier = $temps.$_FILES["fichier"]["name"];
		if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $dossier.$nomFichier))
		{
			$id = $_SESSION["idUtilisateur"];
			$chemin = "http://localhost/OurTube/uploads/".$_SESSION["nom"].$temps.basename($_FILES["fichier"]["name"]);
			$titre = $_REQUEST["titre"];
			$description = $_REQUEST["description"];
			$vdao->ajouter($chemin, $id, $titre, $description);
		}	
		return "default";
	}
}