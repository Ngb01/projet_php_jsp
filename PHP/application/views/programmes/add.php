<?php echo validation_errors(); ?>

<div class="form-group">
	<h2>Ajouter un programme</h2>
	<div class="form-group">
		<?php 
			echo form_open('programmes/insert');
			echo '<label for="nom">Nom du programme</label>';
			echo '<input class="form-control" type="text" name="nom"><br>';
			echo '<label for="description">Description</label>';
			echo '<textarea class="form-control" name="description" rows="3" maxlength="200"></textarea>';
			echo '<input class="btn btn-primary" type="submit" name="submit" value="Ajouter le programme"> ';
			echo '</form>';
		?>
	</div>
</div>