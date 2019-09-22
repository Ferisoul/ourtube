<?php
if (ISSET($_REQUEST["global_message"]))
	$msg="<span class=\"warningMessage\">".$_REQUEST["global_message"]."</span>";
	$u = "";
if (ISSET($_REQUEST["username"]))
	$u = $_REQUEST["username"];
?>	
<div class="formContainer">	
	<div id="" class="form">
		<ul>
			<li>
				<form action="" method="get">
					<input name="action" value="default" type="hidden" />
					<input value="Page d'accueil" type="submit" id="bouton"/>
				</form>
			</li>
			<li>
				<form action="" method="get">
					<label for="critere">Rechercher une vidéo par titre ou auteur</label>
					<input name="critere" type="text">
					<input name="action" value="recherche" type="hidden">
					<input type="submit" value="rechercher">
				</form>
			</li>
			<li>
				<form action="" method="get">
					<input name="action" value="compte" type="hidden" />
					<input value="compte" type="submit" id="bouton"/>
				</form>
			</li>
			<li>
				<form action="" method="post">
					<input name="action" value="deconnexion" type="hidden" />
					<input value="Deconnexion" type="submit" id="bouton"/>
				</form>
			</li>
		</ul>
	</div>
	<div id="loginForm" class="form">
		<h2>Connexion</h2>
		<form action="" method="post">
			<label for="username">Nom utilisateur :</label><br/> 
			<input name="username" type="text" value="<?php echo $u?>" />
			<?php if (ISSET($_REQUEST["field_messages"]["username"])) 
				echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["username"]."</span>";
			?>
			<br />
			<label for="mdp">Mot de passe    :</label><br /> 
			<input name="mdp" type="password" />
			<?php if (ISSET($_REQUEST["field_messages"]["mdp"])) 
				echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["mdp"]."</span>";
			?>
			<br />
			<input name="action" value="connecter" type="hidden" />
			<input value=" OK " type="submit" id="bouton"/>
		</form>
	</div>

	<div id="" class="form">
		<h2>Inscription</h2>
		<form action="" method="post">
			<label for="username">Nom utilisateur :</label><br/> 
			<input name="username" type="text" value="<?php echo $u?>" />
			<?php if (ISSET($_REQUEST["field_messages"]["nomUtilisateur"])) 
				echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["nomUtilisateur"]."</span>";
			?>
			<br />
			<label for="mdp">Mot de passe    :</label><br /> 
			<input name="mdp" type="password" />
			<?php if (ISSET($_REQUEST["field_messages"]["mdp"])) 
				echo "<br /><span class=\"warningMessage\">".$_REQUEST["field_messages"]["mdp"]."</span>";
			?>
			<br />
			<input name="action" value="inscription" type="hidden" />
			<input value=" OK " type="submit" id="bouton"/>
		</form>
	</div>
</div>
<br><br>