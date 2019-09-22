<html>
	<head>
		<meta http-equiv="Content-Language" content="en-ca">
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<link rel="stylesheet" href="./css/style.css" type="text/css" />
		<title>Page d'accueil</title>
	</head>

	<body>
		<?php
		require_once('./modele/classes/Video.class.php');
		require_once('/modele/classes/Liste.class.php');
		require_once('/modele/VideoDAO.class.php');
		include("/vues/menu.php");
		$vdao = new VideoDAO();
		$liste = $vdao->recherche($_REQUEST["critere"]);
		echo "<table id='listeImage'>";
		while ($liste->next())
		{
			$v = $liste->current();
			if ($v!=null)
			{
			echo "<a href='?action=afficher&id=".$v->getId()."' target='_self'>
				<video controls class='vDefault'>
					<source src='".$v->getChemin()."' type='video/mp4'>
				</video></a>";
			}
		}
		echo "</table>";
		?>	
	</body>
</html>