<?php
require_once('./controleur/DefaultAction.class.php');
require_once('./controleur/UploadAction.class.php');
require_once('./controleur/AfficherAction.class.php');
require_once('./controleur/CommentaireAction.class.php');
require_once('./controleur/RechercheAction.class.php');
require_once('./controleur/ConnexionAction.class.php');
require_once('./controleur/MdpAction.class.php');
require_once('./controleur/PseudoAction.class.php');
require_once('./controleur/CompteAction.class.php');
require_once('./controleur/DeconnexionAction.class.php');
require_once('./controleur/InscriptionAction.class.php');
require_once('./controleur/SuppressionAction.class.php');
class ActionBuilder{
	//retourne une vue en fonction de l'action demandée dans la requête
	public static function getAction($nomAction){
		switch ($nomAction)
		{
			case "upload" :
				return new UploadAction();
				break;
			case "afficher" :
				return new AfficherAction();
				break;
			case "commentaire":
				return new CommentaireAction();
				break;
			case "recherche":
				return new RechercheAction();
				break;
			case "connecter":
				return new ConnexionAction();
				break;
			case "changerMdp":
				return new MdpAction();
				break;
			case "changerPseudo":
				return new PseudoAction();
				break;
			case "compte":
				return new CompteAction();
				break;
			case "deconnexion":
				return new DeconnexionAction();
				break;
			case "inscription":
				return new InscriptionAction();
				break;
			case "suppression":
				return new SuppressionAction();
				break;
			default :
				return new DefaultAction();
		}
	}
}
?>