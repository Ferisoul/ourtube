<?php
require_once('/controleur/ActionBuilder.class.php');

if (ISSET($_REQUEST["action"]))
{
	$actionDemandee = $_REQUEST["action"];      
	$controleur = ActionBuilder::getAction($actionDemandee);
	$vue = $controleur->execute();
} else	
{
	$action = ActionBuilder::getAction("");
	$vue = $action->execute();
}
include_once('vues/'.$vue.'.php');
?>