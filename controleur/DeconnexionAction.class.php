<?php
require_once('/controleur/Action.interface.php');

class DeconnexionAction implements Action 
{
	public function execute()
	{
		if (!ISSET($_SESSION)) session_start();
		UNSET($_SESSION["connecté"]);
		session_destroy();
		return "default";
	}
}
?>