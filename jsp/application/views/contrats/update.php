<?php echo validation_errors(); ?>

<h2>Modifier un contrat</h2>
<div class="form-group">
	<?php 
		echo form_open('contrats/update/'.$contrat['IDCONTRAT']);
		echo '<label for="diplome">Diplome étranger prévu</label>';
		echo '<select class="form-control" name="diplome">';
		foreach ($diplomes as $diplome) {
			if($diplome['CODEDIP'] == $contrat['CODEDIP']){
				echo '<option value="'.$diplome['CODEDIP'].'" selected="selected">'.$diplome['INTITULEDIP'].'</option>';
			}else{
				echo '<option value="'.$diplome['CODEDIP'].'">'.$diplome['INTITULEDIP'].'</option>';
			}
		}
		echo '</select>';
		echo '<label for="programme">Programme de mobilité</label>';
		echo '<select class="form-control" name="programme">';
		foreach ($programmes as $programme) {
			if($programme['INTITULEP'] == $contrat['INTITULEP']){
				echo '<option value="'.$programme['INTITULEP'].'" selected="selected">'.$programme['INTITULEP'].'</option>';
			}else{
				echo '<option value="'.$programme['INTITULEP'].'">'.$programme['INTITULEP'].'</option>';
			}
		}
		echo '</select>';
		echo '<label for="demande">Demande de mobilité</label>';
		echo '<select class="form-control" name="demande">';
		foreach ($demandes as $demande) {
			if($demande['REFDEMMOB'] == $contrat['REFDEMMOB']){
				echo '<option value="'.$demande['REFDEMMOB'].'" selected="selected">'.$demande['DATEDEPOTDEMMOB'].'</option>';
			}else{
				echo '<option value="'.$demande['REFDEMMOB'].'">'.$demande['DATEDEPOTDEMMOB'].'</option>';
			}
		}
		echo '</select>';
		echo '<label for="duree">Durée en jours</label>';
		echo '<input class="form-control" type="number" name="duree" min="1" value="'.$contrat['DUREE'].'"><br>';
		echo '<label for="etat">État du contrat</label>';
		echo '<select class="form-control" name="etat">';
		if($contrat['ETATCONTRAT'] == 'Nouveau'){
			echo '<option value="Nouveau" selected="selected">Nouveau</option>';
			echo '<option value="En cours">En cours</option>';
		}else{
			echo '<option value="Nouveau">Nouveau</option>';
			echo '<option value="En cours" selected="selected">En cours</option>';
		}
		echo '</select>';
		echo '<input class="btn btn-primary" type="submit" value="Créer le contrat">';
		echo '</form>';
	?>
</div>