<html>
	<head>
		<meta http-equiv="Content-Language" content="fr-ca">
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
		$liste = $vdao->findAll();
		$liste->melange();
		$i = 0;
		echo "<div id='listeDefault'>";
		echo "<table id='listeVideo'>";
		while ($liste->next())
		{
			$v = $liste->current();
			if ($v!=null && $i < 20)
			{
				echo "<a href='?action=afficher&id=".$v->getId()."' target='_self'>
						<video controls class='vDefault'>
							<source src='".$v->getChemin()."' type='video/mp4'>
						</video>
					  </a>";
					  $i++;
			}
		}
		?>	
	</body>
</html>