<?php echo validation_errors(); ?>

<h2>Ajouter un contrat</h2>
<div class="form-group">
	<?php 
		echo form_open('contrats/insert');
		echo '<label for="diplome">Diplome étranger prévu</label>';
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
		echo '<label for="programme">Programme de mobilité</label>';
		echo '<select class="form-control" name="programme">';
		$premier = true;
		foreach ($programmes as $programme) {
			if($premier === true){
				echo '<option value="'.$programme['INTITULEP'].'" selected="selected">'.$programme['INTITULEP'].'</option>';
				$premier = false;
			}else{
				echo '<option value="'.$programme['INTITULEP'].'">'.$programme['INTITULEP'].'</option>';
			}
		}
		echo '</select>';
		echo '<label for="demande">Demande de mobilité</label>';
		echo '<select class="form-control" name="demande">';
		$premier = true;
		foreach ($demandes as $demande) {
			if($premier === true){
				echo '<option value="'.$demande['REFDEMMOB'].'" selected="selected">'.$demande['DATEDEPOTDEMMOB'].'</option>';
				$premier = false;
			}else{
				echo '<option value="'.$demande['REFDEMMOB'].'">'.$demande['DATEDEPOTDEMMOB'].'</option>';
			}
		}
		echo '</select>';
		echo '<label for="duree">Durée en jours</label>';
		echo '<input class="form-control" type="number" name="duree" min="1"><br>';
		echo '<label for="etat">État du contrat</label>';
		echo '<select class="form-control" name="etat">';
		echo '<option value="Nouveau" selected="selected">Nouveau</option>';
		echo '<option value="En cours">En cours</option>';
		echo '</select>';
		echo '<input class="btn btn-primary" type="submit" value="Créer le contrat">';
		echo '</form>';
	?>
</div>