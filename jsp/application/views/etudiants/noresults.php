<h2>Résultat de la recherche</h2>
<div class="main">
	<div class="alert alert-info">
	  Cette étudiant n'existe pas.
	</div>
	<h2>Nouvelle recherche</h2>
	<div class="form-group line">
	<?php 
		echo form_open('etudiants/search');
		echo '<label for="nom">Nom de l\'étudiant : </label>';
		echo '<input class="form-control" type="text" name="nom"">';
		echo '<input class="btn btn-primary" type="submit" name="submit" value="Rechercher"> ';
		echo '</form>';
	?>
</div>
</div>