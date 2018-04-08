<?php echo validation_errors(); ?>

<h2>Modifier le cours</h2>
<div class="form-group">
	<?php 
		echo form_open('cours/update/'.$cours['CODECOURS'].'');
		echo '<label for="code">Code</label>';
		echo '<input class="form-control" type="text" name="code" readonly value="'.$cours['CODECOURS'].'"><br>';
		echo '<label for="nom">Nom du cours</label>';
		echo '<input class="form-control" type="text" name="nom" value="'.$cours['LIBELLECOURS'].'"><br>';
		echo '<label for="credits">Crédits ECTS</label>';
		echo '<input class="form-control" type="text" name="credits" value="'.$cours['NBECTS'].'"><br>';
		echo '<input class="btn btn-primary" type="submit" name="submit" value="Modifier le cours"> ';
		echo '</form>';
	?>
</div>