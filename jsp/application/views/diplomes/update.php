<?php echo validation_errors(); ?>

<div class="form-group">
	<h2>Modifier le diplome</h2>
	<div class="form-group">
		<?php 
			echo form_open('diplomes/update/'.$diplome['CODEDIP'].'');
			echo '<label for="intitule">Intitule</label>';
			echo '<input class="form-control" type="text" name="intitule" value="'.$diplome['INTITULEDIP'].'"><br>';
			echo '<label for="adresseweb">Adresse web</label>';
			echo '<input class="form-control" type="text" name="adresseweb" value="'.$diplome['ADRESSEWEBD'].'"><br>';
			echo '<label for="niveau">Niveau</label>';
			echo '<input class="form-control" type="text" name="niveau" value="'.$diplome['NIVEAU'].'"><br>';
			echo '<input class="btn btn-primary" type="submit" name="submit" value="Modifier le diplome"> ';
			echo '</form>';
		?>
	</div>
</div>