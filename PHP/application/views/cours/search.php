<?php echo validation_errors(); ?>

<h2>Rechercher les cours d'un diplome</h2>
<div class="form-group">
	<?php 
		echo form_open('cours/find');
		echo '<label for="diplome">Liste des diplomes proposés</label>';
		echo '<select class="form-control" name="diplome">';
		$premier = true;
		foreach ($diplomes as $diplome) {
			if($premier === true){
				echo '<option value="'.$diplome['CODEDIP'].'" selected="selected">'.$diplome['INTITULEDIP'].'</option>';
				$premier = false;
			}else{
				echo '<option value="'.$diplome['CODEDIP'].'">'.$diplome['INTITULEDIP'].'</option>';
			}
		}
		echo '</select>';
		echo '<input class="btn btn-primary" type="submit" value="Rechercher les cours">';
		echo '</form>';
	?>
</div>