<?php echo validation_errors(); ?>

<div class="form-group">
	<h2>Ajouter un diplôme</h2>
	<div class="form-group">
		<?php 
			echo form_open('diplomes/insert');
			echo '<label for="intitule">Intitule</label>';
			echo '<input class="form-control" type="text" name="intitule"><br>';
			echo '<label for="adresseweb">Adresse web</label>';
			echo '<input class="form-control" type="text" name="adresseweb"><br>';
			echo '<label for="niveau">Niveau</label>';
			echo '<input class="form-control" type="text" name="niveau"><br>';
			echo '<label for="universite">Université d\'accueil</label>';
			echo '<select class="form-control" name="universite">';
			$premier = true;
			foreach ($universites as $universite) {
				if($premier === true){
					echo '<option value="'.$universite['NOMU'].'" selected="selected">'.$universite['NOMU'].'</option>';
					$premier = false;
				}else
					echo '<option value="'.$universite['NOMU'].'">'.$universite['NOMU'].'</option>';
			}
			echo '</select>';
			echo '<input class="btn btn-primary" type="submit" name="submit" value="Ajouter le diplome"> ';
			echo '</form>';
		?>
	</div>
</div>