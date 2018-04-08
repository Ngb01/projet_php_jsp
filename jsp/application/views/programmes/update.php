<?php echo validation_errors(); ?>

<div class="form-group">
	<h2>Modifier le programme</h2>
	<div class="form-group">
		<?php 
			echo form_open('programmes/update/'.$programme['INTITULEP']);
			echo '<label for="nom">Nom du programme</label>';
			echo '<input class="form-control" type="text" name="nom" readonly value="'.$programme['INTITULEP'].'"><br>';
			echo '<label for="description">Description</label>';
			echo '<textarea class="form-control" name="description" rows="3" maxlength="200">'.$programme['EXPLICATION'].'</textarea>';
			echo '<input class="btn btn-primary" type="submit" name="submit" value="Modifier le programme"> ';
			echo '</form>';
		?>
	</div>
</div>