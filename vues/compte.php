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
		?>

		<h1>Bonjour <?php echo $_SESSION["nom"] ?></h1>
		<h2>Ajouter une vidéo</h2>
		<form action="" method="post" enctype="multipart/form-data" class="nouvVideo">
			<label for="fichier">Choisir la vidéo à téléverser:</label>
			<input name="fichier" type="file"><br>
			<label for="titre">Titre de la vidéo</label><br>
			<input name="titre" type="text"><br>
			<label for="description">Description de la vidéo</label><br>
			<input name="description" type="text"><br>
			<input name="action" value="upload" type="hidden">
			<input type="submit" value="Téléverser votre vidéo" id="bouton">
		</form>

		<h2>Changer le mot de passe</h2>
		<form action="" method="post" class="nouvVideo">
			<label for="ancienMdp">Ancien mot de passe :</label><br/> 
			<input name="ancienMdp" type="password"/>
			<?php if (ISSET($_REQUEST["field_messages"]["username"])) 
				echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["username"]."</span>";
			?>
			<br />
			<label for="nouveauMdp">Nouveau mot de passe :</label><br /> 
			<input name="nouveauMdp" type="password" />
			<?php if (ISSET($_REQUEST["field_messages"]["mdp"])) 
				echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["mdp"]."</span>";
			?>
			<br />
			<input name="action" value="changerMdp" type="hidden" />
			<input value=" OK " type="submit" id="bouton"/>
		</form>
	
		<h2>Changer le pseudo</h2>
		<form action="" method="post" class="nouvVideo">
			<label for="nouveauPseudo">Nouveau pseudo :</label><br /> 
			<input name="nouveauPseudo" type="text" />
			<?php if (ISSET($_REQUEST["field_messages"]["nouveauPseudo"])) 
				echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["nouveauPseudo"]."</span>";
			?>
			<br />
			<input name="action" value="changerPseudo" type="hidden" />
			<input value=" OK " type="submit" id="bouton"/>
		</form>
-------------------------------------------------------
		<h2>Vos vidéos</h2>
		<?php
		$liste = $vdao->trouverPrive($_SESSION["idUtilisateur"]);
		echo "<table>";
		while ($liste->next())
		{
			$v = $liste->current();
			if ($v!=null)
			{
				echo "<a href='?action=afficher&id=".$v->getId()."' target='_self'>
					<video controls class='vDefault'>
						<source src='".$v->getChemin()."' type='video/mp4'>
					</video></a>
					<form action='' method='post' class='nouVideo'>
						<input name='idVideo' value='".$v->getId()."' type='hidden'/>
						<input name='action' value='suppression' type='hidden' />
						<input value='supprimer' type='submit' id='bouton'/>
					</form>";
						
			}
		}
		echo "</table>";
		?>
-------------------------------------------------------
		<h2>Vos commentaires</h2>
		<?php
		$cdao = new CommentaireDAO();
		$liste = $cdao->trouverPerso($_SESSION["idUtilisateur"]);
		echo "<table id='listeComm'>";
		while ($liste->next())
		{
			$c = $liste->current();
			if ($c!=null)
			{
				echo "<tr><td>".$c;"</td>";
				echo "<form action='' method='post' class='nouVideo'>
						<input name='idCommentaire' value='".$c->getId()."' type='hidden'/>
						<input name='action' value='commentaire' type='hidden' />
						<input name='actionCommentaire' value='supprimer' type='hidden' />
						<input value='supprimer' type='submit' id='bouton'/>
					  </form>";
			}
		}
		echo "</table>";
		?>
	</body>
</html>