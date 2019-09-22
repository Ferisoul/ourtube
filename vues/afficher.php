<html>
	<head>
		<meta http-equiv="Content-Language" content="en-ca">
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
		<link rel="stylesheet" href="./css/style.css" type="text/css" />
		<title>Page d'accueil</title>
	</head>

	<body>
		<div>
			<div id="content">
				<h2>Afficher</h2>
				<?php
				require_once('./modele/classes/Video.class.php');
				require_once('/modele/VideoDAO.class.php');
				require_once('/modele/UtilisateurDAO.class.php');
				require_once('/modele/CommentaireDAO.class.php');
				include("/vues/menu.php");
		
				if (!ISSET($_SESSION)) session_start();
				$vdao = new VideoDAO();
				$udao = new UtilisateurDAO();
				$video = $vdao->trouver($_REQUEST["id"]);
				echo "<div class='vAfficher'>";
				echo "<video controls>;
						<source src='".$video->getChemin()."' type='video/mp4'>
					</video>";
				echo "<p>".$video->getTitre()."</p>";
				$utilisateur = $udao->trouver($video->getIdUtilisateur());
				echo "<p>".$utilisateur->getNomUtilisateur()."</p>";
				echo "<p>".$video->getDescription()."</p>";
				echo "</div>";
		
				$cdao = new CommentaireDAO();
				$liste = $cdao->trouver($video->getId());
				echo "<table class='vAfficher'>";
				while ($liste->next())
				{
					$c = $liste->current();
					if ($c!=null)
					{
						echo "<tr><td>";
						print $c;
						echo "</td>";
					}
				}
				echo "</table>";
				if (ISSET($_SESSION["nom"]))
				{	
					?>
					<form action="" method="post" class="vAfficher">
						<input name="idVid" value="<?=$video->getId()?>" type="hidden">
						<input name="idUtilisateur" value="<?=$_SESSION["idUtilisateur"]?>" type="hidden">
						<input type="text" name="commentaire">
						<input name="action" value="commentaire" type="hidden">
						<input name="actionCommentaire" value="ajouter" type="hidden">
						<input type="submit" value="soumettre" id="bouton">
					</form>
					<?php
				}
				$vdao = new VideoDAO();
				$liste = $vdao->findall();
				$liste->melange();
				$i = 0;
				echo "<div class='vListeAfficher'>";
				echo "<table id='listeVid'>";
				while ($liste->next())
				{
					$v = $liste->current();
					if ($v!=null && $i < 10)
					{
						echo "<tr><td>
							<a href='?action=afficher&id=".$v->getId()."' target='_self'>
								<video controls class='vDefault'>
									<source src='".$v->getChemin()."' type='video/mp4'>
								</video>
							</a>
						</td>";
						$i++;
					}
				}
				echo "</table>
				</div>";
				?>
			</div>
		</div>
	</body>
</html>