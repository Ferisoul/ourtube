<?php
require_once('./controleur/Action.interface.php');

class RechercheAction implements Action 
{
	public function execute()
	{
		if (!ISSET($_SESSION)) session_start();
		return "resultat";
	}
}
?>