<?php echo validation_errors(); ?>

<h2>Rechercher un étudiant</h2>
<a href="etudiants/insert/">+ Insérer un nouvel diplome</a>
<div class="form-group">
	<?php 
		echo form_open('etudiants/search');
		echo '<label for="nom">Nom de l\'étudiant</label>';
		echo '<input class="form-control" type="text" name="nom""><br>';
		echo '<input class="btn btn-primary" type="submit" name="submit" value="Rechercher"> ';
		echo '</form>';
	?>
</div>