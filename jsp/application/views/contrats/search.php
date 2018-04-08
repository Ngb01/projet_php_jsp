<?php echo validation_errors(); ?>

<h2>Rechercher les contrats d'une université</h2>
<a href="contrats/insert/">+ Insérer un nouveau contrat</a>
<div class="form-group">
	<?php 
		echo form_open('contrats/search');
		echo '<label for="universite">Liste des universités proposées</label>';
		echo '<select class="form-control" name="universite">';
		$premier = true;
		foreach ($universites as $universite) {
			if($premier === true){
				echo '<option value="'.$universite['NOMU'].'" selected="selected">'.$universite['NOMU'].'</option>';
				$premier = false;
			}else{
				echo '<option value="'.$universite['NOMU'].'">'.$universite['NOMU'].'</option>';
			}
		}
		echo '</select>';
		echo '<input class="btn btn-primary" type="submit" value="Rechercher les contrats">';
		echo '</form>';
	?>
</div>