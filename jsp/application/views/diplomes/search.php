<?php echo validation_errors(); ?>

<h2>Rechercher les diplômes par Université</h2>
<?php echo '<a href="insert/">+ Insérer un nouveau diplome</a>';?>
<div class="form-group">
	<?php 
		echo form_open('diplomes/find');
		echo '<label for="universite">Liste des universités</label>';
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
		echo '<input class="btn btn-primary" type="submit" value="Rechercher les diplômes">';
		echo '</form>';
	?>
</div>